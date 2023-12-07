<?php

include_once '../global.php';

class CadastroOrcamento {
  public function cadastrarNovoOrcamento($usuario, Paciente $paciente, $dentista, $data, array $procedimentos) {
        $usuarioLogado = $usuario->getLogado();
        
        if($usuario->getPerfilDoUsuario() != null)
        {
            $existeFuncionalidade = $usuario->getPerfilDoUsuario()->verificaFuncionalidade("Cadastro Orçamento");
        }
        else{
            $existeFuncionalidade = false;
        }
        if($usuarioLogado && $existeFuncionalidade){
            $valorTotal = Orcamento::calcularValorTotal($procedimentos);
            $novoOrcamento = new Orcamento($paciente, $dentista, $data, $procedimentos, $valorTotal);
            $novoOrcamento->save();
            echo "Orçamento cadastrado com sucesso!\n";
        }
        else{
            if(!$usuarioLogado){
                echo "\nErro: Não foi possível realizar o cadastro do orçamento porque o usuário '" . $usuario->getLogin() . "' não está logado!\n\n";
            }
            else{
                echo "\nErro: Não foi possível realizar o cadastro do orçamento porque o usuário '" . $usuario->getLogin() . "' não tem permissão para cadastrar orçamentos!\n\n";
            }
        }
    }
}