<?php

/*

Precisamos desenvolver um sistema para uma loja de celulares, o menu do sistema tem as seguintes opções:

Adicionar novos dispositivos
Vender um dispositivo
Receber uma devolução de dispositivo

ADICIONAR
Quando o usuário for adicionar novos dispositivos, precisamos perguntar a quantidade, logo depois precisamos primeiro perguntar a marca, e logo depois o modelo e então o preço. O modelo e o preço devem ser adicionado em um array associativo da marca, como no exemplo:

Marca: Apple
Modelo: iPhone 15
Preço: 5.000

$dispositivos[
'apple' => ['modelo'=>'iPhone 15', 'preco' => '5.000'], 
'samsung' => ['modelo' => 'Galaxy s24', 'preco' => '5.200']

*/

$dispositivos = [
    'apple' => [['modelo' => 'iPhone 15', 'preco' => '5.000'], ['modelo' => 'iphone 14', 'preco' => '4.500']],
    'samsung' => [['modelo' => 'Galaxy s24', 'preco' => '5.200']]
];

while (true) {

    $menu = 'Menu: ' . PHP_EOL .
        '|1|Adicionar novos dispositivos' . PHP_EOL .
        '|2| Vender um dispositivo' . PHP_EOL .
        '|3| Receber uma devolução de dispositivo' . PHP_EOL .
        '|4| Sair do sistema' . PHP_EOL;

    echo "$menu";

    echo "Selecione a opção desejada: ";
    $resposta = intval(fgets(STDIN));

    if ($resposta == 4) {

        echo "Obrigado pelo seu trabalho, até a proxima!";
        print_r($dispositivos);
        break;
    }

    if ($resposta == 1) {



        echo "Quantos dispositivos deseja adcionar? ";
        $quantidade = intval(fgets(STDIN));

        while ($quantidade  > 0) {



            echo "Marca: ";
            $marca = readline();

            echo "Modelo: ";
            $modelo = readline();

            echo "Valor: ";
            $valor = intval(fgets(STDIN));

            $dispositivos[$marca][] = ['modelo' => $modelo, 'preco' => $valor];


            $quantidade--;
        }
    }

    if ($resposta == 2) {

        echo "Marca do dispositivo vendido: ";
        $marca = readline();

        echo "Modelo do dispositivo vendido: ";
        $modelo = readline();

        $contador = 0;

        foreach ($dispositivos[$marca] as $celulares) {

            if (in_array($modelo, $celulares)) {

                unset($dispositivos[$marca][$contador]);
            } else {

                echo "Dispositivo não encontrada";
            }

            $contador++;
        }
    }

    if ($resposta == 3) {

        echo "Informe a Marca do dispositivo a ser devolvido:  ";
        $marca = readline();

        echo "Informe o modelo do dispositivo a ser devolvido:  ";
        $modelo = readline();

        echo "Informe o valor do dispositivo a ser devolvido:  ";
        $valor = intval(fgets(STDIN));

        $dispositivos[$marca][] = ['modelo' => $modelo, 'preco' => $valor];


    }

    print_r($dispositivos);
}


