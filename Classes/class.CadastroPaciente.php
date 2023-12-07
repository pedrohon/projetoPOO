<?php

include_once '../global.php';

class CadastroPaciente {
    public function cadastrarNovoPaciente($usuario, $nome, $telefone, $email, $cpf, $rg, $dataDeNascimento, /*Cliente*/ $responsavelFinanceiro){
        $usuarioLogado = $usuario->getLogado();
        
        if($usuario->getPerfilDoUsuario() != null)
        {
            $existeFuncionalidade = $usuario->getPerfilDoUsuario()->verificaFuncionalidade("Cadastro Paciente");
        }
        else{
            $existeFuncionalidade = false;
        }
        if($usuarioLogado && $existeFuncionalidade){
            try{
                $paciente = Paciente::getRecordsByField( "cpf", $cpf); 
                echo "Paciente já cadastrado!\n";
                return ($paciente[0]);

            }
            catch(Exception $e){
                $novoPaciente = new Paciente($nome, $telefone, $email, $cpf, $rg, $dataDeNascimento, $responsavelFinanceiro);
                $novoPaciente->save();
                echo "Paciente cadastrado com sucesso!\n";
                return ($novoPaciente);
            }
        }
        else{
            if(!$usuarioLogado){
                echo "\nErro: Não foi possível realizar o cadastro do Paciente porque o usuário '" . $usuario->getLogin() . "' não está logado!\n\n";
            }
            else{
                echo "\nErro: Não foi possível realizar o cadastro do Paciente porque o usuário '" . $usuario->getLogin() . "' não tem permissão para cadastrar Pacientes!\n\n";
            }
        }
    }
}