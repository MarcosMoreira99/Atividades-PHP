<?php

/*
Exercicio 9:

Algumas pessoas vão realizar um passeio de barco em auto-mar, más antes de sair é necessário conferir a 
quantidade de pessoas e a 
capacidade do barco, e também é necessário verificar a
quantidade de coletes dispníveis e 
se todos os coletes estão com aptos para uso 
e também se foi feito uma vistoria nos coletes e no barco em um periodo menor que 6 meses, e só então a viagem deve ser autorizada.
*/

print "Quantidade de pessoas: ";
$quantidade_pessoas = fgets(STDIN);

print "Capacidade do Barco: ";
$capacidade_barco = fgets(STDIN);

if ($quantidade_pessoas <= $capacidade_barco) {

    print "Quantidade de coletes: ";
    $quantidade_coletes = fgets(STDIN);

    if ($quantidade_coletes >= $quantidade_pessoas) {

        print "Todos os coletes estão aptos para o uso (sim/nao): ";
        $coletes_aptos = readline();

        if ($coletes_aptos == "sim") {

            print "Quantidade de meses desde a ultima vistoria dos coletes e barco: ";
            $meses_vistoria = fgets(STDIN);

            if ($meses_vistoria < 6) {

                print "Seu passeio foi autorizado, desejamos uma otima viagem a todos!";

            } else {

                print "Não é seguro realizar o passeio. Verifique os coletes e a vistoria do barco, pois foram realizadas há mais de " . $meses_vistoria . " meses, sendo assim não poderemos prosseguir.";
            }
        } else {

            print "Não é possível prosseguir com a viagem devido a quantidade de coletes aptos para o uso. ";
        }
    } else {
        print "Não é seguro realizar o passeio, pois a quantidade de coletes é de apenas ". $quantidade_coletes ." e temos um total de " .$quantidade_pessoas ." pessoas para a viagem.";
    }

} else {

    print "A capacidade do barco foi exedida, viagem não autorizada.";
}
