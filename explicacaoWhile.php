<?php

// $numero = 10;

// while($numero > 1){

//     echo 'O numero é ' . $numero . PHP_EOL;

//     // $numero --;
//     // usleep(300000);

// }


// $fez = 'n';

// while($fez == 'n'){

//     echo 'E agora, já fez? ';
//     $fez = readline();

// }

// echo 'Ok, vc fez!';


$listaCompras = [];

echo 'Deseja criar uma lista de compras? ';
$resposta = readline();

if($resposta == 's'){

    $finalizarLista = 'n';

    while($finalizarLista == 'n'){

        echo 'Qual item deseja adicionar? ';
        $listaCompras[] = readline();

        echo 'Deseja adicionar mais um?';
        $respostaNovoItem = readline();

        if($respostaNovoItem == 'n'){
            $finalizarLista = 's';
        }
        
    }

}

echo 'Sua lista de compras:';
print_r($listaCompras);














