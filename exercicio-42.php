<?php

/*

**Exercício 42**

Desenvolva um sistema de biblioteca onde é possível adicionar novos livros, pegar livros emprestados e devolver livros.
Array Base: 
[ "Drácula", "Frankenstein", "Coraline", "Misery", "Beloved", "Duna", "It", "Carrie"]

*/


$biblioteca = ["Drácula", "Frankenstein", "Coraline", "Misery", "Beloved", "Duna", "It", "Carrie"];
$contador = 0;


echo "O que você deseja fazer? (devolver, pegar emprestado, adicionar) \n";
$resposta = readline();

if ($resposta == "adicionar") {



    while ($resposta == "adicionar") {

        echo "Nome do livro: ";
        $novoLivro = readline();


        $biblioteca[] = $novoLivro;

        echo 'Quer adicionar mais um livro? ';
        $maisUmLivro = readline();

        if ($maisUmLivro == "n") {
            $resposta = "n";
        }
    }
}




if ($resposta == "pegar emprestado") {

    echo "Informe o livro que deseja pegar emprestado :";
    $livroEmprestado = readline();


    foreach ($biblioteca as $livros) {

        if ($livros == $livroEmprestado) {

            unset($biblioteca[$contador]);
        }
        $contador++;
    }
    echo "Voce pegou o $livroEmprestado emprestado, restando os seguintes livros disponiveis: \n ";
}



if ($resposta == "devolver") {

    echo "Informe o livro que deseja devolver";
    $livroDevolvido = readline();

    $biblioteca[] =  $livroDevolvido;

    echo "Você devolveu o livro: $livroDevolvido, segue a nossa lista de livros com a sua devolução em sistema: \n";
}

echo "Biblioteca atualizada: ";
print_r($biblioteca);