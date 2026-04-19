<?php
session_start();
include("conexaoBanco.php"); // arquivo de conexão com banco

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['usuario'];
    $senha = md5($_POST['senha']);

    $sql = "SELECT * FROM usuario 
    WHERE nm_usuario = '$login' 
    AND senha_usuario = '$senha' 
    and tp_usuario = 0";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['usuario'] = $login;
        header("Location: index2.php");
        exit();
    } else {
    echo "<script>alert('Usuário ou senha inválidos!');
    window.location='index.php';
    </script>";
    }
}
?>