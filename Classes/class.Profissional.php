<?php

include_once("class.Pessoa.php");

class Profissional extends Pessoa {
  
  protected $salario;
  protected $endereco;
  protected $cargo;

  public function __construct ($nome, $telefone, $email, $cpf, $rg, $salario, $endereco, $cargo){
    parent::__construct($nome, $telefone, $email, $cpf, $rg);
    $this->salario = $salario;
    $this->endereco = $endereco;
    $this->cargo = $cargo;
  }

  public function getSalario() {
    return $this->salario;
  }

  public function getEndereco() {
    return $this->endereco;
  }

  public function getCargo() {
    return $this->cargo;
  }
}
?>
