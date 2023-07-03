<?php
require_once 'conexao.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $conexao = conectarBanco();

    $sql = "SELECT * FROM usuario WHERE usuario = '$username' AND senha = '$password'";
    $resultado = $conexao->query($sql);

    if ($resultado->num_rows > 0) {
        $_SESSION["usuario"] = $username;
        $_SESSION["contas"] = []; // Array para armazenar as contas

        header("Location: calculadora.php"); // Redirecionar para a página da calculadora
    } else {
        echo "Usuário ou senha inválidos.";
    }

    $conexao->close();
}
?>
