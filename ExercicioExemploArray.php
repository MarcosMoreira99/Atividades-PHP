<?php

/*
Você fez uma lista de compras no inicio da semana, contendo alguns itens como leite, açucar, cafe, biscoito.
Más, ao decorrer da semana na quinta-feira, vc precisou adicionar novos itens, como shampoo.
e também substituir um item, que descubriu depois que havia comprado anteriormente.
*/

$listaCompras = ['leite', 'guarana', 'açucar', 'cafe', 'biscoito'];

echo 'Os meus itens da lista de compra são: ';
print_r($listaCompras);

echo 'Qual é o dia da semana? ';
$dia = readline();

if($dia == 'quinta'){

    echo 'Esqueceu de adicionar algo?';
    $resposta = readline();

    if($resposta == 's'){
        echo 'O que vc deseja adicionar?';
        $listaCompras[] = readline();
    }

    echo 'Deseja substituir algum item?';
    $resposta2 = readline();
    if($resposta2 == 's'){

        echo 'Qual a posição do item?';
        $posicao =  intval(fgets(STDIN));
       
        echo 'Por qual item deseja substituir?';
        $listaCompras[$posicao] = readline();

    }else{
        echo 'Lista completa';
    }

    echo 'A sua lista de compras atualizada é:';
    print_r($listaCompras);

}else{
    echo 'Ok';
}