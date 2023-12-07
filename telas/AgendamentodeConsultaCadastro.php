<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $dentista = new Dentista($_POST["dentista"]);
    $paciente = new Paciente($_POST["paciente"]);

    
    $agendamento = new AgendamentoDeConsulta(
        $dentista,
        $paciente,
        $_POST["data"],
        $_POST["duracao"]
    );

    $agendamento->setQntDeConsultas($_POST["qntConsultas"]);

  
    $orcamento = new Orcamento(1);

   
    $agendamento->criarConsultasAutomaticamente($orcamento);
}

exit();
?>
