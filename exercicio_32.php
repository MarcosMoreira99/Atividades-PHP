<?php

/*
**Exercício 32**
Elabore um programa em PHP que recebe dois arrays e utiliza a função `in_array` para verificar se existe pelo menos um elemento em comum entre eles.
Array Base 1:
[1, 3, 4, 7, 10, 11, 12, 13, 15, 17]
Array Base 2:
[2, 3, 7, 7, 10, 16, 11, 1, 1, 2]

*/
$primeiro = [1, 3, 4, 7, 10, 11, 12, 13, 15, 17];

$segundo = [2, 3, 7, 7, 10, 16, 11, 1, 1, 2];

$numerosComuns = [];

$numero_comum = false;

foreach ($primeiro as $numero){

    if(in_array($numero, $segundo)){

        $numero_comum = true;
        $numerosComuns[] = $numero;

    }
} 

if ($numero_comum == true){

    echo "Existem números em comum entre os arrays";
}

print_r($numerosComuns);

