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
<body>
<?php

$idAluno = $_GET['idAluno'];

require_once 'conexaoBanco.php';      				
	# Check If Record Exists
	
	$query = "SELECT * FROM aluno where id_aluno = $idAluno";
	
	$result = mysqli_query($conn, $query);
	
	if($result){
		while($row = mysqli_fetch_array($result)){
			$nome = $row["nome_aluno"];
			$serie = $row["serie_aluno"];
			$turma = $row["turma_aluno"];

echo "<div style='width:500px; margin-left: 100px;'>
	
	<h3>Editar Aluno $nome</h3><hr>
	<div>
		<form method='post' action='editAluno.php?idAluno=$idAluno'>
		<div>
			<label>Nome do Aluno</label>
			<input type='text' name='nomeAluno' value='$nome' class='form-control'>
		</div>		
    <div>
      <label>Série do Aluno</label>
      <input type='text' name='serieAluno' value='$serie' class='form-control'>
    </div>
    <div>
      <label>Turma do Aluno</label>
      <input type='text' name='turmaAluno' value='$turma' class='form-control'>
    </div><br/>
		<div>
			<button class='btn btn-success' type='submit'>Salvar</button>
			<a href='index2.php' class='btn btn-warning' >Cancelar</a>
		</div>
		</form>
	</div>
</div>";
          			}
          		}


?>
</body>
</html>