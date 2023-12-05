<?php

include_once '../global.php';

class CadastroDentista {
 
	public function cadastrarNovoDentista($nome, $telefone, $email, $cpf, $rg, $salario, $endereco, $cargo, $cro, $especialidade, $parceiro) {
    try {      
    	Dentista::getRecordsByField( "cpf", $cpf);  
    }
    catch (Exception $e) {
			$cadastroProfissional = new CadastroProfissional();
      $cadastroProfissional->cadastrarNovoProfissional($nome, $telefone, $email, $cpf, $rg, $salario, $endereco, $cargo);

      $novoDentista = new Dentista($nome, $telefone, $email, $cpf, $rg, $salario, $endereco, $cargo, $cro, $especialidade, $parceiro);
      $novoDentista->salvarDentista();
      echo "Dentista cadastrado com sucesso!";
    }
    
  }
}
