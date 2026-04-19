<?php

require_once 'conexaoBanco.php'; 

$user = "SELECT * FROM USUARIO WHERE TP_USUARIO = 1";
$result = mysqli_query($conn, $user);

if ($result && mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)){
        $idUsuario = $row["id_usuario"];
        $nomeUsuario = $row["nm_usuario"];
        $tipoUsuario = $row["tp_usuario"];

        echo "<h4>Usuário $nomeUsuario está bloqueado - 
        <a href='liberarUsuario.php?id_usuario=$idUsuario' class='btn btn-success'>
        Liberar Usuário</a></h4>";
    }

} else {
    echo "<h4>Não existe usuário para desbloquear!</h4>";
}

	


?>