<?php


/*
**Exercício 39**

Criei um catalogo com 10 filmes para exibição em cinemas, utilize o while para armazenar esses filmes em um array e depois exiba esse array que é o catalogo.


*/

$catalogoFilmes= [];

$contadorFilmes = 0;

while ($contadorFilmes < 10){

    echo "Informe o filme que deseja adcionar: ";
    $filme = readline();

    $catalogoFilmes[] = $filme;

    $contadorFilmes++;
}

echo "Catalogo de filmes em cartaz: ";
print_r($catalogoFilmes);
