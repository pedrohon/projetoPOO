<?php

include_once("class.Dentista.php");
include_once("class.Paciente.php");
include_once("class.Procedimento.php");

class Orcamento{
    protected int $idOrcamento;
    protected $data;
    protected $valorTotal;
    protected $aprovacaoPaciente;

    public function __construct($idOrcamento, $data, $valorTotal, $aprovacaoPaciente){
        $this->idOrcamento = $idOrcamento;
        date_default_timezone_set("America/Minas_Gerais");
        $this->data = date("d/M/Y");
        $this->valorTotal = $valorTotal;
    }

    public function getProcedimentos($nomeDoProcedimento, $detalhamentoDoProcedimento){
        $this->Procedimentos[] = [
            'Procedimento' => $nomeDoProcedimento;
            'Descricao' => $detalhamentoDoProcedimento;
        ];
        $this->calcularValorTotal();
    }

    public function calcularValorTotal(){
        $this->valorTotal = 0;
        foreach ($this->Procedimentos as $item){
            $this->valorTotal += $item['Procedimento']->valorUnitario;
        }
    }

    public function aprovarOrcamento($aprovacaoPaciente){
        if($this->aprovacaoPaciente !== null) {
            $tratamento = new Tratamento();
            return $tratamento;
        } else{
            return null;
        }
    }
}

?>