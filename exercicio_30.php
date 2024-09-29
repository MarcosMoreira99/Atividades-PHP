<?php 

/*
 
**Exercício 30**
Desenvolva um programa em PHP que realiza a soma de duas matrizes e exibe o resultado.
Array Base 1:
[1, 3, 4, 7, 10, 11, 12, 13, 15, 17]
Array Base 2:
[20, 30, 7, 7, 10, 16, 11, 1, 1, 2]

*/

$matriz1 = [1, 3, 4, 7, 10, 11, 12, 13, 15, 1];

$matriz2 = [20, 30, 7, 7, 10, 16, 11, 1, 1, 2];

$resultado = array_merge($matriz1, $matriz2);


$soma = 0;

foreach ($resultado as $numero){

   $soma = $soma + $numero;
   
}


print_r($soma);