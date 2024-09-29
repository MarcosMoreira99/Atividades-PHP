<?php

class Devices
{

    public $devices;

    public function __construct( $devices)
    {

        $this->devices =  $devices;
    }

    function getDevices($data, $os = null, $serialNumber = null, $userName = null)
    {

        $devices = $this->devices;


        $filtro = [];

        foreach ($devices as $key => $device) {

            foreach ($device as $info => $dados) {

                if ($serialNumber == null || $device['serial_number'] == $serialNumber) {

                    if ($os == null ||  $device['os'] == $os) {


                        if ($userName == null || $device['user_name'] == $userName) {

                            if (in_array($info, $data)) {
                                $filtro[$key][$info] = $dados;
                            }
                        }
                    }
                }
            }
        }
        return $filtro;
    } 


    function DispositivoExiste($serialNumber)
    {

        $devices = $this->devices;


        $serial_existe = $this->getDevices($devices,  ['serial_number'], null, $serialNumber, null);


        return $serial_existe ? true : false;
    }

    function setDevices($data, $model, $serialNumber, $os, $os_version, $battery, $userName, $wifi, $lost_mode)
    {

        $devices = $this->devices;


        foreach ($devices as $device) {


            if ($model == null || $serialNumber == null || $os == null || $battery == null || $userName == null || $wifi == null || $lost_mode == null) {

                return ['status' => 'Dados_não_fornecidos'];
            } else {

                $new = [
                    'model' => $model,
                    'serial_number' => $serialNumber,
                    'os' => $os,
                    'os_version' => $os_version,
                    'battery' => $battery,
                    'user_name' =>  $userName,
                    'wifi' => $wifi,
                    'lost_mode' => $lost_mode
                ];

                $devices[] = $new;
                return $devices;
            }
        }
    }

    function osUpdate($serialNumber, $osUpdates){
        
    $devices = $this->devices;

    foreach ($devices as $key => $device) {

        if ($device['serial_number'] == $serialNumber) {

            foreach ($osUpdates as $update) {

                if ($update['os'] == $device['os']) {

                    if ($device['os_version'] < $update['lastVersion']) {

                        $devices[$key]['os_version'] = $update['lastVersion'];

                        return ['status' => 'Dispositivo_Atualizado', 'atualizado' => $devices];

                    } else {
                        return ['status' => 'Ultima_Versão_Disponivel'];
                    }
                }
            }
            return ['status' => 'OS_não_Encontrado'];
        }
    }
    return ['status' => 'serial_number_não_Localizado'];
}
}
            


        
    

