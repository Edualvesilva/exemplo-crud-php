<?php
/* Verificando se o Formulário/botão foi acionado */
if(isset($_POST['inserir'])){
    // Importando as funçôes e conexão
    require_once "../src/funcoes-fabricantes.php";

    // Capturando o valor digitado do nome e sanitizado
    $nome = filter_input(INPUT_POST, 'nome',FILTER_SANITIZE_SPECIAL_CHARS);

    /* Chamar a função, passar os dados de conexão e o dado (nome do fabricante) digitado
    no formulário. */
    inserirFabricante($conexao,$nome);

    /* após inserir,Redirecionamos para a visualização */
    header("location:visualizar.php");
};
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Inserção</title>
</head>

<body>
    <h1>Fabricantes | INSERT</h1>
    <hr>
    <form action="" method="post">
        <p>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome">
        </p>

        <button type="submit" name="inserir">Inserir Fabricante</button>
    </form>
    <hr>
        <p><a href="visualizar.php">Voltar</a></p>

</body>

</html>