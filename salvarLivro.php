<?php

$nomeLivro = $_POST["nomeLivro"];
$volumeLivro = $_POST["volumeLivro"];
$generoLivro = $_POST["generoLivro"];
$isbnLivro = $_POST["isbnLivro"];
$qtdLivro = $_POST["qtdLivro"];

require_once 'conexaoBanco.php';

$insert = "INSERT INTO livro (nome_livro, genero_livro, isbn_livro, volume_livro, qtd_livro)
VALUES ('".$nomeLivro."', '".$generoLivro."', '".$isbnLivro."', '".$volumeLivro."', '".$qtdLivro."')";
	
$result = mysqli_query($conn, $insert);

if ($result) {

	echo "<script>alert('Livro Salvo com sucesso!!!');</script>";
	header('Location: index2.php');

} else {

	echo "<script>alert('Erro ao salvar o Livro!!!');</script>";
	header('Location: index2.php');

}

?>