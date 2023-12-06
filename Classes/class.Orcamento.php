<?php

include_once '../global.php';

class Orcamento extends persist {

  static $local_filename = "Orcamento.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }

  protected $paciente;
  protected $dentista;
  protected $data;
  protected $procedimentos = array();
  protected $valorTotal;
  protected $aprovacao;

  public function __construct(Paciente $paciente, Dentista $dentista, $data, Procedimento $procedimentos, $valorTotal, $aprovacao) {
    $this->paciente = $paciente;
    $this->dentista = $dentista;
    $this->data = $data;
  }

public function calcularValorTotal(){
    $this->valorTotal = 0;
    foreach ($this->Procedimentos as $procedimento){
        $this->valorTotal += $procedimento->valorUnitario;
    }
}

public function aprovarOrcamento($aprovacaoPaciente, $formaDePagamento){
    if($this->aprovacaoPaciente !== null) {
        $cadastroTratamento = new CadastroTratamento();
        $cadastroTratamento->cadastrarNovoTratamento($this->paciente,$this->dentista,$this->data,$this->procedimentos,$this->valorTotal,$this->aprovacao,FormaDePagamento $nomeFormaDePagamento);
    } else{
        return null;
    }
}

}
