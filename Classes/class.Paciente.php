<?php

include_once '../global.php';

class Paciente extends Pessoa {

  static $local_filename = "Paciente.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }

  protected $tratamento = array();
  protected $responsavelFinanceiro;
  protected $dataDeNascimento;

  public function __construct($nome, $telefone, $email, $cpf, $rg, $dataDeNascimento, /*Cliente*/ $responsavelFinanceiro) {
    parent::__construct($nome, $telefone, $email, $cpf, $rg);
    $this->dataDeNascimento = $dataDeNascimento;
    $this->responsavelFinanceiro = $responsavelFinanceiro;
  }

  public function getDataDeNascimento() {
    return $this->dataDeNascimento;
  }

  public function getResponsavelFinanceiro() {
    return $this->responsavelFinanceiro;
  }

  public function setDataDeNascimento($dataDeNascimento) {
    $this->dataDeNascimento = $dataDeNascimento;
  }

  public function setResponsavelFinanceiro($responsavelFinanceiro) {
    $this->responsavelFinanceiro = $responsavelFinanceiro;
  }

  public function printMe() {
    echo "\nInformações do Paciente:\n";
    echo "------------------------\n";
    echo "Nome: " . $this->nome . "\n";
    echo "Telefone: " . $this->telefone . "\n";
    echo "Email: " . $this->email . "\n";
    echo "CPF: " . $this->cpf . "\n";
    echo "RG: " . $this->rg . "\n";
    echo "Data de Nascimento: " . $this->dataDeNascimento . "\n";
    echo "------------------------\n";
    echo "\nResponsável Financeiro: ";
    echo "\n------------------------";
    echo $this->responsavelFinanceiro->printMe() . "\n";
  }

  public function salvarPaciente (){
    $pacienteExistente = Paciente::buscarPaciente($this->cpf);

    if (!$pacienteExistente) {
      $this->save();
      echo "\n Paciente cadastrado com sucesso!\n";
    } 
    else {
      echo "\nPaciente já cadastrado!\n";
    }
  }

  static public function getPacientes(){
    $pacientes = Paciente::getRecords();
    
    foreach ($pacientes as $paciente) {
      $paciente->printMe();
    }
  }


  static public function buscarPaciente($cpf){
    try{
      $pacienteBuscado = Paciente::getRecordsByField( "cpf", $cpf );
      if (empty($pacienteBuscado)) {
        return 0;
      } else {
        return $pacienteBuscado[0];
      }
    }
    catch (Exception $e) {
      echo $e->getMessage();
    }
  }

}