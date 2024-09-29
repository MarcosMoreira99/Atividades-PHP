<?php

/*
**Exercício 38** 
Desenvolva um programa em PHP que recebe um array de números inteiros e utiliza a função `unset` para remover todos os elementos pares do array. Exiba o array resultante. 
Array Base: [2, 5, 8, 12, 15, 18, 21, 24, 27, 30]

*/

$base = [2, 5, 8, 12, 15, 18, 21, 24, 27, 30];

$contador = 0;


foreach ($base as $numeros){

    if($numeros % 2 == 0){

        unset($base[$contador]);

    }
    $contador++;

}
print_r($base);