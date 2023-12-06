<?php

include_once '../global.php';

class CadastroCliente {
    public function cadastrarNovoCliente($usuario, $nome, $telefone, $email, $cpf, $rg){
        $usuarioLogado = $usuario->getLogado();
        
        if($usuario->getPerfilDoUsuario() != null)
        {
            $existeFuncionalidade = $usuario->getPerfilDoUsuario()->verificaFuncionalidade("Cadastro Cliente");
        }
        else{
            $existeFuncionalidade = false;
        }
        if($usuarioLogado && $existeFuncionalidade){
            try{
                Cliente::getRecordsByField( "cpf", $cpf); 
                echo "Cliente já cadastrado!\n";
            }
            catch(Exception $e){
                $novoCliente = new Cliente($nome, $telefone, $email, $cpf, $rg);
                $novoCliente->save();
                echo "Cliente cadastrado com sucesso!\n";
            }
        }
        else{
            if(!$usuarioLogado){
                echo "\nErro: Não foi possível realizar o cadastro do cliente porque o usuário '" . $usuario->getLogin() . "' não está logado!\n\n";
            }
            else{
                echo "\nErro: Não foi possível realizar o cadastro do cliente porque o usuário '" . $usuario->getLogin() . "' não tem permissão para cadastrar clientes!\n\n";
            }
        }
    }
}