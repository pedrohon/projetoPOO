<?php

class RealizacaoProcedimento{
    protected $idRealizacaoProcedimento;
    protected $procedimentoRealizado;
    protected $dataConclusaoProcedimento;

    public function __construct(Tratamento $idTratamento, Procedimento $idProcedimento, Consulta $idConsulta, $idRealizacaoProcedimento, $procedimentoRealizado, $dataConclusaoProcedimento){
        $this->idRealizacaoProcedimento = $idRealizacaoProcedimento;
        $this->procedimentoRealizado = $procedimentoRealizado;
        $this->dataConclusaoProcedimento = $dataConclusaoProcedimento;
    }

    //função que identifica a realização do procedimento

    public function verificacaoProcedimento ($procedimentoRealizado){
        if($this->procedimentoRealizado !== null){
            return true;
        } else{
            return false;
        }
    }
    
    //função para converter quantidade de consultas em dias
    public function conersaoConsultas(Procedimento $qntDeConsultas){
        return $qntDeConsultas * 7;
    }

    //função que verifica qual foi a data da conclusão do procedimento

    static public function conclusaoProcedimento(Procedimento $qntDeConsultas){
         // Obtemos a data atual
    $dataAtual = new DateTime();

    // Adicionamos o número de dias ao objeto de data
    $dataFinal = $dataAtual->add(new DateInterval('P' . $qntDeConsultas . 'D'));

    // Verificamos se a data resultante é um dia útil (de segunda a sexta-feira)
    $diaDaSemana = $dataFinal->format('N');
    $ehDiaUtil = $diaDaSemana >= 1 && $diaDaSemana <= 5;

    // Verificamos se a data final é igual ou superior à data atual
    $dataAtual = new DateTime();
    $dataConclusaoProcedimento = $dataAtual >= $dataFinal;

    return [
        'data' => $dataFinal->format('Y-m-d'),
        'ehDiaUtil' => $ehDiaUtil,
        'acabouProcedimento' => $dataConclusaoProcedimento,
    ];
    }

}
?>