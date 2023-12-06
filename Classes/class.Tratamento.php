<?php

include_once '../global.php';

class Tratamento extends Orcamento {

  static $local_filename = "Tratamento.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }


    protected $valorFaturado;
    protected $taxaDoCartao;
    protected $impostos;
    protected $receita;
    protected $formaDePagamento;

    public function __construct(Paciente $paciente, $dentista, $data, $procedimentos, $valorTotal, $aprovacao, $formaDePagamento) {
        parent::__construct($paciente, $dentista, $data, $procedimentos, $valorTotal, $aprovacao);

        $this->formaDePagamento = $formaDePagamento;
        
    }

  public function getFormaDePagamento() {
      return $this->formaDePagamento;
    }
  
  public function getValorFaturado() {
        return $this->valorFaturado;
    }

  public function getImpostos() {
      return $this->impostos;
  }

  public function getTaxaDoCartao() {
        return $this->taxaDoCartao;
    }


  public function getReceita() {
      return $this->receita;
  }


  public function setFormaDePagamento($formaDePagamento) {
    $this->formaDePagamento = $formaDePagamento;
  }


  public function setValorFaturado($valorFaturado) {
      $this->valorFaturado = $valorFaturado;
  }

}

/*  public function setImpostos($impostos) {
    $this->impostos = $impostos;
}

  public function setTaxaDoCartao($taxaDoCartao) {
        $this->taxaDoCartao = $taxaDoCartao;
    }

    
  public function setReceita($receita) {
        $this->receita = $receita;
    }



    public function calculaReceita($valorFaturado, $taxaDoCartao, $impostos) {
       
        $this->valorFaturado = $valorFaturado;
        $this->taxaDoCartao  = $taxaDoCartao;
        $this->impostos      = $impostos;

        $this->receita = $valorFaturado - ($valorFaturado * $taxaDoCartao) - $impostos;

        return $this->receita;
    }
}*/
