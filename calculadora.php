<?php
session_start();

// Verificar se o usuário está autenticado
if (!isset($_SESSION["usuario"])) {
    header("Location: autenticar.php");
    exit();
}

// Função para adicionar uma conta no array de contas na sessão
function adicionarConta($expressao, $resultado) {
    $_SESSION["contas"][] = [
        "expressao" => $expressao,
        "resultado" => $resultado
    ];
}

// Função para exibir as contas anteriores
function exibirContas() {
    echo "<h3>Contas anteriores:</h3>";
    echo "<ul>";
    foreach ($_SESSION["contas"] as $conta) {
        echo "<li>{$conta['expressao']} = {$conta['resultado']}</li>";
    }
    echo "</ul>";
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Calculadora</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .btn-calculator {
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
    <p class="container mt-5">
        <h1>Calculadora</h1>
        <p>Seja bem vindo  <?php echo $_SESSION['usuario']; ?>.</p>
        <div class="row">
            <div class="col-md-4">
                <input type="text" class="form-control" id="resultado" disabled>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-3">
                <button class="btn btn-primary btn-block btn-calculator" onclick="adicionarElemento(7)">7</button>
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary btn-block btn-calculator" onclick="adicionarElemento(8)">8</button>
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary btn-block btn-calculator" onclick="adicionarElemento(9)">9</button>
            </div>
            <div class="col-md-3">
                <button class="btn btn-danger btn-block btn-calculator" onclick="limpar()">C</button>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-3">
                <button class="btn btn-primary btn-block btn-calculator" onclick="adicionarElemento(4)">4</button>
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary btn-block btn-calculator" onclick="adicionarElemento(5)">5</button>
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary btn-block btn-calculator" onclick="adicionarElemento(6)">6</button>
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary btn-block btn-calculator" onclick="adicionarElemento('+')">+</button>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-3">
                <button class="btn btn-primary btn-block btn-calculator" onclick="adicionarElemento(1)">1</button>
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary btn-block btn-calculator" onclick="adicionarElemento(2)">2</button>
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary btn-block btn-calculator" onclick="adicionarElemento(3)">3</button>
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary btn-block btn-calculator" onclick="adicionarElemento('-')">-</button>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-3">
                <button class="btn btn-primary btn-block btn-calculator" onclick="adicionarElemento(0)">0</button>
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary btn-block btn-calculator" onclick="adicionarElemento('*')">*</button>
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary btn-block btn-calculator" onclick="adicionarElemento('/')">/</button>
            </div>
            <div class="col-md-3">
                <button class="btn btn-success btn-block btn-calculator" onclick="calcular()">=</button>
            </div>
        </div>
    </div>
    <?php
        // Verificar se há contas armazenadas na sessão
        if (!empty($_SESSION["contas"])) {
            exibirContas();
        }
        ?>

        <a href="logout.php" class="btn btn-danger mt-3">Sair</a>
    </div>

    <script>
        var expressao = "";
        var resultadoElement = document.getElementById("resultado");

        function adicionarElemento(elemento) {
            expressao += elemento;
            resultadoElement.value = expressao;
        }

        function calcular() {
            try {
                var resultado = eval(expressao);
                resultadoElement.value = resultado;
                expressao = resultado;
            } catch (error) {
                resultadoElement.value = "Erro";
            }
        }

        function limpar() {
            expressao = "";
            resultadoElement.value = "";
        }
    </script>
</body>
</html>
