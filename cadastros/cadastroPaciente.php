<?php

include_once '../global.php';

    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $tratamento = $_POST['tratamento']; 
    $dataDeNascimento = $_POST['dataDeNascimento']; 
    $responsavelFinanceiro = $_POST['responsavelFinanceiro'];

    $paciente = new Paciente($nome, $telefone, $email, $cpf, $rg, $tratamento, $dataDeNascimento, $responsavelFinanceiro);
    $paciente -> salvarPaciente();