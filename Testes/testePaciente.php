<?php

include_once '../global.php';

    // Criar Cliente
    $cliente = new Cliente("Pedro Nunes", "(12) 95465-1121", "pedro@email.com", "123.456.789-10", "12.345.678-9");
    $cliente -> salvarCliente();
    
    // Criar Paciente
    $paciente = new Paciente("Paulo", "(12) 00000-0000", "paulo@email.com", "123.458.789-10", "12.345.678-9", "Limpeza", "1997-12-10", $cliente);
    $paciente -> salvarPaciente();

    $cliente -> adicionarPaciente($cliente, $paciente);
    $pacientes = $cliente -> getPacientes();
    $cliente->listaPacientes($pacientes);

    Paciente::getPacientes();