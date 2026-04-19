<html ng-app>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <head>
<link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
    
    <title>Sistema Escola Beatriz Biavatti - Colégio Cívico Militar</title>

</head>
<?php 

    $idReserva = $_GET['idReserva'];

?>

<div class="container"><br>
	<h4>Reserva de Livro</h4></br>
	<div>
		<form class="form-group" action="editarBiblioteca.php?idReserva=<?php echo $idReserva;?>" method="post">
	<label>Livro Reservado</label><br>
          				<?php
    //arquivo com a configuração de acesso ao banco de dados      				
    require_once 'conexaoBanco.php';      				
	# Check If Record Exists
	
	$query = "SELECT * FROM livro as l inner join biblioteca as b on l.id_livro = b.id_livro where b.id_biblioteca = ".$idReserva."";
	
	$result = mysqli_query($conn, $query);
	
	if($result){
		while($row = mysqli_fetch_array($result)){
			$idLivro = $row["id_livro"];
			$nomeLivro = $row["nome_livro"];
			$volumeLivro = $row["volume_livro"];
			$generoLivro = $row["genero_livro"];
			$qtdDisponivel = $row["qtd_livro"];
	      				echo "<input type='text' name='livro' class='form-control' readonly style='width:300px;' value='".$nomeLivro." - ".$volumeLivro."'/>";
          			}
          		}
          				?>
<br><label>Aluno que Reservou</label><br>
          				<?php
    //arquivo com a configuração de acesso ao banco de dados      				
    require_once 'conexaoBanco.php';      				
	# Check If Record Exists
	
	$query = "SELECT * FROM aluno as a inner join biblioteca as b on a.id_aluno = b.id_aluno where b.id_biblioteca = ".$idReserva."";
	
	$result = mysqli_query($conn, $query);
	
	if($result){
		while($row2 = mysqli_fetch_array($result)){
			$idAluno = $row2["id_aluno"];
			$nomeAluno = $row2["nome_aluno"];
			$turmaAluno = $row2["turma_aluno"];
			$serieAluno = $row2["serie_aluno"];
			$periodoAluno = $row2["periodo_aluno"];
	      				echo "<input type='text' class='form-control' name='aluno' style='width:300px;' readonly value='".$nomeAluno." - ".$serieAluno." - ".$turmaAluno." - ".$periodoAluno."'/>";
          			}
          		}
          				?>
<div><br>
<label>Data da Reserva</label>
<?php
    //arquivo com a configuração de acesso ao banco de dados      				
    require_once 'conexaoBanco.php';      				
	# Check If Record Exists
	
	$query = "SELECT dt_inicio FROM biblioteca where id_biblioteca = ".$idReserva."";
	
	$result = mysqli_query($conn, $query);
	
	if($result){
		while($row3 = mysqli_fetch_array($result)){
			$dtReservaInicio = $row3["dt_inicio"];
			echo "<input type='date' name='dtInicio' value='$dtReservaInicio' class='form-control' style='width:300px' required /><br>";
          			}
          		}
          				?>


<label>Data da Devolução</label>
<?php
    //arquivo com a configuração de acesso ao banco de dados      				
    require_once 'conexaoBanco.php';      				
	# Check If Record Exists
	
	$query = "SELECT dt_fim FROM biblioteca where id_biblioteca = ".$idReserva."";
	
	$result = mysqli_query($conn, $query);
	
	if($result){
		while($row4 = mysqli_fetch_array($result)){
			$dtReservaFim = $row4["dt_fim"];
			echo "<input type='date' name='dtFim' value='$dtReservaFim' class='form-control' style='width:300px' required /><br>";
          			}
          		}
          				?></div><br>
<button class="btn btn-success" type="submit">Alterar Reserva</button>
</form>
<a class='btn btn-warning' href="/escola/page">Cancelar Alteração</a>
</div><br>
</div>
</html>