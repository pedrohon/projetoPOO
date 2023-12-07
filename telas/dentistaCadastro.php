<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    include_once 'C:\xampp\htdocs\cursophp\Class dentista\class.Dentista.php';

    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $salario = $_POST['salario'];

   
}
?>
