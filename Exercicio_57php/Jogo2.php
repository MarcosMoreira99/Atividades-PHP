<?php




$campoJogo = [

    [' ', ' ', ' '],

    [' ', ' ', ' '],

    [' ', ' ', ' '],

];

function exibirCampo($campoJogo)
{
    echo "\n";

    echo (isset($campoJogo[0][0]) && $campoJogo[0][0] != '' ? $campoJogo[0][0] : ' ') . ' | ' . (isset($campoJogo[0][1]) && $campoJogo[0][1] != '' ? $campoJogo[0][1] : ' ') . ' | ' . (isset($campoJogo[0][2]) && $campoJogo[0][2] != '' ? $campoJogo[0][2] : ' ') . PHP_EOL;
    echo "_____________\n";


    echo "\n";

    echo (isset($campoJogo[1][0]) && $campoJogo[1][0] != '' ? $campoJogo[1][0] : ' ') . ' | ' . (isset($campoJogo[1][1]) && $campoJogo[1][1] != '' ? $campoJogo[1][1] : ' ') . ' | ' . (isset($campoJogo[1][2]) && $campoJogo[1][2] != '' ? $campoJogo[1][2] : ' ') . PHP_EOL;
    echo "_____________\n";
    echo "\n";

    echo (isset($campoJogo[2][0]) && $campoJogo[2][0] != '' ? $campoJogo[2][0] : ' ') . ' | ' . (isset($campoJogo[2][1]) && $campoJogo[2][1] != '' ? $campoJogo[2][1] : ' ') . ' | ' . (isset($campoJogo[2][2]) && $campoJogo[2][2] != '' ? $campoJogo[2][2] : ' ') . PHP_EOL;
    echo "\n";
}

$jogador1 = 'X';
$jogador2 = 'O';

while (true) {

    $jogadaValida1 = false;
    $jogadaValida2 = false;


    while (!$jogadaValida1) {

        echo "Jogador $jogador1, escolha a sua jogada (Linha e Coluna, voce deve separar por um espaco)";


        $escolha = trim(FGETS(STDIN));


        $escolha = explode(' ', $escolha);

        $linha = $escolha[0];
        $coluna = $escolha[1];

        if (isset($campoJogo[$linha][$coluna]) && $campoJogo[$linha][$coluna] == ' ') {

            $campoJogo[$linha][$coluna] = $jogador1;
            $jogadaValida1 = true;
            $exibirCampo = exibirCampo($campoJogo);

            if($jogadaValida1){


                while(!$jogadaValida2){
        
                    echo "Jogador $jogador2, escolha a sua jogada (Linha e Coluna, voce deve separar por um espaco)";
        
        
                    $escolha = trim(FGETS(STDIN));
            
            
                    $escolha = explode(' ', $escolha);
            
                    $linha = $escolha[0];
                    $coluna = $escolha[1];
            
                    if (isset($campoJogo[$linha][$coluna]) && $campoJogo[$linha][$coluna] == ' ') {
            
                        $campoJogo[$linha][$coluna] = $jogador2;
                        $jogadaValida2 = true;
                        $exibirCampo = exibirCampo($campoJogo);
                    }
        
                }
            }
        }

   
        else {

            echo "Movimento invalido, tente novamente.";
        }
    
       
    
   









    if ($campoJogo[0][0] == $jogador1  && $campoJogo[0][1] == $jogador1  && $campoJogo[0][2] == $jogador1 || $campoJogo[1][0] == $jogador1 && $campoJogo[1][1] == $jogador1 && $campoJogo[1][2] == $jogador1 || $campoJogo[2][0] == $jogador1 && $campoJogo[2][1] == $jogador1 && $campoJogo[2][2] == $jogador1) {

        echo "Jogador $jogador1 é o vencedor!" . PHP_EOL;
    }

    if ($campoJogo[0][0] == $jogador2   && $campoJogo[0][1] == $jogador2   && $campoJogo[0][2] == $jogador2 || $campoJogo[1][0] == $jogador2  && $campoJogo[1][1] == $jogador2  && $campoJogo[1][2] == $jogador2  || $campoJogo[2][0] == $jogador2  && $campoJogo[2][1] == $jogador2  && $campoJogo[2][2] == $jogador2) {

        echo "Jogador $jogador2 é o vencedor!" . PHP_EOL;
    }



    if ($campoJogo[0][0] ==  $jogador1 && $campoJogo[1][0] ==  $jogador1 && $campoJogo[2][0] ==  $jogador1 || $campoJogo[0][1] == $jogador1 && $campoJogo[1][1] == $jogador1  && $campoJogo[2][1] == $jogador1 || $campoJogo[0][2] == $jogador1 && $campoJogo[1][2] == $jogador1 && $campoJogo[2][2] == $jogador1) {

        echo "Jogador $jogador1 é o vencedor!" . PHP_EOL;
    }


    if ($campoJogo[0][0] == $jogador2  && $campoJogo[1][0] ==  $jogador2  && $campoJogo[2][0] ==  $jogador2  || $campoJogo[0][1] ==  $jogador2 && $campoJogo[1][1] == $jogador2 && $campoJogo[2][1] == $jogador2 || $campoJogo[0][2] == $jogador2 && $campoJogo[1][2] == $jogador2 && $campoJogo[2][2] == $jogador2) {

        echo "Jogador $jogador2 é o vencedor!" . PHP_EOL;
    }

    if ($campoJogo[0][0] == $jogador1 && $campoJogo[1][1] == $jogador1 && $campoJogo[2][2] == $jogador1 || $campoJogo[0][2] == $jogador1 && $campoJogo[1][1] == $jogador1 && $campoJogo[2][0] == $jogador1) {

        echo "Jogador $jogador1 é o vencedor!" . PHP_EOL;
    }


    if ($campoJogo[0][0] == $jogador2 && $campoJogo[1][1] == $jogador2 && $campoJogo[2][2] == $jogador2 || $campoJogo[0][2] == $jogador2 && $campoJogo[1][1] == $jogador2 && $campoJogo[2][0] == $jogador2) {

        echo "Jogador $jogador2 é o vencedor!" . PHP_EOL;
    }

    if ($campoJogo[0][0] != '' && $campoJogo[0][1] != '' && $campoJogo[0][2] != '' && $campoJogo[1][0] != '' && $campoJogo[1][1] != '' && $campoJogo[1][2] != '' && $campoJogo[2][0] != '' && $campoJogo[2][1] != '' && $campoJogo[2][2] != '') {


        echo "Fim de Jogo, empate!" . PHP_EOL;
    }
}
}