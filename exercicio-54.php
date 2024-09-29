<?php

function listarDispositivosOS($mdm_devices, $os_selecionado, $serial_number = null)
{
    $sistemas = [];

    foreach ($mdm_devices as $key => $dispositivo) {


        if ($dispositivo['os'] == $os_selecionado && $dispositivo['serial_number'] == $serial_number) {

            $dispositivo['indice'] = $key;

            return $dispositivo;
            
        } elseif ($os_selecionado == 'ALL' || ($dispositivo['os'] == $os_selecionado && $serial_number == null)) {

            $dispositivo['indice'] = $key;
            $sistemas[] = $dispositivo;
        }
    }

    return $sistemas;
}

function ultimaVersao($atualizacoes, $sistema)
{
    foreach ($atualizacoes as $versao) {
        if ($versao['OS'] == $sistema) {
            return $versao['versaoOS'];
        }
    }
    return null;
}

function atualizacaoPendente($os, $ultima_versao, $mdm_devices)
{
    $dispositivos_para_atualizar = [];

    foreach ($mdm_devices as $key => $dispositivo) {
        if (
            $dispositivo['os'] == $os && $dispositivo['versaoOS'] < $ultima_versao &&
            $dispositivo['bateria'] >= 50 && $dispositivo['ssid_rede'] != ''
        ) {
            $dispositivos_para_atualizar[] = $dispositivo;
        }
    }

    return $dispositivos_para_atualizar;
}

function instalarApp($mdm_devices, $aplicativos, $aplicativosInstalados, $app_nome, $serial_number)
{
    foreach ($mdm_devices as $dispositivo) {
        if ($dispositivo['serial_number'] == $serial_number) {

            $os_dispositivo = $dispositivo['os'];
            if (empty($aplicativos[$app_nome][$os_dispositivo])) {
                echo "O aplicativo: $app_nome não está disponível para o sistema: $os_dispositivo" . PHP_EOL;
                return false;
            }


            $versao_minima = $aplicativos[$app_nome][$os_dispositivo];
            if ($dispositivo['versaoOS'] < $versao_minima) {
                echo "O dispositivo não atende à versão mínima do aplicativo $app_nome" . PHP_EOL;
                return false;
            }

            if (!empty($aplicativosInstalados[$app_nome]) && in_array($serial_number, $aplicativosInstalados[$app_nome])) {
                echo "O aplicativo $app_nome já está instalado neste dispositivo" . PHP_EOL;
                return false;
            }

            foreach ($aplicativosInstalados as $key => $instalados) {
                if (!empty($instalados[$app_nome])) {
                    $instalados[$key] = [$serial_number];
                }
                $aplicativosInstalados[$app_nome][] = $serial_number;
                return $aplicativosInstalados;
            }
        }
    }
    echo "O dispositivo com o serial number $serial_number não foi encontrado" . PHP_EOL;
    return false;
}

function removerApp($serial_number, $app_nome, $aplicativosInstalados)
{
    if (empty($aplicativosInstalados[$app_nome]) || !in_array($serial_number, $aplicativosInstalados[$app_nome])) {
        echo "Aplicativo: $app_nome não instalado no dispositivo: $serial_number" . PHP_EOL;
        return false;
    }

    echo "Você realmente deseja desinstalar o aplicativo $app_nome? (s/n): ";
    $confirmacao = readline();
    if ($confirmacao != 's') {
        return false;
    }

    foreach ($aplicativosInstalados[$app_nome] as $indice => $serial) {
        if ($serial == $serial_number) {
            unset($aplicativosInstalados[$app_nome][$indice]);
            return true;
        }
    }

    return false;
}

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


function serialExiste($serial_number, $mdm_devices)
{

    $serial_existe = false;

    foreach ($mdm_devices as $key => $device) {

        if ($device['serial_number'] == $serial_number) {

            $serial_existe = true;
        }
    }



    if (!$serial_existe) {

        return false;
    }

    return true;
}

function RemoverUsuario($selecionado, $mdm_devices, $serial_number)
{



    foreach ($mdm_devices as $key => $device) {

        if ($device['nome'] ==  $selecionado && $device['serial_number'] == $serial_number) {


            $mdm_devices[$key]["nome"] = '';

            return ['status' => 'localizado', 'mdm_atualizado' => $mdm_devices];
        } elseif ($device['nome'] == '' && $device['serial_number'] == $serial_number) {

            return ['status' => 'nao_vinculado'];
        } elseif ($device['nome'] != $selecionado && $device['serial_number'] == $serial_number) {

            return ['status' => 'não_localizado'];
        }
    }
}

/*
function removerUsuario($serial_number, $selecionado, $mdm_devices)
{

    $usuario_nao_vinculado = false;
    $usuario_dispositivo = false;
    $serial_existe = false;

    foreach ($mdm_devices as $key => $device) {

        if ($device['serial_number'] == $serial_number) {

            $serial_existe = true;

            if ($device['nome'] ==  $selecionado) {

                $usuario_dispositivo = true;
            } elseif ($device['nome'] == '') {

                $usuario_nao_vinculado = true;
            }
        }
    }

    return ['serial_existe' => $serial_existe, 'usuario_dispositivo' => $usuario_dispositivo, 'usuario_nao_vinculado' => $usuario_nao_vinculado];
}
*/

function alterarUsuario($serial_number, $selecionado, $usuario_alterado, $mdm_devices, $usuariosCadastrados)
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

        if ($dispositivo['serial_number'] == $serial_number && $dispositivo['nome'] ==  $usuario_alterado) {


            $mdm_devices[$key]["nome"] = $selecionado;

            return ['status' => 'encontrado', 'mdm_atualizado' => $mdm_devices];
        }
        if ($dispositivo['serial_number'] != $serial_number && $dispositivo['nome'] ==  $usuario_alterado) {

            return ['status' => 'Serial_Number_Nao_Localizado'];
        }

        if ($dispositivo['serial_number'] == $serial_number && $dispositivo['nome'] !=  $usuario_alterado) {

            return ['status' => 'Usuario_Nao_Localizado'];
        }

        if ($dispositivo['serial_number'] != $serial_number && $dispositivo['nome'] !=  $usuario_alterado) {



            return ['status' => 'Dados_Nao_Localizado'];
        }
    }
}

function adcionarRede($rede, $senha, $serial_number, $redesEscolares, $mdm_devices)
{

    foreach ($mdm_devices as $key => $dispositivo) {

        foreach ($redesEscolares as $chave => $redes) {

            if ($dispositivo['serial_number'] == $serial_number && $redes['senha'] == $senha && $redes['nome'] == $rede && $dispositivo['ssid_rede'] == '') {

                $mdm_devices[$key]["ssid_rede"] = $rede;

                return ['status' => 'encontrado', 'mdm_atualizado' => $mdm_devices];
            }

            if ($dispositivo['serial_number'] == $serial_number && $redes['senha'] == $senha && $redes['nome'] == $rede && $dispositivo['ssid_rede'] != '') {

                return ['status' => 'Ja_possui_rede'];
            }

            if ($dispositivo['serial_number'] != $serial_number && $redes['senha'] == $senha && $redes['nome'] == $rede && $dispositivo['ssid_rede'] == '') {

                return ['status' => 'Serial_nao_localizado'];
            }

            if ($dispositivo['serial_number'] == $serial_number && $redes['senha'] != $senha && $redes['nome'] == $rede && $dispositivo['ssid_rede'] == '') {

                return ['status' => 'Senha_incorreta'];
            }

            if ($dispositivo['serial_number'] == $serial_number && $redes['senha'] == $senha && $redes['nome'] != $rede && $dispositivo['ssid_rede'] == '') {

                return ['status' => 'Rede_nao_localizada'];
            }

            if ($dispositivo['serial_number'] == $serial_number && $redes['senha'] == $senha && $redes['nome'] != $rede && $dispositivo['ssid_rede'] != '') {

                return ['status' => 'Rede_Dispositivo_nao_localizada'];
            }

            if ($dispositivo['serial_number'] != $serial_number && $redes['senha'] != $senha && $redes['nome'] == $rede && $dispositivo['ssid_rede'] == '') {

                return ['status' => 'Serial_Senha_nao_localizada'];
            }

            if ($dispositivo['serial_number'] == $serial_number && $redes['senha'] != $senha && $redes['nome'] == $rede && $dispositivo['ssid_rede'] == '') {

                return ['status' => 'Serial_Senha_nao_localizada'];
            }
        }
    }
}


function AlterarRede($serial_number, $rede, $senha, $redesEscolares, $mdm_devices)
{

    $SerialExiste = false;

    foreach ($mdm_devices as $serial) {

        if ($serial['serial_number'] == $serial_number) {

            $SerialExiste = true;
        }
    }
    if (!$SerialExiste) {
        return ['status' => 'erro_serial_inexistente'];
    }

    $RedeExiste = false;

    foreach ($redesEscolares as $redes) {

        if ($redes['nome'] == $rede) {

            $RedeExiste = true;
        }
    }
    if (!$RedeExiste) {
        return ['status' => 'erro_rede_inexistente'];
    }

    $SenhaExiste = false;

    foreach ($redesEscolares as $redes) {

        if ($redes['senha'] == $senha && $redes['nome'] == $rede) {

            $SenhaExiste  = true;
        }
    }
    if (!$SenhaExiste) {
        return ['status' => 'senha_incorreta'];
    }


    foreach ($mdm_devices as $key => $dispositivo) {

        foreach ($redesEscolares as $chave => $redes) {


            if ($dispositivo['serial_number'] == $serial_number && $redes['senha'] == $senha && $redes['nome'] == $rede && $dispositivo['ssid_rede'] != '') {

                $mdm_devices[$key]["ssid_rede"] = $rede;

                return ['status' => 'alterado', 'mdm_atualizado' => $mdm_devices];
            }


            if ($dispositivo['serial_number'] == $serial_number && $redes['senha'] == $senha && $redes['nome'] == $rede && $dispositivo['ssid_rede'] == '') {


                $mdm_devices[$key]["ssid_rede"] = $rede;

                return ['status' => 'adcionado', 'mdm_atualizado' => $mdm_devices];
            }
        }
    }
}


function RemoverRede($serial_number, $ssid_rede, $mdm_devices)
{

    $ssid = false;

    foreach ($mdm_devices as $dispositivo) {

        if ($dispositivo['ssid_rede'] != '') {

            $ssid = true;
        }

        foreach ($mdm_devices as $key => $dispositivo) {

            if ($dispositivo['serial_number'] == $serial_number && $dispositivo['ssid_rede'] == $ssid_rede) {

                $mdm_devices[$key]["ssid_rede"] = '';

                return ['status' => 'encontrado', 'mdm_atualizado' => $mdm_devices];
            }

            if ($dispositivo['serial_number'] != $serial_number && $dispositivo['ssid_rede'] != $ssid_rede) {

                return ['status' => 'Dados_Nao_Localizado'];
            }

            if ($dispositivo['serial_number'] != $serial_number && $dispositivo['ssid_rede'] == $ssid_rede) {

                return ['status' => 'Serial_Number_Nao_Localizado'];
            }

            if ($dispositivo['serial_number']  == $serial_number && $dispositivo['ssid_rede'] != $ssid_rede || $dispositivo['sside-rede'] == '') {

                return ['status' => 'ssid_rede_Nao_Localizado'];
            }
        }
    }

    if (!$ssid) {
        return ['status' => 'erro_inexistente'];
    }
}


function formatar_dispositivo($serial_number, $usuario, $usuariosCadastrados, $mdm_devices)
{

    $serial_encontrado = false;

    foreach ($mdm_devices as $dispositivos) {

        if ($dispositivos['serial_number'] == $serial_number) {

            $serial_encontrado = true;
        }
    }

    if (!$serial_encontrado) {

        return ['status' => 'serial_incorreto'];
    }


    $usuario_encontrado = false;

    foreach ($usuariosCadastrados as $usuarios) {

        if ($usuarios['nome'] == $usuario) {

            $usuario_encontrado = true;
        }
    }


    foreach ($mdm_devices as $key => $dispositivos) {

        if ($dispositivos['serial_number'] == $serial_number) {

            if (!$usuario_encontrado) {

                $mdm_devices[$key]["nome"] = '';
                $mdm_devices[$key]["ssid_rede"] = '';

                return ['status' => 'formatado', 'mdm_atualizado' => $mdm_devices];
            }


            foreach ($usuariosCadastrados as $key => $usuarios) {

                if ($usuarios['nome'] == $usuario) {

                    $mdm_devices[$key]["nome"] = '';
                    $mdm_devices[$key]["ssid_rede"] = '';

                    return ['status' => 'sucesso', 'mdm_atualizado' => $mdm_devices];
                }
            }
        }
    }
}


$mdm_devices = [

    ['modelo' => 'iPhone 15 pro max', 'os' => 'iOS', 'versaoOS' => 17.0, 'nome' => 'mauro', 'ssid_rede' => '', 'bateria' => 70, 'modo_perdido' => true, 'nome_os' => 'iOS 17', 'serial_number' => 'XTA548B'],

    ['modelo' => 'Macbook Air', 'os' => 'macOS', 'versaoOS' => 13.3, 'nome' => 'lucas', 'ssid_rede' => 'lucas_5G', 'bateria' => 98, 'modo_perdido' => false, 'os_nome' => 'Ventura', 'serial_number' => 'ZBAT9751'],

    ['modelo' => 'Apple TV', 'os' => 'tvOS', 'versaoOS' => 10.1, 'nome' => 'helio', 'ssid_rede' => '', 'bateria' => 100, 'modo_perdido' => false, 'nome_os' => 'Apple Tv 10', 'serial_number' => 'OIS5454'],

    ['modelo' => 'iPhone 14', 'os' => 'iOS', 'versaoOS' => 13.5, 'nome' => '', 'ssid_rede' => '', 'bateria' => 5, 'modo_perdido' => true, 'nome_os' => 'iOS 13', 'serial_number' => '1'],

    ['modelo' => 'iPhone 12', 'os' => 'iOS', 'versaoOS' => 16.7, 'nome' => 'lucas', 'ssid_rede' => 'claro_2.4G', 'bateria' => 12, 'modo_perdido' => false, 'nome_os' => 'iOS 16', 'serial_number' => 'QWAD54841'],

    ['modelo' => 'Macbook Pro', 'os' => 'macOS', 'versaoOS' => 10.11, 'nome' => 'mauro', 'ssid_rede' => 'lucas_5G', 'bateria' => 98, 'modo_perdido' => false, 'nome_os' => 'OS X El Capitan', 'serial_number' => 'GAUD1054Z'],

    ['modelo' => 'iPhone 15 Pro max', 'os' => 'iOS', 'versaoOS' => 16.8, 'nome' => 'ana', 'ssid_rede' => 'ana_5G', 'bateria' => 85, 'modo_perdido' => false, 'nome_os' => 'iOS 16', 'serial_number' => 'FGH894B'],

    ['modelo' => 'Macbook Pro 14"', 'os' => 'macOS', 'versaoOS' => 15.2, 'nome' => 'julio', 'ssid_rede' => 'julio_5G', 'bateria' => 45, 'modo_perdido' => true, 'nome_os' => 'Catalina', 'serial_number' => 'PAJD454C'],

    ['modelo' => 'iPad Pro', 'os' => 'iPadOS', 'versaoOS' => 15.4, 'nome' => 'carla', 'ssid_rede' => 'carla_5G', 'bateria' => 92, 'modo_perdido' => false, 'nome_os' => 'iPadOS 15', 'serial_number' => '3'],

    ['modelo' => 'iPhone 13 Mini', 'os' => 'iOS', 'versaoOS' => 15.1, 'nome' => 'roberto', 'ssid_rede' => 'vivo_5G', 'bateria' => '77', 'modo_perdido' => false, 'nome_os' => 'iOS 15', 'serial_number' => 'STZA456E'],

    ['modelo' => 'Apple Watch Series 7', 'os' => '1', 'versaoOS' => 8.0, 'nome' => 'tina', 'ssid_rede' => '', 'bateria' => '60', 'modo_perdido' => false, 'nome_os' => 'watchOS 8', 'serial_number' => 'AOMC459D9'],

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

$atualizacoes = [
    ['OS' => 'macOS', 'nome_os' => 'Sonoma', 'versaoOS' => 14.4],
    ['OS' => 'iOS', 'nome_os' => 'iOS 17', 'versaoOS' => 17.4],
    ['OS' => 'iPadOS', 'nome_os' => 'iPadOS 17', 'versaoOS' => 17.4],
    ['OS' => 'tvOS', 'nome_os' => 'tvOS 17', 'versaoOS' => 17.4],
    ['OS' => 'watchOS', 'nome_os' => 'watchOS 10', 'versaoOS' => 10.4]
];
$aplicativos = [

    'instagram' => ['iOS' => 13.4, 'iPadOS' => 15.0],
    'postman' => ['macOS' => 11.3],
    'strava' => ['watchOS' => 10.1],
    'luma' => ['iOS' => 16.0, 'iPadOS' => 16.0],
    'calm' => ['tvOS' => 14.0],
    'coursera' => ['tvOS' => 13.0],
    'plex' => ['tvOS' => 13.0, 'iOS' => 11.0, 'macOS' => 10.15],
    'infuse' => ['tvOS' => 12.0, 'iOS' => 12.0],
    'vlc' => ['tvOS' => 11.0, 'iOS' => 9.0, 'macOS' => 10.7, 'iPadOS' => 13.1],
    'twitch' => ['tvOS' => 13.0, 'iOS' => 10.0, 'iPadOS' => 13.0],
    'chrome' => ['tvOS' => 10.0, 'iOS' => 7.0, 'macOS' => 10.1, 'iPadOS' => 12.4]
];

$aplicativosInstalados = [

    'instagram' => ['XTA548B', 'UASP95S', 'OSEJIKB8'],
    'vlc' => ['XOIA4S', 'PASKO84', 'ZTAP98SD']
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


//$serial_number = '121212';

//$teste = serialExiste($serial_number, $mdm_devices);

//print_r($teste);
//exit;

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

while (!$finalizar) {
    echo $menu;
    echo "Selecione a opção desejada: " . PHP_EOL;
    $resposta = 5; //intval(fgets(STDIN));

    switch ($resposta) {

        case 1:

            echo "Selecione o OS: " . PHP_EOL .
                '[1] iOS' . PHP_EOL .
                '[2] macOS' . PHP_EOL .
                '[3] iPadOS.' . PHP_EOL .
                '[4] watchOS' . PHP_EOL .
                '[5] tvOS' . PHP_EOL .
                '[6] ALL' . PHP_EOL;

            echo "Selecione a opção: ";
            $opcao = intval(fgets(STDIN));

            /* Processa a escolha do usuario: */

            switch ($opcao) {

                case 1:
                    $os_selecionado = 'iOS';
                    break;

                case 2:
                    $os_selecionado = 'macOS';
                    break;

                case 3:
                    $os_selecionado = 'iPadOS';
                    break;

                case 4:
                    $os_selecionado = 'watchOS';
                    break;

                case 5:
                    $os_selecionado = 'tvOS';
                    break;

                case 6:
                    $os_selecionado = 'ALL';
                    break;

                default:
                    echo "Opção invalida. " . PHP_EOL;
                    break;
            }


            $dispositivos = listarDispositivosOS($mdm_devices, $os_selecionado);
            print_r($dispositivos);
            break;



        case 2:

            echo "Esolha uma opção: " . PHP_EOL .
                "[1]. Atualizar apenas um dispositivo. " . PHP_EOL .
                "[2]. Atualizar todos os dispositivos. " . PHP_EOL;
            $escolha = intval(fgets(STDIN));


            if ($escolha == 1) {

                echo "Digite o Serial Number do dispositivo que deseja atualizar: " . PHP_EOL;
                $serial_number = readline();

                echo "Digite o sistema operacional (OS) do dispositivo que deseja atualizar: " . PHP_EOL;
                $os = readline();

                $dispositivo = listarDispositivosOS($mdm_devices, $os, $serial_number);

                print_r($dispositivo);


                if (!empty($dispositivo)) {

                    $dispositivo_atualizado;
                    $ultima_versao = ultimaVersao($atualizacoes, $os);
                    $indiceDispositivo = $dispositivo['indice'];

                    if (!empty($dispositivo['serial_number'])) {
                        if ($ultima_versao != '' && $dispositivo['versaoOS'] < $ultima_versao && $dispositivo['bateria'] >= 50 && $dispositivo['ssid_rede'] != '') {

                            $dispositivo['versaoOS'] = $ultima_versao;
                            echo "Dispositivo atualizado com sucesso!" . PHP_EOL;
                            echo 'nome: ' . $dispositivo['nome'] . ' | modelo:  ' . $dispositivo['modelo'] . PHP_EOL;

                            $mdm_devices[$indiceDispositivo]['versaoOS'] = $ultima_versao;
                        } elseif ($dispositivo['ssid_rede'] == '' && $dispositivo['bateria'] <= 50) {

                            echo 'Falha de Atualização' . PHP_EOL;
                            echo 'nome: ' . $dispositivo['nome'] . ' | modelo:  ' . $dispositivo['modelo'] . PHP_EOL;
                            echo '- Não conectado a rede' . PHP_EOL;
                            echo '- Bateria baixa(menor que 50%): ' . $dispositivo['bateria'] . PHP_EOL;
                            echo '-------------------------------' . PHP_EOL;
                        } elseif (($dispositivo['bateria'] <= 50)) {

                            echo 'Falha de Atualização' . PHP_EOL;
                            echo 'nome: ' . $dispositivo['nome'] . ' | modelo:  ' . $dispositivo['modelo'] . PHP_EOL;
                            echo '- Bateria baixa(menor que 50%): ' . $dispositivo['bateria'] . PHP_EOL;
                            echo '-------------------------------' . PHP_EOL;
                        } elseif ($dispositivo['ssid_rede'] == '') {

                            echo 'nome: ' . $dispositivo['nome'] . ' | modelo:  ' . $dispositivo['modelo'] . PHP_EOL;
                            echo 'Falha de Atualização' . PHP_EOL;
                            echo '- Não conectado a rede' . PHP_EOL;
                            echo '-------------------------------' . PHP_EOL;
                        }
                    }
                } else {
                    echo "O serial Number informado não existe, por favor digite outro serial..." . PHP_EOL;
                }
                break;
            } elseif ($escolha == 2) {


                echo "Digite o sistema operacional (OS) para o qual deseja atualizar todos os dispositivos: " . PHP_EOL;
                $os = readline();

                $ultima_versao = ultimaVersao($atualizacoes, $os);


                if ($ultima_versao != '') {

                    foreach ($mdm_devices as $key => $dispositivo) {

                        if ($dispositivo['os'] == $os && $dispositivo['versaoOS'] < $ultima_versao) {

                            if ($dispositivo['bateria'] >= 50 && $dispositivo['ssid_rede'] != '') {

                                $mdm_devices[$key]['versaoOS'] = $ultima_versao;

                                $dispositivo['versaoOS'] = $ultima_versao;
                                echo 'nome: ' . $dispositivo['nome'] . ' | modelo:  ' . $dispositivo['modelo'] . ' | Versao:  ' . $dispositivo['versaoOS'] . PHP_EOL;
                                echo 'Dispositivo atualizado com sucesso!' . PHP_EOL;
                                echo '-------------------------------' . PHP_EOL;
                            } elseif ($dispositivo['ssid_rede'] == '' && $dispositivo['bateria'] <= 50) {

                                echo 'Falha de Atualização' . PHP_EOL;
                                echo 'nome: ' . $dispositivo['nome'] . ' | modelo:  ' . $dispositivo['modelo'] . PHP_EOL;
                                echo '- Não conectado a rede' . PHP_EOL;
                                echo '- Bateria baixa(menor que 50%): ' . $dispositivo['bateria'] . PHP_EOL;
                                echo '-------------------------------' . PHP_EOL;
                            } elseif (($dispositivo['bateria'] <= 50)) {

                                echo 'Falha de Atualização' . PHP_EOL;
                                echo 'nome: ' . $dispositivo['nome'] . ' | modelo:  ' . $dispositivo['modelo'] . PHP_EOL;
                                echo '- Bateria baixa(menor que 50%): ' . $dispositivo['bateria'] . PHP_EOL;
                                echo '-------------------------------' . PHP_EOL;
                            } elseif ($dispositivo['ssid_rede'] == '') {

                                echo 'nome: ' . $dispositivo['nome'] . ' | modelo:  ' . $dispositivo['modelo'] . PHP_EOL;
                                echo 'Falha de Atualização' . PHP_EOL;
                                echo '- Não conectado a rede' . PHP_EOL;
                                echo '-------------------------------' . PHP_EOL;
                            } elseif ($dispositi0vo['versaoOS'] ==   $ultima_versao) {

                                echo 'nome: ' . $dispositivo['nome'] . ' | modelo:  ' . $dispositivo['modelo'] . PHP_EOL;
                                echo 'Falha de Atualização' . PHP_EOL;
                                echo '- Não conectado a rede' . PHP_EOL;
                                echo '-------------------------------' . PHP_EOL;
                            }
                        }
                    }
                } else {

                    echo "Não foi possível encontrar informações sobre a última versão para o OS especificado." . PHP_EOL;
                }
            } else {

                echo "Opção inválida." . PHP_EOL;
            }
            break;
        case 3:

            echo "Digite a quantidade de dispositivos que deseja adcionar: ";
            $quantidade_dispositivos = intval(fgets(STDIN));

            $contador = 0;


            while ($contador < $quantidade_dispositivos) {

                $novo_dispositivo = [];

                echo "Modelo: ";
                $novo_dispositivo['modelo'] = readline();

                $os_valido = false;

                while (!$os_valido) {

                    echo "Informe o sistema operacional (OS): ";
                    $os = readline();


                    foreach ($mdm_devices as $dispositivo) {

                        if ($dispositivo['os'] == $os) {
                            $os_valido = true;
                            break;
                        }
                    }


                    if (!$os_valido) {
                        echo "O sistema operacional fornecido não é valido..." . PHP_EOL;
                        echo "Por favor informe um sistema operacional válido." . PHP_EOL;
                    }
                }

                $novo_dispositivo['os'] = $os;

                echo "Versão do sistema Operacional: ";
                $novo_dispositivo['versaoOS'] = readline();

                echo "Nome: ";
                $novo_dispositivo['nome'] = readline();

                echo "SSID da rede: ";
                $novo_dispositivo['ssid_rede'] = readline();

                echo "Nivel da bateria: ";
                $novo_dispositivo['bateria'] = readline();

                echo "Modo perdido: (true/false)";
                $novo_dispositivo['modo_perdido'] = readline();

                echo "Nome do OS: ";
                $novo_dispositivo['nome_os'] = readline();

                echo "Serial Number: ";
                $serial_number = readline();

                $serial_existe = false;

                foreach ($mdm_devices as $dispositivo) {

                    if ($dispositivo['serial_number'] == $serial_number) {

                        $serial_existe = true;
                        break;
                    }
                }

                if ($serial_existe) {

                    echo "O serial number informado já está cadastrado..." . PHP_EOL;
                    echo "Deseja adcionar um novo serial number? (s/n) ";
                    $resposta = readline();

                    if ($resposta == 's') {

                        continue;
                    } else {

                        return;
                    }
                }

                $novo_dispositivo['serial_number'] = $serial_number;
                $mdm_devices[] = $novo_dispositivo;
                $contador++;
            }

            echo "Dispotivos adcionados com sucesso!" . PHP_EOL;

            break;

        case 4:

            echo "Esolha uma opção: " . PHP_EOL .
                "[1]. Instalar um Aplicativo. " . PHP_EOL .
                "[2]. Remover um aplicativo. " . PHP_EOL;
            $sub_menu = intval(fgets(STDIN));

            if ($sub_menu == 1) {

                echo "Digite o nome do aplicativo que deseja instalar: " . PHP_EOL;

                $app_nome = readline();

                echo "Digite o serial number do dispositivo: " . PHP_EOL;

                $serial_number = readline();




                $instalado = instalarApp($mdm_devices, $aplicativos, $aplicativosInstalados, $app_nome, $serial_number);

                if ($instalado != false) {

                    $aplicativosInstalados = $instalado;
                }

                print_r($aplicativosInstalados);


                if ($instalado == true) {

                    echo "O aplicativo $app_nome foi instalado com sucesso " . PHP_EOL . "Dispositivo: $serial_number" . PHP_EOL;
                } elseif ($instalado == false) {

                    echo "Falha ao instalar o aplicativo $app_nome || Dispositivo: $serial_number" . PHP_EOL;
                } else {
                }
            }

            if ($sub_menu == 2) {

                echo "Digite o nome do aplicativo que deseja desinstalar: " . PHP_EOL;

                $app_nome_desinstalar = readline();

                echo "Digite o serial number do dispositivo: " . PHP_EOL;
                $serial_number_desinstalar = readline();

                if (removerApp($serial_number_desinstalar, $app_nome_desinstalar, $aplicativosInstalados)) {
                    echo "Aplicativo: $app_nome_desinstalar desinstalado com sucesso || Dispositivo: $serial_number_desinstalar" . PHP_EOL;
                } else {
                    echo "Falha ao desinstalar o aplicativo: $app_nome_desinstalar || Dispositivo: $serial_number_desinstalar" . PHP_EOL;
                }
            }

            break;
        case 5:



            echo "Esolha uma opção: " . PHP_EOL .
                "[1].Adicionar remover ou alterar usuário(do dispositivo)." . PHP_EOL .
                "[2]. Adicionar/alterar/remover rede. " . PHP_EOL .
                "[3]. Formatar " . PHP_EOL;
            $escolha = intval(fgets(STDIN));




            if ($escolha == 1) {

                echo "digite o serial Number: ";
                $serial_number = readline();

                $serial = serialExiste($serial_number, $mdm_devices);

                if (!$serial) {

                    echo "Serial_Number: $serial_number, informado não existe" . PHP_EOL .
                        "Informa um serial_number valido!" . PHP_EOL;
                    echo '-------------------------------' . PHP_EOL;
                } else {

                    echo "Esolha uma opção: " . PHP_EOL .
                        "[1]. Adicionar Usuario." . PHP_EOL .
                        "[2]. Remover Usuario." . PHP_EOL .
                        "[3]. Alterar Usuario." . PHP_EOL;
                    $sub_menu = intval(fgets(STDIN));

                    echo "Selecione o usuario: " . PHP_EOL;
                    $selecionado = readline();

                    $remover = RemoverUsuario($selecionado, $mdm_devices, $serial_number);

                    if ($remover['status'] == 'não_localizado') {
                        echo "Usuario: $selecionado, não existe para o dispositivo" . PHP_EOL .
                            "Informa um usuario valido!" . PHP_EOL;
                        echo '-------------------------------' . PHP_EOL;
                    }

                    if ($remover['status'] == 'nao_vinculado') {
                        echo "Serial_Number: $serial_number || Não possui usuario cadastrado" . PHP_EOL .
                            "Informe um dispositivo com usuario cadastrado" . PHP_EOL;
                        echo '-------------------------------' . PHP_EOL;
                    }

                    if ($sub_menu == 1) {


                        $add_dispositivo = adcionarUsuario($serial_number, $usuariosCadastrados, $mdm_devices,  $selecionado);

                        if ($add_dispositivo['status'] ==  'usuario_cadastrado') {
                            $mdm_devices = $add_dispositivo['mdm'];

                            echo "Usuario: $selecionado || Serial_Number: $serial_number" . PHP_EOL .
                                "Cadastrado com sucesso!" . PHP_EOL;
                            echo '-------------------------------' . PHP_EOL;
                        }

                        if ($add_dispositivo['status'] ==  'erro_usuario_inexistente') {
                            echo "Usuario: $selecionado || Serial_Number: $serial_number" . PHP_EOL .
                                "Usuario informado não existe!" . PHP_EOL;
                            echo '-------------------------------' . PHP_EOL;
                        }

                        if ($add_dispositivo['status'] == 'erro_serial_inexistente') {
                            echo "Usuario: $selecionado || Serial_Number: $serial_number" . PHP_EOL .
                                "Serial Number informando não existe!" . PHP_EOL;
                            echo '-------------------------------' . PHP_EOL;
                        }

                        if ($add_dispositivo['status'] == 'erro_cadastro_novo_usuario') {
                            echo "Usuario: $selecionado || Serial_Number: $serial_number" . PHP_EOL .
                                "Erro...Serial Number informado já possui usuario cadastrado!" . PHP_EOL;
                            echo '-------------------------------' . PHP_EOL;
                        }

                        if ($add_dispositivo['status'] == 'erro_cadastro_novo_usuario') {
                        }
                    }
                    if ($sub_menu == 2) {

                        if ($remover['status'] == 'localizado') {

                            echo "Usuario: $selecionado || Removido com sucesso" . PHP_EOL .
                                "Serial_number: $serial_number" . PHP_EOL;
                            echo '-------------------------------' . PHP_EOL;
                            $mdm_devices = $remover['mdm_atualizado'];
                        }
                    }
                    if ($sub_menu == 3) {

                        echo "Informe o nome do usuario que deseja alterar: " . PHP_EOL;
                        $usuario_alterado = readline();


                        $alterar = alterarUsuario($serial_number, $selecionado, $usuario_alterado, $mdm_devices, $usuariosCadastrados);


                        if ($alterar['status'] == 'erro_usuario_inexistente') {

                            echo "Usuario: $selecionado" . PHP_EOL .
                                "Usuario informado não existe!" . PHP_EOL;
                            echo '-------------------------------' . PHP_EOL;
                        }

                        if ($alterar['status'] == 'encontrado') {
                            echo "Usuario: $usuario_alterado || Serial_Number: $serial_number" . PHP_EOL .
                                "Substituir o usuário: $usuario_alterado pelo usuário: $selecionado, confirmar(s/n)? " . PHP_EOL;
                            $confirmar = readline();
                            echo '-------------------------------' . PHP_EOL;

                            if ($confirmar == 's') {

                                echo "Usuario: $selecionado || Serial Number: $serial_number" . PHP_EOL .
                                    "Usuario Alterado com sucesso!" . PHP_EOL;
                                echo '-------------------------------' . PHP_EOL;

                                $mdm_devices = $alterar['mdm_atualizado'];
                            }
                        }

                        if ($alterar['status'] == 'Serial_Number_Nao_Localizado') {

                            echo "Usuario: $usuario_alterado || Serial Number: $serial_number" . PHP_EOL .
                                "Serial_Number não localizado!" . PHP_EOL;
                            echo '-------------------------------' . PHP_EOL;
                        }

                        if ($alterar['status'] == 'Usuario_Nao_Localizado') {

                            echo "Usuario: $usuario_alterado || Serial Number: $serial_number" . PHP_EOL .
                                "Usuario não localizado!" . PHP_EOL;
                            echo '-------------------------------' . PHP_EOL;
                        }

                        if ($alterar['status'] == 'Dados_Nao_Localizado') {
                            echo "Usuario: $selecionado || Serial Number: $serial_number" . PHP_EOL .
                                "Usario não localizado!" . PHP_EOL .
                                "Serial_Number não localizado!" . PHP_EOL;
                            echo '-------------------------------' . PHP_EOL;
                        }
                    }
                }
            }




            if ($escolha == 2) {


                echo "digite o serial Number: " . PHP_EOL;
                $serial_number = 'XTA548B'; //readline();



                echo "Esolha uma opção: " . PHP_EOL .
                    "[1]. Adicionar Rede." . PHP_EOL .
                    "[2]. Alterar Rede." . PHP_EOL .
                    "[3]. Remover Rede." . PHP_EOL;
                $sub_menu2 = intval(fgets(STDIN));


                if ($sub_menu2 == 1) {

                    echo "Informe o nome da rede que deseja adcionar: " . PHP_EOL;
                    $rede = readline();

                    echo "Informe a senha da rede: " . PHP_EOL;
                    $senha = readline();

                    $adcionar = adcionarRede($rede, $senha, $serial_number, $redesEscolares, $mdm_devices);

                    if ($adcionar['status'] == 'encontrado') {
                        echo "Rede: $rede || Adcionada com sucesso!" . PHP_EOL .
                            "Serial_number: $serial_number" . PHP_EOL;
                        echo '-------------------------------' . PHP_EOL;
                        $mdm_devices = $adcionar['mdm_atualizado'];
                    }


                    if ($adcionar['status'] == 'Ja_possui_rede') {

                        echo  "Rede: $rede || Não adcionada!" . PHP_EOL .
                            "Serial_Number: $serial_number || já possui rede cadastrada" . PHP_EOL .
                            "Caso deseje alterar a rede selecione a opção 3" . PHP_EOL;
                    }

                    if ($adcionar['status'] == 'Serial_nao_localizado') {

                        echo "Rede: $rede || Não adcionada!" . PHP_EOL .
                            "Serial_Number: $serial_number || não existe" . PHP_EOL;
                        echo '-------------------------------' . PHP_EOL;
                    }

                    if ($adcionar['status'] == 'Senha_incorreta') {

                        echo "Rede: $rede || Não adcionada!" . PHP_EOL .
                            "Senha incorreta!" . PHP_EOL .
                            "Digite a senha correta" . PHP_EOL;
                        echo '-------------------------------' . PHP_EOL;
                    }

                    if ($adcionar['status'] == 'Rede_nao_localizada') {
                        echo "Rede: $rede || Não adcionada!" . PHP_EOL .
                            "A rede informada não existe" . PHP_EOL;
                        echo '-------------------------------' . PHP_EOL;
                    }

                    if ($adcionar['status'] == 'Rede_Dispositivo_nao_localizada') {
                        echo "Rede: $rede || Não adcionada!" . PHP_EOL .
                            "A Rede: $rede, informada não existe" . PHP_EOL .
                            "O Dispositivo: $serial_number já possui rede adcionada" . PHP_EOL .
                            "Se desejar alterar a rede selicone uma rede valida e faça a letaração na opção 3" . PHP_EOL;

                        echo '-------------------------------' . PHP_EOL;
                    }

                    if ($adcionar['status'] == 'Serial_Senha_nao_localizada') {
                        echo "Rede: $rede || Não adcionada!" . PHP_EOL .
                            "A Senha: $senha, informada não existe" . PHP_EOL .
                            "O Dispositivo: $serial_number  não existe" . PHP_EOL;
                        echo '-------------------------------' . PHP_EOL;
                    }
                }


                if ($sub_menu2 == 2) {

                    echo "Informe o nome da rede que deseja adcionar: " . PHP_EOL;
                    $rede = 'a';  //readline();

                    echo "Informe a senha da rede: " . PHP_EOL;
                    $senha = 'e1'; //readline();


                    $alterar = AlterarRede($serial_number, $rede, $senha, $redesEscolares, $mdm_devices);



                    if ($alterar['status'] == 'alterado') {
                        echo "Nova Rede:$rede || Salva com sucesso" . PHP_EOL .
                            "Serial_number: $serial_number" . PHP_EOL;
                        echo '-------------------------------' . PHP_EOL;
                        $mdm_devices =  $alterar['mdm_atualizado'];
                    }

                    if ($alterar['status'] == 'senha_incorreta') {
                        echo "Erro ao conectar... || Rede: $rede " . PHP_EOL .
                            "Senha: $senha || incorreta" . PHP_EOL;
                        echo '-------------------------------' . PHP_EOL;
                    }

                    if ($alterar['status'] == 'erro_rede_inexistente') {
                        echo "Erro..." . PHP_EOL .
                            "A Rede: $rede, não existe" . PHP_EOL;
                        echo '-------------------------------' . PHP_EOL;
                    }


                    if ($alterar['status'] == 'erro_serial_inexistente') {
                        echo "Serial_Number: $serial_number || Não existe..." . PHP_EOL;
                        echo '-------------------------------' . PHP_EOL;
                    }


                    if ($alterar['status'] == 'adcionado') {
                        echo "O serial_number: $serial_number || não possui rede cadastrada" . PHP_EOL .
                            "A Rede: $rede || foi adcionada com sucesso" . PHP_EOL;
                        echo '-------------------------------' . PHP_EOL;
                        $mdm_devices =  $alterar['mdm_atualizado'];
                    }
                }


                if ($sub_menu2 == 3) {


                    echo "Informe o nome da rede que deseja remover: " . PHP_EOL;
                    $ssid_rede = ''; //readline();


                    $remover = RemoverRede($serial_number, $ssid_rede, $mdm_devices);


                    if ($remover['status'] == 'encontrado') {
                        echo "Rede:$ssid_rede, conectada. " . PHP_EOL .
                            "tem certeza que deseja excluir a rede (s/n)" . PHP_EOL;
                        $confirmacao = 's'; //readline();
                        echo '-------------------------------' . PHP_EOL;
                        $mdm_devices =  $remover['mdm_atualizado'];

                        if ($confirmacao == 's') {

                            echo "Rede:$ssid_rede || Serial Number: $serial_number" . PHP_EOL .
                                "Rede removida com sucesso!" . PHP_EOL;
                            echo '-------------------------------' . PHP_EOL;

                            $mdm_devices =  $remover['mdm_atualizado'];
                        }
                    }

                    if ($remover['status'] == 'Dados_Nao_Localizado') {

                        echo "Rede:$ssid_rede || não existe" . PHP_EOL .
                            "O Dispositivo: $serial_number  não existe" . PHP_EOL .
                            "Tente novamente informado dados válidos" . PHP_EOL;
                        echo '-------------------------------' . PHP_EOL;
                    }


                    if ($remover['status'] == 'Serial_Number_Nao_Localizado') {
                        echo "Rede: $ssid_rede || não removida!" . PHP_EOL .
                            "Serial_Number: $serial_number || não existe" . PHP_EOL;
                        echo '-------------------------------' . PHP_EOL;
                    }

                    if ($remover['status'] == 'ssid_rede_Nao_Localizado') {
                        echo "A rede informada: $ssid_rede não existe" . PHP_EOL .
                            "Serial_Number: $serial_number" . PHP_EOL;
                        echo '-------------------------------' . PHP_EOL;
                    }

                    if ($remover['status'] == 'erro_inexistente') {
                        echo "Não existe rede cadastrada no dispositivo" . PHP_EOL .
                            "Serial_Number: $serial_number" . PHP_EOL;
                        echo '-------------------------------' . PHP_EOL;
                    }
                }
            }

            if ($escolha == 3) {

                echo "Digite o serial_number: ";
                $serial_number = readline();


                echo "Digite o usuario: ";
                $usuario = readline();


                $formatar = formatar_dispositivo($serial_number, $usuario, $usuariosCadastrados, $mdm_devices);

                if ($formatar['status'] == 'formatado') {

                    echo "Dispositivo: $serial_number" . PHP_EOL .
                        "Usuario: $usuario " . PHP_EOL .
                        "Formatado com sucesso" . PHP_EOL;
                    echo '-------------------------------' . PHP_EOL;
                    $mdm_devices =  $formatar['mdm_atualizado'];
                }

                if ($formatar['status'] == 'sucesso') {


                    echo "Digite a senha: ";
                    $senha_usuario = readline();

                    foreach ($usuariosCadastrados as $usuarios) {

                        if ($usuarios['nome'] == $usuario && $senha_usuario == $usuarios['senha']) {

                            echo "Dispositivo: $serial_number" . PHP_EOL .
                                "Usuario: $usuario " . PHP_EOL .
                                "Formatado com sucesso" . PHP_EOL;
                            echo '-------------------------------' . PHP_EOL;
                            $mdm_devices =  $formatar['mdm_atualizado'];
                        } elseif ($usuarios['nome'] == $usuario && $senha_usuario != $usuarios['senha']) {

                            echo "Dispositivo: $serial_number || Usuario: $usuario  " . PHP_EOL .
                                "Senha incorreta" . PHP_EOL .
                                "Não formatado" . PHP_EOL;
                            echo '-------------------------------' . PHP_EOL;
                        }
                    }
                }

                if ($formatar['status'] == 'serial_incorreto') {

                    echo "Dispositivo não localizado" . PHP_EOL .
                        "Serial_Number: $serial_number || não existe" . PHP_EOL;
                    echo '-------------------------------' . PHP_EOL;
                }
            }
            break;

        case 6:

            echo "Voce selecionou a opção 6" . PHP_EOL;
            break;

        case 7:


            echo "Voce selecionou a opção 7" . PHP_EOL;
            break;


        case 8:

            echo "Voce selecionou a opção 8" . PHP_EOL;
            break;

        default:
            echo "Opção invalida!" . PHP_EOL;
            break;
    }
}
