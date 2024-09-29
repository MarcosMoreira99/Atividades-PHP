<?php

/*
**Exercício 20**
Solicite que o usuário insira um novo filme em um array de filmes, após inserir o novo file, pergunte se o usuário quer ver o catalogo atualizado, se sim, mostre o catalogo para ele.
Array Base:
['Homem Aranha', 'Pânico', 'Lanterna Verde', 'A múmia']
*/



$lista_filmes = ['Homem Aranha','Pânico', 'Lanterna Verde', 'A múmia'];

echo "Insira o nome de um novo filme: ";
$novo_filme = readline();

$lista_filmes[] = $novo_filme;

echo "Deseja verificar a lista atualizada? (sim/nao): ";
$resposta = readline();


if ($resposta == "sim") {

    echo "Lista de filmes atualizada: \n";
    foreach ($lista_filmes as $filmes) {
        echo "$filmes . \n";

    }
    

}else {

    echo "Tudo bem! \n";

}





