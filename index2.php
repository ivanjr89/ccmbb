<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Página Principal</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/components/tooltips/">
<script src="js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
    <script src="js/loadpage.js"></script>

    <style>
        body { font-family: Arial; margin: 0; }
        .menu { background: #ffffff; padding: 10px; }
        .menu a {
            color: white;
            margin-right: 15px;
            text-decoration: none;
            cursor: pointer;
        }
        .menu a:hover { text-decoration: underline; }
        #conteudo { padding: 20px; }
    </style>
</head>
<body onload="loadPage('home.html')">
      <?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: /escola/page");
    exit();
}
?>
 <div style="text-align: right; margin-right: 20px;">
    <h2>Bem-vindo, <?php echo strtoupper($_SESSION['usuario']); ?></h2>
    <a href="logout.php" class="btn btn-danger">Sair</a>
    </div>
    <div class="menu" style="margin-top: -80px;">
        <a class="btn btn-default" onclick="loadPage('home.html')">Home</a>
        <a class="btn btn-default" onclick="loadPage('alunos.html')">Alunos</a>
        <a class="btn btn-default" onclick="loadPage('biblioteca.html')">Biblioteca</a>
        <a class="btn btn-default" onclick="loadPage('livros.html')">Livro</a>
        <a class="btn btn-default" onclick="loadPage('liberaUsuario.php')">Liberar Usuário</a>
    </div>

    <div id="conteudo"></div>

</body>
<script>
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })
</script>
<style>
.menu a {
    color: black;
    text-decoration: none; /* opcional: tira o sublinhado */
    
}
</style>
</html>
