<?php


function livroEncontrado($livro, $biblioteca){
    foreach ($biblioteca as $key => $registros) {
        if ($livro == $registros['nome']) {

            return ['status' => $registros['status'], 'posicao' => $key];
        }
    }
    return ['status' => 'inexistente'];
}

function quantidadeLivros($status, $biblioteca){
    
    $contador = 0;
    foreach ($biblioteca as $livro) {

        if ($livro['status'] == $status) {
            $contador++;
        }
    }
    return $contador++;
}

$biblioteca = [
    ['nome' => 'flash', 'autor' => 'nintendo', 'ano' => 2016, 'estado' => 'novo', 'status' => 'emprestado'],
    ['nome' => 'flash2', 'autor' => 'nintendo', 'ano' => 2016, 'estado' => 'novo', 'status' => 'emprestado'],
    ['nome' => 'batman', 'autor' => 'dc', 'ano' => 2020, 'estado' => 'novo', 'status' => 'emprestado'],
    ['nome' => 'naruto', 'autor' => 'toei', 'ano' => 2001, 'estado' => 'usado', 'status' => 'disponivel'],
    ['nome' => 'dbs', 'autor' => 'toei', 'ano' => 1997, 'estado' => 'novo', 'status' => 'emprestado']
];

$menu = 'Menu: ' . PHP_EOL .
    '|1| Adicionar novos livros.' . PHP_EOL .
    '|2| Emprestar livros.' . PHP_EOL .
    '|3| Receber uma devolução de livros.' . PHP_EOL .
    '|4| Encerrar o acesso.' . PHP_EOL;


$iniciar = true;
while ($iniciar) {

    echo $menu;
    echo "Selecione a opção que deseja: ";
    $opcao = readline();

    switch ($opcao) {

        case 1:
            echo "Nome do livro: ";
            $nomeLivro = readline();

            echo "Autor do livro: ";
            $autorLivro = readline();

            echo "Ano do livro: ";
            $anoLivro = intval(fgets(STDIN));

            echo "Estado do livro (se novo ou usado): ";
            $estadoLivro = readline();

            $biblioteca[] = ['nome' => $nomeLivro, 'autor' => $autorLivro, 'ano' => $anoLivro, 'estado' => $estadoLivro, 'status' => 'disponivel'];
            break;

        case 2:

            echo "Quantos livros deseja pegar: (Máximo 2)";
            $resposta = intval(fgets(STDIN));

            $qtd_disponivel = quantidadeLivros('disponivel', $biblioteca);
            $qtd_emprestada = 0;

            if ($qtd_disponivel >= $resposta && $resposta <= 2) {

                while ($qtd_emprestada < $resposta) {

                    echo "Nome do livro: ";
                    $nomeLivro = readline();

                    $retorno = livroEncontrado($nomeLivro, $biblioteca);

                    switch ($retorno['status']) {

                        case 'disponivel';
                            $biblioteca[$retorno['posicao']]['status'] = 'emprestado';
                            $qtd_emprestada++;

                            echo "Voce pegou emprestado o livro $nomeLivro" . PHP_EOL;
                            break;

                        case 'emprestado';
                            echo "O livro $nomeLivro já está emprestado, escolha outro livro " . PHP_EOL;
                            break;

                        case 'inexistente';
                            echo "O livro: $nomeLivro não existe em nosso acervo. " . PHP_EOL;
                            break;
                    }
                }
            } else {

                echo "Quantidade indisponivel. " . PHP_EOL;
            }
            break;

        case 3:

            echo "Quantos livros deseja devolver? (Máximo 2)";
            $resposta1 = intval(fgets(STDIN));

            $qtd_emprestada = quantidadeLivros('emprestado', $biblioteca);
            $qtd_disponivel = 0;

            if ($qtd_emprestada >= $resposta1 && $resposta1 <= 2) {

                while ($qtd_disponivel < $resposta1) {

                    echo "Nome do livro: ";
                    $nomeLivro = readline();

                    $retorno = livroEncontrado($nomeLivro, $biblioteca);

                    switch ($retorno['status']) {

                        case 'emprestado';

                            $biblioteca[$retorno['posicao']]['status'] = 'disponivel';
                            $qtd_disponivel++;

                            echo "Voce devolveu o livro $nomeLivro" . PHP_EOL;
                            break;

                        case 'disponivel';
                            echo "O livro $nomeLivro não está emprestado, escolha outro livro " . PHP_EOL;
                            break;

                        case 'inexistente';
                            echo "O livro: $nomeLivro não existe em nosso acervo. " . PHP_EOL;
                            break;
                    }
                }
            } else {

                echo "Quantidade indisponivel. " . PHP_EOL;
            }
            break;

        case 4:

            $iniciar = false;
            echo "Obrigado por utilizar os nossos servicos, ate mais..." . PHP_EOL;
            echo "<<< SEGUE A LISTA ATUALIZADA DO NOSSO ACERVO >>>: " . PHP_EOL;
            print_r($biblioteca);
            break;
    }
}
