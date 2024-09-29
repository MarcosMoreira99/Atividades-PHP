<?php

include_once './Users.php';
include_once './devices.php';
include_once './Apps.php';

$users = [
    ['name' => 'Lucas Rios', 'userName' => 'Lucas.Rios', 'userType' => 'administrator', 'title' => 'professor', 'department' => 'mathematics'],
    ['name' => 'Helio Borges', 'userName' => 'Helio.Borges', 'userType' => 'end user', 'title' => 'student'],
    ['name' => 'Marcos rios', 'userName' => 'Marcos.rios', 'userType' => 'end user', 'title' => 'student', 'password' => '151515'],
    ['name' => 'Mauro Matos', 'userName' => 'Mauro.Matos', 'userType' => 'end user', 'title' => 'student'],
    ['name' => 'Felipe Developer', 'userName' => 'Felipe.Developer', 'userType' => 'administrator', 'title' => 'professor', 'department' => 'sciences']
];

$devices = [
    ['model' => 'iPhone 12', 'serial_number' => 'ZYS95S7', 'os' => 'iOS', 'os_version' => 16.3, 'battery' => 75, 'wifi' => 'helbor', 'user_name' => 'Lucas.Rios', 'lost_mode' => 'off'],

    ['model' => 'iPhone 15 pro', 'serial_number' => 'BHS94D2', 'os' => 'iOS', 'os_version' => 17.5, 'battery' => 100, 'wifi' => 'dark-SIDE', 'user_name' => 'Felipe.Developer', 'lost_mode' => 'off'],

    ['model' => 'MacBook Air M1', 'serial_number' => 'XTR88G5', 'os' => 'macOS', 'os_version' => 13.4, 'battery' => 95, 'wifi' => 'none', 'user_name' => 'none', 'lost_mode' => 'off'],

    ['model' => 'MacBook (Retina, 12-inch, Early 2016)', 'serial_number' => 'NMS11H3', 'os' => 'macOS', 'os_version' => 14.4, 'battery' => 12, 'wifi' => 'zeus_5G', 'user_name' => 'Marcos.Moreira', 'lost_mode' => 'off'],

    ['model' => 'Apple TV 4K (3rd generation) Wi-Fi + Ethernet', 'serial_number' => 'QWE44F8', 'os' => 'tvOS', 'os_version' => 12.3, 'battery' => 100, 'wifi' => 'Library', 'user_name' => 'Helio.Borges', 'lost_mode' => 'off'],

    ['model' => 'Apple TV (3rd generation)', 'serial_number' => 'PLK67J2', 'os' => 'tvOS', 'os_version' => 10.1, 'battery' => 100, 'wifi' => 'none', 'user_name' => 'none', 'lost_mode' => 'off'],

    ['model' => 'Apple TV (3rd generation)', 'serial_number' => 'JYT12K9', 'os' => 'tvOS', 'os_version' => 12.8, 'battery' => 100, 'wifi' => 'zenvia_5G', 'user_name' => 'none', 'lost_mode' => 'off'],

    ['model' => 'iPhone 4 pro max', 'serial_number' => 'BHS94D3', 'os' => 'iOS', 'os_version' => 17.1, 'battery' => 100, 'wifi' => 'zenvia_5G', 'user_name' => 'Marcos.Moreira', 'lost_mode' => 'off'],


    ['model' => 'iPad Pro 13-inch (M4)', 'serial_number' => 'RTY34L5', 'os' => 'iPadOS', 'os_version' => 17.4, 'battery' => 88, 'wifi' => 'morgan_2.4G', 'user_name' => 'Helio.Borges', 'lost_mode' => 'off'],

];

$osUpdates = [
    ['os' => 'iOS', 'lastVersion' => '18.0', 'name' => 'iOS 18'],
    ['os' => 'macOS', 'lastVersion' => '14.5', 'name' => 'macOS Sonoma'],
    ['os' => 'visionOS', 'lastVersion' => '2.0', 'name' => 'visionOS 2'],
    ['os' => 'iPadOS', 'lastVersion' => '18.0', 'name' => 'iPadOS 18'],
    ['os' => 'watchOS', 'lastVersion' => '10.0', 'name' => 'watchOS 10'],
    ['os' => 'tvOS', 'lastVersion' => '14.4', 'name' => 'tvOS 14']
];

$AppStore = [
    [
        'app_name' => 'Reddit',
        'bundle' => 'ual.reddit.bt',
        'supportedPlatforms' => [
            'ios' => 15.2,
            'visionos' => 1.0,
            'ipados' => 15.2,
            'tvos' => 14.0,
            'watchos' => 10.0
        ],
        'version' => 2.5
    ],
    [
        'app_name' => 'Spotify',
        'bundle' => 'com.spotify.music',
        'supportedPlatforms' => [
            'ios' => 15.0,
            'ipados' => 15.0,
            'tvos' => 13.0
        ],
        'version' => 8.7
    ],
    [
        'app_name' => 'Instagram',
        'bundle' => 'com.instagram.app',
        'supportedPlatforms' => [
            'ios' => 15.1
        ],
        'version' => 210.0
    ],
    [
        'app_name' => 'Twitter',
        'bundle' => 'com.twitter.android',
        'supportedPlatforms' => [
            'ios' => 15.4,
            'visionos' => 2.0
        ],
        'version' => 9.1
    ],
    [
        'app_name' => 'TikTok',
        'bundle' => 'com.tiktok.app',
        'supportedPlatforms' => [
            'ios' => 15.2,
            'ipados' => 15.2,
            'tvos' => 14.5
        ],
        'version' => 23.5
    ],
    [
        'app_name' => 'Zoom',
        'bundle' => 'us.zoom.videomeetings',
        'supportedPlatforms' => [
            'ios' => 15.0,
            'ipados' => 15.0
        ],
        'version' => 5.9
    ],
    [
        'app_name' => 'Uber',
        'bundle' => 'com.uber.app',
        'supportedPlatforms' => [
            'ios' => 15.3
        ],
        'version' => 4.385
    ],
    [
        'app_name' => 'Netflix',
        'bundle' => 'com.netflix.app',
        'supportedPlatforms' => [
            'ios' => 15.0,
            'ipados' => 15.0,
            'tvos' => 14.0,
            'watchos' => 11.0
        ],
        'version' => 14.20
    ],
    [
        'app_name' => 'Duolingo',
        'bundle' => 'com.duolingo.app',
        'supportedPlatforms' => [
            'ios' => 15.1,
            'ipados' => 15.1,
            'tvos' => 14.2
        ],
        'version' => 6.89
    ],
    [
        'app_name' => 'WhatsApp',
        'bundle' => 'com.whatsapp.messenger',
        'supportedPlatforms' => [
            'ios' => 15.4
        ],
        'version' => 22.21
    ]
];


$novos_usuarios = [];

$userClass = new  Users($users);

$deviceClass = new Devices($devices);

$appsClass = new Apps($AppStore);

//$resultado = $appsClass -> getApps('ios', 'WhatsApp');
//print_r($resultado);





//exit;


//$resultado1 = $deviceClass-> osUpdate('RTY34L5', $devices, $osUpdates); 

//print_r($resultado1);

//exit;





//$data = ['serial_number',  'user_name', 'os',  'model'];

//$serialNumber = null;
//$os = null;
//$userName = null;



//$valida = $Class -> getDevices($devices, $data, $os , $serialNumber , $userName);

//print_r($valida);



//exit;

echo "UserName: ";
$NameUser = 'Marcos.rios'; //readline();

echo "Password: ";
$password = '151515'; //readline();

$login = $userClass->loginUser($NameUser, $password);

$dadosAcesso = $userClass->getUsers(null, $NameUser);

$userTypeAdmin = isset($dadosAcesso[0]['userType']) ? $dadosAcesso[0]['userType'] : null;

if ($login == true) {

    $adminOption = ['', ''];
    if ($userTypeAdmin == 'administrator') {
        $adminOption = ['|1| Cadastrar um novo usuário', '|5| Remover Usuario'];
    }

    $menu = 'Menu: ' . PHP_EOL .
        $adminOption[0] . PHP_EOL .
        '|2| Atualizar dados do usuário' . PHP_EOL .
        '|3| Listar usuários' . PHP_EOL .
        '|4| Alterar senha de usuário' . PHP_EOL .
        '|6| Cadastrar novo dispositivo' . PHP_EOL .
        '|7| Atualizar dispositivos' . PHP_EOL .
        '|8| Biblioteca de apps' . PHP_EOL .
        '|9| Listar dispositivos' . PHP_EOL .



        $adminOption[1] . PHP_EOL;

    $encerrar = false;

    if ($userTypeAdmin == 'administrator') {

        while ($encerrar = true) {

            $userClass = new  Users($users);

            $deviceClass = new Devices($devices);

            echo $menu;

            echo "Escolha uma opção: ";
            $resposta = intval(fgets(STDIN));

            switch ($resposta) {

                case 1:

                    echo "Nome: ";
                    $name = readline();

                    echo "userName: ";
                    $userName = readline();

                    echo "userType: ";
                    $userType = readline();
                    echo "title: ";
                    $title =  readline();

                    echo "department: ";
                    $department = readline();

                    echo "Password: ";
                    $password = readline();

                    $cadastrar = $userClass->setUsers($name, $userName, $userType, $title, $department,  $password);


                    if ($cadastrar['status'] == 'Usuario_cadastrado') {

                        echo "------ Usuario cadastrado com sucesso! -------" . PHP_EOL;
                        echo
                        'Usuario: ' . $name . PHP_EOL .
                            '--------------' . PHP_EOL .
                            'UserName: ' . $userName . PHP_EOL .
                            '--------------' . PHP_EOL .
                            ' UserType: ' . $userType . PHP_EOL .
                            '--------------' . PHP_EOL .
                            ' Title: ' . $title . PHP_EOL .
                            '------------' . PHP_EOL .
                            '------------' . PHP_EOL .
                            ' Password: ' .  $password . PHP_EOL .
                            '------------' . PHP_EOL .
                            ' Departament: ' .  $department . PHP_EOL;
                        echo '-----------------------------------------' . PHP_EOL;

                        $users = $cadastrar['users'];
                        // print_r($users);
            
                    }
                    if ($cadastrar['status'] ==  'Erro_dados_essencias_não_fornecidos') {

                        echo "Você deve informar todos os dados essencias!" . PHP_EOL;
                    }
                    break;

                case 2:

                    echo 'Para quem sera a alteração: ' . PHP_EOL .
                        '|1| Usuário Atual' . PHP_EOL .
                        '|2| Outro Usuário' . PHP_EOL;

                    $selecao = readline();

                    if ($selecao == 1) {

                        $userName = $NameUser;
                        echo 'Informe o dado que deseja atualizar: ' . PHP_EOL .
                            '|1| name' . PHP_EOL .
                            '|2| userType' . PHP_EOL .
                            '|3| title' . PHP_EOL .
                            '|4| Todos os dados' . PHP_EOL .
                            '|5| Menu incial' . PHP_EOL;

                        $menu1 = readline();
                        if ($menu1 == 1) {

                            echo "name: ";
                            $name =  readline();
                            $newInfo = ['name' => $name];
                        }

                        if ($menu1 == 2) {

                            echo "userType: ";
                            $userType = readline();
                            $newInfo = ['userType' => $userType];
                        }

                        if ($menu1 == 3) {

                            echo "title: ";
                            $title = readline();
                            $newInfo = ['title' => $title];
                        }

                        if ($menu1 == 4) {

                            echo "name: ";
                            $name =  readline();

                            echo "userType: ";
                            $userType =  readline();

                            echo "title: ";
                            $title = readline();

                            $newInfo = ['name' => $name, 'userType' => $userType, 'title' =>  $title];
                        }

                        if ($menu1 == 5) {

                            echo $menu;
                        }

                        $alterar = $userClass->updateUser($userName, $newInfo);
                        $users[] = $alterar;
                        print_r($alterar);
                    }

                    if ($selecao == 2) {

                        echo "Informe o UserName: ";
                        $userName = readline();

                        $dados = $userClass->getUsers(null, $userName);
                        $tipo_User = isset($dados[0]['userType']) ? $dados[0]['userType'] : null;

                        if ($tipo_User == 'administrator') {

                            echo "Você não pode atualizar os dados de outro Adminstrador!" . PHP_EOL;
                        } elseif ($tipo_User == 'end user') {

                            echo 'Informe o dado que deseja atualizar: ' . PHP_EOL .
                                '|1| name' . PHP_EOL .
                                '|2| userType' . PHP_EOL .
                                '|3| title' . PHP_EOL .
                                '|4| Todos os dados' . PHP_EOL .
                                '|5| Menu incial' . PHP_EOL;

                            $menu1 = readline();
                            if ($menu1 == 1) {

                                echo "name: ";
                                $name =  readline();
                                $newInfo = ['name' => $name];
                            }

                            if ($menu1 == 2) {

                                echo "userType: ";
                                $userType = readline();
                                $newInfo = ['userType' => $userType];
                            }

                            if ($menu1 == 3) {

                                echo "title: ";
                                $title = readline();
                                $newInfo = ['title' => $title];
                            }

                            if ($menu1 == 4) {

                                echo "name: ";
                                $name =  readline();

                                echo "userType: ";
                                $userType =  readline();

                                echo "title: ";
                                $title = readline();

                                $newInfo = ['name' => $name, 'userType' => $userType, 'title' =>  $title];
                            }

                            if ($menu1 == 5) {


                                echo $menu;
                            }

                            $alterar = $userClass->updateUser($userName, $newInfo);
                            $users[] = $alterar;
                            print_r($alterar);
                        } else {

                            echo 'Usuario não cadastrado';
                        }
                    }
                    break;

                case 3:

                    echo 'Lista de Usuarios: ' . PHP_EOL .
                        '|1| All Users.' . PHP_EOL .
                        '|2| administrator' . PHP_EOL .
                        '|3| End user' . PHP_EOL .
                        '|4| userName' . PHP_EOL;


                    $menu2 = readline();

                    if ($menu2 == 1) {

                        $allUsers = $userClass->getUsers();
                        echo "Todos os Usuários: " . PHP_EOL;
                        print_r($allUsers);
                    }

                    if ($menu2 == 2) {

                        $admins = $userClass->getUsers('administrator');
                        echo "Administradores:" . PHP_EOL;
                        print_r($admins);
                    }

                    if ($menu2 == 3) {

                        $end_users = $userClass->getUsers('end user');
                        echo "End Users" . PHP_EOL;
                        print_r($end_users);
                    }

                    if ($menu2 == 4) {

                        echo "Informe o UserName: ";

                        $userName = readline();

                        $users = $userClass->getUsers(null, $userName);
                        echo "Usuário especifico:" . PHP_EOL;
                        print_r($users);
                    }
                    break;

                case 4:

                    echo 'Para quem sera a alteração: ' . PHP_EOL .
                        '|1| Usuário Atual' . PHP_EOL .
                        '|2| Outro Usuário' . PHP_EOL;

                    $selecao = readline();

                    if ($selecao == 1) {

                        $userName = $NameUser;

                        echo "oldPassword: ";
                        $oldPassword = readline();

                        echo "newPassword: ";
                        $newPassword = readline();

                        $senha = $userClass->updatePassword($userName, $oldPassword, $newPassword);

                        if ($senha['status'] == 'correto') {

                            echo "Senha:  $oldPassword || Alterada com sucesso" . PHP_EOL .
                                "Nova Senha : $newPassword" . PHP_EOL;
                            echo '-------------------------------' . PHP_EOL;
                            $users = $senha['user_senha'];
                        }

                        if ($senha['status'] == 'senha_incorreta') {

                            echo "Senha Incorreta, não é possivel alterar" . PHP_EOL;
                        }

                        if ($senha['status'] ==  'encontrado') {

                            echo "UserName: $userName" . PHP_EOL .
                                "Senha : $newPassword cadastrada com sucesso" . PHP_EOL;
                            echo '-------------------------------' . PHP_EOL;
                            $users = $senha['realizado'];
                        }

                        if ($senha['status'] == 'UserName_Nao_Encontrado') {

                            echo "UserName: $userName não existe" . PHP_EOL;
                            echo '-------------------------------' . PHP_EOL;
                        }
                    }

                    if ($selecao == 2) {

                        echo "UserName: ";
                        $userName = readline();

                        $dados = $userClass->getUsers(null, $userName);
                        $tipo_User = $dados[0]['userType'];

                        if ($tipo_User == 'administrator') {

                            echo "Você não pode atualizar os dados de outro Adminstrador!" . PHP_EOL;
                        }

                        if ($tipo_User != 'administrator') {


                            echo "oldPassword: ";
                            $oldPassword = readline();

                            echo "newPassword: ";
                            $newPassword = readline();

                            $senha = $userClass->updatePassword($userName, $oldPassword, $newPassword);

                            if ($senha['status'] == 'correto') {

                                echo "Senha:  $oldPassword || Alterada com sucesso" . PHP_EOL .
                                    "Nova Senha : $newPassword" . PHP_EOL;
                                echo '-------------------------------' . PHP_EOL;
                                $users = $senha['user_senha'];
                            }

                            if ($senha['status'] == 'senha_incorreta') {

                                echo "Senha Incorreta, não é possivel alterar" . PHP_EOL;
                            }

                            if ($senha['status'] ==  'encontrado') {

                                echo "UserName: $userName" . PHP_EOL .
                                    "Senha : $newPassword cadastrada com sucesso" . PHP_EOL;
                                echo '-------------------------------' . PHP_EOL;
                                $users = $senha['realizado'];
                            }

                            if ($senha['status'] == 'UserName_Nao_Encontrado') {

                                echo "UserName: $userName não existe" . PHP_EOL;
                                echo '-------------------------------' . PHP_EOL;
                            }
                        }
                    }

                    break;

                case 5:

                    echo "Informe o UserName: ";
                    $userName = readline();

                    $remover =  $userClass->DeleteUSer($userName);

                    if ($remover['status'] == 'Removido') {

                        echo "Usuario: $userName removido com sucesso!" . PHP_EOL;
                        echo '-------------------------------' . PHP_EOL;
                        $users = $remover['User_Removido'];
                        print_r($users);
                    }

                    if ($remover['status'] == 'Não_encontrado') {
                        echo "UserName: $userName não existe" . PHP_EOL;
                        echo '-------------------------------' . PHP_EOL;
                    }

                    break;


                case 6:





                    echo "Informe os dados para cadastro:" . PHP_EOL;



                    echo "Serial_Number";
                    $serialNumber = readline();

                    echo "Model: ";
                    $model = readline();

                    echo "Os: ";
                    $os = readline();

                    echo "Os_version";
                    $os_version = readline();

                    echo "Battery";
                    $battery = intval(fgets(STDIN));

                    echo "User_Name: ";
                    $userName = readline();

                    echo "Wi_fi: ";
                    $wifi = readline();

                    echo "Lost_Mode: ";
                    $lost_mode = readline();





                    $model = $model;
                    $os = $os;
                    $os_version = $os_version;
                    $battery = $battery;
                    $userName = $userName;
                    $wifi = $wifi;
                    $lost_mode = $lost_mode;

                    $cadastro = $deviceClass->setDevices(null, $model, $serialNumber, $os, $os_version, $battery, $userName, $wifi, $lost_mode);

                    $devices = $cadastro;

                    print_r($devices);

                    echo "Cadastro Realizado com sucesso!" . PHP_EOL;


                    break;



                case 7:

                    echo "Informe o serial_number do dispositivo que deseja atualizar: " . PHP_EOL;

                    $serialNumber = readline();

                    $resultado = $deviceClass->osUpdate($serialNumber, $osUpdates);

                    $devices =  $resultado['atualizado'];

                    print_r($resultado);

                    break;


                case 8:

                    echo "Informe a OS: ";
                    $os = readline();

                    echo "Nome do App: ";
                    $app = readline();


                    $resultado = $appsClass->getApps($os,  $app);
                    print_r($resultado);


                    break;


                case 9:


                    $subMenu = '|1| Serial_Number' . PHP_EOL .
                        '|2| User_Name' . PHP_EOL .
                        '|3| OS' . PHP_EOL;





                    echo "Selecione o dado que deseja atualizar:" . PHP_EOL;
                    echo $subMenu;

                    $escolha = readline();

                    $data = ['serial_number',  'os_version', 'user_name', 'os',  'model'];



                    if ($escolha == '1') {


                        echo "Serial_Number: ";
                        $serialNumber = readline();

                        $os = null;
                        $userName = null;
                    }


                    if ($escolha == '2') {


                        $data = ['serial_number', 'os_version', 'user_name', 'os',  'model'];



                        echo "User-Name ";
                        $userName = readline();

                        $serialNumber = null;
                        $os = null;
                    }


                    if ($escolha == '3') {


                        $data = ['serial_number', 'os_version', 'user_name', 'os',  'model'];



                        echo "OS: ";
                        $os = readline();

                        $serialNumber = null;
                        $userName = null;
                    }


                    $valida = $deviceClass->getDevices($data, $os, $serialNumber, $userName);

                    print_r($valida);


                    break;
            }
        }
    }

    if ($userTypeAdmin == 'end user') {

        while ($encerrar = true) {

            $userClass = new  Users($users);

            $deviceClass = new Devices($devices);

            echo $menu;

            echo "Escolha uma opção: ";
            $resposta = intval(fgets(STDIN));

            switch ($resposta) {

                case 1:

                    echo "Voce não pode realizar essa ação..." . PHP_EOL .
                        "Acão permitida apenas para adminstradores" . PHP_EOL;
                    echo "----------------------------------------------" . PHP_EOL;

                    break;

                case 2:

                    $userName = $NameUser;

                    echo 'Informe o dado que deseja atualizar: ' . PHP_EOL .
                        '|1| name' . PHP_EOL .
                        '|2| userType' . PHP_EOL .
                        '|3| title' . PHP_EOL .
                        '|4| Todos os dados' . PHP_EOL .
                        '|5| Menu incial' . PHP_EOL;

                    $menu1 = readline();
                    if ($menu1 == 1) {

                        echo "name: ";
                        $name =  readline();
                        $newInfo = ['name' => $name];
                    }

                    if ($menu1 == 2) {

                        echo "userType: ";
                        $userType = readline();
                        $newInfo = ['userType' => $userType];
                    }

                    if ($menu1 == 3) {

                        echo "title: ";
                        $title = readline();
                        $newInfo = ['title' => $title];
                    }

                    if ($menu1 == 4) {

                        echo "name: ";
                        $name =  readline();

                        echo "userType: ";
                        $userType =  readline();

                        echo "title: ";
                        $title = readline();

                        $newInfo = ['name' => $name, 'userType' => $userType, 'title' =>  $title];
                    }

                    if ($menu1 == 5) {


                        echo $menu;
                    }

                    $alterar = $userClass->updateUser($userName, $newInfo);

                    $users = $alterar;

                    print_r($alterar);
                    break;

                case 3:

                    echo 'Lista de Usuarios: ' . PHP_EOL .
                        '|1| All Users.' . PHP_EOL .
                        '|2| administrator' . PHP_EOL .
                        '|3| End user' . PHP_EOL .
                        '|4| userName' . PHP_EOL;

                    $menu2 = readline();

                    if ($menu2 == 1) {

                        $allUsers = $userClass->getUsers();
                        echo "Todos os Usuários: " . PHP_EOL;
                        print_r($allUsers);
                    }

                    if ($menu2 == 2) {

                        $admins = $userClass->getUsers('administrator');
                        echo "Administradores:" . PHP_EOL;
                        print_r($admins);
                    }

                    if ($menu2 == 3) {

                        $end_users = $userClass->getUsers('end user');
                        echo "End Users" . PHP_EOL;
                        print_r($end_users);
                    }

                    if ($menu2 == 4) {

                        echo "Informe o UserName: ";

                        $userName = readline();

                        $users = $userClass->getUsers(null, $userName);
                        echo "Usuário especifico:" . PHP_EOL;
                        print_r($users);
                    }
                    break;

                case 4:

                    $userName = $NameUser;

                    echo "oldPassword: ";
                    $oldPassword = readline();

                    echo "newPassword: ";
                    $newPassword = readline();

                    $senha = $userClass->updatePassword($userName, $oldPassword, $newPassword);

                    if ($senha['status'] == 'correto') {

                        echo "Senha:  $oldPassword || Alterada com sucesso" . PHP_EOL .
                            "Nova Senha : $newPassword" . PHP_EOL;
                        echo '-------------------------------' . PHP_EOL;
                        $users = $senha['user_senha'];
                    }

                    if ($senha['status'] == 'senha_incorreta') {

                        echo "Senha Incorreta, não é possivel alterar" . PHP_EOL;
                    }

                    if ($senha['status'] ==  'encontrado') {

                        echo "UserName: $userName" . PHP_EOL .
                            "Senha : $newPassword cadastrada com sucesso" . PHP_EOL;
                        echo '-------------------------------' . PHP_EOL;
                        $users = $senha['realizado'];
                    }

                    if ($senha['status'] == 'UserName_Nao_Encontrado') {

                        echo "UserName: $userName não existe" . PHP_EOL;
                        echo '-------------------------------' . PHP_EOL;
                    }

                    break;

                case 5:

                    echo "Voce não pode realizar essa ação..." . PHP_EOL .
                        "Acão permitida apenas para adminstradores" . PHP_EOL;
                    echo "----------------------------------------------" . PHP_EOL;

                    break;


                case 6:

                    echo "Informe os dados para cadastro:" . PHP_EOL;



                    echo "Serial_Number";
                    $serialNumber = readline();

                    echo "Model: ";
                    $model = readline();

                    echo "Os: ";
                    $os = readline();

                    echo "Os_version";
                    $os_version = readline();

                    echo "Battery";
                    $battery = intval(fgets(STDIN));

                    echo "User_Name: ";
                    $userName = readline();

                    echo "Wi_fi: ";
                    $wifi = readline();

                    echo "Lost_Mode: ";
                    $lost_mode = readline();





                    $model = $model;
                    $os = $os;
                    $os_version = $os_version;
                    $battery = $battery;
                    $userName = $userName;
                    $wifi = $wifi;
                    $lost_mode = $lost_mode;

                    $cadastro = $deviceClass->setDevices(null, $model, $serialNumber, $os, $os_version, $battery, $userName, $wifi, $lost_mode);

                    $devices = $cadastro;

                    print_r($devices);

                    echo "Cadastro Realizado com sucesso!" . PHP_EOL;


                    break;

                case 7:

                    echo "Informe o serial_number do dispositivo que deseja atualizar: " . PHP_EOL;

                    $serialNumber = readline();

                    $resultado = $deviceClass->osUpdate($serialNumber, $osUpdates);

                    $devices =  $resultado['atualizado'];

                    print_r($resultado);

                    break;


                case 8:

                    echo "Informe a OS: ";
                    $os = readline();

                    echo "Nome do App: ";
                    $app = readline();


                    $resultado = $appsClass->getApps($os,  $app);
                    print_r($resultado);


                    break;



                case 9:


                    $subMenu = '|1| Serial_Number' . PHP_EOL .
                        '|2| User_Name' . PHP_EOL .
                        '|3| OS' . PHP_EOL;





                    echo "Selecione o dado que deseja atualizar:" . PHP_EOL;
                    echo $subMenu;

                    $escolha = readline();

                    $data = ['serial_number', 'os_version', 'user_name', 'os',  'model'];



                    if ($escolha == '1') {


                        echo "Serial_Number: ";
                        $serialNumber = readline();

                        $os = null;
                        $userName = null;
                    }


                    if ($escolha == '2') {


                        $data = ['serial_number',  'user_name', 'os',  'model'];



                        echo "User-Name ";
                        $userName = readline();

                        $serialNumber = null;
                        $os = null;
                    }


                    if ($escolha == '3') {


                        $data = ['serial_number',  'user_name', 'os',  'model'];



                        echo "OS: ";
                        $os = readline();

                        $serialNumber = null;
                        $userName = null;
                    }


                    $valida = $deviceClass->getDevices($data, $os, $serialNumber, $userName);

                    print_r($valida);


                    break;
            }
        }
    }
}

if ($login == false) {

    echo "Usuario ou senha invalido!";
}
