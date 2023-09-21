<?php

include_once("class.pessoa.php");

class profissional extends pessoa {
  
  private $salario;
  private $endereco;
  private $cargo;

  public function __construct ($nome, $telefone, $email, $cpf, $rg, $salario, $endereco, $cargo){
    parent::__construct($nome, $telefone, $email, $cpf, $rg);
    $this->salario = $salario;
    $this->endereco = $endereco;
    $this->cargo = $cargo;
  }
}
?>
