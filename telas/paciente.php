<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Paciente</title>
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
        <center><h2>Cadastro de Paciente</h2></center>
        <form action="../cadastros/cadastroPaciente.php" method="post">
            <!-- Nome -->
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <!-- Telefone -->
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" class="form-control" id="telefone" name="telefone" required>
            </div>
            <!-- Email -->
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="email" name="email" required>
            </div>
            <!-- CPF -->
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf" required>
            </div>
            <!-- RG -->
            <div class="form-group">
                <label for="rg">RG:</label>
                <input type="text" class="form-control" id="rg" name="rg" required>
            </div>
            <!-- Tratamento -->
            <div class="form-group">
                <label for="tratamento">Tratamento:</label>
                <input type="text" class="form-control" id="tratamento" name="tratamento" required>
            </div>
            <!-- Data de nascimento -->
            <div class="form-group">
                <label for="dataDeNascimento">Data de nascimento:</label>
                <input type="text" class="form-control" id="dataDeNascimento" name="dataDeNascimento" required>
            </div>
            <!-- Responsavel financeiro -->
            <div class="form-group">
                <label for="responsavelFinanceiro">Responsavel financeiro:</label>
                <input type="text" class="form-control" id="responsavelFinanceiro" name="responsavelFinanceiro" required>
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
