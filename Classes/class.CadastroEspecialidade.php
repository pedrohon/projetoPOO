<?php

include_once '../global.php';

class CadastroEspecialidade {
  
  public function cadastrarNovaEspecialidade($especialidade, $procedimento) {
    
    try {      
      Especialidade::getRecordsByField( "especialidade", $especialidade); 
    }
    catch (Exception $e) {
      $novaEspecialidade = new Especialidade($especialidade, $procedimento);
      $novaEspecialidade->save();
      echo "Especialidade cadastrada com sucesso!";
    }
  }
}
