<?php


/*
**Exercício 14**
Faça um script que verifique se uma palavra específica está presente em uma array fornecido.
Esse é o array base:
['vermelho', 'verde', 'azul', 'preto', 'branco', 'rosa', 'cinza', 'amarelo', 'laranja']
*/

$cores = ['vermelho', 'verde', 'azul', 'preto', 'branco', 'rosa', 'cinza', 'amarelo', 'laranja'];

echo "Informe a cor: ";
$resposta = readline();
$resposta_cor = "nao";


foreach ($cores as $cor) {

    if ($cor == $resposta ) {

        $resposta_cor = "sim";
        
    } 

} 

// echo "A cor: $resposta está presente em nossos dados. ";
echo 'A cor está presente? '. $resposta_cor;