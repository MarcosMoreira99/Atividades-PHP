<?php

/*
Precisamos cadastrar novos filmes para cada um dos gêneros abaixo:
terror, ação, comédia, animação.
então precisamos construir um sistema em que o usuário possa adicionar quantos filmes quiser a cada gênero.

*/

$filmes = ['terror', 'ação', 'comedia', 'animação'];

$contador = 0;
$menuFilmes = 'Menu de gêneros disponíveis: ' . PHP_EOL .
    '|1|para terror' . PHP_EOL .
    '|2|para ação' . PHP_EOL .
    '|3| para comédia' . PHP_EOL .
    '|4| para animação' . PHP_EOL .
    '|5| para encerrar' . PHP_EOL;


$opcao = 0;

while ($opcao != 5) {

    echo " $menuFilmes" . PHP_EOL;


    echo "Selecione o gênero de filme que deseja cadastrar. " . PHP_EOL;
    $opcao = intval(fgets(STDIN));

    if ($opcao == 1) {

        echo "Voce selecinou o genero de Terror." . PHP_EOL;

        echo "Digite o nome do filme a ser adcionado: ";
        $filmes['terror'][] = readline();

        echo "Deseja adcionar mais um filme? (s/n)";
        $resposta = readline();
    }
    if ($opcao == 2) {

        echo "Voce selecinou o genero de Ação." . PHP_EOL;
        
        echo "Digite o nome do filme a ser adcionado: ";
        $filmes['ação'][] = readline();

        echo "Deseja adcionar mais um filme? (s/n)";
        $resposta = readline();
    }

    if ($opcao == 3) {

        echo "Voce selecinou o genero de Comédia." . PHP_EOL;

        echo "Digite o nome do filme a ser adcionado: ";
        $filmes['comédia'][] = readline();

        echo "Deseja adcionar mais um filme? (s/n)";
        $resposta = readline();
    }

    if ($opcao == 4) {
        echo "Voce selecinou o genero de Animação." . PHP_EOL;

        echo "Digite o nome do filme a ser adcionado: ";
        $filmes['animação'][] = readline();

        echo "Deseja adcionar mais um filme? (s/n)";
        $resposta = readline();
    }


    if ($resposta == 'n') {
        $opcao = 5;

        echo "Obrigado por realizar o cadastro de novos filmes!" . PHP_EOL;
    }
}

echo "Filmes cadastrados com sucesso." . PHP_EOL;
print_r($filmes);
