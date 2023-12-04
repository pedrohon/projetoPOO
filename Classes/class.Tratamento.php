<?php

include_once '../global.php';

class Tratamento extends Orcamento {

  static $local_filename = "Tratamento.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }

  protected $formaDePagamento;
  protected $idTratamento;
  public function __construct(Paciente $paciente, Dentista $dentista, $data, Procedimento $procedimentos, $valorTotal, $aprovacao, FormaDePagamento $formaDePagamento, $idTratamento) {
    parent::__construct($paciente, $dentista, $data, $procedimentos, $valorTotal, $aprovacao);
    $this->formaDePagamento = $formaDePagamento;
    $this->idTratamento = $idTratamento;
  }

  public function getFormaDePagamento() {
    return $this->formaDePagamento;
  }

  public function setFormaDePagamento($formaDePagamento) {
    $this->formaDePagamento = $formaDePagamento;
  }
} 

