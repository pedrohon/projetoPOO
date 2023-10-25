 <?php

include_once '../global.php';

 class FormaDePagamento{

 protected string $nomeFormaDePagamento;
 protected int    $quantidadeDeParcelas;


 public function __construct($nomeFormaDePagamento,$quantidadeDeParcelas){

    $this->nomeFormaDePagamento=$nomeFormaDePagamento;
    $this->quantidadeDeParcelas=$quantidadeDeParcelas;
 }

public function getNomeFormaDePagamento(){

    return $this->nomeFormaDePagamento;
}
public function getquantidadeDeParcelas(){

    return $this->quantidadeDeParcelas;
}

 }