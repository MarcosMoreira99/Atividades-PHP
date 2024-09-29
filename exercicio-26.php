<?php

/*
**Exercício 26**
Crie um programa em PHP que compacta um array, removendo os valores nulos e mantendo apenas os valores não nulos.
Array base:
[5, '', '9', '14', '2', '8', '9', '4', '', '1']

*/
 $valores = [5, '', '9', '14', '2', '8', '9', '4', '', '1'];


$compacta = [];
$contador = 0;

foreach($valores as $valor){

    if(empty($valor)){

        unset($valores[$contador]);

    }

    $contador++;
}

print_r($valores);
