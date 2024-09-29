<?php

/*

CORRIGIR DEPOIS 


Enunciado:
Batalha pokemon, em um ginásio pokemon esta acontecendo uma batalha, determine o verncedor com base no nível e tipo do pokemon, considerando a vantagem dos tipos, exemplo, agua tem vantagems sobre fogo e etc.

se o pokemon tiver 7 níveis ou mais de diferença mesmo com desvantagem de tipo, conseguirá vencer.



Um pokemon de tipo fogo precisa ter 7 niveis a mais que um tipo agua para vencer.


*/








print "Qual o seu Pokemon? ";
$seu_pokemon = readline();

print "Qual o nivel do seu pokemon? ";
$nivel_seu_pokemon = fgets(STDIN);

print "Qual o tipo do seu Pokemon? ";
$tipo_pokemon = readline();

print "Qual o Pokemon do seu adversario? ";
$pokemon_adversario = readline();

print "Qual o nivel do Pokemon Adversario? ";
$nivel_pokemon_adversario = readline();

print "Qual o tipo do Pokemon Adversario? ";
$tipo_adversario = readline();

if ($nivel_seu_pokemon > $nivel_pokemon_adversario) {

    //Sua desvantagem de tipo sobre o adversario
    if ($tipo_pokemon == "fogo" && $tipo_adversario == "agua" || 
        $tipo_pokemon == "voador" && $tipo_adversario == "pedra" || 
        $tipo_pokemon == "agua" && $tipo_adversario == "planta" ||  
        $tipo_pokemon == "terra" && $tipo_adversario == "planta" || 
        $tipo_pokemon == "agua" && $tipo_adversario == "eletrico" || 
        $tipo_pokemon == "fada" && $tipo_adversario == "metal") {

        if ($nivel_seu_pokemon - 7 > $nivel_pokemon_adversario) {
            echo "Você venceu, seu pokemon " . $seu_pokemon . "é de tipo " . $tipo_pokemon . " ,nível" . $nivel_seu_pokemon . ", e superou a fraqueza de tipo do adversário.";
            
        } else {

            echo "Você perdeu, o " . $pokemon_adversario . " tem a vantagem de tipo, e o nível atual do seu" . $seu_pokemon . " não é suficiente para superar a fraqueza contra o tipo $tipo_adversario.";
        }
        
    } else {
        // Se não há desvantagem de tipo, verifica apenas a diferença de nível

        if ($nivel_seu_pokemon > $nivel_pokemon_adversario) {
            echo "Você venceu, seu " . $seu_pokemon . "é de tipo"  . $tipo_pokemon . ", nível " . $nivel_seu_pokemon . ", e não possui desvantagem de tipo contra o adversário.";
        }
    }





} else {
    echo "Você perdeu, O" . $pokemon_adversario . " possui um nível superior ao do seu " . $seu_pokemon;
}
