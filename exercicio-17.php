<?php 

/*
**Exercício 17**
Criei um array que a partir de outro separe os números pares dos impares, gerando assim dois novos arrays.
[1, 5, 7, 10, 12, 11, 27, 48, 22, 2, 14, 17, 18, 20, 13]
*/ 

$numeros = [1, 5, 7, 10, 12, 11, 27, 48, 22, 2, 14, 17, 18, 20, 13];

$impares = [];
$pares = [];


foreach ($numeros as $numero){

    if ($numero % 2 == 0 ){

        $pares[] = $numero;


    } else {

        $impares[] = $numero;
    }
}

print_r($impares);
print_r($pares);