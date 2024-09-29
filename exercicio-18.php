<?php

/*
**Exercício 18**
Desenvolva um programa em PHP que cria um novo array contendo a soma acumulativa dos elementos do array original.
array base.
[1, 5, 7, 10, 12, 11, 27, 48, 22, 2, 14, 17, 18, 20, 13]

*/  

$numeros = [1, 5, 7, 10, 12, 11, 27, 48, 22, 2, 14, 17, 18, 20, 13];

$soma_total = 0;


foreach ($numeros as $numero ){

    $soma_total = $soma_total + $numero;

}
echo "O total é:$soma_total";