<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Cliente</title>
    <!-- Incluindo os arquivos CSS do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Cor de fundo leve */
        }
        .container {
            background-color: #fff; /* Fundo do container */
            border: 1px solid #ccc; /* Borda fina cinza */
            border-radius: 5px; /* Cantos arredondados */
            padding: 20px; /* Espaçamento interno */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra suave */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <center><h2>Cadastro de Cliente</h2></center>
        <form action="../cadastros/cadastroCliente.php" method="post">
            <!-- Nome -->
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <!-- Telefone -->
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="tel" class="form-control" id="telefone" name="telefone" pattern="[0-9]{11}" maxlength="11" required>
            </div>
            <!-- Email -->
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <!-- CPF -->
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf" pattern="[0-9]{11}" maxlength="11" required>
            </div>
            <!-- RG -->
            <div class="form-group">
                <label for="rg">RG:</label>
                <input type="text" class="form-control" id="rg" name="rg" required>
            </div>
            <!-- Pagamento -->
            <div class="form-group">
                <label for="pagamento">Pagamento (R$):</label>
                <input type="number" class="form-control" id="pagamento" name="pagamento" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

    <!-- Incluindo os arquivos JavaScript do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
