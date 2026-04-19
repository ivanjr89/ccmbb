	<div style="width:500px; margin-left: 100px;">
	<h3>Cadastrar Aluno</h3><hr>
	<div> 
		<form method="post" action="salvarAluno.php">
		<div>
			<label>Nome do Aluno</label>
			<input type="text" name="nomeAluno" class="form-control">
		</div>
    <div>
      <label>Sexo do Aluno</label>
      <select class="form-control" name="sexoAluno" required>
        <option value="">Selecione o Sexo</option>
        <option value="M">Masculino</option>
        <option value="F">Feminino</option>
      </select>
    </div>
    <div>
      <label>Data de Nascimento do Aluno</label>
      <input type="date" name="nascimentoAluno" class="form-control">
    </div>
    <div>
      <label>Data da Matrícula do Aluno</label>
      <input type="date" name="dtmatriculaAluno" class="form-control">
    </div>
		<div>
			<label>Número da Chamada do Aluno</label>
			<input type="text" name="numeroAluno" class="form-control">
		</div>
    <div>
      <label>CGM do Aluno</label>
      <input type="text" name="cgmAluno" class="form-control">
    </div>
    <div>
      <label>Série do Aluno</label>
      <input type="text" name="serieAluno" class="form-control">
    </div>
		<div>
			<label>Período do Aluno</label>
      <select class="form-control" name="periodoAluno" required>
        <option value="">Selecione o Período</option>
        <option value="Matutino">Matutino</option>
        <option value="Vespertino">Vespertino</option>
      </select>
		</div>
    <div>
      <label>Turma do Aluno</label>
      <input type="text" name="turmaAluno" class="form-control">
    </div>
		<div>
			<label>Endereço do Aluno</label>
			<input type="text" name="enderecoAluno" class="form-control">
		</div>
		<div>
			<label>Celular do Aluno</label>
			<input type="text" name="celularAluno" class="form-control">
		</div><br/>
		<div>
			<button class="btn btn-success" type="submit">Salvar</button>
			<button class="btn btn-warning" type="reset">Limpar</button>
		</div>
		</form>
	</div>
</div>