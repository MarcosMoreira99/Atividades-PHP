<?php


//Exemplo 1

// $comum = ['casa', 'escola'];
// $associativo = ['primeiro' => 'casa', 'segundo' => 'escola', 'outro' => 'abacaxi' ];



// print_r($comum);
// print_r($associativo);


//Exemplo 2

// $paciente = [];

// echo 'Nome: ';
// $paciente['nome'] = readline();

// echo 'Idade: ';
// $paciente['idade'] = readline();

// echo 'Problema: ';
// $paciente['problema'] = readline();


// $paciente['id'] = 1;

// $paciente['nome'] = 'mauro';

// print_r($paciente);



//Exemplo 3


$listaFilmes = [];

$finalizar = 'n';

while($finalizar != 's'){

    $dados = [];

    echo 'Nome do filme: ';
    $dados['nome'] = readline();

    echo 'Nota de avaliaÃ§ao: ';
    $dados['nota'] = readline();

    $listaFilmes[] = $dados;

    echo 'Adicionar mais um? ';
    $resposta = readline();
    if($resposta == 'n'){
        $finalizar = 's';
    }
}

print_r($listaFilmes);
