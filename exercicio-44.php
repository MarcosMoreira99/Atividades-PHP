<?php


/*
Exercício 44 

Peça ao usuário para inserir números até que o número "0" seja inserido. Use um loop while para a entrada de dados e, em seguida, um foreach para somar todos os números ímpares inseridos.


*/

$numerosImpares = [];

$soma = 0;

echo "Insira um numero, caso deseje parar deve inserir um zero ";

while (true) {

    echo "Insira um número: ";
    $numero = intval(fgets(STDIN));

    if ($numero == 0){
        break;
     
     }

    if ($numero % 2 !== 0) {

        $numerosImpares[] = $numero;
    }
}


foreach ($numerosImpares as $numeros) {

    $soma += $numeros;
}

echo "A soma dos números impares inseridos é: $soma \n";
print_r($numerosImpares);
