<?php

/*
**Exercício 24**
Você tem um array vazio com 10 posições, peça que o usuário guarde um item em cada posição do array e no final mostre a lista de itens guardados no array para o usuário.
Array base:
['', '', '', '', '', '', '', '', '', '']

*/

$lista = ['', '', '', '', '', '', '', '', '', ''];

$contador = 0;


foreach ($lista as $itens){

    echo "Informe o item que deseja adcionar na posição $contador: ";

    $lista[$contador] = readline();
    $contador++;

}

echo "Lista de itens";

print_r($lista);