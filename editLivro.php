<?php

$idLivro = $_GET['idLivro'];
$nomeLivro = $_POST["nomeLivro"];
$generoLivro = $_POST["generoLivro"];
$volumeLivro = $_POST["volumeLivro"];

require_once 'conexaoBanco.php';

$update = "UPDATE livro SET nome_livro = '$nomeLivro', genero_livro = '$generoLivro', volume_livro = '$volumeLivro' WHERE id_livro = $idLivro";

$result = mysqli_query($conn, $update);

if ($result) {

	echo "<script>alert('Livro Alterado com sucesso!!!');
        window.location='index2.php';</script>";

} else {

	echo "<script>alert('Erro ao alterar o Livro!!!');
        window.location='index2.php';</script>";

}

?>