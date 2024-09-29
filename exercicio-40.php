<?php

/*

**Exercício 40**
Crie um script em PHP que use um loop while para contar de 1 até 10 e armazene cada número em um array. No final, imprima o array.

*/


$base = [];

$contador = 1;

    while($contador <= 10){

        $base[] = $contador;

        $contador++;
    }


print_r($base);

