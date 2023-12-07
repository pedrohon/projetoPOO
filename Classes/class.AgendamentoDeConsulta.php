<?php

class AgendamentoDeConsulta {

    static public function AgendarConsulta (Usuario $usuario, Paciente $paciente, $dentistaExecutor, $data, $duracaoPrevista, $procedimento) {
        $usuarioLogado = $usuario->getLogado();
            
            if($usuario->getPerfilDoUsuario() != null)
            {
                $existeFuncionalidade = $usuario->getPerfilDoUsuario()->verificaFuncionalidade("Agendamento Consulta");
            }
            else{
                $existeFuncionalidade = false;
            }
            if($usuarioLogado && $existeFuncionalidade){
              $novaConsulta = new Consulta ($paciente, $dentistaExecutor, $data, $duracaoPrevista, $procedimento);
              $novaConsulta->save();
              echo ("Consulta marcada\n");
              return $novaConsulta;
            }
            else{
              if(!$usuarioLogado){
                  echo "\nErro: Não foi possível realizar o agendamento da consulta porque o usuário '" . $usuario->getLogin() . "' não está logado!\n\n";
              }
              else{
                  echo "\nErro: Não foi possível realizar o agendamento da consulta porque o usuário '" . $usuario->getLogin() . "' não tem permissão para realizar esse agendamento!\n\n";
              }
            }
      }
}
    
