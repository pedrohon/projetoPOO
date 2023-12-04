<?php

class RegistroDePagamento{

    //falta fazer uma lógica para aceitar mais de uma forma de pgmt

$tratamento = new Tratamento ($idTratamento);

protected $valorPago;
protected $dataPagamento;

public function __construct ($idTratamento, $valorPago, $dataPagamento){
    $this->valorPago = $valorPago;
    $this->dataPagamento = new DateTime();
}

public function calculaImposto(){
    $percentualImposto = 20;
    $imposto = ($percentualImposto / 100) * $this->valorPago;
    return $imposto;
}

public function getValorPago(){
    return $this->valorPago;
}
}

?>