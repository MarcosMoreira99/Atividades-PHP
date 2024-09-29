<?php


/*

Voce tem um array com materiais escolares, verifique se existe borracha nesse array, se não existir adicione.

*/

$materiais = ['borracha', 'lapis', 'caderno', 'regua', 'lapiseira', 'estojo', 'apontador'];
$borrachaLocalizada = 'nao';


foreach ($materiais as $material ){

    // usleep(1000000);

    if ($material == "borracha"){

        $borrachaLocalizada = 'sim';
    }

}

print_r($materiais);

if ($borrachaLocalizada == "nao"){

    $materiais[] = "borracha";

}

print_r($materiais);




