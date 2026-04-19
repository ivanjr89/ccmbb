  <div style="width:500px; margin-left: 100px;">
	<br/>
	<h3>Cadastrar Livro</h3><hr>
	<div>
		<form method="post" action="salvarLivro.php">
		<div>
			<label>Nome do Livro</label>
			<input type="text" name="nomeLivro" class="form-control">
		</div>
		<div>
			<label>Volume do Livro</label>
			<input type="text" name="volumeLivro" class="form-control">
		</div>
		<div>
			<label>Gênero do Livro</label>
			<input type="text" name="generoLivro" class="form-control">
		</div>
		<div>
			<label>ISBN do Livro</label>
			<input type="text" name="isbnLivro" class="form-control">
		</div>
		<div>
			<label>Quantidade de Livro</label>
			<input type="text" name="qtdLivro" class="form-control">
		</div><br/>
		<div>
			<button class="btn btn-success" type="submit">Salvar</button>
			<button class="btn btn-warning" type="reset">Limpar</button>
		</div>
		</form>
	</div>
</div>