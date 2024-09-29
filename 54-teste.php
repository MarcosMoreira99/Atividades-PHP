<?php


function listaUsuarios($usuariosCadastrados)
{

    foreach ($usuariosCadastrados as $key => $usuario) {


        if ($usuario['nome'] && $usuario['senha']) {

            echo 'Usuario: ' . $usuario['nome'] . PHP_EOL;
        }
    }
}


function adcionarUsuario($serial_number, $usuariosCadastrados, $mdm_devices, $selecionado)
{

    $usuarioExiste = false;
    foreach ($usuariosCadastrados as $usuario) {
        if ($usuario['nome'] == $selecionado) {
            $usuarioExiste = true;
        }
    }

    if (!$usuarioExiste) {
        return ['status' => 'erro_usuario_inexistente'];
    }


    foreach ($mdm_devices as $key => $dispositivo) {


        if ($dispositivo['serial_number'] == $serial_number && $dispositivo['nome'] == '') {


            $mdm_devices[$key]['nome'] = $selecionado;
            return ['status' => 'usuario_cadastrado', 'mdm' => $mdm_devices];
        } elseif ($dispositivo['serial_number'] == $serial_number && $dispositivo['nome'] != '') {
            return ['status' => 'erro_cadastro_novo_usuario'];
        }
    }

    return ['status' => 'erro_serial_inexistente'];
}


$mdm_devices = [

    ['modelo' => 'iPhone 15 pro max', 'os' => 'iOS', 'versaoOS' => 17.0, 'nome' => 'mauro', 'ssid_rede' => 'lucas_5G', 'bateria' => 70, 'modo_perdido' => true, 'nome_os' => 'iOS 17', 'serial_number' => 'XTA548B'],

    ['modelo' => 'Macbook Air', 'os' => 'macOS', 'versaoOS' => 13.3, 'nome' => 'lucas', 'ssid_rede' => 'lucas_5G', 'bateria' => 98, 'modo_perdido' => false, 'os_nome' => 'Ventura', 'serial_number' => 'ZBAT9751'],

    ['modelo' => 'Apple TV', 'os' => 'tvOS', 'versaoOS' => 10.1, 'nome' => 'helio', 'ssid_rede' => '', 'bateria' => 100, 'modo_perdido' => false, 'nome_os' => 'Apple Tv 10', 'serial_number' => 'OIS5454'],

    ['modelo' => 'iPhone 14', 'os' => 'iOS', 'versaoOS' => 13.5, 'nome' => '', 'ssid_rede' => '', 'bateria' => 5, 'modo_perdido' => true, 'nome_os' => 'iOS 13', 'serial_number' => 'ZBUE65494'],

    ['modelo' => 'iPhone 12', 'os' => 'iOS', 'versaoOS' => 16.7, 'nome' => 'lucas', 'ssid_rede' => 'claro_2.4G', 'bateria' => 12, 'modo_perdido' => false, 'nome_os' => 'iOS 16', 'serial_number' => 'QWAD54841'],

    ['modelo' => 'Macbook Pro', 'os' => 'macOS', 'versaoOS' => 10.11, 'nome' => 'mauro', 'ssid_rede' => 'lucas_5G', 'bateria' => 98, 'modo_perdido' => false, 'nome_os' => 'OS X El Capitan', 'serial_number' => 'GAUD1054Z'],

    ['modelo' => 'iPhone 15 Pro max', 'os' => 'iOS', 'versaoOS' => 16.8, 'nome' => 'ana', 'ssid_rede' => 'ana_5G', 'bateria' => 85, 'modo_perdido' => false, 'nome_os' => 'iOS 16', 'serial_number' => 'FGH894B'],

    ['modelo' => 'Macbook Pro 14"', 'os' => 'macOS', 'versaoOS' => 15.2, 'nome' => 'julio', 'ssid_rede' => 'julio_5G', 'bateria' => 45, 'modo_perdido' => true, 'nome_os' => 'Catalina', 'serial_number' => 'PAJD454C'],

    ['modelo' => 'iPad Pro', 'os' => 'iPadOS', 'versaoOS' => 15.4, 'nome' => 'carla', 'ssid_rede' => 'carla_5G', 'bateria' => 92, 'modo_perdido' => false, 'nome_os' => 'iPadOS 15', 'serial_number' => 'ZRAJ454D'],

    ['modelo' => 'iPhone 13 Mini', 'os' => 'iOS', 'versaoOS' => 15.1, 'nome' => 'roberto', 'ssid_rede' => 'vivo_5G', 'bateria' => '77', 'modo_perdido' => false, 'nome_os' => 'iOS 15', 'serial_number' => 'STZA456E'],

    ['modelo' => 'Apple Watch Series 7', 'os' => 'watchOS', 'versaoOS' => 8.0, 'nome' => 'tina', 'ssid_rede' => '', 'bateria' => '60', 'modo_perdido' => false, 'nome_os' => 'watchOS 8', 'serial_number' => 'AOMC459D9'],

    ['modelo' => 'Mac Mini M1', 'os' => 'macOS', 'versaoOS' => 11.2, 'nome' => 'gustavo', 'ssid_rede' => 'gustavo_5G', 'bateria' => '100', 'modo_perdido' => false, 'nome_os' => 'Big Sur', 'serial_number' => 'KAS8YAHZ'],

    ['modelo' => 'iPhone 13 Pro', 'os' => 'iOS', 'versaoOS' => 13.4, 'nome' => 'fernanda', 'ssid_rede' => 'fernanda_5G', 'bateria' => '40', 'modo_perdido' => false, 'nome_os' => 'iOS 13', 'serial_number' => 'YZTQ47A'],

    ['modelo' => 'Macbook Pro 16"', 'os' => 'macOS', 'versaoOS' => 15.4, 'nome' => 'pedro', 'ssid_rede' => 'pedro_5G', 'bateria' => '75', 'modo_perdido' => false, 'nome_os' => 'Monterey', 'serial_number' => 'WT37QZD7'],

    ['modelo' => 'iPad Air', 'os' => 'iPadOS', 'versaoOS' => 14.6, 'nome' => 'maria', 'ssid_rede' => 'maria_5G', 'bateria' => '58', 'modo_perdido' => false, 'nome_os' => 'iPadOS 14', 'serial_number' => 'RPI8912A'],

    ['modelo' => 'iPhone SE 3rd Gen', 'os' => 'iOS', 'versaoOS' => 15.0, 'nome' => 'sergio', 'ssid_rede' => 'sergio_2.4G', 'bateria' => '20', 'modo_perdido' => true, 'nome_os' => 'iOS 15', 'serial_number' => 'PAUD458DF'],

    ['modelo' => 'Apple Watch Series 6', 'os' => 'watchOS', 'versaoOS' => 7.5, 'nome' => 'livia', 'ssid_rede' => '', 'bateria' => '33', 'modo_perdido' => false, 'nome_os' => 'watchOS 7', 'serial_number' => 'ZNV987VSD'],

    ['modelo' => 'iMac 24"', 'os' => 'macOS', 'versaoOS' => 11.5, 'nome' => 'rafael', 'ssid_rede' => 'rafael_5G', 'bateria' => '100', 'modo_perdido' => false, 'nome_os' => 'Big Sur', 'serial_number' => 'MZD974FG'],

    ['modelo' => 'iPhone 15', 'os' => 'iOS', 'versaoOS' => 17.1, 'nome' => 'bruna', 'ssid_rede' => 'bruna_5G', 'bateria' => '65', 'modo_perdido' => false, 'nome_os' => 'iOS 17', 'serial_number' => '112'],

    ['modelo' => 'Macbook Air M2', 'os' => 'macOS', 'versaoOS' => 13.1, 'nome' => 'tiago', 'ssid_rede' => 'tiago_5G', 'bateria' => '90', 'modo_perdido' => false, 'nome_os' => 'Ventura', 'serial_number' => 'PQZX45A4Z2'],

    ['modelo' => 'iPad Mini', 'os' => 'iPadOS', 'versaoOS' => 15.2, 'nome' => 'daniela', 'ssid_rede' => 'daniela_5G', 'bateria' => '70', 'modo_perdido' => false, 'nome_os' => 'iPadOS 15', 'serial_number' => 'TAPIS98Z1C'],

    ['modelo' => 'iPhone 11', 'os' => 'iOS', 'versaoOS' => 11.6, 'nome' => 'carlos', 'ssid_rede' => 'carlos_5G', 'bateria' => '50', 'modo_perdido' => false, 'nome_os' => 'iOS 12', 'serial_number' => 'UTZX84AGF'],

    ['modelo' => 'Apple Watch SE', 'os' => 'watchOS', 'versaoOS' => 8.2, 'nome' => 'julia', 'ssid_rede' => '', 'bateria' => '45', 'modo_perdido' => false, 'nome_os' => 'watchOS 8', 'serial_number' => 'R9T8GHDF1']

];

$usuariosCadastrados = [
    ['nome' => 'mauro', 'senha' => '11'],
    ['nome' => 'helio', 'senha' => '22'],
    ['nome' => 'vinicius', 'senha' => '33'],
    ['nome' => 'lucas', 'senha' => '44'],
    ['nome' => 'caio', 'senha' => '55'],
    ['nome' => 'marcelo', 'senha' => '66'],
];

$redesEscolares = [
    ['nome' => 'campus_1', 'senha' => 'c1'],
    ['nome' => 'campus_1_5G', 'senha' => 'c15g'],
    ['nome' => 'estacionamento', 'senha' => 'e1'],
    ['nome' => 'refeitorio_5G', 'senha' => 'r5g'],
    ['nome' => 'biblioteca_2.4G', 'senha' => 'b2.4'],
    ['nome' => 'quadra_5G', 'senha' => 'q5G'],
];

/*
echo "digite o serial Number: ";
$serial_number = 'ZBUE65494'; //readline();

$add_dispositivo = adcionarUsuario($serial_number, $usuariosCadastrados, $mdm_devices, 'vinicius');

if($add_dispositivo['status'] ==  'usuario_cadastrado'){
    $mdm_devices = $add_dispositivo['mdm'];
}
print_r($add_dispositivo);
exit;
*/

$menu = 'MENU' . PHP_EOL .
    '[1] Listar dispositivos' . PHP_EOL .
    '[2]Atualizar dispositivos' . PHP_EOL .
    '[3]Adicionar novos dispositivos' . PHP_EOL .
    '[4]Gerenciar Aplicativos' . PHP_EOL .
    '[5] Gerenciar um dispositivo.' . PHP_EOL .
    '[6]Associar usuário' . PHP_EOL .
    '[7]Ativar modo perdido' . PHP_EOL .
    '[8]Desativar modo perdido' . PHP_EOL;

$finalizar = false;


