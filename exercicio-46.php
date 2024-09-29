<?php

/*

**Exercício 46**
 arrays associativos.

Solicite que o usuário adicione o nome, idade, altura e peso, e adicione esses valores em um array associativo e no final mostre esse array com esses dados.


*/

$dados = [];

echo "Informe o seu nome: ";
$dados['nome'] = readline();

echo "Informe sua idade: ";
$dados ['idade'] = readline();

echo "Informe sua altura: ";
$dados['altura'] = readline();

echo "Informe seu peso (Kg): ";
$dados['peso'] = readline();

print_r($dados);
