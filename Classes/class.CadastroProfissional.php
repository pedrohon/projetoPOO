<?php

include_once '../global.php';

class CadastroProfissional {
  public function cadastrarNovoProfissional($usuario, $nome, $telefone, $email, $cpf, $rg, $salario, $endereco, $cargo) {
        $usuarioLogado = $usuario->getLogado();
        
        if($usuario->getPerfilDoUsuario() != null)
        {
            $existeFuncionalidade = $usuario->getPerfilDoUsuario()->verificaFuncionalidade("Cadastro Profissional");
        }
        else{
            $existeFuncionalidade = false;
        }
        if($usuarioLogado && $existeFuncionalidade){
            try{
                Profissional::getRecordsByField( "cpf", $cpf);
                echo "Profissional já cadastrado!\n";
            }
            catch(Exception $e){
                $novoProfissional = new Profissional($nome, $telefone, $email, $cpf, $rg, $salario, $endereco, $cargo);
                $novoProfissional->salvarProfissional();
                echo "Profissional cadastrado com sucesso!\n";
            }
        }
        else{
            if(!$usuarioLogado){
                echo "\nErro: Não foi possível realizar o cadastro do profissional porque o usuário '" . $usuario->getLogin() . "' não está logado!\n\n";
            }
            else{
                echo "\nErro: Não foi possível realizar o cadastro do profissional porque o usuário '" . $usuario->getLogin() . "' não tem permissão para cadastrar profissionais!\n\n";
            }
        }
    }
}

//para usar 
//$cadastroProfissional = new CadastroProfissional();
//$cadastroProfissional->cadastrarNovoProfissional("João Silva", "123456789", "joao@example.com", "123.456.789-01", "1234567", 5000, "Rua XYZ", "Desenvolvedor");
