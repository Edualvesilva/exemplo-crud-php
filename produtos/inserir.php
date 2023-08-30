<?php
require_once "../src/funcoes-fabricantes.php";
require_once "../src/funcoes-produtos.php";

$DadosFabricantes = lerFabricantes($conexao);

if (isset($_POST["inserir"])) {
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    $preco = filter_input(INPUT_POST, "preco", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $quantidade = filter_input(INPUT_POST, "quantidade", FILTER_SANITIZE_NUMBER_INT);

    // Pegaremos o value,ou seja, o valor do id do fabricante
    $fabricanteId = filter_input(INPUT_POST, "fabricante", FILTER_SANITIZE_NUMBER_INT);

    $descricao = filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_SPECIAL_CHARS);

    inserirProduto($conexao,$nome,$preco,$quantidade,$fabricanteId,$descricao);
    header("location:visualizar.php");
};

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Inserção</title>
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
            <input type="number" min="10" max="10000" step="0.01" name="quantidade" id="quantidade" required>
        </p>

        <p>
            <label for="fabricante">Fabricante: </label>
            <select requird name="fabricante" id="fabricante">
                <option value=""></option>
                <?php
                foreach ($DadosFabricantes as $dados) { ?>
                    <option value="<?= $dados["id"] ?>"><?= $dados["nome"] ?></option>

                <?php }
                ?>
            </select>
        </p>

        <p>
            <label for="descricao">Descrição: </label> <br>
            <textarea name="descricao" id="descricao" cols="30" rows="3"></textarea>
        </p>

        <button type="submit" name="inserir">Inserir Produto</button>

    </form>
    <br>
    <a href="visualizar.php">Voltar</a>
</body>

</html>