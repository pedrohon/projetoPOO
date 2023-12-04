<?php

class RegistroDePagamento{

    //falta fazer uma lógica para aceitar mais de uma forma de pgmt

$tratamento = new Tratamento ($idTratamento);
$formaDePagamento = new FormaDePagamento($nomeFormaDePagamento);
protected $valorPago;
protected $dataPagamento;

public function __construct ($idTratamento, $valorPago, $dataPagamento, $nomeFormaDePagamento){
    $this->valorPago = $valorPago;
    $this->dataPagamento = $this->DateTimeBr($dataPagamento);
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

public function getValorPago(){
    return $this->valorPago;
}
}

?>