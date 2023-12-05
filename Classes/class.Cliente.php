<?php

include_once '../global.php';

class Cliente extends Pessoa {

  static $local_filename = "Cliente.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }

  protected $pacientes = array();

  public function __construct($nome, $telefone, $email, $cpf, $rg) {
    parent::__construct($nome, $telefone, $email, $cpf, $rg);

  }

  public function salvarCliente (){
    $clienteExistente = Cliente::buscarCliente($this->cpf);

    if (!$clienteExistente) {
      $this->save();
      echo "\n Cliente cadastrado com sucesso!\n";
    } 
    
    else {
      echo "\nCliente já cadastrado!\n";
    }
  }

  public function printMe() {
    echo "\nInformações do Cliente:\n";
    echo "------------------------\n";
    echo "Nome: "                       . $this->nome . "\n";
    echo "Telefone: "                   . $this->telefone . "\n";
    echo "Email: "                      . $this->email . "\n";
    echo "CPF: "                        . $this->cpf . "\n";
    echo "RG: "                         . $this->rg . "\n";
  }

  static public function buscarCliente($cpf){
    try{
      $clienteBuscado = Cliente::getRecordsByField( "cpf", $cpf );
      if (empty($clienteBuscado)) {
        return 0;
      } else {
        return $clienteBuscado[0];
      }
    }
    catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function adicionarPaciente(Cliente $cliente, Paciente $paciente){
    $clientes = Cliente::getRecords();
    //print_r($clientes);
    $posicao = array_search($cliente, $clientes, false) <=> 0;
    
    if($posicao !== false){
      unset($clientes[$posicao]);
      $this->save();
    }
    else{
      $this->save();
    }
  }

  public function getPacientes(){
    return $this->pacientes;
  }

  public function listaPacientes($pacientes){
    echo "\nPacientes Associados: \n";
    foreach ($pacientes as $paciente) {
      $paciente->printMe();
    }
  }

  static public function getClientes(){
    $clientes = Cliente::getRecords();
    
    foreach ($clientes as $cliente) {
      $cliente->printMe();
    }
  }

}