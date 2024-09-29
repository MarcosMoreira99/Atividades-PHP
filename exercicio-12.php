<?php


/*

**Exercício 12**
Você tem um array com 20 valores, entre esses valores, mostre o menor valor e o maior valor.
Esse é o array base:
[10,  12, 9, 18, 15, 5, 14, 2, 44,  21, 55, 19, 97, 22, 16, 17, 30, 20, 22, 1]

*/

$valores = [10,  12, 9, 18, 15, 5, 14, 2, 44,  21, 55, 19, 97, 22, 16, 17, 30, 20, 22, 1];

$menorNumero = '';
$maiorNumero = '';

foreach ($valores as $valor){

    echo 'Valor: ' .  $valor . PHP_EOL;

    if(empty($menorNumero) && empty($maiorNumero)){
        $menorNumero = $valor;
        $maiorNumero = $valor;
    }

    if ($valor < $menorNumero){
        $menorNumero = $valor;
    }

    if ($valor > $maiorNumero){
        $maiorNumero = $valor;
    }


}


echo "O menor valor é: $menorNumero" .PHP_EOL;
echo "O maior valor é: $maiorNumero" .PHP_EOL;