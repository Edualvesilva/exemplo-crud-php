<?php
/* Importando o script de conexão
require_once garante que a importação
é feita somente uma vez. */
require_once "conecta.php";

// Usada em fabricantes/visualizar.php
function lerFabricantes(PDO $conexao)
{
    $sql = "SELECT  * FROM fabricantes ORDER BY nome";

    try {
        /* Método prepare(): faz uma preparação/pré config do comando SQL 
         e guarda em memória (variável consulta). */
        $consulta = $conexao->prepare($sql);

        /* Método execute():
           Executa o comando SQL no banco de dados */
        $consulta->execute();
        /* Método fetchALL()
         Buscar todos os dados da consulta como um array associativo. */
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $erro) {
        die("Erro :".$erro->getMessage());
    }


    return $resultado;
}; // Fim lerFabricantes

// Usada em fabricantes/inserir.php
function inserirFabricante (PDO $conexao, string $nomeFabricante ){
    /* :qualquercoisa -> isso indica um "named parameter" (parâmetro nomeado) */
    $sql = "INSERT INTO fabricantes(nome) VALUES(:nome)";

    try {
        $consulta = $conexao->prepare($sql);

        /* bindValue() -> permite vincular o valor existente no 
        parâmetro nomeado (:nome) à consulta que será executada.
        É necessário indicar qual é o parâmetro(:nome), de onde
        vem o valor ($nomeFabricante) e de que tipo ele é
        (PDO::PARAM_STR) */
        $consulta-> bindValue(":nome",$nomeFabricante,PDO::PARAM_STR);
        $consulta-> execute();

    } catch (Exception $erro) {
        die("Erro ao Inserir: ".$erro->getMessage());
    }
};