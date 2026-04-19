<?php

$idAluno = $_GET['idAluno'];
$nomeAluno = $_POST["nomeAluno"];
$turmaAluno = $_POST["turmaAluno"];
$serieAluno = $_POST["serieAluno"];

require_once 'conexaoBanco.php';

$update = "UPDATE aluno SET nome_aluno = '$nomeAluno', turma_aluno = '$turmaAluno', serie_aluno = '$serieAluno' WHERE id_aluno = $idAluno";

$result = mysqli_query($conn, $update);

if ($result) {

	echo "<script>alert('Aluno Alterado com sucesso!!!');</script>";
	header('Location: index2.php');

} else {

	echo "<script>alert('Erro ao alterar o Aluno!!!');</script>";
	header('Location: index2.php');

}

?>