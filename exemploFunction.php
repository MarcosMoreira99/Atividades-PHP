<?php

/*
**Exercício 36** 
Elabore um programa em PHP que verifica se todos os elementos de um array são iguais. Se sim, exiba uma mensagem informando que são iguais; caso contrário, informe que são diferentes. 
Array Base 1: [5, 5, 5, 5, 5, 5, 5, 5] 

Array Base 2: [2, 4, 6, 8, 10, 12, 14, 16]

*/


function saoIguais($matriz, $numeroArray)
{

    $numeroBase = $matriz[0];
    $diferentes = false;

    foreach ($matriz as $numero) {
        if ($numero !=  $numeroBase) {
            $diferentes = true;
        }
    }

    if ($diferentes == true) {

        echo "Os numeros do array base$numeroArray são diferentes \n ";
    } else {

        echo "Os numeros do array base$numeroArray são todos iguais \n";
    }
}


$grandeArray = [
    [5, 5, 5, 5, 5, 5, 5, 5],
    [2, 4, 6, 8, 10, 12, 14, 16],
    [2, 5, 6, 8, 16, 10, 14, 16],
    [6, 6, 6, 6, 6, 6, 6, 6],
    [5, 5, 5, 5, 5, 5, 5, 5],
    [2, 4, 6, 8, 10, 12, 14, 16],
    [2, 5, 6, 8, 16, 10, 14, 16],
    [6, 6, 6, 6, 6, 6, 6, 6],
    [5, 5, 5, 5, 5, 5, 5, 5],
    [2, 4, 6, 8, 10, 12, 14, 16],
    [2, 5, 6, 8, 16, 10, 14, 16],
    [6, 6, 6, 6, 6, 6, 6, 6],
    [5, 5, 5, 5, 5, 5, 5, 5],
    [2, 4, 6, 8, 10, 12, 14, 16],
    [2, 5, 6, 8, 16, 10, 14, 16],
    [6, 6, 6, 6, 6, 6, 6, 6],
    
];

$contador = 1;

foreach($grandeArray as $numeros){
    saoIguais($numeros, $contador);

    $contador ++;
}
