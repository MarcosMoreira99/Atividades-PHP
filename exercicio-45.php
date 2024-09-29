<?php

/*

**Exercício 45** 

Crie um sistema de votação para eleger o melhor filme do ano 2023. Inicie com um array de filmes e permita que os usuários votem nos filmes pelo índice do array. Use um loop `while` para aceitar votos até que o usuário digite "fim". Após o término da votação, use `foreach` para contar e exibir o resultado da votação.

*/

$filmes = ['Homem-aranha', 'Batman', 'Flash', 'Panico', 'Jonh Wick'];

$votos = [];
$contador = 0;

print_r($filmes);

echo "Digite o nome do filme que deseja votar ou fim para encerrar a votação: \n";
$voto = readline();

while ($voto != "fim") {

    if (in_array($voto, $filmes)) {
        
        if(empty($votos[$voto])){
            $votos[$voto] = 1;
            echo "Você votou em : $voto \n";

        }else{
            $votos[$voto]++;

        }
    } 
    echo "Digite o nome do filme que deseja votar ou fim para encerrar a votação: \n";
    $voto = readline();

}

$mais_votados = 0;
$filmeMaisVotado = "";


foreach($votos as $filme => $count_votos){

    echo "$filme: $count_votos votos \n";

    if($voto > $mais_votados){

        $mais_votados = $voto;
        $flimeMaisVotados = $filme;
    }

}

echo "O filme vencedor da votação de 2023 foi: $flimeMaisVotados";