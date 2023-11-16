<?php

class AgendamentoDeConsulta {

    protected $dentistaExecutor;
    protected $paciente;
    protected $dataDaConsulta;
    protected $duracaoPrevista;
    protected $qntDeConsultas;
    protected $consultas = array();

    public function __construct(Dentista $dentistaExecutor, Paciente $paciente, $dataDaConsulta, int $duracaoPrevista) {
        $this->dentistaExecutor = $dentistaExecutor;
        $this->paciente = $paciente;
        $this->dataDaConsulta = $dataDaConsulta;
        $this->duracaoPrevista = $duracaoPrevista;
    }

    public function getDentistaExecutor() {
        return $this->dentistaExecutor;
    }

    public function getPaciente() {
        return $this->paciente;
    }

    public function getDataDaConsulta() {
        return $this->dataDaConsulta;
    }

    public function getDuracaoPrevista() {
        return $this->duracaoPrevista;
    }

    public function getqntDeConsultas(){
     return $this->qntDeConsultas;
   }

    public function setDentistaExecutor($dentistaExecutor) {
        $this->dentistaExecutor = $dentistaExecutor;
    }

    public function setPaciente($paciente) {
        $this->paciente = $paciente;
    }

    public function setDataDaConsulta($dataDaConsulta) {
        $this->dataDaConsulta = $dataDaConsulta;
    }

    public function setDuracaoPrevista($duracaoPrevista) {
        $this->duracaoPrevista = $duracaoPrevista;
    }

    public function setQntDeConsultas($qntDeConsultas){
      $this->qntDeConsultas=$qntDeConsultas;
    }



    public function agendarConsulta(Orcamento $orcamento) {
      // Verifica se o orçamento foi aprovado
      return $orcamento->aprovado();
  }

  public function criarConsultasAutomaticamente(Orcamento $orcamento) {
      // Verifica se o orçamento foi aprovado antes de criar a consulta
      if ($this->agendarConsulta($orcamento)) {
          for ($i = 0; $i < $this->qntDeConsultas; $i++) {
              $consulta = new Consulta("dia 5", "drt joao");
              $this->adicionarConsulta($consulta);
              if($consulta instanceof Consulta) {
                echo "\nConsulta instanciada\n";
            }
          }
      }
  }
  public function adicionarConsulta(Consulta $consulta) {
    $this->consultas[] = $consulta;
     } 

    }
    
