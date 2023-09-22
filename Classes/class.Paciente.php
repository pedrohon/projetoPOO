<?php

include_once("../Testes/class.pessoa.teste.php");

class Paciente extends Pessoa {
    protected $tratamento;
    protected $responsavelFinanceiro;
    protected $dataDeNascimento;

    public function __construct($nome, $telefone, $email, $cpf, $rg, $tratamento, $dataDeNascimento, $responsavelFinanceiro) {
        parent::__construct($nome, $telefone, $email, $cpf, $rg);
        $this->tratamento = $tratamento;
        $this->dataDeNascimento = $dataDeNascimento;
        $this->responsavelFinanceiro = $responsavelFinanceiro;
    }

    public function getTratamento() {
        return $this->tratamento;
    }

    public function getDataDeNascimento() {
        return $this->dataDeNascimento;
    }

    public function getResponsavelFinanceiro() {
        return $this->responsavelFinanceiro;
    }
}