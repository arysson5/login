<?php
require_once 'conexao.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os dados do formulário
    $username = $_POST["new_username"];
    $password = $_POST["new_password"];
    cadastrarUsuario($username,$password);
}
// Função para cadastrar um novo usuário
function cadastrarUsuario($username, $password) {
    // Criar uma conexão com o banco de dados
    $conexao = conectarBanco();

    // Verificar se o usuário já existe
    $sql = "SELECT * FROM usuario WHERE usuario = '$username'";
    $resultado = $conexao->query($sql);

    if ($resultado->num_rows > 0) {
        // Usuário já existe, exibir mensagem de erro
        echo "O usuário já existe. Por favor, escolha um nome de usuário diferente.";
    } else {
        // Inserir o novo usuário no banco de dados
        $sql = "INSERT INTO usuario (usuario, senha) VALUES ('$username', '$password')";
        if ($conexao->query($sql) === TRUE) {
            // Usuário cadastrado com sucesso
            echo "Usuário cadastrado com sucesso.";
        } else {
            // Erro ao cadastrar o usuário
            echo "Erro ao cadastrar o usuário: " . $conexao->error;
        }
    }

    // Fechar a conexão com o banco de dados
    $conexao->close();
}


?>
