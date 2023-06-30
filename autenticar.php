<?php
require_once 'conexao.php';

// Função de Autenticação/Login
function autenticarUsuario($username, $password) {
    $conn = conectarBanco();

    // Consulta para verificar se o usuário e senha correspondem
    $sql = "SELECT * FROM login WHERE usuario = '$username' AND senha = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Autenticação bem-sucedida
        return true;
    } else {
        // Autenticação falhou
        echo 'deu ruim';
        return false;
    }
}
?>
