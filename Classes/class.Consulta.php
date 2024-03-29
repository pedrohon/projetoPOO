<?php

include_once '../global.php';

class Consulta extends persist {

  static $local_filename = "Consulta.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }

  protected $paciente;
  protected $dentistaExecutor;
  protected $data;
  protected $duracaoPrevista;
  protected $procedimento;


  public function __construct(Paciente $paciente, $dentistaExecutor, $data, $duracaoPrevista, $procedimento) {
    $this->paciente = $paciente;
    $this->dentistaExecutor = $dentistaExecutor;
    $this->data = $data;
    $this->duracaoPrevista = $duracaoPrevista;
    $this->procedimento = $procedimento;
  }

  public function getPaciente() {
    return $this->paciente;
  }

  public function getDentistaExecutor() {
    return $this->dentistaExecutor;
  }

  public function getData() {
    return $this->data;
  }

  public function getDuracaoPrevista() {
    return $this->duracaoPrevista;
  }

  public function getProcedimento() {
    return $this->procedimento;
  }

  public function setPaciente($paciente) {
    $this->paciente = $paciente;
  }

  public function setDentistaExecutor($dentistaExecutor) {
    $this->dentistaExecutor = $dentistaExecutor;
  }

  public function setData($data) {
    $this->data = $data;
  }

  public function setDuracaoPrevista($duracaoPrevista) {
    $this->duracaoPrevista = $duracaoPrevista;
  }

  public function setProcedimento($procedimento) {
    $this->procedimento = $procedimento;
  }

  public function salvarConsulta () {
    $this->save();
  }
}