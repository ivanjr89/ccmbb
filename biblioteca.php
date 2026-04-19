   
      <div style="width:500px;"><br>
	<h4>Reserva de Livro</h4></br>
	<div>
		<form class="form-group" action="cadastroBiblioteca.php" method="post">
	<label>Selecione o Livro</label><br>
	<select class="form-control" id="selLivro" style="width:300px" name="livro" required>
	    <option value="">Selecione uma Opção</option>
          				<?php
    //arquivo com a configuração de acesso ao banco de dados      				
    require_once 'conexaoBanco.php';      				
	# Check If Record Exists
	
	$query = "SELECT * FROM livro";
	
	$result = mysqli_query($conn, $query);
	
	if($result){
		while($row = mysqli_fetch_array($result)){
			$idLivro = $row["id_livro"];
			$isbnLivro = $row["isbn_livro"];
			$nomeLivro = $row["nome_livro"];
			$volumeLivro = $row["volume_livro"];
			$generoLivro = $row["genero_livro"];
			$qtdDisponivel = $row["qtd_livro"];
	      				echo "<option value='".$idLivro."'>".$nomeLivro." - ".$volumeLivro." - ".$isbnLivro."</option>";
          			}
          		}
          				?>
</select><br><br><label>Selecione o Aluno</label><br>
<select class="form-control" id="selAluno" style="width:300px" name="aluno" required>
    <option value="">Selecione um Aluno</option>
          				<?php
    //arquivo com a configuração de acesso ao banco de dados      				
    require_once 'conexaoBanco.php';      				
	# Check If Record Exists
	
	$query = "SELECT * FROM aluno";
	
	$result = mysqli_query($conn, $query);
	
	if($result){
		while($row2 = mysqli_fetch_array($result)){
			$idAluno = $row2["id_aluno"];
			$nomeAluno = $row2["nome_aluno"];
			$turmaAluno = $row2["turma_aluno"];
			$serieAluno = $row2["serie_aluno"];
			$periodoAluno = $row2["periodo_aluno"];
	      				echo "<option value='".$idAluno."'>".$nomeAluno." - ".$serieAluno." - ".$turmaAluno." - ".$periodoAluno."</option>";
          			}
          		}
          				?>
</select>
<div><br>
<label>Data da Reserva</label>
<input type="date" name="dtInicio" class="form-control" style="width:300px" /><br>
<label>Data da Devolução</label>
<input type="date" name="dtFim" class="form-control" style="width:300px">
</div><br>
<button class="btn btn-success" type="submit">Reservar Livro</button>
<button class="btn btn-warning" type="reset">Limpar Seleção</button>
</form>
</div><br>