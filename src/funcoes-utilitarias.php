<?php
function formatarPreco(float $valor): string
{
    $precoFormatado = number_format($valor, 2, ",", ".");
    return "R$ " . $precoFormatado;
};
