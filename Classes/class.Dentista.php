<?php

include_once '../global.php';

class Dentista extends Profissional {

  static $local_filename = "Dentista.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }

  protected $cro;
  protected $especialidade = array();
  protected $parceiro;
 

  public function __construct($nome, $telefone, $email, $cpf, $rg, $salario, $endereco, $cargo, $cro, array $especialidade, $parceiro) {
    parent::__construct($nome, $telefone, $email, $cpf, $rg, $salario, $endereco, $cargo);

    $this->cro = $cro;
    $this->especialidade = $especialidade;
    $this->parceiro = $parceiro;
    
  }

  public function getCro() {
    return $this->cro;
  }

public function getEspecialidade() {
    return $this->especialidade;
}


public function adicionarEspecialidade(Especialidade $especialidade) {
  array_push($this->especialidade, $especialidade);
}


  public function getParceiro() {
    return $this->parceiro;
  }


  public function setCro($cro) {
    $this->cro = $cro;
  }

  public function setEspecializacao(array $especialidade) {
    $this->especialidade = $especialidade;
  }

  public function setParceiro($parceiro) {
    $this->parceiro = $parceiro;
  }

  public function salvarDentista () {
    $this->save();
  }

}
