<?php


/*
**Exercício 13**
Faça um script que calcula a média das notas de uma turma. O programa deve ler um array de notas e calcular a média.
Esse é o array base:
[2, 9, 4, 7, 10, 9, 5, 6, 6, 10, 8, 9, 9, 4, 8, 5, 5, 4, 9, 10]

*/

$notas = [2, 9, 4, 7, 10, 9, 5, 6, 6, 10, 8, 9, 9, 4, 8, 5, 5, 4, 9, 10];

$soma = 0;

echo 'Valor da soma: ' . $soma . PHP_EOL;

//entender alias
foreach ($notas as $nota) {

    usleep(200000);
    $soma = $soma + $nota;

    echo 'Valor da soma('.$soma.' + '.$nota.'): ' . $soma . PHP_EOL;
}

$media_turma = ($soma / 20 );

echo "A media da turma é: $media_turma "; 