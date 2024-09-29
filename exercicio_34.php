<?php


/*
    
**Exercício 34**
Verifique os valores existentes nos 3 arrays e passe esse valor para um novo array:
[1, 3, 4, 7, 10, 11, 12, 13, 15, 17]
Array Base 2:
[2, 3, 7, 7, 10, 16, 11, 1, 1, 2]
Array Base 3:
[2, 4, 6, 12, 16, 25, 10, 5, 10, 9, 9, 16, 3, 11]

*/


$base1 = [1, 3, 4, 7, 10, 11, 12, 13, 15, 17];

$base2 = [2, 3, 7, 7, 10, 16, 11, 1, 1, 2];

$base3 = [2, 4, 6, 12, 16, 25, 10, 5, 10, 9, 9, 16, 3, 11];

$valores_comuns = [];

foreach ($base1 as $numeros){

    if(in_array($numeros, $base2) && in_array($numeros, $base3)){

        $valores_comuns[] = $numeros;
    }
}

print_r($valores_comuns);


