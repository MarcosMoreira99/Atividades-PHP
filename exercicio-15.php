<?php

/*
**Exercício 15**
Crie um programa que simule a reserva de assentos em um cinema, permitindo ao usuário escolher e reservar assentos. Use um array para representar os assentos disponíveis e reservados.
Esse é o array base:
['assento-01' => '', 'assento-02' => '', 'assento-03' => '', 'assento-04' => '', 'assento-05' => '', 'assento-06' => '', 'assento-07' => '', 'assento-08' => '', 'assento-09' => '', 'assento-10' => '', 'assento-11' => '', 'assento-12' => '', 'assento-13' => '', 'assento-14' => '', 'assento-15' => '']

*/

$assentos = [
    'assento-01' => '', 
    'assento-02' => '', 
    'assento-03' => '', 
    'assento-04' => '', 
    'assento-05' => '', 
    'assento-06' => '', 
    'assento-07' => '', 
    'assento-08' => '', 
    'assento-09' => '', 
    'assento-10' => '', 
    'assento-11' => '', 
    'assento-12' => '', 
    'assento-13' => '', 
    'assento-14' => '', 
    'assento-15' => '' ];

    echo "Escolha o assento que deseja: ";
    $reserva = readline();

    $reservado = '';

    foreach ($assentos as $assento){

        usleep(10000);

        echo $assento . PHP_EOL;

        if (empty($assento)){

            $reservado = 'nao';

        }

    }

    echo 'Deseja reservar o assento ' . $reserva . '(s/n)?';
    $confirmarReserva = readline();

    if($confirmarReserva == 's'){

        $assentos[$reserva] = 'Reservado';

    }

    print_r($assentos);
    










