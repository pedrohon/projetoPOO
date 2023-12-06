<?php

include_once '../global.php';

class FormaDePagamento extends persist {

  static $local_filename = "FormaDePagamento.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }

  protected $nomeFormaDePagamento;

  public function __construct($nomeFormaDePagamento) {
    $this->nomeFormaDePagamento = $nomeFormaDePagamento;
  }

  public function getNomeFormaDePagamento() {
    return $this->nomeFormaDePagamento;
  }
  
  public function setNomeFormaDePagamento($nomeFormaDePagamento) {
    $this->nomeFormaDePagamento = $nomeFormaDePagamento;
  }
  }