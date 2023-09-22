<?php

include_once("class.pessoa.teste.php");

class Cliente extends Pessoa {
    public $pagamento;

    public function __construct($nome, $telefone, $email, $cpf, $rg, $pagamento) {
        parent::__construct($nome, $telefone, $email, $cpf, $rg);
        $this->pagamento = $pagamento;
    }

    public function getPagamento() {
        return $this->pagamento;
    }

    public function setPagamento($pagamento) {
        $this->pagamento = $pagamento;
    }
}