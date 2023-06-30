<?php
function conectarBanco() {
    $servidor = "localhost"; // Endereço do servidor MySQL
    $usuario = "root"; // Nome de usuário do MySQL
    $senha = ""; // Senha do MySQL
    $banco = "teste"; // Nome do banco de dados

    // Criar uma conexão com o banco de dados
    $conexao = new mysqli($servidor, $usuario, $senha, $banco);

    // Verificar se ocorreu algum erro na conexão
    if ($conexao->connect_error) {
        die("Falha na conexão: " . $conexao->connect_error);
    }

    // Configurar o conjunto de caracteres para UTF-8
    $conexao->set_charset("utf8");

    // Retornar a conexão estabelecida
    return $conexao;
}

// Exemplo de uso da função de conexão
$conexao = conectarBanco();

// Verificar se ocorreu algum erro na conexão
if ($conexao->connect_error) {
    // Tratar o erro de conexão
    echo "Erro ao conectar ao banco de dados: " . $conexao->connect_error;
} else {
    // Conexão bem-sucedida, você pode executar consultas e operações no banco de dados aqui
    echo "Conexão bem-sucedida!";
    
    // Fechar a conexão
    $conexao->close();
}
?>
