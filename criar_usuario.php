<?php
require_once 'conexao.php';

// Função de Criação de Usuário
function criarUsuario($newUsername, $newPassword) {
    $conn = conectarBanco();

    // Consulta para verificar se o usuário já existe
    $sql = "SELECT * FROM login WHERE username = '$newUsername'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // O usuário já existe, retorne um erro ou faça o tratamento adequado
        return false;
    } else {
        // Insere o novo usuário no banco de dados
        $sql = "INSERT INTO login (usuario, senha) VALUES ('$newUsername', '$newPassword')";
        if ($conn->query($sql) === TRUE) {
            // Criação de usuário bem-sucedida
            return true;
        } else {
            // Ocorreu um erro ao criar o usuário
            return false;
        }
    }
}
?>
