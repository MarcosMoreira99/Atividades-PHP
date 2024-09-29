<?php


/*
**Exercício 37** 
Desenvolva um programa em PHP que recebe dois arrays de números inteiros e realiza a multiplicação elemento por elemento, criando um novo array com o resultado. Exiba o array resultante. 

Array Base 1: [1, 2, 3, 4, 5] 
Array Base 2: [2, 4, 6, 8, 10]

*/
function multiplicarArrays($base, $multiplicadorInicial){


    foreach ($base as $numero){

        if($multiplicadorInicial == 0){

            $multiplicadorInicial = $numero;
        }

        $multiplicadorInicial = $numero * $multiplicadorInicial;
       
    }

    return $multiplicadorInicial;

}

$base1 = [1, 2, 3, 4, 5];
$base2 = [2, 4, 6, 8, 10];
$base3 = [20, 4, 6, 80, 10];

$MB1 = multiplicarArrays($base1, 0);
$MB2 = multiplicarArrays ($base2, $MB1);

echo "$MB2 \n";


