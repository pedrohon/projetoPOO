<?php

include_once '../global.php'; 

class CadastroProfissional {
  public function cadastrarNovoProfissional($nome, $telefone, $email, $cpf, $rg, $salario, $endereco, $cargo) {
    try {      
      Profissional::getRecordsByField( "cpf", $cpf);  
    }
    catch (Exception $e) {
      $novoProfissional = new Profissional($nome, $telefone, $email, $cpf, $rg, $salario, $endereco, $cargo);
      $novoProfissional->salvarProfissional();
      echo "Profissional cadastrado com sucesso!";
    }
  }
}
