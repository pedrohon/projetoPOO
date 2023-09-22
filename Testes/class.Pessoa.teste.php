<?php

class Pessoa {
    private $nome;
    private $telefone;
    private $email;
    private $cpf;
    private $rg;

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
}