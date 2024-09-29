<?php

function livroExiste($livro, $biblioteca)
{
    foreach ($biblioteca as $dados) {
        if ($livro == $dados['nome']) {
            return $dados['status'];
        }
    }
    return 'inexistente';
}

$biblioteca = [
    ['nome' => 'flash', 'autor' => 'nintendo', 'ano' => 2016, 'estado' => 'novo', 'status' => 'indisponivel'],

    ['nome' => 'batman', 'autor' => 'dc', 'ano' => 2020, 'estado' => 'novo', 'status' => 'disponivel'],
    ['nome' => 'naruto', 'autor' => 'toei', 'ano' => 2001, 'estado' => 'usado', 'status' => 'disponivel'],
    ['nome' => 'dbs', 'autor' => 'toei', 'ano' => 1997, 'estado' => 'novo', 'status' => 'indisponivel']
];





$inicar = true;
while ($inicar) {
    
    echo 'Opção 1 Pegar e Opção 2 devolver: ';
    $usuario = intval(fgets(STDIN));

    switch($usuario) {

        case 1:
            echo 'Nome do livro que deja: ';
            $meuLivro = readline();
            $resposta = livroExiste($meuLivro, $biblioteca);

            switch ($resposta) {
                case 'disponivel':
                    echo 'Você pegou o livro ' . $meuLivro;

                    break;

                case 'indisponivel':
                    echo 'Esse livro está indisponível';
                    break;

                case 'inexistente':
                    echo 'Esse livro não existe';
                    break;
            }
            break;

        case 2:
            echo 'Nome do livro para devolver: ';
            $meuLivro = readline();
            $resposta = livroExiste($meuLivro, $biblioteca);

            switch ($resposta) {
                case 'disponivel':
                    echo 'Esté livro não foi emprestado';
                    break;

                case 'indisponivel':
                    echo 'Devolução conclusa';
                    break;

                case 'inexistente':
                    echo 'Esse livro não existe';
                    break;
            }
            break;


        case 3:
            $inicar = false;
            break;
    }
}
