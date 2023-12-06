<?php
include '../classes/class.Profissional.php';


// Construtor profissional
$profissional = new Profissional("Mariana Sousa", "(31)99999-2002", "mari@example.com", "123.452.276-46", "22-333.441", 1000, 'rua das dores', 'analista de dados');

// Exibir informações da profissional
echo "\n Informações do Profissional: \n";
echo "\n---------------------------------------------\n";
echo "Nome: " . $profissional->getNome() . "\n";
echo "Telefone: " . $profissional->getTelefone() . "\n";
echo "Email: " . $profissional->getEmail() . "\n";
echo "CPF: " . $profissional->getCpf() . "\n";
echo "RG: " . $profissional->getRg() . "\n";
echo "Salario: " . $profissional->getSalario() . "\n";
echo "Endereco: " . $profissional->getEndereco() . "\n";
echo "Cargo: " . $profissional->getCargo() . "\n";

// Altera informações da profissional
$profissional->setNome("Teste novo nome");
$profissional->setRg("16677785");
$profissional->setEmail("teste@novoemail.com");
$profissional->setTelefone("(31)99999-7979");
$profissional->setCpf("30030030030");
$profissional->setSalario(3500);
$profissional->setEndereco("Rua felicidade");
$profissional->setCargo("Programador");

// Exibir novas informações da profissional
echo "\n Novas informações da Profissional: \n";
echo "\n---------------------------------------------\n";
echo "Nome: " . $profissional->getNome() . "\n";
echo "Telefone: " . $profissional->getTelefone() . "\n";
echo "Email: " . $profissional->getEmail() . "\n";
echo "CPF: " . $profissional->getCpf() . "\n";
echo "RG: " . $profissional->getRg() . "\n";
echo "Salario: " . $profissional->getSalario() . "\n";
echo "Endereco: " . $profissional->getEndereco() . "\n";
echo "Cargo: " . $profissional->getCargo() . "\n";
?>