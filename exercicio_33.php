<?php

/*
**Exercício 33**
Verifique os valores existentes apenas no array 1 e passe esse valor para um novo array se esse valor não existir no array 2 e 3.
Array Base 1:
[1, 3, 4, 7, 10, 11, 12, 13, 15, 17]
Array Base 2:
[2, 3, 7, 7, 10, 16, 11, 1, 1, 2]
Array Base 3:
[2, 4, 6, 12, 16, 25, 10, 5, 10, 9, 9, 16, 3, 11]
*/

$base1 = [1, 3, 4, 7, 10, 11, 12, 13, 15, 17];

$base2 = [2, 3, 7, 7, 10, 16, 11, 1, 1, 2];

$base3 = [2, 4, 6, 12, 16, 25, 10, 5, 10, 9, 9, 16, 3, 11];

$numerosUnicos = [];


foreach ($base1 as $numero){

    if (!in_array($numero, $base2) && !in_array($numero, $base3)){
        $numerosUnicos [] = $numero; 
    }
}

print_r($numerosUnicos);