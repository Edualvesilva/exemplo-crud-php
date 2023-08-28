<?php
/* Importando as Funções de manipulação de fabricantes */
require_once "../src/funcoes-fabricantes.php";

/* Guardando o retorno/resultado da função lerFabricantes */
$DadosFabricantes = lerFabricantes($conexao);

/* Guardando o retorno/resultado da função lerFabricantes */
$quantidade = count($DadosFabricantes);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Visualização</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Fabricantes | SELECT</h1>
    <p><a href="../index.php">HOME</a></p>
    <hr>
    <h2>Lendo e carregando todos os fabricantes.</h2>
    <p><a href="inserir.php">Inserir novo Fabricante</a></p>

<?php
    if(isset($_GET["status"]) && $_GET["status"] === "sucesso"){ ?>
        <h2 style="color: blue">Fabricante atualizado com sucesso!</h2>
 <?php   };
?>


    <table>
        <caption>Lista de Fabricantes: <?= $quantidade ?></caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Operações</th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($DadosFabricantes as $dados) {
            ?> <tr>
                    <td><?= $dados["id"] ?></td>
                    <td><?= $dados["nome"] ?></td>

                    <!-- Link DINÂMICO
                   A URL do href precisa de parâmetro com dados 
                   dinâmicos (no caso,o ID de cada fabricante) -->
                    <td><a href="atualizar.php?id=<?= $dados["id"] ?>">Editar</a>
                        <a href="apagar.php?id=<?= $dados["id"]?>">Excluir</a>
                    </td>


                </tr>
            <?php
            }; ?>
        </tbody>
    </table>

</body>

</html>