<?php

$idAluno = $_GET['idAluno'];
date_default_timezone_set('America/Sao_Paulo');
$dtExclusao = date('Y-m-d h:i:s', time());


require_once 'conexaoBanco.php';

$update = "UPDATE aluno SET dt_exclusao = '$dtExclusao' WHERE id_aluno = $idAluno";

$result = mysqli_query($conn, $update);

if ($result) {

	echo "<script>alert('Aluno Excluído com sucesso!!!');</script>";
	header('Location: index2.php');

} else {

	echo "<script>alert('Erro ao excluir o Aluno!!!');</script>";
	header('Location: index2.php');

}

?>