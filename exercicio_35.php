<?php

/*

**Exercício 35**
Peça para o usuário digitar um número e verifique se existe esse numero no array, caso não exista, informa ao usuário qual é o valor mais próximo(considere próximo +1 e -1).
Exemplo:
o usuário digitou 17, mas 17 não existe no array, então verifique se existe 18, e não, verifique se existe o 16.
Caso não exista um numero próximo, informe ao usuário.
Array Base:
[2, 4, 6, 12, 16, 25, 10, 5, 10, 9, 9, 16, 3, 11]

*/


$base = [2, 4, 6, 12, 16, 25, 10, 5, 10, 9, 9, 16, 3, 11];

echo "Digite um número: ";
$resposta = 2;

$numeroEncontrado = false;
$numeroProximo = false;
$resultado;

//boa solução, melhor que a que eu iria propor

foreach($base as $numero){

    if($numero == $resposta){

        echo "O numero informado $resposta existe";
        $numeroEncontrado = true;

        break;
        

    } elseif ($numero == $resposta + 1 ){

        echo "O numero informado não existe o mais proximo é o $numero ";
        $numeroProximo = true;
        $resultado = $numero + 1;

    } elseif ($numero == $resposta - 1){

        echo "O numero informado não existe o mais proximo é o $numero";
        $numeroProximo = true;
        $resultado = $numero - 1;
    }
} 

// if($numeroEncontrado == false && $numeroProximo == false){

//     echo "O numero informado não existe e não localizamos nenhum número proximo";
    
// }


