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
    



#************teste*******************************

class Orcamento {

  protected $aprovacao;

  public function __construct($aprovacao) {
      $this->aprovacao = $aprovacao;
  }

  public function aprovado() {
      // Ajuste na lógica para retornar true se a aprovação for igual a 1
      return $this->aprovacao == 1;
  }
}




class Consulta {

  private $dia;
  private $dentistaExecutor;


  public function __construct($dia, $dentistaExecutor) {
      $this->dia = $dia;
      $this->dentistaExecutor = $dentistaExecutor;
  }


  public function getDia() {
      return $this->dia;
  }

  public function getDentistaExecutor() {
      return $this->dentistaExecutor;
  }


  public function setDia($dia) {
      $this->dia = $dia;
  }


  public function setDentistaExecutor($dentistaExecutor) {
      $this->dentistaExecutor = $dentistaExecutor;
  }
}



class Dentista {

  public $dentista;
  
  public function __construct($dentista){
    $this->dentista = $dentista;
  }
}

class Paciente {

  public $paciente;

  public function __construct($paciente){
    $this->paciente = $paciente;
  }
}




#*********************teste****************************************
$dentista = new Dentista("joao");
$paciente = new Paciente("maria");


// Criando uma instância de AgendamentoDeConsulta
$agendamento = new AgendamentoDeConsulta($dentista, $paciente, "2023-11-15", 60);
$agendamento->setQntDeConsultas(3); // Defina a quantidade desejada de consultas

// Criando uma instância de Orcamento
$orcamento = new Orcamento(1); // 1 para aprovação, 0 para não aprovação

// Agendando consulta e criando consultas automaticamente
$agendamento->criarConsultasAutomaticamente($orcamento);
