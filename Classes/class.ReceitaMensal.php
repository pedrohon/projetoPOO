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

  public function calcularReceitasTratamento() {
    if (empty($this->receitasDeTratamentoNoMes)) 
        return 0;
    
    $receitasTratamento = array_sum($this->receitasDeTratamentoNoMes);
    return $receitasTratamento;
  }

  public function calcularCustosSalario() {
    if (empty($this->salariosNoMes)) 
        return 0;    

    $custosSalario = array_sum($this->salariosNoMes);
    return $custosSalario;
  }

  public function calcularReceitaMensal() {
    if (empty($this->salariosNoMes)) 
      $custosSalario = 0;  
    else
      $custosSalario = array_sum($this->salariosNoMes);

    if (empty($this->receitasDeTratamentoNoMes)) 
      $receitasTratamento = 0;  
    else
      $receitasTratamento = array_sum($this->receitasDeTratamentoNoMes);

    return ($receitasTratamento - $custosSalario);
  }
}



