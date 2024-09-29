<?php


/*
Verifique na lista de numeros se existe o numero 47
*/


$numeros = [10, 48, 12, 14, 12];
$numero_existe = 'nao';


foreach ($numeros as $numero){

    if ($numero == "47"){

        $numero_existe = 'sim';
    }
}
echo "O numero existe: $numero_existe";
