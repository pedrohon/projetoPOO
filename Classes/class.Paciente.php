<?php

include_once '../global.php';

class Paciente extends Pessoa {

  static $local_filename = "Paciente.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }

  protected $tratamento;
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

  public function setTratamento($tratamento) {
    $this->tratamento = $tratamento;
  }

  public function setDataDeNascimento($dataDeNascimento) {
    $this->dataDeNascimento = $dataDeNascimento;
  }

  public function setResponsavelFinanceiro($responsavelFinanceiro) {
    $this->responsavelFinanceiro = $responsavelFinanceiro;
  }

  public function salvarPaciente (){
    $this->save();
  }
}