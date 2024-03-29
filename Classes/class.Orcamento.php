<?php

include_once '../global.php';

class Orcamento extends persist {

  static $local_filename = "Orcamento.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }

  protected $paciente;
  protected $dentista;
  protected $data;
  protected $procedimentos = array();
  protected $valorTotal;
  protected $aprovacao;

  public function __construct(Paciente $paciente, $dentista, $data, array $procedimentos, $valorTotal) {
    $this->paciente = $paciente;
    $this->dentista = $dentista;
    $this->data = $data;
    $this->procedimentos = $procedimentos;
    $this->valorTotal = $valorTotal;
  }


  public function getPaciente() {
    return $this->paciente;
  }

  public function getDentista() {
    return $this->dentista;
  }

  public function getData() {
    return $this->data;
  }

  public function getProcedimentos() {
    return $this->procedimentos;
  }

  public function getValorTotal() {
    return $this->valorTotal;
  }

  public function getAprovacao() {
    return $this->aprovacao;
  }

  public function setPaciente($paciente) {
    $this->paciente = $paciente;
  }

  public function setDentista($dentista) {
    $this->dentista = $dentista;
  }

  public function setData($data) {
    $this->data = $data;
  }
 
  public function setProcedimentos($procedimentos) {
    $this->procedimentos = $procedimentos;
  }

  public function setValorTotal($valorTotal) {
    $this->valorTotal = $valorTotal;
  }

  public function setAprovacao($aprovacao) {
      $this->aprovacao = $aprovacao;
  }
  /*
    public function getProcedimentos($nomeDoProcedimento, $detalhamentoDoProcedimento){
      $this->Procedimentos[] = [
          'Procedimento' => $nomeDoProcedimento,
          'Descricao' => $detalhamentoDoProcedimento
      ];
      $this->calcularValorTotal();
  }
  */

  static public function calcularValorTotal($procedimentos){
    
    $valorTotal = 0;
    foreach ($procedimentos as $procedimento) {
      $objeto = Procedimento::getRecordsByField( "nomeDoProcedimento", $procedimento); 
      $valorUnitario = $objeto[0]->getValorUnitario();
      $valorTotal = $valorTotal + $valorUnitario;
    }
    return $valorTotal;
  }


  public function aprovarOrcamento($formaDePagamento){

    $this->aprovacao = true;
    $cadastroTratamento = new Tratamento($this->paciente,$this->dentista,$this->data,$this->procedimentos,$this->valorTotal,$this->aprovacao, $formaDePagamento);
    $cadastroTratamento->save();
    echo ("Orçamento aprovado e tratamento gerado\n");

    return $cadastroTratamento;
}

  
}
