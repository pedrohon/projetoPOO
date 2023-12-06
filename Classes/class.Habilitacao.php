<?php

include_once '../global.php';

class Habilitacao extends persist {

  static $local_filename = "Habilitacao.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }

  protected $idHabilitacao;
  protected $dentista;
  protected $procedimento;

  public function __construct(int $idHabilitacao, Dentista $dentista, Procedimento $procedimento) {
    $this->idHabilitacao = $idHabilitacao;
    $this->dentista = $dentista;
    $this->procedimento = $procedimento;
  }

  public function getIdHabilitacao() {
    return $this->idHabilitacao;
  }

  public function getDentista() {
    return $this->dentista;
  }

  public function getProcedimento() {
    return $this->procedimento;
  }

  /*
  public function setIdHabilitacao($idHabilitacao) {
    $this->idHabilitacao = $idHabilitacao;
  }*/

  public function setDentista($dentista) {
    $this->dentista = $dentistar;
  }

  public function setProcedimento($procedimento) {
    $this->procedimento = $procedimento;
  }
}