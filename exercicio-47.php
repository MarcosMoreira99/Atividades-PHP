<?php

/*
**Exercício 47**
Você está realizando o cadastro para novos funcionários da empresa, e com isso precisa cadastrar os dados de 4 novos funcionários, e esses dados serão armazenados em um array associativo, abaixo estão os dados que vamos coletar.

nome, idade, cargo, data admissão

Esses dados serão coletados para todos os funcionários, você pode usar o while ou o for para realizar o exercício.

*/

$dados = [];

$funcionarios = [];
$contador = 0;

while($contador < 4){

    $dados = [];

    echo "nome: ";
    $dados['nome'] = readline();

    echo "idade: ";
    $dados['idade'] = readline();

    echo "cargo: ";
    $dados['cargo'] = readline();

    echo "Data de admissão: ";
    $dados["data"] = readline();

    $funcionarios [] = $dados;

    $contador++;

}


print_r($funcionarios);




