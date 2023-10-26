<?php

include_once '../global.php';

    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];

    $cliente = new Cliente($nome, $telefone, $email, $cpf, $rg);
    $cliente -> salvarCliente();

?>
