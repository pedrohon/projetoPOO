<?php

include_once '../global.php';

class ConsultaDeAvaliacao {

    static $local_filename = "ConsultaDeAvaliacao.txt";
    static public function getFilename() {
        return get_called_class()::$local_filename;
    }

    protected $data;
    protected $hora;
    protected $dentista;
    protected $paciente;
    protected $procedimentos = array();
    protected $valorTotal;

    public function __construct($data, $hora, Dentista $dentista, Paciente $paciente) {
        $this->data = $data;
        $this->hora = $hora;
        $this->dentista = $dentista;
        $this->paciente = $paciente;
    }

    public function agendarConsulta() {
        echo "\nConsulta agendada para o dia {$this->data} às {$this->hora} com o dentista {$this->dentista->getNome()} para o paciente {$this->paciente->getNome()}.\n";
    }

    public function gerarOrcamento() {
       
        $orcamento = new Orcamento($this->paciente, $this->dentista, $this->data, $this->procedimentos, $this->valorTotal, false);

        $orcamento->calcularValorTotal();
        $orcamento->aprovarOrcamento();

        return $orcamento;
    }

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getHora() {
        return $this->hora;
    }

    public function setHora($hora) {
        $this->hora = $hora;
    }

    public function getDentista() {
        return $this->dentista;
    }

    public function setDentista(Dentista $dentista) {
        $this->dentista = $dentista;
    }

    public function getPaciente() {
        return $this->paciente;
    }

    public function setPaciente(Paciente $paciente) {
        $this->paciente = $paciente;
    }
}