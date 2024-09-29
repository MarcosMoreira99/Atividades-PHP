<?php

/*
**Exercício 19**
Crie um programa em PHP que concatena dois arrays de números inteiros e exibe o array resultante.
[10, 20, 30, 40, 50, 60]
[70, 80, 90, 91, 92, 93]

*/

$numero1 = [10, 20, 30, 40, 50, 60];

$numero2 = [70, 80, 90, 91, 92, 93];

foreach ($numero1 as $numero){

   $numero2[] = $numero;
 
}

print_r($numero2);