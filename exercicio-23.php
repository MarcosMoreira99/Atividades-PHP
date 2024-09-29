<?php

/*
**Exercício 23**
**Sistema de Gerenciamento de Biblioteca**: Desenvolva um sistema que gerencie o empréstimo de livros, registrando quais livros estão emprestados e quais estão disponíveis.
Esse é o array base:
[ 'A Arte da Guerra', 'O Pequeno Príncipe', 'A Metamorfose', 'O Alienista', 'Coraline', 'Caim', 'A Morte e a Morte de Quincas Berro D\'Água', 'Matadouro-cinco', 'A morte de Ivan Ilitch', 'Uma Casa de Bonecas', 'Ratos e Homens', 'A Casa na Rua Mango']

['A Arte da Guerra', 'A Casa na Rua Mango', 'Matadouro-cinco', 'A Metamorfose']



Os livros do array um são todos que existem na biblioteca, os do array 2 são os que estão emprestados, quando o usuario solicitar um livro, só empreste e adicione no array 2 se o livro já não estiver emprestado.
*/

$livros_biblioteca = [ 'A Arte da Guerra', 'O Pequeno Príncipe', 'A Metamorfose', 'O Alienista', 'Coraline', 'Caim', 'A Morte e a Morte de Quincas Berro D\'Água', 'Matadouro-cinco', 'A morte de Ivan Ilitch', 'Uma Casa de Bonecas', 'Ratos e Homens', 'A Casa na Rua Mango'];

$livros_emprestados = ['A Arte da Guerra', 'A Casa na Rua Mango', 'Matadouro-cinco', 'A Metamorfose'];

echo 'Livros da biblioteca: ';
print_r($livros_biblioteca);

$livro_disponivel = true;

echo "Digite o nome do livro que deseja pegar emprestado: ";
$livro_solicitado = readline();

foreach ($livros_emprestados as $livros){

    if($livros == $livro_solicitado){
        $livro_disponivel = false;
    }

}



if ($livro_disponivel == true){

    $livros_emprestados[] = $livro_solicitado;

    echo "Livro $livro_solicitado emprestado! ";
    
} else{

    echo "O livro $livro_solicitado, já está emprestado a outra pessoa";
}

print_r ( $livros_emprestados);


