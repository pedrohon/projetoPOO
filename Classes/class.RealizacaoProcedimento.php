<?php

class RealizacaoProcedimento extends persist{

    static $local_filename = "RealizacaoProcedimento.txt";
  static public function getFilename() {
    return get_called_class()::$local_filename;
  }
    protected $idRealizacaoProcedimento;
    protected $procedimentoRealizado;
    protected $dataConclusaoProcedimento;

    public function __construct(Tratamento $idTratamento, Procedimento $idProcedimento, Consulta $idConsulta, $idRealizacaoProcedimento, $procedimentoRealizado, $dataConclusaoProcedimento){
        $this->idRealizacaoProcedimento = $idRealizacaoProcedimento;
        $this->procedimentoRealizado = $procedimentoRealizado;
        $this->dataConclusaoProcedimento = $dataConclusaoProcedimento;
    }
    
    public function acessarDataDaConsulta(AgendamentoDeConsulta $dataDaConsulta){
        $dataDaConsulta->getDataDaConsulta();
    }

    public function verificaRealizacaoProcedimento($dataDaConsulta){
        $dataAtual = new DateTime();

        $dataConsulta = DateTime::createFromFormat('d/m/Y', $dataDaConsulta);

        if($dataConsulta < $dataAtual){
            echo "A consulta na data $dataDaConsulta já foi realizada.\n";
            return true;
        } else{
            echo "A consulta na data $dataDaConsulta ainda será realizada.\n";
        }
    }

    public function acessarQtdConsultas(Procedimento $qtdDeConsultas){
        $qtdDeConsultas->getQntDeConsultas();
    }

    //função que verifica qual foi a data da conclusão do procedimento

    public function calcularDataConclusaoProcedimento($dataDaConsulta, $qtdDeConsultas) {
    // Converter a data da consulta para o formato DateTime
    $dataConsulta = DateTime::createFromFormat('d/m/Y', $dataDaConsulta);

    // Calcular o intervalo de dias
    $intervaloDias = $qtdDeConsultas * 7;
    
    // Adicionar o intervalo à data da consulta
    $dataConclusaoProcedimento = $dataConsulta->add(new DateInterval("P{$intervaloDias}D"));

    // Verificar se a data de conclusão cai em um final de semana
    if ($dataConclusaoProcedimento->format('N') >= 6) {
        // Se for sábado (6) ou domingo (7), ajustar para o próximo dia útil
        $diasParaProximoDiaUtil = 8 - $dataConclusaoProcedimento->format('N'); // Calcula os dias necessários para o próximo dia útil
        $dataConclusaoProcedimento->add(new DateInterval("P{$diasParaProximoDiaUtil}D"));
    }

    // Retornar a data de conclusão formatada no formato d/m/Y
    return $dataConclusaoProcedimento->format('d/m/Y');
}

}
?>