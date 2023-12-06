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
      echo "Dentista cadastrado com sucesso!\n";

    }
  }
}

//para usar 
//$cadastroDentista = new CadastroDentista();
//$cadastroDentista->cadastrarNovoDentista("Ana Silva", "987654321", "ana@example.com", "987.654.321-02", "7654321", 7000, "Rua ABC", "Ortodontista", "12345", ["Ortodontia", "Implantodontia"], true);
