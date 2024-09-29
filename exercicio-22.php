<?php

/*
**Exercício 22**
Suponha que vc tem duas bases de dados diferentes, essa base de dados vai ser representada por 2 arrays
Array 1
['PHP', 'Java', 'JavaScript', 'C+', 'Cobol', 'SQL', 'Go', 'Swift']
Array 2
['HTML', 'CSS', 'JQuery', 'Bootstrap']
Vc precisa contatar um funcionário, e para isso precisa consultar se ele atende os requisitos(pelo menos 2 requisitos) para ser contratado, caso ele atenda os requisitos, informe que ele foi contratado, caso negativo, informe que não foi contratado.

*/

$primeira_lista = ['PHP', 'Java', 'JavaScript', 'C+', 'Cobol', 'SQL', 'Go', 'Swift', 'HTML', 'CSS', 'JQuery', 'Bootstrap'];

$segunda_lista = ['HTML', 'CSS', 'JQuery', 'Bootstrap'];


$lista = array_merge($primeira_lista, $segunda_lista);




echo "Informe suas aptidões: ";
$aptidoes = readline();

echo "Informe a suas aptidoes da segunda litsa: ";
$aptidoes2 = readline();

$requisitos_atendidos_1 = false;
$requisitos_atendidos_2 = false;
// tr 


foreach ($primeira_lista as $habilidades ){

    if ($habilidades == $aptidoes){

        $requisitos_atendidos_1 = true;
    }

    if ($habilidades == $aptidoes2){

        $requisitos_atendidos_2 = true;
    }
    


}

foreach ($segunda_lista as $habilidades ){

    if ($habilidades == $aptidoes2){

        $requisitos_atendidos_2 = true;

    }

    if($habilidades == $aptidoes){

        $requisitos_atendidos_1 = true;
    }
}

if( $requisitos_atendidos_1 == true && $requisitos_atendidos_2 == true ){

    echo "Funcionario contratado";
} else {

    echo "Funcionario não contratado, estude mais!";
}