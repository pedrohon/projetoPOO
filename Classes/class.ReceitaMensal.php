<?php

include_once '../global.php';

class ReceitaMensal extends persist { 

  static $local_filename = "ReceitaMensal.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }

  protected $salariosNoMes = array();
  protected $receitasDeTratamentoNoMes = array();

  public function __construct(array $salariosNoMes, array $receitasDeTratamentoNoMes) {
    $this->salariosNoMes = $salariosNoMes;
    $this->receitasDeTratamentoNoMes = $receitasDeTratamentoNoMes;
  }


  static public function calcularReceitaMensal() {
      $profissionais = Profissional::getRecords();
      $somaSalarios = 0;

      foreach ($profissionais as $profissional) {
        $somaSalarios += $profissional->getSalario();
      }

      $receitas = RegistroDePagamento::getRecords();
      $receitasTratamento = 0;

      foreach ($receitas as $receita) {
        $valorPago = $receita->getValorPago();
        $formaDePagamento = $receita->getFormaDePagamento();

        switch ($formaDePagamento) {
          case 'Dinheiro à vista':
            $receitasTratamento += $receita->getvalorPago();
            break;
          case 'Pix':
            $receitasTratamento += ($receita->getvalorPago())*0.97;
            break;
          case 'Débito':
            $receitasTratamento += $receita->getvalorPago();
            break;
          case 'Crédito':
            $parcelas = $receita->getParcelas();
            if($parcelas == 1 || $parcelas == 2 || $parcelas == 3){ 
              $receitasTratamento += ($receita->getvalorPago())*0.96;
            }
            elseif($parcelas == 4 || $parcelas == 5 || $parcelas == 6){
              $receitasTratamento += ($receita->getvalorPago())*0.93;
            }
            break;
          default:
            break;
        }
        
        $receitasTratamento += $receita->getValorPago();
      }

      echo "A receita mensal é de: R$" . ($receitasTratamento - $somaSalarios) . "\n";
  }
}