
<?php

$idReserva = $_GET["idReserva"];

require_once 'conexaoBanco.php';

$update = "UPDATE biblioteca SET tp_biblioteca = '1' WHERE id_biblioteca = '".$idReserva."'";
$result = mysqli_query($conn, $update);

if ($result != null) {

	echo "<script>alert('Livro Entregue com sucesso!!!');</script>";
	header('Location: index2.php');

} else {

	echo "<script>alert('Erro ao salvar o Aluno!!!');</script>";
	header('Location: index2.php');

}

?>