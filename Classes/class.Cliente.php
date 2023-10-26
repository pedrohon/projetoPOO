<?php

include_once '../global.php';

class Cliente extends Pessoa {

  static $local_filename = "Cliente.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }

  public function __construct($nome, $telefone, $email, $cpf, $rg) {
    parent::__construct($nome, $telefone, $email, $cpf, $rg);
  }

  public function salvarCliente (){
    $this->save();
  }

  /*public function adicionarPaciente(Paciente $paciente){
    $this->pacientes[] = $paciente; //um ou mais pacientes associados a um cliente
  }

  public function getPacientes(){
    return $this->pacientes; //retorna a lista de pacientes associados a ele
  }*/
}

// Receber informações do usuário para criar um Cliente

/*echo "Cadastro de Cliente:\n";
$nomeCliente = (string)readLine("Nome do cliente: ");

$rgCliente = (string)readLine("RG do cliente: ");

$emailCliente = (string)readLine("E-mail do cliente: ");

$telefoneCliente = (string)readLine("Telefone do cliente: ");

$cpfCliente = (string)readLine("CPF do cliente: ");

$_cliente = new Cliente($nomeCliente, $rgCliente, $emailCliente, $telefoneCliente, $cpfCliente);

//associando paciente ao cliente

$_cliente->adicionarPaciente($_paciente);

//imprimindo as informações de cliente

echo "\n Ficha informacional do Cliente\n";
echo "Nome: " . $_cliente->nome . "\n";
echo "RG:" . $_cliente->rg . "\n";
echo "E-mail: " . $_cliente->email . "\n";
echo "Telefone: " . $_cliente->telefone . "\n";
echo "CPF: " . $_cliente->cpf . "\n";*/

