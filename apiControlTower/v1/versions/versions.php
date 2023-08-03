<?php

class versiones {

function ver_change() {
    
    $values=[];

    $value=[
        '1.5.0-Beta' => '2023-08-02-endpoints notificaciones por correo',
        '1.4.0-Beta' => '2023-08-02-endpoints de cálculos por transmisión',
        '1.3.0-Beta' => '2023-07-27-endpoints de cortes',
        '1.2.0-Beta' => '2023-07-27-inserción de datos',
        '1.0.1-Beta' => '2023-07-26-sistema de versionamiento',
        '1.0.0-Beta' => '2023-07-25-sistema base'
        
    ];
    array_push($values,$value);

    return json_encode(['crystalIntegrations-apiControlTower'=>$values]);
}

}

?>