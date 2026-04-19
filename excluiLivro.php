<?php

$idLivro = $_GET['idLivro'];

require_once 'conexaoBanco.php';

try {

    $delete = "DELETE FROM LIVRO WHERE id_livro = $idLivro";
    mysqli_query($conn, $delete);

    echo "<script>alert('Livro Excluído com sucesso!!!');
        window.location='index2.php';</script>";

} catch (mysqli_sql_exception $e) {

    if ($e->getCode() == 1451) {

        echo "<script>alert('Não é possível excluir: este livro está sendo usado!');
    window.location='index2.php';
    </script>";
    } else {
        echo "<script>alert('Erro ao excluir o Livro!!!');
        window.location='index2.php';</script>";
    }
}

?>