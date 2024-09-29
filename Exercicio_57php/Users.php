<?php


class Users
{


    public $users;

    public function __construct($users)
    {

        $this->users = $users;
    }

    function getUsers($userType = null, $userName = null)
    {

        $usuarios = $this->users;


        $filtro_usuarios = [];

        $unico = [];

        foreach ($usuarios as $user) {

            if ($userType == null || $user['userType'] ==  $userType && $userName == null || $user['userName'] == $userName) {

                $filtro_usuarios[] = [
                    'userName' => $user['userName'], 'userType' => $user['userType']
                ];
            }


            if ($userName != null) {
                if ($user['userName'] == $userName) {
                    $unico[] = ['userName' => $user['userName'], 'userType' => $user['userType']];
                    return    $unico;
                }
            }
        }

        return $filtro_usuarios;
    }

    function  setUsers($name, $userName, $userType, $title, $department = null, $password)
    {

        $usuarios = $this->users;

        if (empty($name) || empty($userName) || empty($userType)  || empty($title)) {
            return  ['status' => 'Erro_dados_essencias_nao_fornecidos'];
        }


        if (!empty($name) || !empty($userName) || !empty($userType)  || empty($title)) {
            $novos_usuarios = [

                'name' => $name,
                'userName' => $userName,
                'userType' => $userType,
                'title' => $title,
                'department' => $department,
                'password' => $password,
            ];

            $usuarios[] = $novos_usuarios;

            return  ['status' => 'Usuario_cadastrado', 'users' =>  $usuarios];
        }
    }

    function updateUser($userName, $newInfo)
    {

        $usuarios = $this->users;

        foreach ($usuarios as $key => $user) {

            if ($user['userName'] == $userName) {

                foreach ($newInfo as $indice => $value) {

                    if ( $indice != ['userName'] && isset($user[$indice])) {
                        $usuarios[$key][$indice] = $value;
                    }
                }
            }
        }

        return $usuarios;
    }

    function  updatePassword($userName, $oldPassword, $newPassword)
    {

        $usuarios = $this->users;


        foreach ($usuarios as $key => $user) {

            if ($user['userName'] == $userName && isset($user['password'])) {

                if ($user['password'] == $oldPassword) {

                    $users[$key]['password'] = $newPassword;

                    return ['status' => 'correto',  'user_senha' => $users];
                } else {

                    return ['status' => 'senha_incorreta'];
                }
            } elseif (($user['userName'] == $userName)) {

                $users[$key]['password'] = $newPassword;
                return ['status' => 'encontrado',  'realizado' => $users];
            }
        }

        return ['status' => 'UserName_Nao_Encontrado'];
    }

    function DeleteUSer($userName)
    {

        $usuarios = $this->users;


        $existe  = false;

        foreach ($usuarios as $key => $user) {
            if ($user['userName'] == $userName) {

                $existe = true;
                unset($usuarios[$key]);
            }
        }


        if (!$existe) {

            return ['status' => 'Não_encontrado'];
        }

        return ['status' => 'Removido',  'User_Removido' => $usuarios];
    }






    function loginUser($NameUser, $password = null)
    {

        $usuarios = $this->users;

        foreach ($usuarios as $key =>  $user) {

            if (strtolower($NameUser) == strtolower($user['userName'])) {

                foreach ($user as $info => $us) {

                    if ('password' == $info) {

                        if ($password == $user['password']) {
                            return true;
                        } else {
                            return false;
                        }
                    }
                }


                foreach ($usuarios as $key => $user) {
                    if (strtolower($NameUser) == strtolower($user['userName'])) {

                        if ($password == null) {

                            return true;
                        }
                    }
                }
            }
        }
        return false;
    }
}
