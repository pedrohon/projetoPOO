<?php

include_once '../global.php'; 


class Salario {

  public static function calculaParticipacao ($cro, $Procedimento, $especialidade, $dataDoSalario) {

    $objetoespecialidade = Especialidade::getRecordsByField("especialidade", $especialidade);
    $participacao = $objetoespecialidade[0]->getpercentualDeParticipacao();

    $objetoprocedimento = Procedimento::getRecordsByField("nomeDoProcedimento", $Procedimento);
    $valorDoProcedimento = $objetoprocedimento[0]->getValorUnitario();

    $valorParaDentista = $participacao * $valorDoProcedimento;
    
    $dentista = Dentista::getRecordsByField( "cro", $cro);
    $salarioAtual = $dentista[0]->getSalario();
    $salarioNovo = $salarioAtual + $valorParaDentista;
    
    $dentista[0]->setSalario($salarioNovo);
    $dentista[0]->save();
  }
}
