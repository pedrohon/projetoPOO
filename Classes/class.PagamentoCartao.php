<?php

include_once("class.RegistroDePagamento.php");

class PagamentoCartao extends RegistroDePagamento{

protected $nomeFormaDePagamento; //credito ou debito
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

public function __construct (FormaDePagamento $nomeFormaDePagamento, $valorPago, $dataPagamento, $qtdParcelas, $taxaParcela, $taxaDebito){
    parent::__construct($nomeFormaDePagamento, $valorPago, $dataPagamento);
    $this->nomeFormaDePagamento = $nomeFormaDePagamento;
    $this->qtdParcelas = $qtdParcelas;
    $this->taxaParcela = $taxaParcela;
    $this->$taxaDebito = $taxaDebito;
}

private function calculaTaxa(){
    if ($this->nomeFormaDePagamento === 'Cartão de Crédito') {
        $taxaDesconto = isset(self::$taxaParcela[$this->qtdParcelas])
            ? self::$taxaParcela[$this->qtdParcelas]
            : 0; // Sem desconto padrão
    } elseif ($this->nomeFormaDePagamento === 'Cartão de Débito') {
        $taxaDesconto = self::$taxaDebito;
    } else {
        $taxaDesconto = 0; // Sem desconto para outros tipos de cartão
    }

    // Calcula o valor do desconto
    $desconto = ($taxaDesconto / 100) * $this->getValorPago();

    // Aplica o desconto ao valor pago
    $this->valorPago -= $desconto;
}

public function getQtdParcelas(){
    return $this->qtdParcelas;
}

public function setQtdParcelas($qtdParcelas){
    $this->qtdParcelas = $qtdParcelas;
}

}

//TESTE

/*$pgmTeste = new PagamentoCartao($modalidade, $qtdParcelas);

$registro = new RegistroDePagamento ($valorPago, $dataPagamento);

$modalidade = "Cartão de Crédito";
$valorPago = 500.50;
$dataPagamento = 04/12/2023;
$qtdParcelas = 3;

echo "A Modalidade escolhida foi: " . $pgmTeste->getModalidade() . "<br>";
echo "A quantidade de Parcela(s) selecionada(s) foi: " . $qtdParcelas->getQtdParcelas() . "<br>";
echo "O Pagamento foi realizado em: " . $registro->DateTimeBr($dataPagamento) . "<br>";
echo "O Valor Pago foi de: R$" . $registro->getValorPago() . "<br>";

echo "O valor de Taxa da transação é de: R$" . $desconto->calculaTaxa() . "<br>";
echo "O valor recebido pela clínica é de: R$" . $valorPago->calculaTaxa() . "<br>";
echo "O valor de Imposto pago pela transação é de: R$" . $registro->calculaImposto() . "<br>";*/

?>
