<?php

/*

CORRIGIR DEPOIS 

Desenvolva um código que sicite ao usuário o seu ano de nascimento (apenas o ano) se o ano de nascimento for menor que 2006 informe que o usuário está apto ao alistamento militar, e pergunte se ele deseja se alistar ou não, caso ele deseje se alistar, pergunte a altura e peso, se a altura for maior que 1.60 e o peso for maior que 50KG, informe que o usuário foi convocado, caso contrário, informe que o  usuário não atende aos requisitos
*/

print "Nome: ";
$nome = readline();

print "Ano de nascimento: ";
$ano_nascimento = fgets(STDIN);

if ($ano_nascimento < 2006) {

    print "Você está apto para se alistar, ";

    print "Deseja se alistar? (sim/nao): ";
    $resposta = readline();

    if ($resposta == "sim") {

        print "Peso: ";
        $peso = fgets(STDIN);
        print "Altura: ";
        $altura = fgets(STDIN);

        if ($altura > 1.60 && $peso > 50) {

            print "Você foi convocado para o alistamento militar";
        } else {

            print "Você não atende aos requisitos para o alistamento militar";
        }
    } else {
        print "Agradecemos sua resposta. Caso deseje se alistar no futuro, estamos à disposição.";
    }
} else {

    print "Você não está apto para o alistamento militar.";
}
