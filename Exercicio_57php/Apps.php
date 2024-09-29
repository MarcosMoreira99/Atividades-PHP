<?php


class Apps
{



    public $AppStore;

    public function __construct($AppStore)
    {

        $this->AppStore = $AppStore;
    }


    public function getApps($os, $app_nome)
    {

        $app_store = $this->AppStore;

        foreach($app_store as $app){

            if(strtolower($app['app_name']) == strtolower($app_nome)){

                if(isset($app['supportedPlatforms'][strtolower($os)])){


                    return [
                        'app_name' => $app['app_name'],
                        'bundle' => $app['bundle'],
                        'version' => $app['version'],
                        'supportedPlatforms' => $app['supportedPlatforms'][strtolower($os)]
                    ];
                } else{

                    return ['status' => 'App não disponivel para o sistema informado'];
                }
            }
        }

        return ['status' => 'App não encontrado'];
    }
}
