





function setDevices($devices, $data, $model, $serialNumber, $os, $os_version, $battery, $userName, $wifi, $lost_mode)
    {



        $serial_existe = $this->getDevices($devices, $data, $os, $serialNumber, $userName);

        if (!empty($serial_existe)) {


            return ['status' => 'Ja_existe'];
        }

        if (empty($serial_existe)) {


            foreach ($devices as $device) {

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

    