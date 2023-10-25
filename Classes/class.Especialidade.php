<?php

include_once '../global.php';

class Especialidade extends persist {

  static $local_filename = "Especialidade.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }

  protected $especialidade;
  protected $procedimento = array();

  public function __construct($especialidade, Procedimento $procedimento) {
    $this->especialidade = $especialidade;
    $this->procedimento = $procedimento;
  }

  public function getEspecialidade() {
    return $this->especialidade;
  }

  public function getProcedimento() {
    return $this->procedimento;
  }
 
  public function setEspecialidade($especialidade) {
    $this->especialidade = $especialidade;
  }
 
  public function setProcedimento($procedimento) {
    $this->procedimento = $procedimento;
  }
  
}