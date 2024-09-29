<?php

/*
**Exercício 31**
Crie um programa em PHP que remove os elementos duplicados de um array, mantendo apenas a primeira ocorrência de cada elemento.
Array Base 1:
[20, 30, 7, 7, 10, 16, 11, 1, 1, 2]
*/

$numeros = [20, 30, 7, 7, 10, 16, 11, 1, 1, 2];
$numUnicos = [];

foreach ($numeros as $numero){
   
    if(!in_array($numero ,$numUnicos)){


        $numUnicos[] = $numero;
        
    } else {

        echo "Numero repetido: $numero \n";
    }

}

print_r($numUnicos);
