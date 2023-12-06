<?php

include_once '../global.php';

class CadastroCliente {
    public function cadastrarNovoCliente($usuario, $nome, $telefone, $email, $cpf, $rg){
        $usuarioLogado = $usuario->getLogado();

        if($usuarioLogado){
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
            echo "O usuário " . $usuario->getLogin() . " não está logado!\n";
        }
    }
}