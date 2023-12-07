<?php

#************teste*******************************

class consulta {

    protected $idConsulta;

    public function __construct($idConsulta){

        $this->idConsulta=$idConsulta;
    }

  // A classe Consulta está vazia para testes 
}

#**************************************************************



#include_once '../global.php';

class Procedimento{ #extends persist 

  static $local_filename = "Procedimento.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }

    protected $id;
    protected $nomeDoProcedimento;
    protected $detalhamentoDoProcedimento;
    protected $valorUnitario;
    protected $qntDeConsultas;
   

    protected static $nextId = 1;

    public function __construct($nomeDoProcedimento, $detalhamentoDoProcedimento, $valorUnitario, $qntDeConsultas) {
        $this->id = self::$nextId++;
        $this->nomeDoProcedimento = $nomeDoProcedimento;
        $this->detalhamentoDoProcedimento = $detalhamentoDoProcedimento;
        $this->valorUnitario = $valorUnitario;
        $this->qntDeConsultas = $qntDeConsultas;
        
    }

    
  public function getNomeDoProcedimento() {
    return $this->nomeDoProcedimento;
  }

  public function getDescricaoDoProcedimento() {
    return $this->detalhamentoDoProcedimento;
  }

  public function getValorUnitario() {
    return $this->valorUnitario;
  }

  public function getQntDeConsultas() {
    return $this->qntDeConsultas;
  }

  public function setNomeDoProcedimento($nomeDoProcedimento) {
    $this->nomeDoProcedimento = $nomeDoProcedimento;
  }

  public function setDescricaoDoProcedimento($detalhamentoDoProcedimento) {
    $this->detalhamentoDoProcedimento = $detalhamentoDoProcedimento;
  }

  public function setValorUnitario($valorUnitario) {
    $this->valorUnitario = $valorUnitario;
  }

  public function setQntDeConsultas($qntDeConsultas) {
    $this->qntDeConsultas = $qntDeConsultas;
  }


#************teste***************************************

  // Exemplo de método para imprimir informações do procedimento e consultas
  public function imprimirInformacoes() {
    echo "Nome do Procedimento: " . $this->nomeDoProcedimento . "\n";
    echo "Descrição do Procedimento: " . $this->detalhamentoDoProcedimento . "\n";
    echo "Valor Unitário: " . $this->valorUnitario . "\n";
    echo "Quantidade de Consultas: " . $this->qntDeConsultas . "\n";
    }
}
   
$procedimento = new Procedimento("limpar", "limpeza", 5000, 3);

// Imprimir informações do procedimento e consultas
$procedimento->imprimirInformacoes();

#*****************************************************************