
<?php


/*
Desenvolva o sistema de um banco onde será possível depositar, sacar, fazer um pix, consultar extrato, o sistema precisa ser interativo, ou seja, o usuário só finaliza o sistema quando acessar a opção "sair". enquanto ele não sair ele poderá fazer a operação que desejar, além disso todo o histórico de transações deve ser armazenado em um array.

Oque vc precisa fazer?

Disponibilizar as Opções pata o cliente:
Menu de opções disponíveis
Deposito
Sacar
Pix
Extrato
Sair

Armazenar o histórico de transações(saque, deposito, pix) em um array.

Sempre que o cliente finalizar uma operação leve ele de volta ao menu, até que ele selecione sair.

*/

$historico = [];
$saldo = 0;
$contador = 0;

while (true) {

    $menu = 'Menu de opções disponíveis.' . PHP_EOL .
        '1 para Deposito' . PHP_EOL .
        '2 para Sacar' . PHP_EOL .
        '3 para Pix' . PHP_EOL .
        '4 para Extrato' . PHP_EOL .
        '5 para Sair' . PHP_EOL;

    echo "$menu" . PHP_EOL;

    echo "Digite a opção desejada: \n";
    $opcao = intval(fgets(STDIN));

    if ($opcao == 1) {

        echo "Digite o valor a ser depositado R$: ";
        $valor = intval(fgets(STDIN));

        if ($valor > 0) {

            $saldo = $valor;
            $historico[] =  "Deposito: +R$ $valor";
            echo "Deposito de R$ $valor reais realizado. " . PHP_EOL;
        } else {
            echo "Valor informado invalido.";
        }
    } elseif ($opcao == 2) {

        echo "Digite o valor a ser sacado: ";
        $valor = intval(fgets(STDIN));

        if ($valor > 0 && $valor <= $saldo) {

            $saldo -= $valor;

            $historico[] = "Saque: -R$ $valor";
            echo "Saque de R$ $valor realizado com sucesso." . PHP_EOL;
        } else {

            echo "Saldo insuficente para realizar o saque informado. " . PHP_EOL;
        }
    } elseif ($opcao == 3) {

        echo "Digite o valor do PIX que deseja realizar: ";
        $valor = intval(fgets(STDIN));

        if ($valor > 0 && $valor <= $saldo) {

            $saldo -= $valor;

            $historico[] =  "PIX: -R$ $valor";

            echo "Pix de $valor reais realizado com sucesso. " . PHP_EOL;
        } else {

            echo "Saldo de R$ $saldo reais e insuficiente para o pagamento via PIX de RS $valor reais .
                " . PHP_EOL;
        }
    } elseif ($opcao == 4) {

        echo "Seu saldo atual é de R$ $saldo " . PHP_EOL;

        echo "Segue o seu extrato de transações: " . PHP_EOL;

        foreach ($historico as $movimentos) {

            echo "$movimentos" . PHP_EOL;;
        }
    } elseif ($opcao == 5) {

        echo "Obrigado por ultilizar o nosso Banco. Estamos sempre a disposição! " . PHP_EOL;
        break;
    } else {
        echo "Opção invalida! Você deve selecionar uma opção valida." . PHP_EOL;
    }
}
