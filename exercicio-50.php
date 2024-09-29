<?php

/* Sistema para cadastro e identificação de profissionais.
Sistema em 3 etapas.

1.Desenvolva um sistema para realizar o cadastramento de pessoas, esse cadastro deve ser realizado em um array associativo. os dados coletados de cada pessoa serão:
nome, idade, sexo, profissão

Esses dados de cadastro serão armazenados em um array chamado cadastro.

Desenvolva um menu que contem as seguintes opções:
Cadastrar profissional
Listar profissionais cadastrados
Remover profissional cadastrado

A opção 1 deve ser apontada para a primeira parte do exercício.

Depois do menu liste esse profissionais um um foreach mostrando o nome e a profissão de cada um.

Desenvolva a opção de remover funcionários, onde é passado o nome e a profissão para que o
 usuário possa ser removido.
*/

$cadastro = [
    // ['Nome' => 'Jupeto', 'Idade' => 24, 'Sexo' => 'F', 'Profissão' =>  'P1'],
    // ['Nome' => 'Mauro', 'Idade' => 26, 'Sexo' => 'F', 'Profissão' =>  'P1'],
    // ['Nome' => 'Lucas', 'Idade' => 26, 'Sexo' => 'M', 'Profissão' =>  'P3']
];


$menu = 'Menu: ' . PHP_EOL .
    '|1|Cadastrar profissional' . PHP_EOL .
    '|2| Listar profissionais cadastrados' . PHP_EOL .
    '|3| Remover profissional cadastrado' . PHP_EOL .
    '|4| Sair do sistema' . PHP_EOL;

$finalizar = false;

while (!$finalizar) {

    echo $menu;

    echo "Selecione a opção desejada: " . PHP_EOL;
    $resposta = intval(fgets(STDIN));


    if ($resposta == "1") {

        echo "Nome: ";
        $nome = readline();

        echo "Idade: ";
        $idade = readline();

        echo "Sexo: ";
        $sexo = readline();

        echo "Profissão: ";
        $profissao = readline();

        $cadastro[] = ['Nome' => $nome, 'Idade' => $idade, 'Sexo' => $sexo, 'Profissão' =>  $profissao];
    }

    if ($resposta == 2) {

        $contador = 0;

        foreach ($cadastro as $dados) {

            echo 'Nome: ' . $dados['Nome'] . "\n" . 'Profissão: ' . $dados['Profissão'] . PHP_EOL;
        }
    }

    if ($resposta == 3) {

        echo "Nome do profisional a ser removido: ";
        $nomeRemover = readline();

        echo "Profissão do profisional a ser removido: ";
        $profissaoRemover = readline();

        $encontrado = false;

        foreach ($cadastro as $dados => $profissional) {

            if (($profissional['Nome'] == $nomeRemover && $profissional['Profissão'] == $profissaoRemover)) {

                unset($cadastro[$dados]);

                $encontrado = true;
                
            }
        }

        if ($encontrado) {

            echo "O profissional: $nomeRemover, profissão: $profissaoRemover foi removido com sucesso".PHP_EOL;
        } else {
            echo "O profissional $nomeRemover, profissão: $profissaoRemover não foi encontrado ".PHP_EOL;
        }

        echo "<<<< LISTA DE COLABORADORES ATUALIZADA >>>> ".PHP_EOL;

        foreach ($cadastro as $profissional) {

            echo 'Nome: ' . $profissional['Nome'] . "\n" . 'Profissão: ' . $profissional['Profissão'].PHP_EOL;
        }
    }

    if ($resposta == 4) {
        echo "Cadastros atualizados com sucesso!" . PHP_EOL;
        print_r($cadastro);
        $finalizar = true;
    }
}
