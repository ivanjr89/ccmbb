<?php

$idReserva = $_GET["idReserva"];

$dtInicio = $_POST["dtInicio"];
$dtFim = $_POST["dtFim"];

require_once 'conexaoBanco.php';

$update = "UPDATE biblioteca set dt_inicio = '".$dtInicio."', dt_fim = '".$dtFim."' where id_biblioteca = '".$idReserva."'";

$result = mysqli_query($conn, $update);

if ($result != null) {

	echo"<script language='javascript' type='text/javascript'>
          alert('Reserva Alterada!');window.location
          .href='index2.php'</script>";

} else {

	echo"<script language='javascript' type='text/javascript'>
          alert('Nao foi possivel alterar a reserva!');window.location
          .href='index2.php'</script>";

}

?>