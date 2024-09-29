<?php

/*
Desenvolva o menu com as seguintes opções:
[1] Adicionar novos livros.
[2] Emprestar livros.
[3] Receber uma devolução de livros.
[4] Encerrar o acesso.

Parte 2 de 3
Adicionar novos livros.
Para adicionar novos livros é necessário coletar do 
terminal os seguintes valores:
Nome do livro
Autor do livro
Ano do livro
estado do livros(se novo ou usado)

array base: 
$biblioteca = [
    ['nome' => 'flash', 'autor' => 'nintendo', 'ano' => 2016, 'estado' => 'novo', 'status' => 'disponivel'],
    ['nome' => 'batman', 'autor' => 'dc', 'ano' => 2020, 'estado' => 'novo', 'status' => 'disponivel'],
    ['nome' => 'naruto', 'autor' => 'toei', 'ano' => 2001, 'estado' => 'usado', 'status' => 'disponivel'],
    ['nome' => 'dbs', 'autor' => 'toei', 'ano' => 1997, 'estado' => 'novo', 'status' => 'indisponivel']
];

O seguinte valore deve ser adicionado como padrão:
Status receberá disponível

O usuário poderá adicionar quantos livros quiser.

Parte 3 de 3

Parte 3.1 de 3
Receber uma devolução de livro.
Pergunte ao usuário quantos livros ele deseja devolver, ao receber os nomes dos livros, altere novamente o status para disponível,

Você pode emprestar até 2 livros por vez, sempre que for emprestar um livro, antes deve verificar se o status do livro está como "disponível", e apenas se estiver disponível poderá ser emprestado.
Sempre que você emprestar um livro, deverá mudar o status do livro para "emprestado".
*/


$biblioteca = [
    ['nome' => 'flash', 'autor' => 'nintendo', 'ano' => 2016, 'estado' => 'novo', 'status' => 'disponivel'],
    ['nome' => 'batman', 'autor' => 'dc', 'ano' => 2020, 'estado' => 'novo', 'status' => 'disponivel'],
    ['nome' => 'naruto', 'autor' => 'toei', 'ano' => 2001, 'estado' => 'usado', 'status' => 'disponivel'],
    ['nome' => 'dbs', 'autor' => 'toei', 'ano' => 1997, 'estado' => 'novo', 'status' => 'emprestado']
];

$menu = 'Menu: ' . PHP_EOL .
    '|1| Adicionar novos livros.' . PHP_EOL .
    '|2| Emprestar livros.' . PHP_EOL .
    '|3| Receber uma devolução de livros.' . PHP_EOL .
    '|4| Encerrar o acesso.' . PHP_EOL;

$finalizar = false;

while (!$finalizar) {
    echo $menu;

    echo "Selecione a opção desejada: " . PHP_EOL;
    $resposta = intval(fgets(STDIN));

    if ($resposta == 1) {

        echo "Quantos livros deseja adicionar? ";
        $quantidade = intval(fgets(STDIN));

        while ($quantidade > 0) {
            echo "Nome do livro: ";
            $nomeLivro =  readline();

            echo "Autor do livro: ";
            $autorLivro = readline();

            echo "Ano do livro: ";
            $anoLivro = intval(fgets(STDIN));

            echo "Estado do livro (se novo ou usado): ";
            $estadoLivro = readline();

            $biblioteca[] = ['nome' => $nomeLivro, 'autor' => $autorLivro, 'ano' => $anoLivro, 'estado' => $estadoLivro, 'status' => 'disponível'];

            $quantidade--;
        }
        echo "Livros adicionados com sucesso!" . PHP_EOL;

    } elseif ($resposta == 2) {

        $emprestados = 0;
        while ($emprestados < 2) {
            echo "Digite o nome do livro que deseja emprestar ou digite 'menu' para voltar: ";
            $livroEmprestado = readline();

            if ($livroEmprestado == 'menu') {
                $emprestados = 2;

            } else {

                $livroEncontrado = false;
                foreach ($biblioteca as $key => $livro) {

                    if ($livro['nome'] == $livroEmprestado && $livro['status'] == 'disponivel') {
                        $biblioteca[$key]['status'] = 'emprestado';
                        $emprestados++;
                        $livroEncontrado = true;
                        echo "Livro $livroEmprestado emprestado com sucesso!" . PHP_EOL;
                    }
                }
                if (!$livroEncontrado) {

                    echo "O livro não está disponível ou não foi encontrado. Por favor, escolha outro livro ou digite 'menu' para voltar." . PHP_EOL;
                }
            }
          
        }
    } elseif ($resposta == 3) {

        $devolvidos = 0;

        while ($devolvidos < 2) {

            echo "Digite o nome do livro que deseja devolver ou digite 'menu' para voltar: ";
            $livroDevolvido = readline();

            if ($livroDevolvido === 'menu') {
                $devolvidos = 2;

            } else {
                $livroEncontrado = false;

                foreach ($biblioteca as $key => $livro) {

                    if ($livro['nome'] == $livroDevolvido && $livro['status'] == 'emprestado') {
                        $biblioteca[$key]['status'] = 'disponivel';
                        $devolvidos++;
                        $livroEncontrado = true;
                        echo "Livro $livroDevolvido devolvido com sucesso!" . PHP_EOL;
                       
                    }
                }
                if (!$livroEncontrado) {
                    echo "O livro não está emprestado ou não foi encontrado. Por favor, escolha outro livro ou digite 'menu' para voltar." . PHP_EOL;
                }
            }
        }
    } elseif ($resposta == 4) {

        $finalizar = true;

        echo "Atualizando sistema..." . PHP_EOL;

        echo "SISTEMA ATUALIZADO COM SUCESSO!" . PHP_EOL;
        print_r($biblioteca);

        echo "Encerrando o acesso, até a proxima..." . PHP_EOL;
    } else {
        echo "Opção inválida. Tente novamente." . PHP_EOL;
    }
}
