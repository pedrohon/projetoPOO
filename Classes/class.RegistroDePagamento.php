<?php

include_once '../global.php';

class RegistroDePagamento extends persist {

  static $local_filename = "RegistroDePagamento.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }

  protected $tratamento;
  protected $formaDePagamento;
  protected $parcelas;
  protected $valorPago;
  protected $dataPagamento;

  public function __construct($tratamento, $formaDePagamento, $parcelas, $valorPago, $dataPagamento) {
    $this->tratamento = $tratamento;
    $this->formaDePagamento = $formaDePagamento;
    $this->parcelas = $parcelas;
    $this->valorPago = $valorPago;
    $this->dataPagamento = $dataPagamento;
  }

  static public function RegistrarPagamento ($tratamento, $formaDePagamento, $parcelas, $valorPago, $dataPagamento) {
    $novoRegistro = new RegistroDePagamento ($tratamento, $formaDePagamento, $parcelas, $valorPago, $dataPagamento);
    $novoRegistro->save();
    echo ("Pagamento registrado\n");
  }

  public function getTratamento() {
    return $this->tratamento;
  }

  public function getFormaDePagamento() {
    return $this->formaDePagamento;
  }

  public function getParcelas() {
    return $this->parcelas;
  }

  public function getValorPago() {
    return $this->valorPago;
  }

  public function getDataPagamento() {
    return $this->dataPagamento;
  }

  public function setTratamento($tratamento) {
    $this->tratamento = $tratamento;
  }

  public function setFormaDePagamento($formaDePagamento) {
    $this->formaDePagamento = $formaDePagamento;
  }

  public function setParcelas($parcelas) {
    $this->parcelas = $parcelas;
  }
 
  public function setValorPago($valorPago) {
    $this->valorPago = $valorPago;
  }

  public function setDataPagamento($dataPagamento) {
    $this->dataPagamento = $dataPagamento;
  }

  public function salvarRegistroDePagamento () {
    $this->save();
    //assim que dar o save deve fazer a lógica de calcula de imposto etc mas ainda falta criar a classe que fala disso
  }

public function calculaImposto(){
    $percentualImposto = 20;
    $imposto = ($percentualImposto / 100) * $this->valorPago;
    return $imposto;
}

public function DateTimeBr($dataPagamento){
    $formatoOriginal = 'd/m/Y';
    $dataObjeto = DateTime::createFromFormat($formatoOriginal, $dataPagamento);
    //verifica a conversão
    if (!$dataObjeto){
        throw new InvalidArgumentException("Formato da data inváido! Use dd/mm/aaaa.");
    }
    return $dataObjeto;
}
}









