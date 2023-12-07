<?php

include_once '../global.php';

class CadastroEspecialidade {
  public function cadastrarNovaEspecialidade($usuario, $especialidade, $procedimento, $percentualDeParticipacao) {
    $usuarioLogado = $usuario->getLogado();
    
    if($usuario->getPerfilDoUsuario() != null)
    {
        $existeFuncionalidade = $usuario->getPerfilDoUsuario()->verificaFuncionalidade("Cadastro Especialidade");
    }
    else{
        $existeFuncionalidade = false;
    }
    if($usuarioLogado && $existeFuncionalidade){
        try {      
          Especialidade::getRecordsByField( "especialidade", $especialidade); 
          echo "Especialidade já cadastrado!\n";
        }
        catch (Exception $e) {
          $novaEspecialidade = new Especialidade($especialidade, $procedimento, $percentualDeParticipacao);
          $novaEspecialidade->save();
          echo "Especialidade cadastrada com sucesso!\n";
    
        }
    }
    else{
        if(!$usuarioLogado){
            echo "\nErro: Não foi possível realizar o cadastro da especialidade porque o usuário '" . $usuario->getLogin() . "' não está logado!\n\n";
        }
        else{
            echo "\nErro: Não foi possível realizar o cadastro do especialidade porque o usuário '" . $usuario->getLogin() . "' não tem permissão para cadastrar especialidades!\n\n";
        }
    }
  }
}