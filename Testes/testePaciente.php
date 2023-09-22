<?php

require_once 'class.Cliente.teste.php';
require_once '../classes/class.Paciente.php';

    // um exemplo de cliente e um de paciente
    $cliente = new Cliente("Pedro Nunes", "(12) 98119-4717", "pedro@email.com", "123.456.789-10", "12.345.678-9", 1200);
    $paciente = new Paciente("Paulo", "(12) 00000-0000", "paulo@email.com", "123.456.789-10", "12.345.678-9", "Limpeza", "1997-12-10", $cliente);

// Exibir informações do paciente
echo "\nInformações do Paciente:\n";
echo "------------------------\n";
echo "Nome: " . $paciente->getNome() . "\n";
echo "Telefone: " . $paciente->getTelefone() . "\n";
echo "Email: " . $paciente->getEmail() . "\n";
echo "CPF: " . $paciente->getCpf() . "\n";
echo "RG: " . $paciente->getRg() . "\n";
echo "Tratamento: " . $paciente->getTratamento() . "\n";
echo "Data de Nascimento: " . $paciente->getDataDeNascimento() . "\n";

// Exibir informações do Cliente Associado ao Paciente
$clienteAssociado = $paciente->getResponsavelFinanceiro();
echo "\nInformações do Cliente Associado ao Paciente:\n";
echo "\n---------------------------------------------\n";
echo "Nome: " . $clienteAssociado->getNome() . "\n";
echo "Telefone: " . $clienteAssociado->getTelefone() . "\n";
echo "Email: " . $clienteAssociado->getEmail() . "\n";
echo "CPF: " . $clienteAssociado->getCpf() . "\n";
echo "RG: " . $clienteAssociado->getRg() . "\n";
echo "Pagamento: " . $clienteAssociado->getPagamento() . "\n\n";
