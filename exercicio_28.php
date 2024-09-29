<?php

/*
**Exercício 28**
Crie um programa em PHP que realiza a busca por um elemento em uma matriz e exibe a posição onde o elemento foi encontrado.

[1, 5, 7, 10, 12, 11, 27, 48, 22, 2, 14, 17, 18, 20, 13]


echo "informe o elemento que deseja saber a posição: ";
$resposta = intval(fgets(STDIN));

$posicao = 0;
$validacao = false;

$elemento = [1, 5, 7, 10, 12, 11, 27, 48, 22, 2, 14, 17, 18, 20, 13];

print_r($elemento);

foreach ($elemento as $local){

    if ($local == $resposta){

        echo "A posição do elemento informado é $posicao";
        $validacao = true;
    }

    $posicao++;

}

if($validacao == false){
    echo 'Numero inexistente';
}
