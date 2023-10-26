<?php

include_once '../global.php';

class Pessoa extends persist { 

  static $local_filename = "Pessoa.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }

  protected $nome;
  protected $telefone;
  protected $email;
  protected $cpf;
  protected $rg;

  public function __construct($nome, $telefone, $email, $cpf, $rg) {
    $this->nome = $nome;
    $this->telefone = $telefone;
    $this->email = $email;
    $this->cpf = $cpf;
    $this->rg = $rg;
  }

  public function getNome() {
    return $this->nome;
  }

  public function getTelefone() {
    return $this->telefone;
  }

  public function getEmail() {
    return $this->email;
  }

  public function getCpf() {
    return $this->cpf;
  }

  public function getRg() {
    return $this->rg;
  }

  public function setNome($nome) {
    $this->nome = $nome;
  }

  public function setTelefone($telefone) {
    $this->telefone = $telefone;
  }

  public function setEmail($email) {
    $this->email = $email;
  }

  public function setCpf($cpf) {
    $this->cpf = $cpf;
  }
  
  public function setRg($rg) {
    $this->rg = $rg;
  }
}

