<?php

include_once '../global.php';

class Cliente extends Pessoa {

  static $local_filename = "Cliente.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }

  protected $valorTotalTratamentos;
  protected $pacientes = array();

  public function __construct($nome, $telefone, $email, $cpf, $rg, $valorTotalTratamentos) {
    parent::__construct($nome, $telefone, $email, $cpf, $rg);
    $this->valorTotalTratamentos = $valorTotalTratamentos;

  }

  public function salvarCliente (){
    $clienteExistente = Cliente::buscarCliente($this->cpf);

    if (!$clienteExistente) {
      $this->save();
    } else {
      echo "\nCliente já cadastrado!\n";
    }
  }
  
  public function getValorTotalTratamentos() {
      return $this->valorTotalTratamentos;
  }
  
  public function setValorTotalTratamentos() {
    $valorTotalTratamentos = 0;
    foreach ($this->pacientes as $paciente) {
      $valorTotalTratamentos += $paciente->valorTotalTratamentos();
    }
    $this->valorTotalTratamentos = $valorTotalTratamentos;
  }

  public function printMe() {
    echo "\nInformações do Cliente:\n";
    echo "------------------------\n";
    echo "Nome: "                       . $this->nome . "\n";
    echo "Telefone: "                   . $this->telefone . "\n";
    echo "Email: "                      . $this->email . "\n";
    echo "CPF: "                        . $this->cpf . "\n";
    echo "RG: "                         . $this->rg . "\n";
    echo "Valor Total de Tratamentos: " . $this->valorTotalTratamentos . "\n";
    echo "Clientes Associados: \n";
    $this->getPacientes($this->pacientes);
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

  public function adicionarPaciente(Paciente $paciente){
    $this->pacientes[] = $paciente;
  }

  public function getPacientes($pacientes){
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