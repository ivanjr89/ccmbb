<?php

$login = $_POST['usuario'];
$senha = md5($_POST['senha']);

require_once "conexaoBanco.php";

        $query = "INSERT INTO usuario (nm_usuario,senha_usuario,tp_usuario) VALUES ('$login','$senha',1)";
        $insert = mysqli_query($conn,$query);

        if($insert){
          echo"<script language='javascript' type='text/javascript'>
          alert('Usuário cadastrado com sucesso!');window.location.
          href='index.php'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>
          alert('Não foi possível cadastrar esse usuário');window.location
          .href='cadastroUsuario.php'</script>";
        }
     
?>