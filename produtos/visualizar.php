<?php
require_once "../src/funcoes-produtos.php";
require_once "../src/funcoes-utilitarias.php";
$listaProdutos = lerProdutos($conexao);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos | Visualização</title>
    <style>
        * {
            box-sizing: border-box;
        }

        .produtos {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            width: 80%;
            margin: auto;
        }

        .produto {
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 10px;
            width: calc(33.33% - 20px);
            /* To create a 3-column layout */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .produto h3 {
            margin-top: 0;
        }

        .produto p {
            margin: 5px 0;
        }

        .produto b {
            color: #333;
        }
    </style>
</head>

<body>

    <h1>Produtos | SELECT <a href="../index.php">HOME</a></h1>
    <hr>
    <h2>Lendo e carregando todos os Produtos.</h2>
    <p><a href="inserir.php">Inserir novo produto</a></p>

    <div class="produtos">

<?php
foreach($listaProdutos as $produto){ 
     ?>
        <article class="produto">
            <h3><?=$produto["nome"]?></h3>
            <p><b>Preço: </b><?= formatarPreco($produto["preco"])?></p>
            <p><b>Quantidade: </b><?=$produto["quantidade"]?></p>
        </article>
        <?php
}
?>
    </div>


</body>

</html>