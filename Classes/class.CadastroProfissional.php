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

//para usar 
//$cadastroProfissional = new CadastroProfissional();
//$cadastroProfissional->cadastrarNovoProfissional("João Silva", "123456789", "joao@example.com", "123.456.789-01", "1234567", 5000, "Rua XYZ", "Desenvolvedor");
