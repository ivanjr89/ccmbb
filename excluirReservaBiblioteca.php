<?php

$idReserva = $_GET["idReserva"];
$dtExclusao = date('Y-m-d');

require_once 'conexaoBanco.php';

//$delete = "DELETE FROM biblioteca where id_biblioteca = '".$idReserva."'";

echo $dtExclusao;

$deletar = "UPDATE biblioteca set dt_exclusao = '".$dtExclusao."', tp_biblioteca = 3 where id_biblioteca = '".$idReserva."'";

$result = mysqli_query($conn, $deletar);

if ($result != null) {

	echo"<script language='javascript' type='text/javascript'>
          alert('Reserva Excluida!');window.location
          .href='index2.php'</script>";

} else {

	echo"<script language='javascript' type='text/javascript'>
          alert('Nao foi possivel excluir a reserva!');window.location
          .href='index2.php'</script>";

}

?>