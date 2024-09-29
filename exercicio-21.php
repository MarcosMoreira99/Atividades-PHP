<?php

/*
**Exercício 21**
Verifique no array lista de compras se tem o item que o usuário deseja verificar(ele vai digitar o item), se tiver, print a lista de compras, item por item(use o foreach para percorrer a lista), se não tiver o item, então pergunte se ele deseja adicionar o item a lista de compras, e então mostre a lista incluindo o item que ele adicionou.
Array base:
['Leite', 'Limão', 'Sal','Pimenta', 'Café','Cebola', 'Alho']
*/

$lista_compras = ['Leite', 'Limão', 'Sal', 'Pimenta', 'Café', 'Cebola', 'Alho'];

$novo_item = 'n';

echo "Informe o item que deseja verificar: ";
$item_verificado = readline();

foreach ($lista_compras as $item) {
    if ($item == $item_verificado) {
        $novo_item = 's';

        print_r($lista_compras);

    } 

}

if ($novo_item == "n"){

    echo "O item $item_verificado não está em sua lista de compras, deseja adciona-lo? (sim/nao)";
    $resposta = readline();

    if ($resposta == "sim"){

        $lista_compras[] = $item_verificado;
    
        echo "O item $item_verificado foi adcionado";   
    } else {
    
        echo "item não adcionado";
    }

} 

echo "Lista de Compras Atualizadas";
print_r ($lista_compras);
