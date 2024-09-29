<?php

/*
**Exercício 16**
Faça um programa que utilize `foreach` para contar quantas vezes cada elemento aparece em um array.
Esse é o array base:
['computador', 'celular', 'livro', 'celular', 'monitor', 'monitor', 'teclado', 'controle', 'controle', 'celular']
*/

$lista = ['computador', 'celular', 'livro', 'celular', 'monitor', 'monitor', 'teclado', 'controle', 'controle', 'celular'];

$contagem_item = 0;
$qtd_computador = '0';
$qtd_celular = 0;
$qtd_livro = 0;
$qtd_monitor = 0;
$qtd_teclado = 0;
$qtd_controle = 0;


foreach ($lista as $itens){

    if($itens == "computador"){

        $qtd_computador = $qtd_computador + 1;

    } 
    
    if ($itens == "celular"){

        $qtd_celular = $qtd_celular + 1;

    }

    if ($itens == "livro"){

        $qtd_livro = $qtd_livro + 1;

    }

    if ($itens == "monitor"){

        $qtd_monitor = $qtd_monitor + 1;

    }


    if($itens == "teclado"){

        $qtd_teclado = $qtd_teclado + 1;

    }

    if ($itens == "controle"){

        $qtd_controle = $qtd_controle + 1;

    }

}

echo "Computador: $qtd_computador \n Celular: $qtd_celular \n livro: $qtd_livro \n monitor: $qtd_monitor \n teclado: $qtd_teclado \n controle: $qtd_controle \n ";







