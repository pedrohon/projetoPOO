<?php

include_once '../global.php';

class Especialidade extends persist {

  static $local_filename = "Especialidade.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }

  protected $especialidade;
  protected $procedimento = array();
  protected $percentualDeParticipacao;


  public function __construct($especialidade, array $procedimento, $percentualDeParticipacao) {

    $this->especialidade = $especialidade;
    $this->procedimento = $procedimento;
    $this->percentualDeParticipacao = $percentualDeParticipacao;
  }

  public function getEspecialidade() {
    return $this->especialidade;
  }

  public function getProcedimento() {
    return $this->procedimento;
  }

  public function getpercentualDeParticipacao() {
    return $this->percentualDeParticipacao;
  }
 
  public function setEspecialidade($especialidade) {
    $this->especialidade = $especialidade;
  }
 
  public function setProcedimento($procedimento) {
    $this->procedimento = $procedimento;
  }

  public function setpercentualDeParticipacao($percentualDeParticipacao) {
    $this->percentualDeParticipacao = $percentualDeParticipacao;
  }
}
