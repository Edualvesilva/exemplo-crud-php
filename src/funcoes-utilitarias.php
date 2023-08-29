<?php
function formatarPreco(float $valor):string
{
    $precoFormatado = number_format($valor, 2, ",", ".");
    return "R$ " . $precoFormatado;
};

function contarTotal(float $preco,int $quantidade):string{
    $resultado = $preco * $quantidade;
    $precoFormatado = formatarPreco($resultado);
    return "Total de ".$precoFormatado; 
};
