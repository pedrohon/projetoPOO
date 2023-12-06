<?php

include_once '../global.php';

class CadastroProcedimento {
  public function cadastrarNovoProcedimento($nomeDoProcedimento, $detalhamentoDoProcedimento, $valorUnitario, $qntDeConsultas) {
    try {     

      Procedimento::getRecordsByField( "nomeDoProcedimento", $nomeDoProcedimento); 
    }
    catch (Exception $e) {
      $novoProcedimento = new Procedimento($nomeDoProcedimento, $detalhamentoDoProcedimento, $valorUnitario, $qntDeConsultas);
      $novoProcedimento->save();
      echo "Procedimento cadastrado com sucesso!\n";
    }
  }
}
