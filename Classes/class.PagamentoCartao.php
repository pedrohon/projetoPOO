<?php

include_once("class.RegistroDePagamento.php");

class PagamentoCartao extends RegistroDePagamento{

protected $modalidade; //credito ou debito
protected $qtdParcelas;
protected static $taxaParcela = [
    1 => 4,
    2 => 4,
    3 => 4,
    4 => 7,
    5 => 7,
    6 => 7,
];
protected static $taxaDebito = 3;

public function __construct ($formaDePagamento, $valorPago, $dataPagamento, $modalidade, $qtdParcelas){
    parent::__construct($formaDePagamento, $valorPago, $dataPagamento);
    $this->modalidade = $modalidade;
    $this->qtdParcelas = $qtdParcelas;
    $this->calculaTaxa();
}

private function calculaTaxa(){
    if ($this->modalidade === 'Cartão de Crédito') {
        $taxaDesconto = isset(self::$taxaParcela[$this->qtdParcelas])
            ? self::$taxaParcela[$this->qtdParcelas]
            : 0; // Sem desconto padrão
    } elseif ($this->modalidade === 'Cartão de Débito') {
        $taxaDesconto = self::$taxaDebito;
    } else {
        $taxaDesconto = 0; // Sem desconto para outros tipos de cartão
    }

    // Calcula o valor do desconto
    $desconto = ($taxaDesconto / 100) * $this->getValorPago();

    // Aplica o desconto ao valor pago
    $this->valorPago -= $desconto;
}

public function getModalidade(){
    return $this->modalidade;
}

public function getQtdParcelas(){
    return $this->qtdParcelas;
}

}

//TESTE

$modalidade = "Cartão de Crédito";
$valorPago = 500.50;
$dataPagamento = 04/12/2023;
$qtdParcelas = 3;

$pagamentoCartao = new PagamentoCartao($modalidade, $valorPago, $dataPagamento, $qtdParcelas);

//imprimindo as informações
echo "Forma de Pagamento: " . $pagamentoCartao->getModalidade() . "<br>";
echo "Valor Pago: " . $pagamentoCartao->getValorPago() . "<br>";
echo "Data do Pagamento: " . $pagamentoCartao->DataTimeBr($dataPagamento) . "<br>";
echo "Número de Parcelas: " . $pagamentoCartao->getQtdParcelas() . "<br>";
echo "Valor da Taxa Descontada: " . $pagamentoCartao->calculaTaxa() . "<br>";
echo "Valor do Imposto da Transação: " . $pagamentoCartao()->calculaImposto() . "<br>";
?>