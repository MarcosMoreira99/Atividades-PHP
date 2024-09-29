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


$jogadores = ['X', 'O'];
$indiceJogador = 0;
$jogadaValida = false;

$finalizar = false;

while (!$finalizar) {
    $jogadorAtual = $jogadores[$indiceJogador];


    $jogadaValida = false;

    while (!$jogadaValida) {
        echo "Jogador $jogadorAtual, escolha a sua jogada (Linha e Coluna, você deve separar por um espaço): ";
        $escolha = trim(fgets(STDIN));
        $escolha = explode(' ', $escolha);


        if (isset($escolha[0]) && isset($escolha[1])) {
            $linha = $escolha[0];
            $coluna = $escolha[1];


            if ($linha >= 0 && $linha <= 2 && $coluna >= 0 && $coluna <= 2 && $campoJogo[$linha][$coluna] == ' ') {
                $campoJogo[$linha][$coluna] = $jogadorAtual;
                $jogadaValida = true;
            } else {
                echo "Movimento inválido, tente novamente." . PHP_EOL;
            }
        } else {
            echo "Entrada inválida, tente novamente" . PHP_EOL;
        }
    }

    exibirCampo($campoJogo);




    if ($campoJogo[0][0] == $jogadorAtual && $campoJogo[0][1] == $jogadorAtual && $campoJogo[0][2] == $jogadorAtual || $campoJogo[1][0] == $jogadorAtual && $campoJogo[1][1] == $jogadorAtual && $campoJogo[1][2] == $jogadorAtual || $campoJogo[2][0] == $jogadorAtual && $campoJogo[2][1] == $jogadorAtual && $campoJogo[2][2] == $jogadorAtual) {

        $finalizar = true;

        echo "Jogador $jogadorAtual é o vencedor!" . PHP_EOL;
    } elseif ($campoJogo[0][0] == $jogadorAtual && $campoJogo[1][0] == $jogadorAtual && $campoJogo[2][0] == $jogadorAtual || $campoJogo[0][1] == $jogadorAtual && $campoJogo[1][1] == $jogadorAtual && $campoJogo[2][1] == $jogadorAtual || $campoJogo[0][2] == $jogadorAtual && $campoJogo[1][2] == $jogadorAtual && $campoJogo[2][2] == $jogadorAtual) {

        $finalizar = true;
        echo "Jogador $jogadorAtual é o vencedor!" . PHP_EOL;
    } elseif ($campoJogo[0][0] == $jogadorAtual && $campoJogo[1][1] == $jogadorAtual && $campoJogo[2][2] == $jogadorAtual || $campoJogo[0][2] == $jogadorAtual && $campoJogo[1][1] == $jogadorAtual && $campoJogo[2][0] == $jogadorAtual) {

        $finalizar = true;
        echo "Jogador $jogadorAtual é o vencedor!" . PHP_EOL;
    } elseif ($campoJogo[0][0] != '' && $campoJogo[0][1] != ' ' && $campoJogo[0][2] != ' ' && $campoJogo[1][0] != '' && $campoJogo[1][1] != ' ' && $campoJogo[1][2] != ' ' && $campoJogo[2][0] != '' && $campoJogo[2][1] != ' ' && $campoJogo[2][2] != ' ') {

        $finalizar = true;
        echo "Fim de Jogo, empate!" . PHP_EOL;
    }

    $indiceJogador = 1 - $indiceJogador;
}
