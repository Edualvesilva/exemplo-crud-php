<?php
require_once "../src/funcoes-produtos.php";

$id = filter_input(INPUT_GET,"id",FILTER_SANITIZE_NUMBER_INT);

apagarUmProduto($conexao,$id);
header("location:visualizar.php");
?>

