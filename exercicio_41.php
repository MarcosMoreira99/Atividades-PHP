<?php

/*
**Exercício 41**
Suponha que vc vá atualizar um catalogo de filmes, removendo alguns filmes e adicionando outros.

1. você precisa remover os filmes "Homem Aranha", "Oppenheimer", "Patos".
2. Você precisa adicionar 3 novos filmes "Lift", "The Underdoggs", "Badland Hunters".

Mostre o catalogo antigo, e depois mostre o catalogo atualizado, identificando respectivamente os catalogos.
Array Base:
['Avatar' ,'Homem Aranha', 'Caça Fantasmas', 'Oppenheimer', 'Patos', 'Tekken', 'Mortal Kombat']

*/

$catalogo = ['Avatar' ,'Homem Aranha', 'Caça Fantasmas', 'Oppenheimer', 'Patos', 'Tekken', 'Mortal Kombat'];
$filmesAntigos = [];
$CatalogoAtual = [];

$contador = 0;

echo "Catalgo de filmes desatualizado: ";
print_r($catalogo);

$filmesAntigos = $catalogo;

foreach ($filmesAntigos as $filmes) {

  if($filmes == 'Homem Aranha' || $filmes == 'Oppenheimer' || $filmes == 'Patos'){
    
    unset($filmesAntigos[$contador]);

  }$contador++;

}

echo "Filmes removidos com sucesso \n";
print_r($filmesAntigos);


$novosFilmes = 0;
$CatalogoAtual = $catalogo;

while($novosFilmes < 3){
    
    echo "Digite o nome dos novos filmes \n: ";
    $filmes = readline();
    $CatalogoAtual[] = $filmes;
    $novosFilmes++;

}

echo "Catalogo de filmes antigos :\n";
print_r($catalogo);

echo "Catalogo com filmes após a remoção : \n ";
print_r($filmesAntigos);

echo "Catalogo de filmes atualizados:\n";
print_r($CatalogoAtual);


