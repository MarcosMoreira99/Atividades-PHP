<?php


/*
**Exercício 27**
Elabore um programa em PHP que move todos os zeros para o final de um array, mantendo a ordem dos outros elementos.
Array base:
[5, 0, 9, 0, 0, 8, 9, 4, 0, 1]
*/

$base = [5, 0, 9, 0, 0, 8, 9, 4, 0, 1];
$vazio = [];


$contador = 0;

foreach($base as $numero){

    if ($numero == 0){

        unset($base[$contador]);
        $vazio[] = $numero;

    }

    $contador++;

}

$final = array_merge($base,$vazio);

print_r($final);





