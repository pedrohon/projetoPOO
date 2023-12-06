<?php

include_once '../global.php';

class Procedimento extends persist {

  static $local_filename = "Procedimento.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }

  protected $nomeDoProcedimento;
  protected $detalhamentoDoProcedimento;
  protected $valorUnitario;
  protected $qntDeConsultas;

  public function __construct($nomeDoProcedimento, $detalhamentoDoProcedimento, $valorUnitario, $qntDeConsultas) {
    $this->nomeDoProcedimento = $nomeDoProcedimento;
    $this->detalhamentoDoProcedimento = $detalhamentoDoProcedimento;
    $this->valorUnitario = $valorUnitario;
    $this->qntDeConsultas = $qntDeConsultas;  
  }

  public function getNomeDoProcedimento() {
    return $this->nomeDoProcedimento;
  }

  public function getDescricaoDoProcedimento() {
    return $this->detalhamentoDoProcedimento;
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

  public function setDescricaoDoProcedimento($detalhamentoDoProcedimento) {
    $this->detalhamentoDoProcedimento = $detalhamentoDoProcedimento;
  }

  public function setValorUnitario($valorUnitario) {
    $this->valorUnitario = $valorUnitario;
  }

  /*public function getQntDeConsultas() {
  return $this->qntDeConsultas;
}*/

public function calcularQtdConsultas($procedimento){
  // calcula a quantidade de consultas nececessárias para determinado procedimento
    switch($procedimento){
      case "Extração de dente":
        return $qntDeConsultas = 1;
      case "Tratamento com aparelho fixo": //mínimo de 1 ano, de 15 em 15
        return $qntDeConsultas = 26;
      case "Limpeza":
        return $qntDeConsultas = 1;
      case "Restauração":
        return $qntDeConsultas = 1;
      case "Extração Comum":
        return $qntDeConsultas = 1;
      case "Canal":
        return $qntDeConsultas = 1;
      case "Extração de Siso":
        return $qntDeConsultas = 1;
      case "Clareamento a laser":
        return $qntDeConsultas = 1;
      case "Clareamento de moldeira":
        return $qntDeConsultas = 1;
      default:
        return $qntDeConsultas = 1; //mínimo de consultas
    }
  }
}
