<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Processar os dados do formulário
    $nomeDoProcedimento = $_POST["nomeDoProcedimento"];
    $detalhamentoDoProcedimento = $_POST["detalhamentoDoProcedimento"];
    $valorUnitario = $_POST["valorUnitario"];
    $qntDeConsultas = $_POST["qntDeConsultas"];

  
    header("Location: sucesso.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Procedimento</title>
    <!-- Estilos... -->
</head>
<body>

<form action="" method="post">
    <!-- Campos do formulário... -->
    <button type="submit">Cadastrar</button>
</form>

</body>
</html>
