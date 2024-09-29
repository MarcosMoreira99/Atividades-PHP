<?php
/*

Exercício 53
Você está gerenciando dispositivos de escola, e precisa saber quais dispositivos precisam ser atualizados, para isso, você vai solicitar do usuário o os(Sistema operacional) e a versão que eles deveriam estar.

Após isso pergunte se o usuário deseja forçar a atualização do sistema operacional, caso positivo, verifique se esse usuário está conectado a uma rede(ssid_rede) e se tem mais que 50% de bateria, se sim, atualize esses dispositivos, caso algo dê errado, mostre ao usuário o motivo do erro(rede, bateria).

FUNÇÃO 1
Criei uma função que receba o "os", "versaoOS" e uma operação(menor, maior, igual, diferente) e um array e retorne todos os dados dos dispositivos que a regra se aplica.;

*/


function sistemaOperacional($os, $dados)
{

    $sistemaOp = [];

    foreach ($dados as $key => $sistema) {

        if ($os == $sistema['os']) {

            $sistemaOp[] = $sistema;
        }
    }
    return  $sistemaOp;
}


function versaoDispositivos($os, $versao, $operacao, $dados)
{

    $dispositivosFiltrados = [];

    switch ($operacao) {
        case "maior":
            foreach ($dados as $dispositivo) {
                if ($dispositivo['os'] == $os && $dispositivo['versaoOS'] > $versao) {
                    $dispositivosFiltrados[] = $dispositivo;
                }
            }
            break;
        case "menor":
            foreach ($dados as $dispositivo) {
                if ($dispositivo['os'] == $os && $dispositivo['versaoOS'] < $versao) {
                    $dispositivosFiltrados[] = $dispositivo;
                }
            }
            break;


        case "igual":

            foreach ($dados as $dispositivo) {
                if ($dispositivo['os'] == $os && $dispositivo['versaoOS'] == $versao) {
                    $dispositivosFiltrados[] = $dispositivo;
                }
            }
            break;

        case "diferente":

            foreach ($dados as $dispositivo) {
                if ($dispositivo['os'] == $os && $dispositivo['versaoOS'] != $versao) {
                    $dispositivosFiltrados[] = $dispositivo;
                }
            }
            break;

        default:
            break;
    }

    return $dispositivosFiltrados;
}






$dados = [

    ['modelo' => 'iPhone 15 pro max', 'os' => 'iOS', 'versaoOS' => '17.0', 'nome' => 'mauro', 'ssid_rede' => 'lucas_5G', 'bateria' => '70', 'modo_perdido' => true, 'nome_os' => 'iOS 17', 'serial_number' => 'XTA548B'],

    ['modelo' => 'Macbook Air', 'os' => 'macOS', 'versaoOS' => '13.3.1', 'nome' => 'lucas', 'ssid_rede' => 'lucas_5G', 'bateria' => '98', 'modo_perdido' => false, 'os_nome' => 'Ventura', 'serial_number' => 'ZBAT9751'],

    ['modelo' => 'Apple TV', 'os' => 'tvOS', 'versaoOS' => '10.1', 'nome' => 'helio', 'ssid_rede' => '', 'bateria' => '100', 'modo_perdido' => false, 'nome_os' => 'Apple Tv 10', 'serial_number' => 'OIS5454'],


    ['modelo' => 'iPhone 14', 'os' => 'iOS', 'versaoOS' => '13.5', 'nome' => '', 'ssid_rede' => '', 'bateria' => '5', 'modo_perdido' => true, 'nome_os' => 'iOS 16'],

    ['modelo' => 'iPhone 12', 'os' => 'iOS', 'versaoOS' => '16.7', 'nome' => 'lucas', 'ssid_rede' => 'claro_2.4G', 'bateria' => '12', 'modo_perdido' => false, 'nome_os' => 'iOS 16'],

    ['modelo' => 'Macbook Pro', 'os' => 'macOS', 'versaoOS' => '10.3', 'nome' => 'mauro', 'ssid_rede' => 'lucas_5G', 'bateria' => '98', 'modo_perdido' => false, 'nome_os' => 'Catalina'],

    ['modelo' => 'iPhone 16', 'os' => 'iOS', 'versaoOS' => '18.0', 'nome' => 'ana', 'ssid_rede' => 'ana_5G', 'bateria' => '85', 'modo_perdido' => false, 'nome_os' => 'iOS 18'],

    ['modelo' => 'Macbook Pro 14"', 'os' => 'macOS', 'versaoOS' => '15.2', 'nome' => 'julio', 'ssid_rede' => 'julio_5G', 'bateria' => '45', 'modo_perdido' => true, 'nome_os' => 'Monterey'],

    ['modelo' => 'iPad Pro', 'os' => 'iPadOS', 'versaoOS' => '15.4', 'nome' => 'carla', 'ssid_rede' => 'carla_5G', 'bateria' => '92', 'modo_perdido' => false, 'nome_os' => 'iPadOS 15'],

    ['modelo' => 'iPhone 13 Mini', 'os' => 'iOS', 'versaoOS' => '15.1', 'nome' => 'roberto', 'ssid_rede' => 'vivo_5G', 'bateria' => '77', 'modo_perdido' => false, 'nome_os' => 'iOS 15'],

    ['modelo' => 'Apple Watch Series 7', 'os' => 'watchOS', 'versaoOS' => '8.0', 'nome' => 'tina', 'ssid_rede' => '', 'bateria' => '60', 'modo_perdido' => false, 'nome_os' => 'watchOS 8'],

    ['modelo' => 'Mac Mini M1', 'os' => 'macOS', 'versaoOS' => '11.2', 'nome' => 'gustavo', 'ssid_rede' => 'gustavo_5G', 'bateria' => '100', 'modo_perdido' => false, 'nome_os' => 'Big Sur'],


    ['modelo' => 'iPhone 16 Pro', 'os' => 'iOS', 'versaoOS' => '18.2', 'nome' => 'fernanda', 'ssid_rede' => 'fernanda_5G', 'bateria' => '40', 'modo_perdido' => false, 'nome_os' => 'iOS 18'],

    ['modelo' => 'Macbook Pro 16"', 'os' => 'macOS', 'versaoOS' => '15.4', 'nome' => 'pedro', 'ssid_rede' => 'pedro_5G', 'bateria' => '75', 'modo_perdido' => false, 'nome_os' => 'Monterey'],

    ['modelo' => 'iPad Air', 'os' => 'iPadOS', 'versaoOS' => '14.6', 'nome' => 'maria', 'ssid_rede' => 'maria_5G', 'bateria' => '58', 'modo_perdido' => false, 'nome_os' => 'iPadOS 14'],

    ['modelo' => 'iPhone SE 3rd Gen', 'os' => 'iOS', 'versaoOS' => '15.0', 'nome' => 'sergio', 'ssid_rede' => 'sergio_2.4G', 'bateria' => '20', 'modo_perdido' => true, 'nome_os' => 'iOS 15'],

    ['modelo' => 'Apple Watch Series 6', 'os' => 'watchOS', 'versaoOS' => '7.5', 'nome' => 'livia', 'ssid_rede' => '', 'bateria' => '33', 'modo_perdido' => false, 'nome_os' => 'watchOS 7'],

    ['modelo' => 'iMac 24"', 'os' => 'macOS', 'versaoOS' => '11.5', 'nome' => 'rafael', 'ssid_rede' => 'rafael_5G', 'bateria' => '100', 'modo_perdido' => false, 'nome_os' => 'Big Sur'],

    ['modelo' => 'iPhone 15', 'os' => 'iOS', 'versaoOS' => '17.1', 'nome' => 'bruna', 'ssid_rede' => 'bruna_5G', 'bateria' => '65', 'modo_perdido' => false, 'nome_os' => 'iOS 17'],

    ['modelo' => 'Macbook Air M2', 'os' => 'macOS', 'versaoOS' => '16.0', 'nome' => 'tiago', 'ssid_rede' => 'tiago_5G', 'bateria' => '90', 'modo_perdido' => false, 'nome_os' => 'Ventura'],

    ['modelo' => 'iPad Mini', 'os' => 'iPadOS', 'versaoOS' => '15.2', 'nome' => 'daniela', 'ssid_rede' => 'daniela_5G', 'bateria' => '70', 'modo_perdido' => false, 'nome_os' => 'iPadOS 15'],

    ['modelo' => 'iPhone 17', 'os' => 'iOS', 'versaoOS' => '19.0', 'nome' => 'carlos', 'ssid_rede' => 'carlos_5G', 'bateria' => '50', 'modo_perdido' => false, 'nome_os' => 'iOS 19'],

    ['modelo' => 'Apple Watch SE', 'os' => 'watchOS', 'versaoOS' => '8.2', 'nome' => 'julia', 'ssid_rede' => '', 'bateria' => '45', 'modo_perdido' => false, 'nome_os' => 'watchOS 8']

];
echo "Ultima versao do dispositivo: ";
//last_version
$ultima_versao = 19.0; //floatval(fgets(STDIN));

echo "Sistema operacional: ";
$os = 'iOS'; //readline();

$dispositivos_atualizar = versaoDispositivos($os, $ultima_versao, 'menor', $dados);

        //devices_update
foreach ($dispositivos_atualizar as $dispositivos) {


    if ($dispositivos['versaoOS'] < $ultima_versao) {

            //device
        if ($dispositivos['ssid_rede'] != '' && $dispositivos['bateria'] > '50') {

            echo 'nome: ' . $dispositivos['nome'] . ' | modelo:  ' . $dispositivos['modelo'].PHP_EOL;
            echo 'Atualizado com sucesso'.PHP_EOL;
            echo '-------------------------------'.PHP_EOL;


        } elseif ($dispositivos['ssid_rede'] == '' && $dispositivos['bateria'] <= 50) {

            echo 'Falha de Atualização'.PHP_EOL;
            echo 'nome: ' . $dispositivos['nome'] . ' | modelo:  ' . $dispositivos['modelo'].PHP_EOL;
            echo '- Não conectado a rede'.PHP_EOL;
            echo '- Bateria baixa(menor que 50%): '.$dispositivos['bateria'].PHP_EOL;
            echo '-------------------------------'.PHP_EOL;

        } elseif (($dispositivos['bateria'] <= 50)) {

            echo 'Falha de Atualização'.PHP_EOL;
            echo 'nome: ' . $dispositivos['nome'] . ' | modelo:  ' . $dispositivos['modelo'].PHP_EOL;
            echo '- Bateria baixa(menor que 50%): '.$dispositivos['bateria'].PHP_EOL;
            echo '-------------------------------'.PHP_EOL;

        } elseif ($dispositivos['ssid_rede'] == '') {
            echo 'nome: ' . $dispositivos['nome'] . ' | modelo:  ' . $dispositivos['modelo'].PHP_EOL;
            echo 'Falha de Atualização'.PHP_EOL;
            echo '- Não conectado a rede'.PHP_EOL;
            echo '-------------------------------'.PHP_EOL;
        }
    }
}
