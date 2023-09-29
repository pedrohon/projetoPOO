<?php

class Procedimento {
    protected string $nomeDoProcedimento;
    protected string $descricaoDoProcedimento;
    protected float $valorUnitario;

    public function __construct(string $nomeDoProcedimento, string $descricaoDoProcedimento, float $valorUnitario) {
        $this->nomeDoProcedimento = $nomeDoProcedimento;
        $this->descricaoDoProcedimento = $descricaoDoProcedimento;
        $this->valorUnitario = $valorUnitario;
    }

    public function getNomeDoProcedimento() {
        return $this->nomeDoProcedimento;
    }

    public function getDescricaoDoProcedimento() {
        return $this->descricaoDoProcedimento;
    }

    public function getValorUnitario() {
        return $this->valorUnitario;
    }
}


