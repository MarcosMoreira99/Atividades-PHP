<?php


echo "digite o serial Number: ";
$serial_number = readline();

$serial = serialExiste($serial_number, $mdm_devices);

switch($sub_menu){

    case 1:

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
        break;

    case 2:

        

    }










if (!$serial) {

    echo "Serial_Number: $serial_number, informado não existe" . PHP_EOL .
        "Informa um serial_number valido!" . PHP_EOL;
    echo '-------------------------------' . PHP_EOL;
}

echo "Esolha uma opção: " . PHP_EOL .
    "[1]. Adicionar Usuario." . PHP_EOL .
    "[2]. Remover Usuario." . PHP_EOL .
    "[3]. Alterar Usuario." . PHP_EOL;
$sub_menu = intval(fgets(STDIN));

echo "Selecione o usuario: " . PHP_EOL;
$selecionado = readline();

$remover = RemoverUsuario($selecionado, $mdm_devices, $serial_number);

if (!$remover) {
    echo "Usuario: $selecionado, não existe para o dispositivo" . PHP_EOL .
        "Informa um usuario valido!" . PHP_EOL;
    echo '-------------------------------' . PHP_EOL;
}
