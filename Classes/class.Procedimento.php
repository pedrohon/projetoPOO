<?php

include_once '../global.php';

class Procedimento extends persist {

  static $local_filename = "Procedimento.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }

  protected $nomeDoProcedimento;
  protected $descricaoDoProcedimento;
  protected $valorUnitario;
  protected $qntDeConsultas;

  public function __construct($nomeDoProcedimento, $descricaoDoProcedimento, $valorUnitario, $qntDeConsultas) {
    $this->nomeDoProcedimento = $nomeDoProcedimento;
    $this->descricaoDoProcedimento = $descricaoDoProcedimento;
    $this->valorUnitario = $valorUnitario;
    $this->qntDeConsultas = $qntDeConsultas;
  }

  public function getNomeDoProcedimento() {
    return $this->nomeDoProcedimento;
  }

  public function getDescricaoDoProcedimento() {
    return $this->descricaoDoProcedimento;
  }

  public function getValorUnitario() {
    return $this->valorUnitario;
  }

  public function getQntDeConsultas() {
    return $this->qntDeConsultas;
  }

  public function setNomeDoProcedimento($nomeDoProcedimento) {
    $this->nomeDoProcedimento = $nomeDoProcedimento;
  }

  public function setDescricaoDoProcedimento($descricaoDoProcedimento) {
    $this->descricaoDoProcedimento = $descricaoDoProcedimento;
  }

  public function setValorUnitario($valorUnitario) {
    $this->valorUnitario = $valorUnitario;
  }

  public function setQntDeConsultas($qntDeConsultas) {
    $this->qntDeConsultas = $qntDeConsultas;
  }
}
