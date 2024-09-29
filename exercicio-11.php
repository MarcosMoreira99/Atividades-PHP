<?php


/*

**Exercício 11**
Escreva um script que recebe um array de números inteiros e classifica cada número como 'positivo', 'negativo' ou 'zero'. Exiba o resultado para cada número.
Esse é o array base:
[10, -5, 80, 33, -1, -74, 14, -0, -36, 37, 55, -62, 0, 22, 15, -17, 44, 66, 2, 69]

*/



$numeros = [10, -5, 80, 33, -1, -74, 14, -0, -36, 37, 55, -62, 0, 22, 15, -17, 44, 66, 2, 69];

foreach($numeros as $numero){

    usleep(1000000);

    if ($numero > 0) {

        echo "$numero é positivo" . PHP_EOL;

    }elseif($numero < 0) {

        echo "$numero é negativo " . PHP_EOL;

    }else {

        echo "$numero é zero " . PHP_EOL;
    }


}

