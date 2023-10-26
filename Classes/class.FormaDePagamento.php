<?php

include_once '../global.php';

class FormaDePagamento extends persist {

  static $local_filename = "FormaDePagamento.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }

  protected $nomeFormaDePagamento;
  protected $quantidadeDeParcelas;

  public function __construct($nomeFormaDePagamento,$quantidadeDeParcelas) {
    $this->nomeFormaDePagamento=$nomeFormaDePagamento;
    $this->quantidadeDeParcelas=$quantidadeDeParcelas;
  }

  public function getNomeFormaDePagamento() {
    return $this->nomeFormaDePagamento;
  }
  
  public function getQuantidadeDeParcelas() {
    return $this->quantidadeDeParcelas;
  }

  public function setNomeFormaDePagamento($nomeFormaDePagamento) {
    $this->nomeFormaDePagamento = $nomeFormaDePagamento;
  }

  public function setQuantidadeDeParcelas($quantidadeDeParcelas){
    $this->quantidadeDeParcelas = $quantidadeDeParcelas;
  }
}