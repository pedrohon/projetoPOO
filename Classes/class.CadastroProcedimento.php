<?php

include_once '../global.php';

class CadastroProcedimento {
  public function cadastrarNovoProcedimento($usuario, $nomeDoProcedimento, $detalhamentoDoProcedimento, $valorUnitario, $qntDeConsultas) {
    $usuarioLogado = $usuario->getLogado();
    
    if($usuario->getPerfilDoUsuario() != null)
    {
        $existeFuncionalidade = $usuario->getPerfilDoUsuario()->verificaFuncionalidade("Cadastro Procedimento");
    }
    else{
        $existeFuncionalidade = false;
    }
    if($usuarioLogado && $existeFuncionalidade){
        try{
            Procedimento::getRecordsByField( "nomeDoProcedimento", $nomeDoProcedimento); 
            echo "Procedimento já cadastrado!\n";
        }
        catch(Exception $e){
            $novoProcedimento = new Procedimento($nomeDoProcedimento, $detalhamentoDoProcedimento, $valorUnitario, $qntDeConsultas);
            $novoProcedimento->save();
            echo "Procedimento cadastrado com sucesso!\n";
        }
    }
    else{
        if(!$usuarioLogado){
            echo "\nErro: Não foi possível realizar o cadastro do procedimento porque o usuário '" . $usuario->getLogin() . "' não está logado!\n\n";
        }
        else{
            echo "\nErro: Não foi possível realizar o cadastro do procedimento porque o usuário '" . $usuario->getLogin() . "' não tem permissão para cadastrar procedimentos!\n\n";
        }
    }
  }
}
