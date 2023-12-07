<?php

include_once '../global.php';

class CadastroDentista {
  public function cadastrarNovoDentista($usuario, $nome, $telefone, $email, $cpf, $rg, $salario, $endereco, $cargo, $cro, $especialidade, $parceiro) {
    $usuarioLogado = $usuario->getLogado();
    
    if($usuario->getPerfilDoUsuario() != null)
    {
        $existeFuncionalidade = $usuario->getPerfilDoUsuario()->verificaFuncionalidade("Cadastro Dentista");
    }
    else{
        $existeFuncionalidade = false;
    }
    if($usuarioLogado && $existeFuncionalidade){
        try {      
          Dentista::getRecordsByField( "cpf", $cpf);  
          echo "Dentista já cadastrado!\n";
        }
        catch (Exception $e) {
          $cadastroProfissional = new CadastroProfissional();
          $cadastroProfissional->cadastrarNovoProfissional($usuario, $nome, $telefone, $email, $cpf, $rg, $salario, $endereco, $cargo);
    
          $novoDentista = new Dentista($nome, $telefone, $email, $cpf, $rg, $salario, $endereco, $cargo, $cro, $especialidade, $parceiro);
          $novoDentista->salvarDentista();
          echo "Dentista cadastrado com sucesso!\n";
        }
    }
    else{
        if(!$usuarioLogado){
            echo "\nErro: Não foi possível realizar o cadastro do dentista porque o usuário '" . $usuario->getLogin() . "' não está logado!\n\n";
        }
        else{
            echo "\nErro: Não foi possível realizar o cadastro do dentista porque o usuário '" . $usuario->getLogin() . "' não tem permissão para cadastrar dentistas!\n\n";
          }
    }
  }
}



//para usar 
//$cadastroDentista = new CadastroDentista();
//$cadastroDentista->cadastrarNovoDentista("Ana Silva", "987654321", "ana@example.com", "987.654.321-02", "7654321", 7000, "Rua ABC", "Ortodontista", "12345", ["Ortodontia", "Implantodontia"], true);
