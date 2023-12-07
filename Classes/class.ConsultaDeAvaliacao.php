<?php

include_once '../global.php';

class ConsultaDeAvaliacao extends persist {

  static $local_filename = "ConsultaDeAvaliacao.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }

  protected $paciente;
  protected $dentistaAvaliador;
  protected $data;
  protected $duracaoPrevista;
  protected $foiRealizada;

  public function __construct($paciente, $dentistaAvaliador, $data) {
    $this->paciente = $paciente;
    $this->dentistaAvaliador = $dentistaAvaliador;
    $this->data = $data;
    $this->duracaoPrevista = 30;
    $this->foiRealizada = false;
  }

  
  static public function AgendarConsultaDeAvaliacao ($usuario, $paciente, $dentistaAvaliador, $data) {
    $usuarioLogado = $usuario->getLogado();
        
        if($usuario->getPerfilDoUsuario() != null)
        {
            $existeFuncionalidade = $usuario->getPerfilDoUsuario()->verificaFuncionalidade("Cadastro Cliente");
        }
        else{
            $existeFuncionalidade = false;
        }
        if($usuarioLogado && $existeFuncionalidade){
          $novaConsultaDeAvaliacao = new ConsultaDeAvaliacao ($usuario, $paciente, $dentistaAvaliador, $data);
          $novaConsultaDeAvaliacao->save();
          echo ("Consulta de avaliação marcada\n");
          return $novaConsultaDeAvaliacao;
        }
        else{
          if(!$usuarioLogado){
              echo "\nErro: Não foi possível realizar o agendamento da consulta de avaliação porque o usuário '" . $usuario->getLogin() . "' não está logado!\n\n";
          }
          else{
              echo "\nErro: Não foi possível realizar o agendamento da consulta de avaliaçã porque o usuário '" . $usuario->getLogin() . "' não tem permissão para realizar esse agendamento!\n\n";
          }
        }
  }

  public function ConfirmarRealizacaoDaConsulta () {
    $this->foiRealizada = true;
    $this->save();
    echo ("Consulta de avaliação foi realizada\n");
  }

  static public function gerarOrcamento ($procedimentos) {

    $valorTotal = 0;

    foreach ($procedimentos as $procedimento) {
      $x = Procedimento::getRecordsByField( "nomeDoProcedimento", $procedimento); 
      $valor = $x[0]->getValorUnitario();
      $valorTotal = $valorTotal + $valor;
    }
  }

  public function getPaciente() {
    return $this->paciente;
  }

  public function getDentistaAvaliador() {
    return $this->dentistaAvaliador;
  }

  public function getData() {
    return $this->data;
  }

  public function getDuracaoPrevista() {
    return $this->duracaoPrevista;
  }

  public function setPaciente($paciente) {
    $this->paciente = $paciente;
  }

  public function setDentistaAvaliador($dentistaAvaliador) {
    $this->dentistaAvaliador = $dentistaAvaliador;
  }

  public function setData($data) {
    $this->data = $data;
  }

  public function setDuracaoPrevista($duracaoPrevista) {
    $this->duracaoPrevista = $duracaoPrevista;
  }
}
