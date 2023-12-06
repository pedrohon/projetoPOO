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

  public function setDentista($dentista) {
    $this->dentista = $dentistar;
  }

  public function setProcedimento($procedimento) {
    $this->procedimento = $procedimento;
  }

  public function verificaHabilitacao(Dentista $dentista, Procedimento $procedimento) {
    $especialidades = $dentista->getEspecialidade();
    $nomeDoProcedimento = $procedimento->getNomeDoProcedimento();

    foreach ($especialidades as $especialidade) {
      $procedimentos = $especialidade->getProcedimento();
      foreach ($procedimentos as $procedimento) {
        if ($procedimento->getNomeDoProcedimento() == $nomeDoProcedimento)
        {
          return true;
        }
        else{
          return false;
        }
      }
    }
  }
}