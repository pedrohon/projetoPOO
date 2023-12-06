<?php

include_once '../global.php';

class CadastroEspecialidade {
  
  public function cadastrarNovaEspecialidade($especialidade, $procedimento, $percentualDeParticipacao) {
    
    try {      
      Especialidade::getRecordsByField( "especialidade", $especialidade); 
    }
    catch (Exception $e) {
      $novaEspecialidade = new Especialidade($especialidade, $procedimento, $percentualDeParticipacao);
      $novaEspecialidade->save();
      echo "Especialidade cadastrada com sucesso!\n";

    }
  }
}
