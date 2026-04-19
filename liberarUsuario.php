<?php

$idUsuario = $_GET['id_usuario'];

require_once 'conexaoBanco.php';

$update = "UPDATE usuario SET tp_usuario = 0 WHERE id_usuario = $idUsuario";

$result = mysqli_query($conn, $update);

if ($result) {

	echo "<script>alert('Liberado usuário com sucesso!!!');
        window.location='index2.php';</script>";

} else {

	echo "<script>alert('Erro ao Liberar Usuário!!!');
        window.location='index2.php';</script>";

}

?>