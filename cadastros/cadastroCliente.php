<?php
require_once('../classes/class.Cliente.php');
require_once('classes/persist.php');

// Receba informações do formulário
$nomeCliente = $_POST['nome'];
$rgCliente = $_POST['rg'];
$emailCliente = $_POST['email'];
$telefoneCliente = $_POST['telefone'];
$cpfCliente = $_POST['cpf'];
$pagamentoCliente = $_POST['pagamento'];

// Crie um objeto Cliente com as informações
$cliente = new Cliente($nomeCliente, $rgCliente, $telefoneCliente, $emailCliente, $cpfCliente);

// Aqui você pode definir o pagamento do cliente, conforme necessário
$cliente->setPagamento($pagamentoCliente);

// Salve o objeto Cliente no arquivo
$cliente->save();

// Redirecione para uma página de confirmação ou outra página
header("Location: index.php"); // Altere o URL conforme necessário
exit();
?>