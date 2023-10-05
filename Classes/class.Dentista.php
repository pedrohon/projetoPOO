<?php
require_once ('class.Profissional.php');

class Dentista extends Profissional {

    protected string $cro;
    protected string $especializacao;
    protected bool   $parceiro;
    protected float  $percentualDeParticipacao;

// construtor da classe dentista 

    public function __construct(string $nome, string $telefone, string $email, string $cpf, string $rg, float $salario, string $endereco, string $cargo, string $cro, string $especializacao, bool $parceiro, float $percentualDeParticipacao) {

// puxando construtor das classes mães 

        parent::__construct($nome, $telefone, $email, $cpf, $rg, $salario, $endereco, $cargo);

        $this->cro = $cro;
        $this->especializacao = $especializacao;
        $this->parceiro = $parceiro;
        $this->percentualDeParticipacao = $percentualDeParticipacao;
    }

    public function getCro(): string {
        return $this->cro;
    }

    public function getEspecializacao(): string {
        return $this->especializacao;
    }

    public function getParceiro(): bool {
        return $this->parceiro;
    }

    public function getPercentualDeParticipacao(): float {
        return $this->percentualDeParticipacao;
    }
}

