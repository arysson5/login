<?php
function conectarBanco() {
    $servidor = "localhost"; // Endereço do servidor MySQL
    $usuario = "root"; // Nome de usuário do MySQL
    $senha = ""; // Senha do MySQL
    $banco = "calculadora"; // Nome do banco de dados

    // Criar uma conexão com o banco de dados
    $conexao = new mysqli($servidor, $usuario, $senha, $banco,3307);

    // Verificar se ocorreu algum erro na conexão
    if ($conexao->connect_error) {
        die("Falha na conexão: " . $conexao->connect_error);
    }

    if($conexao->error) {
        die("Falha ao conectar ao banco de dados: " . $conexao->error);
    }
    // Configurar o conjunto de caracteres para UTF-8
    $conexao->set_charset("utf8");

    // Retornar a conexão estabelecida
    return $conexao;
}

?>
