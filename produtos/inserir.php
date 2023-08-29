<?php
require_once "../src/funcoes-fabricantes.php";
$DadosFabricantes = lerFabricantes($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>`Produtos - Inserção</title>
    <style>

    </style>
</head>
<body>
    <h1>Produtos | INSERT</h1>
    <hr>

    <hr>
    <p><a href="visualizar.php"></a></p>

        <form action="" method="post">
    <p>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>
    </p>

    <p>
        <label for="preco">Preço: </label>
        <input type="number" min="10" max="10000" step="0.01" name="preco" id="preco" required>
    </p>

    <p>
    <label for="quantidade">Quantidade: </label>
        <input type="number" min="10" max="10000" step="0.01" name="qunatidade" id="quantidade" required> 
    </p>

    <p>
        <label for="fabricante">Fabricante: </label>
        <select requird name="fabricante" id="fabricante">
            <option value=""></option>
            <?php
foreach($DadosFabricantes as $dados){ ?>
  <option value="<?=$dados["id"]?>"><?=$dados["nome"]?></option>  

<?php }
?>
        </select>
    </p>

    <p>
        <label for="descricao">Descrição: </label> <br>
        <textarea name="descricao" id="descricao" cols="30" rows="3"></textarea>
    </p>

    <button type="submit">Inserir Produto</button>

        </form>
        <br>
        <a href="visualizar.php">Voltar</a>
</body>
</html>