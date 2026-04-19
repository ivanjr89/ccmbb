    <?php

$idAluno = $_POST["aluno"];
$idLivro = $_POST["livro"];
$dtInicio = $_POST["dtInicio"];
$dtFim = $_POST["dtFim"];

require_once 'conexaoBanco.php';

$select = "SELECT * FROM biblioteca where id_aluno = ".$idAluno." and tp_biblioteca = 0";
$valida = mysqli_query($conn, $select);

$linhas = mysqli_num_rows($valida);

if($linhas >= 1){
    
    echo"<script language='javascript' type='text/javascript'>
          alert('Não foi possível realizar a reserva, aluno já tem livro reservado!!!!');window.location
          .href='index2.php'</script>";
} else {

$insert = "INSERT INTO biblioteca (id_aluno, id_livro, dt_inicio, dt_fim, tp_biblioteca, dt_exclusao)
VALUES ('".$idAluno."', '".$idLivro."', '".$dtInicio."', '".$dtFim."', '0', '')";
$result = mysqli_query($conn, $insert);

//if ($result != null) {

echo"<script language='javascript' type='text/javascript'>
          alert('Realizado reserva!!!');window.location
          .href='index2.php'</script>";

//} else {

    /* echo"<script language='javascript' type='text/javascript'>
          alert('Erro ao realizar reserva!!!');window.location
          .href='principalValida.php'</script>";

    }*/
}

?>