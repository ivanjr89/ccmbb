<?php
require_once 'conexaoBanco.php';


$limiteLivro = 20;
$paginaLivro = isset($_GET['paginaLivro']) ? (int)$_GET['paginaLivro'] : 1;
$buscaLivro = isset($_GET['buscaLivro']) ? $_GET['buscaLivro'] : '';

$inicio = ($paginaLivro - 1) * $limiteLivro;


$filtro = "";
if(!empty($buscaLivro)){
    $buscaLivro = mysqli_real_escape_string($conn, $buscaLivro);

    $filtro = " and (
        nome_livro LIKE '%$buscaLivro%'
    )";
}


$sqlTotalLivro = "SELECT COUNT(*) as total
FROM livro
WHERE 1=1 $filtro";

$resultLivroTotal = mysqli_query($conn, $sqlTotalLivro);
$total = mysqli_fetch_assoc($resultLivroTotal)['total'];
$totalpaginaLivros = ceil($total / $limiteLivro);


$queryLivro = "SELECT * FROM livro where dt_exclusao is null
$filtro
ORDER BY id_livro ASC
LIMIT $inicio, $limiteLivro";

$resultLivro = mysqli_query($conn, $queryLivro);
?>

<div>
    <h4 style="text-align: center;">Relação de Livros</h4>

    <!-- 🔍 buscaLivro -->
    <div >
        <input type="text"
       id="buscaLivro"
       placeholder="Pesquisar..."
       value="<?=$buscaLivro?>"
       onkeyup="buscaLivror(this.value)"
       onkeydown="teclabuscaLivro(event)">
    </div>
    <br>    
    <table class="table table-striped table-hover">
                    <thead>
                        <th>Livro</th>
                        <th>Volume</th>
                        <th>Gênero</th>            
                            <th>Ação</th>
                    </thead>
                    <tbody>
                        
                        <?php                        
    
    if($resultLivro){
        while($rowLivro = mysqli_fetch_array($resultLivro)){
            $idLivro = $rowLivro ["id_livro"];
            $nomeLivro = $rowLivro ["nome_livro"];
            $generoLivro = $rowLivro ["genero_livro"];
            $volumeLivro = $rowLivro ["volume_livro"];

                    echo "<tr>";
                    echo "<td>$nomeLivro </td>";
                    echo "<td>$volumeLivro </td>"; 
                    echo "<td>$generoLivro </td>";                  
                        echo "<td><a href='editaLivro.php?idLivro=$idLivro' class='btn btn-primary'>Editar</a> <a href='excluiLivro.php?idLivro=$idLivro' class='btn btn-danger'>Excluir</a></td>";
                        echo "</tr>";
                    }
                }
                        ?>
                    </tbody>
                </table>

    
    <div style="margin-left:20px;">

        <?php if($paginaLivro > 1): ?>
            <button class="btn btn-primary btn-sm"
            onclick="loadPage('listaLivro.php?paginaLivro=<?=$paginaLivro-1?>&buscaLivro=<?=$buscaLivro?>')">
            <
            </button>
        <?php endif; ?>

        <?php for($i = 1; $i <= $totalpaginaLivros; $i++): ?>
            <button class="btn btn-sm <?=($i == $paginaLivro ? 'btn-success' : 'btn-secondary')?>"
            onclick="loadPage('listaLivro.php?paginaLivro=<?=$i?>&buscaLivro=<?=$buscaLivro?>')">
            <?=$i?>
            </button>
        <?php endfor; ?>

        <?php if($paginaLivro < $totalpaginaLivros): ?>
            <button class="btn btn-primary btn-sm"
            onclick="loadPage('listaLivro.php?paginaLivro=<?=$paginaLivro+1?>&buscaLivro=<?=$buscaLivro?>')">
            >
            </button>
        <?php endif; ?>

    </div>
</div>

<script id="buscaLivroEnterTimeout">
let tempobuscaLivro;

function buscaLivror(valor, forcar = false){

    
    if(forcar){
        clearTimeout(tempobuscaLivro);
        loadPage('listaLivro.php?paginaLivro=1&buscaLivro=' + encodeURIComponent(valor));
        return;
    }

    
    clearTimeout(tempobuscaLivro);

    tempobuscaLivro = setTimeout(() => {
        loadPage('listaLivro.php?paginaLivro=1&buscaLivro=' + encodeURIComponent(valor));
    }, 3000);
}


function teclabuscaLivro(event){
    if(event.key === "Enter"){
        event.preventDefault();
        buscaLivror(event.target.value, true);
    }
}
</script>