<?php


 /*$numero = 20;
$gera = rand(1,100);

if($gera == $numero) {
    echo "Você venceu com o número: ".$numero;

} else {
    echo "Você perdeu, tente novamente.";
    echo $gera;
    }

    */


    function inicializarEExibirTabuleiro() {
        $tabuleiro = [
            [' ', ' ', ' '],
            [' ', ' ', ' '],
            [' ', ' ', ' ']
        ];
        
        for ($i = 0; $i < 3; $i++) {
            echo $tabuleiro[$i][0] . ' | ' . $tabuleiro[$i][1] . ' | ' . $tabuleiro[$i][2] . PHP_EOL;
            if ($i < 2) echo "---------" . PHP_EOL;
        }
        
        return $tabuleiro;
    }


    function exibirTabuleiro($tabuleiro) {
        for ($i = 0; $i < 3; $i++) {
            echo $tabuleiro[$i][0] . ' | ' . $tabuleiro[$i][1] . ' | ' . $tabuleiro[$i][2] . PHP_EOL;
            if ($i < 2) echo "---------" . PHP_EOL;
        }
    }

    function checarVencedor($tabuleiro, $jogador) {
        for ($i = 0; $i < 3; $i++) {
            if (($tabuleiro[$i][0] == $jogador && $tabuleiro[$i][1] == $jogador && $tabuleiro[$i][2] == $jogador) ||
                ($tabuleiro[0][$i] == $jogador && $tabuleiro[1][$i] == $jogador && $tabuleiro[2][$i] == $jogador)) {
                return true;
            }
        }
        if (($tabuleiro[0][0] == $jogador && $tabuleiro[1][1] == $jogador && $tabuleiro[2][2] == $jogador) ||
            ($tabuleiro[0][2] == $jogador && $tabuleiro[1][1] == $jogador && $tabuleiro[2][0] == $jogador)) {
            return true;
        }
        return false;
    }
    
    function checarEmpate($tabuleiro) {
        foreach ($tabuleiro as $linha) {
            if (in_array(' ', $linha)) {
                return false;
            }
        }
        return true;
    }



    
?>

