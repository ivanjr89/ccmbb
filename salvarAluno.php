<?php

$nomeAluno = $_POST["nomeAluno"];
$numeroAluno = $_POST["numeroAluno"];
$turmaAluno = $_POST["turmaAluno"];
$enderecoAluno = $_POST["enderecoAluno"];
$celularAluno = $_POST["celularAluno"];
$periodoAluno = $_POST["periodoAluno"];
$sexoAluno = $_POST["sexoAluno"];
$serieAluno = $_POST["serieAluno"];
$cgmAluno = $_POST["cgmAluno"];
$nascimentoAluno = $_POST["nascimentoAluno"];
$dtmatriculaAluno = $_POST["dtmatriculaAluno"];

require_once 'conexaoBanco.php';

$insert = "INSERT INTO aluno (nome_aluno, sexo_aluno, turma_aluno, serie_aluno, periodo_aluno, numero_aluno, cgm_aluno, endereco_aluno, nascimento_aluno, dtmatricula_aluno,  telefone_aluno, comportamento_aluno)
VALUES ('".$nomeAluno."', '".$sexoAluno."', '".$turmaAluno."', '".$serieAluno."', '".$periodoAluno."', '".$numeroAluno."', '".$cgmAluno."', '".$enderecoAluno."', '".$nascimentoAluno."', '".$dtmatriculaAluno."', '".$celularAluno."', '5')";
$result = mysqli_query($conn, $insert);

if ($result) {

	echo "<script>alert('Aluno Salvo com sucesso!!!');</script>";
	header('Location: index2.php');

} else {

	echo "<script>alert('Erro ao salvar o Aluno!!!');</script>";
	header('Location: index2.php');

}

?>