<?php

/*
**Exercício 25**
Crie um programa que permita ao usuário armazenar uma lista de suas músicas favoritas. O programa deve possibilitar a adição de novas músicas, a remoção de músicas da lista e a exibição da lista atualizada.

*/
$musicas = [];

echo "Informe a musica que deseja adcionar: ";
$musicas[] = readline();

echo "Informe a musica que deseja adcionar: ";
$musicas[] = readline();

echo "Informe a musica que deseja adcionar: ";

$musicas[] = readline();

print_r($musicas);


echo "Voce deseja adcionar uma nova musica? (sim/nao) ";
$resposta = readline();

if ($resposta == "sim"){

    echo "informe a musica que deseja adcionar: ";

    $musicas[] = readline();

}

echo "Deseja remover uma musica ? (sim/nao)";
$remover = readline();

if ($remover == "sim"){

    echo "informe o número da musica que deseja remover: ";

    print_r($musicas);

    $numero_musica = intval(fgets(STDIN));

    $musicas[$numero_musica] = '';

}

echo "Lista atualizada: ";
print_r ($musicas);

