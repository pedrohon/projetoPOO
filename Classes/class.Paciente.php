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

  public function __construct($nome, $telefone, $email, $cpf, $rg, $tratamento, $dataDeNascimento, /*Cliente*/ $responsavelFinanceiro) {
    parent::__construct($nome, $telefone, $email, $cpf, $rg);
    $this->tratamento = $tratamento;
    $this->dataDeNascimento = $dataDeNascimento;
    $this->responsavelFinanceiro = $responsavelFinanceiro;
  }

  public function getTratamento() {
    return $this->tratamento;
  }

  public function getDataDeNascimento() {
    return $this->dataDeNascimento;
  }

  public function getResponsavelFinanceiro() {
    return $this->responsavelFinanceiro;
  }

  public function adicionarTratamento(Tratamento $tratamento) {
    $this->tratamento[] = $tratamento;
  }

  public function valorTotalTratamentos() {
    $valorTotal = 0;
    foreach ($this->tratamento as $tratamento) {
      $valorTotal += $tratamento->getValorTotal();
    }
    return $valorTotal;
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
    echo "Tratamento: " . $this->tratamento . "\n";
    echo "Data de Nascimento: " . $this->dataDeNascimento . "\n";
  }

  public function salvarPaciente (){
    $pacienteExistente = Paciente::buscarPaciente($this->cpf);

    if (!$pacienteExistente) {
      $this->save();
      echo '\n Paciente cadastrado com sucesso!\n';
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