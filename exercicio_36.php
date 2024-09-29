<?php

/*
**Exercício 36** 
Elabore um programa em PHP que verifica se todos os elementos de um array são iguais. Se sim, exiba uma mensagem informando que são iguais; caso contrário, informe que são diferentes. 
Array Base 1: [5, 5, 5, 5, 5, 5, 5, 5] 

Array Base 2: [2, 4, 6, 8, 10, 12, 14, 16]

*/


$base1 = [5, 5, 5, 5, 5, 5, 5, 5];
$base2 = [2, 4, 6, 8, 10, 12, 14, 16];

$numeroBase = $base1[0];

$diferentes = false;

foreach($base1 as $numero){

    if($numero !=  $numeroBase){
        $diferentes = true;
    }
}

$numeroBase2 = $base2[0];

$diferentes2 = false;

foreach ($base2 as $numero){

    if($numero != $numeroBase2){

        $diferentes2 = true;

    }
}

if($diferentes == true){

    echo "Os numeros do array base1 são diferentes \n ";

} else {

    echo "Os numeros do array base1 são todos iguais \n";

}

if ($diferentes2 == true){

    echo "Os numeros do array base2 são diferentes ";

}else {

    echo "Os numeros do array base2 são todos iguais";
}