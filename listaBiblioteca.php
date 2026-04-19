<?php
require_once 'conexaoBanco.php';


$limite = 10;
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$busca = isset($_GET['busca']) ? $_GET['busca'] : '';

$inicio = ($pagina - 1) * $limite;


$filtro = "";
if(!empty($busca)){
    $busca = mysqli_real_escape_string($conn, $busca);

    $filtro = " AND (
        a.nome_aluno LIKE '%$busca%' OR
        a.turma_aluno LIKE '%$busca%' OR
        a.serie_aluno LIKE '%$busca%' OR
        a.periodo_aluno LIKE '%$busca%' OR
        l.nome_livro LIKE '%$busca%' OR
        l.volume_livro LIKE '%$busca%'
    )";
}


$sqlTotal = "SELECT COUNT(*) as total
FROM biblioteca b
INNER JOIN aluno a ON b.id_aluno = a.id_aluno
INNER JOIN livro l ON b.id_livro = l.id_livro
WHERE b.tp_biblioteca = 0 $filtro";

$resultTotal = mysqli_query($conn, $sqlTotal);
$total = mysqli_fetch_assoc($resultTotal)['total'];
$totalPaginas = ceil($total / $limite);


$query = "SELECT 
a.periodo_aluno as periodoAluno, 
a.serie_aluno as serieAluno, 
b.id_biblioteca as idReserva, 
l.volume_livro as volume, 
a.nome_aluno as aluno, 
a.turma_aluno as turma, 
l.nome_livro as livro, 
b.dt_inicio as inicio, 
b.dt_fim as fim 

FROM biblioteca b 
INNER JOIN aluno a ON b.id_aluno = a.id_aluno 
INNER JOIN livro l ON b.id_livro = l.id_livro 

WHERE b.tp_biblioteca = 0 $filtro
ORDER BY fim ASC
LIMIT $inicio, $limite";

$result = mysqli_query($conn, $query);
?>

<div>
    <h4 style="text-align: center;">📚 Livros Reservados e NÃO devolvidos</h4>

    <!-- 🔍 BUSCA -->
    <div >
        <input type="text"
       id="busca"
       placeholder="Pesquisar..."
       value="<?=$busca?>"
       onkeyup="buscar(this.value)"
       onkeydown="teclaBusca(event)">
    </div>

    <br>

    
    <table class="table table-striped table-hover">
        <thead >
            <tr>
                <th>Aluno</th>
                <th>Turma</th>
                <th>Livro</th>
                <th>Volume</th>
                <th>Início</th>
                <th>Devolução</th>
                <th>Ação</th>
            </tr>
        </thead>

        <tbody>
        <?php
        if($result){
            while($row = mysqli_fetch_assoc($result)){

                $dateInicio = new DateTime($row["inicio"]);
                $dateFim = new DateTime($row["fim"]);
                $hoje = new DateTime();

                echo "<tr>";
                echo "<td>".$row["aluno"]."</td>";
                echo "<td>".$row["serieAluno"]." - ".$row["turma"]." - ".$row["periodoAluno"]."</td>";
                echo "<td>".$row["livro"]."</td>";
                echo "<td>".$row["volume"]."</td>";
                echo "<td>".$dateInicio->format('d-m-Y')."</td>";

                if ($dateFim <= $hoje) {
                    echo "<td style='color:red;'>".$dateFim->format('d-m-Y')." - Atrasado</td>";
                } else {
                    echo "<td>".$dateFim->format('d-m-Y')."</td>";
                }

                echo "<td style='width:130px;'>
                <a href='livroEntregue.php?idReserva=".$row["idReserva"]."' 
   class='btn btn-success btn-sm'
   data-bs-toggle='tooltip' 
   data-bs-placement='top' 
   title='Entregue'>   
   <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-upload' viewBox='0 0 16 16'>
     <path d='M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5'/>
     <path d='M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z'/>
   </svg>
</a>
                <a href='editarReservaBiblioteca.php?idReserva=".$row["idReserva"]."' 
                class='btn btn-warning btn-sm'
                class='btn btn-success btn-sm'
   data-bs-toggle='tooltip' 
   data-bs-placement='top' 
   title='Editar'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-highlighter' viewBox='0 0 16 16'>
  <path fill-rule='evenodd' d='M11.096.644a2 2 0 0 1 2.791.036l1.433 1.433a2 2 0 0 1 .035 2.791l-.413.435-8.07 8.995a.5.5 0 0 1-.372.166h-3a.5.5 0 0 1-.234-.058l-.412.412A.5.5 0 0 1 2.5 15h-2a.5.5 0 0 1-.354-.854l1.412-1.412A.5.5 0 0 1 1.5 12.5v-3a.5.5 0 0 1 .166-.372l8.995-8.07zm-.115 1.47L2.727 9.52l3.753 3.753 7.406-8.254zm3.585 2.17.064-.068a1 1 0 0 0-.017-1.396L13.18 1.387a1 1 0 0 0-1.396-.018l-.068.065zM5.293 13.5 2.5 10.707v1.586L3.707 13.5z'/>
</svg></a>
                <a href='excluirReservaBiblioteca.php?idReserva=".$row["idReserva"]."' class='btn btn-danger btn-sm'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
  <path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5'/>
</svg></a>
                </td>";

                echo "</tr>";
            }
        }
        ?>
        </tbody>
    </table>

    
    <div style="margin-left:20px;">

        <?php if($pagina > 1): ?>
            <button class="btn btn-primary btn-sm"
            onclick="loadPage('listaBiblioteca.php?pagina=<?=$pagina-1?>&busca=<?=$busca?>')">
            <
            </button>
        <?php endif; ?>

        <?php for($i = 1; $i <= $totalPaginas; $i++): ?>
            <button class="btn btn-sm <?=($i == $pagina ? 'btn-success' : 'btn-secondary')?>"
            onclick="loadPage('listaBiblioteca.php?pagina=<?=$i?>&busca=<?=$busca?>')">
            <?=$i?>
            </button>
        <?php endfor; ?>

        <?php if($pagina < $totalPaginas): ?>
            <button class="btn btn-primary btn-sm"
            onclick="loadPage('listaBiblioteca.php?pagina=<?=$pagina+1?>&busca=<?=$busca?>')">
            >
            </button>
        <?php endif; ?>

    </div>
</div>

<script id="buscaEnterTimeout">
let tempoBusca;

function buscar(valor, forcar = false){

    
    if(forcar){
        clearTimeout(tempoBusca);
        loadPage('listaBiblioteca.php?pagina=1&busca=' + encodeURIComponent(valor));
        return;
    }

    
    clearTimeout(tempoBusca);

    tempoBusca = setTimeout(() => {
        loadPage('listaBiblioteca.php?pagina=1&busca=' + encodeURIComponent(valor));
    }, 3000);
}


function teclaBusca(event){
    if(event.key === "Enter"){
        event.preventDefault();
        buscar(event.target.value, true);
    }
}
</script>