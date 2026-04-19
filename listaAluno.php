<?php
require_once 'conexaoBanco.php';


$limite = 20;
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$buscaAluno = isset($_GET['buscaAluno']) ? $_GET['buscaAluno'] : '';

$inicio = ($pagina - 1) * $limite;


$filtro = "";
if(!empty($buscaAluno)){
    $buscaAluno = mysqli_real_escape_string($conn, $buscaAluno);

    $filtro = " and (
        nome_aluno LIKE '%$buscaAluno%'
    )";
}


$sqlTotal = "SELECT COUNT(*) as total
FROM aluno
WHERE 1=1 $filtro";

$resultTotal = mysqli_query($conn, $sqlTotal);
$total = mysqli_fetch_assoc($resultTotal)['total'];
$totalPaginas = ceil($total / $limite);


$queryEditAluno = "SELECT * FROM aluno where dt_exclusao is null
$filtro
ORDER BY id_aluno ASC
LIMIT $inicio, $limite";

$result = mysqli_query($conn, $queryEditAluno);
?>

<div>
    <h4 style="text-align: center;">Relação de Alunos</h4>

    <!-- 🔍 buscaAluno -->
    <div >
        <input type="text"
       id="buscaAluno"
       placeholder="Pesquisar..."
       value="<?=$buscaAluno?>"
       onkeyup="buscaAlunor(this.value)"
       onkeydown="teclabuscaAluno(event)">
    </div>
    <br>    
    <table class="table table-striped table-hover">
                    <thead>
                        <th>Nome do Aluno</th>
                        <th>Serie e Turma</th>            
                            <th>Ação</th>
                    </thead>
                    <tbody>
                        
                        <?php                        
    
    if($result){
        while($rowEditAluno = mysqli_fetch_array($result)){
            $editIdAluno = $rowEditAluno ["id_aluno"];
            $editNomeAluno = $rowEditAluno ["nome_aluno"];
            $editSerieAluno = $rowEditAluno ["serie_aluno"];
            $editTurmaAluno = $rowEditAluno ["turma_aluno"];

                    echo "<tr>";
                    echo "<td>$editNomeAluno</td>";
                    echo "<td>$editSerieAluno - $editTurmaAluno </td>";                  
                        echo "<td><a href='editaaluno.php?idAluno=$editIdAluno' class='btn btn-primary'>Editar</a> <a href='excluiAluno.php?idAluno=$editIdAluno' class='btn btn-danger'>Excluir</a></td>";
                        echo "</tr>";
                    }
                }
                        ?>
                    </tbody>
                </table>

    
    <div style="margin-left:20px;">

        <?php if($pagina > 1): ?>
            <button class="btn btn-primary btn-sm"
            onclick="loadPage('listaAluno.php?pagina=<?=$pagina-1?>&buscaAluno=<?=$buscaAluno?>')">
            <
            </button>
        <?php endif; ?>

        <?php for($i = 1; $i <= $totalPaginas; $i++): ?>
            <button class="btn btn-sm <?=($i == $pagina ? 'btn-success' : 'btn-secondary')?>"
            onclick="loadPage('listaAluno.php?pagina=<?=$i?>&buscaAluno=<?=$buscaAluno?>')">
            <?=$i?>
            </button>
        <?php endfor; ?>

        <?php if($pagina < $totalPaginas): ?>
            <button class="btn btn-primary btn-sm"
            onclick="loadPage('listaAluno.php?pagina=<?=$pagina+1?>&buscaAluno=<?=$buscaAluno?>')">
            >
            </button>
        <?php endif; ?>

    </div>
</div>

<script id="buscaAlunoEnterTimeout">
let tempobuscaAluno;

function buscaAlunor(valor, forcar = false){

    
    if(forcar){
        clearTimeout(tempobuscaAluno);
        loadPage('listaAluno.php?pagina=1&buscaAluno=' + encodeURIComponent(valor));
        return;
    }

    
    clearTimeout(tempobuscaAluno);

    tempobuscaAluno = setTimeout(() => {
        loadPage('listaAluno.php?pagina=1&buscaAluno=' + encodeURIComponent(valor));
    }, 3000);
}


function teclabuscaAluno(event){
    if(event.key === "Enter"){
        event.preventDefault();
        buscaAlunor(event.target.value, true);
    }
}
</script>