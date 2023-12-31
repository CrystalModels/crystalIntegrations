<?php

require 'flight/Flight.php';

require_once 'database/db_users.php';
require_once 'env/domain.php';

Flight::route('POST /postSchedule/@apk/@xapk', function ($apk,$xapk) {
   
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    
        // Leer los datos de la solicitud
        
            
           

        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apk, 
          'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {

            $profileId= Flight::request()->data->profileId;

    $conectar=conn();
    require_once '../../apiControlTower/v1/model/modelSecurity/uuid/uuidd.php';
   
  
    
    $x = 0;
    for ($i = 1; $i <= 24; $i++) {
        // Código a ejecutar en cada iteraci
        $gen_uuid = new generateUuid();
        $myuuid = $gen_uuid->guidv4();
        $primeros_ocho = substr($myuuid, 0, 8);
        $xTime = $x . ":00";
        $query2 = mysqli_query($conectar, "INSERT INTO generalSchedules (schId, profileId, sTime) VALUES ('$primeros_ocho', '$profileId', '$xTime')");
        $x++;
    }


    // $query2= mysqli_query($conectar,"INSERT logInfoModels (logId,profileId) values ('$primeros_ocho2','$profileId')");
               
                         
 echo "true";





           
          
           // echo json_encode($response1);
        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});


Flight::route('POST /postModelStatus/@apk/@xapk', function ($apk,$xapk) {
   
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    
        // Leer los datos de la solicitud
        
            
           

        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apk, 
          'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {

            $profileId= Flight::request()->data->profileId;

    $conectar=conn();
    require_once '../../apiControlTower/v1/model/modelSecurity/uuid/uuidd.php';
   
  
    
        // Código a ejecutar en cada iteraci
        $gen_uuid = new generateUuid();
        $myuuid = $gen_uuid->guidv4();
        $primeros_ocho = substr($myuuid, 0, 8);
       
        $query2 = mysqli_query($conectar, "INSERT INTO modelStatus (statusId, modelId) VALUES ('$primeros_ocho', '$profileId')");
      


    // $query2= mysqli_query($conectar,"INSERT logInfoModels (logId,profileId) values ('$primeros_ocho2','$profileId')");
               
                         
 echo "true";





           
          
           // echo json_encode($response1);
        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});



Flight::route('POST /postRooms/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    
            
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apk, 
          'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {

            $name= Flight::request()->data->name;
            $comments= Flight::request()->data->comments;

    $conectar=conn();
    require_once '../../apiControlTower/v1/model/modelSecurity/uuid/uuidd.php';
    $gen_uuid = new generateUuid();
    $myuuid = $gen_uuid->guidv4();
    $primeros_ocho = substr($myuuid, 0, 8);
    $query2= mysqli_query($conectar,"INSERT rooms (roomId,name,comments) values ('$primeros_ocho','$name','$comments')");
               
    if ($query2) {
        echo "true*¡Room agregado con exito!";
    } else {
        echo "false*¡Error en la consulta! " . mysqli_error($conectar);
    }        
 

          
           // echo json_encode($response1);
        } else {
            echo 'false*¡Autenticación fallida!';
             //echo json_encode($response1);
        }
    } else {
        echo 'false*¡Encabezados faltantes!';
    }
});






Flight::route('POST /postReminds/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    
            
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apk, 
          'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {

         
            $comments= Flight::request()->data->comments;
            $remindType= Flight::request()->data->remindType;
            $profileId= Flight::request()->data->profileId;
            $ownerId= Flight::request()->data->ownerId;
            $rDate= Flight::request()->data->rDate;
            $rTime= Flight::request()->data->rTime;
            if($remindType=="general"){
                $remindTypedb="GENERAL";
            }
            if($remindType=="personal"){
                $remindTypedb=$profileId;
            }

    $conectar=conn();
    require_once '../../apiControlTower/v1/model/modelSecurity/uuid/uuidd.php';
    $gen_uuid = new generateUuid();
    $myuuid = $gen_uuid->guidv4();
    $primeros_ocho = substr($myuuid, 0, 8);
    $query2= mysqli_query($conectar,"INSERT INTO generalReminds (remindId,comments,profileId,ownerId,rDate,rTime,remindType) values ('$primeros_ocho','$comments','$profileId','$ownerId','$rDate','$rTime','$remindTypedb')");
               
    if ($query2) {
        echo "true*¡Recordatoio agregado con exito!";
    } else {
        echo "false*¡Error en la consulta! " . mysqli_error($conectar);
    }        
 

          
           // echo json_encode($response1);
        } else {
            echo 'false*¡Autenticación fallida!';
             //echo json_encode($response1);
        }
    } else {
        echo 'false*¡Encabezados faltantes!';
    }
});



Flight::route('POST /putMyRemindStatus/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    
            
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apk, 
          'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {

         
            $remindId= Flight::request()->data->remindId;
          
            $profileId= Flight::request()->data->profileId;
          
           

    $conectar=conn();
    require_once '../../apiControlTower/v1/model/modelSecurity/uuid/uuidd.php';
    $gen_uuid = new generateUuid();
    $myuuid = $gen_uuid->guidv4();
    $primeros_ocho = substr($myuuid, 0, 8);
    $query2= mysqli_query($conectar,"UPDATE generalReminds SET isActive=0 where remindId='$remindId' and ownerId='$profileId'");
               
    if ($query2) {
        echo "true*¡Recordatoio oculto con exito!";
    } else {
        echo "false*¡Error en la consulta! " . mysqli_error($conectar);
    }        
 

          
           // echo json_encode($response1);
        } else {
            echo 'false*¡Autenticación fallida!';
             //echo json_encode($response1);
        }
    } else {
        echo 'false*¡Encabezados faltantes!';
    }
});







Flight::route('POST /putRooms/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    
            
        // Leer los datos de la solicitud
        
            




        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
            'apiKey' =>$apk, 
            'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {

            $name= Flight::request()->data->name;
            $comments= Flight::request()->data->comments;
            $roomId= Flight::request()->data->roomId;

    $conectar=conn();
    
    $query2= mysqli_query($conectar,"UPDATE rooms SET name='$name',comments='$comments' where roomId='$roomId'");
               
                         
 echo "true*¡Room editado con exito!";


           // echo json_encode($response1);
        } else {
            echo 'false*¡Autenticación fallida!';
             //echo json_encode($response1);
        }
    } else {
        echo 'false*¡Encabezados faltantes!';
    }
});


Flight::route('POST /putModelStatus/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    
            
        // Leer los datos de la solicitud
        
            




        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
            'apiKey' =>$apk, 
            'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {

            $dbvalue= Flight::request()->data->dbvalue;
            $value= Flight::request()->data->value;
            $profileId= Flight::request()->data->profileId;

    $conectar=conn();
    
    $query2= mysqli_query($conectar,"UPDATE modelStatus SET $dbvalue='$value' where modelId='$profileId'");
               
                         
 echo "true*¡".$value."!";


           // echo json_encode($response1);
        } else {
            echo 'false*¡Autenticación fallida!';
             //echo json_encode($response1);
        }
    } else {
        echo 'false*¡Encabezados faltantes!';
    }
});




Flight::route('POST /putMyAlert/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    
            
        // Leer los datos de la solicitud
        
            




        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
            'apiKey' =>$apk, 
            'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {

            $response= Flight::request()->data->response;
            $alertId= Flight::request()->data->alertId;
            $profileId= Flight::request()->data->profileId;

    $conectar=conn();
    

    if($response=="del"){
        $query2= mysqli_query($conectar,"DELETE from generalAlerts where alertId='$alertId' and profileId='$profileId'");
               
                         
        echo "true*¡Alerta eliminada con exito!";
    }else{

        $query2= mysqli_query($conectar,"UPDATE generalAlerts SET alertResponse='$response',isActive=0 where alertId='$alertId' and profileId='$profileId'");
               
                         
        echo "true*¡Alerta respondida con exito!";
       
    }

           // echo json_encode($response1);
        } else {
            echo 'false*¡Autenticación fallida!';
             //echo json_encode($response1);
        }
    } else {
        echo 'false*¡Encabezados faltantes!';
    }
});


Flight::route('POST /connectModelPage/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    
            
        // Leer los datos de la solicitud
        
            




        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
            'apiKey' =>$apk, 
            'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {

            $transId= Flight::request()->data->transId;
            $pageId= Flight::request()->data->pageId;
            $profileId= Flight::request()->data->profileId;

    $conectar=conn();
    // Establecer la zona horaria a Colombia
date_default_timezone_set('America/Bogota');

// Obtener la hora actual en Colombia
$horaActual = new DateTime();
$horaActual->setTimezone(new DateTimeZone('America/Bogota'));

// Imprimir la hora actual en Colombia
$hora1= $horaActual->format('H:i:s');
$fechaActual = date('Y-m-d');

require_once '../../apiControlTower/v1/model/modelSecurity/uuid/uuidd.php';
$gen_uuid = new generateUuid();
$myuuid = $gen_uuid->guidv4();
$primeros_ocho = substr($myuuid, 0, 8);
    $query2= mysqli_query($conectar,"UPDATE pageAssignation SET valueNow='true' where profileId='$profileId' and transId='$transId' and pageId='$pageId'");
    $query2= mysqli_query($conectar,"INSERT INTO transmissionRecord (transId,profileId,pageId,startTime,startDate) values ('$transId','$profileId','$pageId','$hora1','$fechaActual')");
    $query2= mysqli_query($conectar,"INSERT INTO modelEarn (earnId,modelId,transId,pageId,startDate,startTime) values ('$primeros_ocho','$profileId','$transId','$pageId','$fechaActual','$hora1')");
   
                         
 echo "true*¡Modelo Conecta@ con exito!";


           // echo json_encode($response1);
        } else {
            echo 'false*¡Autenticación fallida!';
             //echo json_encode($response1);
        }
    } else {
        echo 'false*¡Encabezados faltantes!';
    }
});

Flight::route('POST /connectModelPageNot/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    
            
        // Leer los datos de la solicitud
        
            




        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
            'apiKey' =>$apk, 
            'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {

            $transId= Flight::request()->data->transId;
            $pageId= Flight::request()->data->pageId;
            $profileId= Flight::request()->data->profileId;

    $conectar=conn();




    $query= mysqli_query($conectar,"SELECT startTime from transmissionRecord where profileId='$profileId' and transId='$transId' and isActive=1");
    // Establecer la zona horaria a Colombia
date_default_timezone_set('America/Bogota');

// Obtener la hora actual en Colombia
$horaActual = new DateTime();
$horaActual->setTimezone(new DateTimeZone('America/Bogota'));
date_default_timezone_set('America/Bogota');

// Obtener la hora actual en Colombia
$timer=date('H:i:s');
//$horaActual->setTimezone(new DateTimeZone('America/Bogota'));
// Imprimir la hora actual en Colombia



     $values=[];

     while($row = $query->fetch_assoc())
     {

        // $hora1 = new DateTime($row['startTime']);
        $starttime= $row['startTime'];
        $dater = date('Y-m-d');
        $timer=date('H:i:s');
        $hora1 = $starttime;
        $fecha = DateTime::createFromFormat('H:i:s', $hora1);
        $fecha2 = DateTime::createFromFormat('H:i:s', $timer);

$hora2 = $timer;

$diferencia = $fecha->diff($fecha2);

//$diferenciaHoras = $diferencia->format('%H');
//$diferenciaMinutos = $diferencia->format('%i');
$diferenciaSegundos = $diferencia->format('%s');

//$totalHours= $diferenciaHoras.":".$diferenciaMinutos.":".$diferenciaSegundos;




// Horas en formato HH:mm
$horaInicio = $starttime;
$horaFin = $timer;

// Convertir horas a minutos
$inicio = strtotime($horaInicio);
$fin = strtotime($horaFin);

// Si la hora final es anterior a la hora inicial, sumar 24 horas al final para obtener la diferencia correcta
if ($fin < $inicio) {
$fin += 86400; // 24 horas en segundos (24 * 60 * 60)
}

// Calcular la diferencia en minutos
$diferenciaMinutos = ($fin - $inicio) / 60;

// Calcular las horas y minutos transcurridos
$horasTranscurridas = floor($diferenciaMinutos / 60);
$minutosTranscurridos = $diferenciaMinutos % 60;

$fechaActual = date('Y-m-d');
$totalHours= $horasTranscurridas.":".$minutosTranscurridos.":".$diferenciaSegundos;


$query2= mysqli_query($conectar,"UPDATE pageAssignation SET valueNow='false' where profileId='$profileId' and transId='$transId'");
    
    
$query2= mysqli_query($conectar,"UPDATE transmissionRecord SET isActive=0,endTime='$timer',endDate='$fechaActual',totalTime='$totalHours' where profileId='$profileId' and transId='$transId' and isActive=1 and pageId='$pageId'");


$query2= mysqli_query($conectar,"UPDATE modelEarn SET isActive=0,endTime='$timer',endDate='$fechaActual',totalTime='$totalHours' where modelId='$profileId' and transId='$transId' and isActive=1 and pageId='$pageId'");

     
            

     }


            
 echo "true*¡Modelo Conecta@ con exito!";


           // echo json_encode($response1);
        } else {
            echo 'false*¡Autenticación fallida!';
             //echo json_encode($response1);
        }
    } else {
        echo 'false*¡Encabezados faltantes!';
    }
});



Flight::route('POST /assignPages/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    
            
        // Leer los datos de la solicitud
        
            




        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
            'apiKey' =>$apk, 
            'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {

            $pageId= Flight::request()->data->pageId;
            $profileId= Flight::request()->data->profileId;

    $conectar=conn();
    

    $query1= mysqli_query($conectar,"SELECT profileId FROM pageAssignation where profileId='$profileId' and pageId='$pageId' and isActive=1 ");
    $nr=mysqli_num_rows($query1);

    if($nr<=0){


        $query1= mysqli_query($conectar,"SELECT isActive FROM generalPages where pageId='$pageId'");
               
          
        if ($query1) {
            while ($row = $query1->fetch_assoc()) {
            
                $isActive= $row['isActive'];

                if($isActive==1){


                    require('../../apiControlTower/v1/model/modelSecurity/uuid/uuidd.php');
                    $con=new generateUuid();
                        $myuuid = $con->guidv4();
                        $primeros_ocho = substr($myuuid, 0, 8);
            
                $query2= mysqli_query($conectar,"INSERT INTO pageAssignation (transId,profileId,pageId) VALUES ('$primeros_ocho','$profileId','$pageId')");
                           
                                     
             echo "true*¡Página asignada con exito!";
            
                }
                else{
                    echo "false*¡Página desactivada!";
                }
            }}else{

                echo "false*¡Página desactivada!";
            }







    }else{
        echo 'false*¡Página asignada previamente!';

    }
           // echo json_encode($response1);
        } else {
            echo 'false*¡Autenticación fallida!';
             //echo json_encode($response1);
        }
    } else {
        echo 'false*¡Encabezados faltantes!';
    }
});


Flight::route('POST /assignRooms/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    
            
        // Leer los datos de la solicitud
        
            




        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
            'apiKey' =>$apk, 
            'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {

            $roomId= Flight::request()->data->roomId;
            $profileId= Flight::request()->data->profileId;

    $conectar=conn();
    

    $query1= mysqli_query($conectar,"SELECT profileId FROM roomAssignation where profileId='$profileId' and roomId='$roomId' and isActive=1 ");
    $nr=mysqli_num_rows($query1);

    if($nr<=0){


        require('../../apiControlTower/v1/model/modelSecurity/uuid/uuidd.php');
        $con=new generateUuid();
            $myuuid = $con->guidv4();
            $primeros_ocho = substr($myuuid, 0, 8);

    $query2= mysqli_query($conectar,"INSERT INTO roomAssignation (assignId,roomId,profileId) VALUES ('$primeros_ocho','$roomId','$profileId')");
               
                         
 echo "true*¡Room asignado con exito!";

    }else{
        echo 'false*¡Room asignado previamente!';

    }
           // echo json_encode($response1);
        } else {
            echo 'false*¡Autenticación fallida!';
             //echo json_encode($response1);
        }
    } else {
        echo 'false*¡Encabezados faltantes!';
    }
});


Flight::route('POST /assignRoomsByModel/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    
            
        // Leer los datos de la solicitud
        
            




        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
            'apiKey' =>$apk, 
            'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {

            $roomId= Flight::request()->data->roomId;
            $profileId= Flight::request()->data->profileId;





    $conectar=conn();
    

    

    if($profileId=="del"){
        $query2= mysqli_query($conectar,"UPDATE rooms set profileId='0' where roomId='$roomId' and status=1 and isActive=1 and profileId!='0'");
                   
                             
        echo "true*¡Room liberado con exito!";

    }else{
        $query1= mysqli_query($conectar,"SELECT profileId FROM roomAssignation where profileId='$profileId' and roomId='$roomId' and isActive=1");
        $nr=mysqli_num_rows($query1);
    
        if($nr>=1){
        $query1= mysqli_query($conectar,"SELECT profileId FROM rooms where profileId='$profileId' and isActive=1 ");
        $nr=mysqli_num_rows($query1);
    
        if($nr<=0){
    
    
    
        $query2= mysqli_query($conectar,"UPDATE rooms set profileId='$profileId' where profileId='0' and status=1 and isActive=1 and roomId='$roomId'");
                   
                             
     echo "true*¡Room asignado con exito!";
    
        }else{
            echo 'false*¡Room asignado previamente!';
    
        }

    }else{
        echo 'false*¡Room  no asignado!';

    }
    }

           // echo json_encode($response1);
        } else {
            echo 'false*¡Autenticación fallida!';
             //echo json_encode($response1);
        }
    } else {
        echo 'false*¡Encabezados faltantes!';
    }
});





Flight::route('POST /postLogReport/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    
            
        // Leer los datos de la solicitud
        
            




        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
            'apiKey' =>$apk, 
            'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {

            $value= Flight::request()->data->value;
            $profileId= Flight::request()->data->profileId;

    $conectar=conn();
    
    require_once '../../apiControlTower/v1/model/modelSecurity/uuid/uuidd.php';
    $gen_uuid = new generateUuid();
    $myuuid = $gen_uuid->guidv4();
    $primeros_ocho = substr($myuuid, 0, 8);
    date_default_timezone_set('America/Bogota');
$horaActual = date('H:i:s');
$fechaActual = date('Y-m-d');

$query2= mysqli_query($conectar,"INSERT INTO logReport (logId,profileId,type,timer,dater) VALUES ('$primeros_ocho','$profileId','$value','$horaActual','$fechaActual')");
               
                         
echo "true*¡Alerta editada con exito!";
   

           // echo json_encode($response1);
        } else {
            echo 'false*¡Autenticación fallida!';
             //echo json_encode($response1);
        }
    } else {
        echo 'false*¡Encabezados faltantes!';
    }
});


Flight::route('POST /postAlert/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    
            
        // Leer los datos de la solicitud
        
            




        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
            'apiKey' =>$apk, 
            'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {

            $comments= Flight::request()->data->comments;
            $ownerId= Flight::request()->data->ownerId;
            $profileId= Flight::request()->data->profileId;

    $conectar=conn();
    
    require_once '../../apiControlTower/v1/model/modelSecurity/uuid/uuidd.php';
    $gen_uuid = new generateUuid();
    $myuuid = $gen_uuid->guidv4();
    $primeros_ocho = substr($myuuid, 0, 8);
    $query2= mysqli_query($conectar,"INSERT INTO generalAlerts (alertId,comments,profileId,ownerId,alertType) VALUES ('$primeros_ocho','$comments','$profileId','$ownerId','ALERT')");
               
                         
 echo "true*¡Alerta enviada con exito!";


           // echo json_encode($response1);
        } else {
            echo 'false*¡Autenticación fallida!';
             //echo json_encode($response1);
        }
    } else {
        echo 'false*¡Encabezados faltantes!';
    }
});



Flight::route('POST /putMySchedule/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    
            
        // Leer los datos de la solicitud
        
            




        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
            'apiKey' =>$apk, 
            'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {

            $day= Flight::request()->data->day;
            $value= Flight::request()->data->value;
            $scheId= Flight::request()->data->scheId;

    $conectar=conn();
    
    $query2= mysqli_query($conectar,"UPDATE generalSchedules SET $day='$value' where schId='$scheId'");
               
                         
 echo "true*¡Horario editado con exito!";


           // echo json_encode($response1);
        } else {
            echo 'false*¡Autenticación fallida!';
             //echo json_encode($response1);
        }
    } else {
        echo 'false*¡Encabezados faltantes!';
    }
});




Flight::route('POST /putRoomsStatus/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    
            
        // Leer los datos de la solicitud
        
            




        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
            'apiKey' =>$apk, 
            'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {

            $roomId= Flight::request()->data->roomId;
            $value= Flight::request()->data->value;

    $conectar=conn();
    if($value=="act"){

        $query2= mysqli_query($conectar,"UPDATE rooms SET isActive=1 where roomId='$roomId'");
               
    }
    if($value=="dec"){

        $query2= mysqli_query($conectar,"UPDATE rooms SET isActive=0 where roomId='$roomId'");
               
    }
    if($value=="sho"){

        $query2= mysqli_query($conectar,"UPDATE rooms SET status=1 where roomId='$roomId'");
               
    }
    if($value=="hid"){

        $query2= mysqli_query($conectar,"UPDATE rooms SET isActive=0,status=0 where roomId='$roomId'");
               
    }
                         
 echo "true*¡Estado editado con exito!";



           

           
          
           // echo json_encode($response1);
        } else {
            echo 'false*¡Autenticación fallida!';
             //echo json_encode($response1);
        }
    } else {
        echo 'false*¡Encabezados faltantes!';
    }
});






Flight::route('GET /getAllLogsBySuperAdmin/', function () {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT logId,profileId,type,timer,dater FROM logReport");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'logId' => $row['logId'],
                            'profileId' => $row['profileId'],
                            'type' => $row['type'],
                            'timer' => $row['timer'],
                            'dater' => $row['dater']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['logs'=>$values]);
          
               
           

















        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});


Flight::route('GET /getOneLogsBySuperAdmin/@profileId', function ($profileId) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT logId,profileId,type,timer,dater FROM logReport where profileId='$profileId'");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'logId' => $row['logId'],
                            'profileId' => $row['profileId'],
                            'type' => $row['type'],
                            'timer' => $row['timer'],
                            'dater' => $row['dater']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['logs'=>$values]);
          
               
           

















        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});


Flight::route('GET /getAllLogsByAdmin/', function () {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT logId,profileId,type,timer,dater FROM logReport");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'logId' => $row['logId'],
                            'profileId' => $row['profileId'],
                            'type' => $row['type'],
                            'timer' => $row['timer'],
                            'dater' => $row['dater']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['logs'=>$values]);
          
               
           

















        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});



Flight::route('GET /getAllRooms/', function () {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT roomId,name,comments,profileId,isActive,status,updatedAt FROM rooms");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'roomId' => $row['roomId'],
                            'name' => $row['name'],
                            'comments' => $row['comments'],
                            'profileId' => $row['profileId'],
                            'isActive' => $row['isActive'],
                            'status' => $row['status'],
                            'updatedAt' => $row['updatedAt']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['rooms'=>$values]);
          
               
           

















        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});





Flight::route('GET /getAllRoomsTrue/', function () {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT roomId,name,comments,profileId,isActive,status,updatedAt FROM rooms where profileId!='0'");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'roomId' => $row['roomId'],
                            'roomName' => $row['name'],
                            'comments' => $row['comments'],
                            'profileId' => $row['profileId'],
                            'isActive' => $row['isActive'],
                            'status' => $row['status'],
                            'updatedAt' => $row['updatedAt']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['rooms'=>$values]);
          
               
           

















        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});




Flight::route('GET /getAllRoomsFalse/', function () {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT roomId,name,comments,profileId,isActive,status,updatedAt FROM rooms where profileId='0' and status =1");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'roomId' => $row['roomId'],
                            'name' => $row['name'],
                            'comments' => $row['comments'],
                            'profileId' => $row['profileId'],
                            'isActive' => $row['isActive'],
                            'status' => $row['status'],
                            'updatedAt' => $row['updatedAt']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['rooms'=>$values]);
          
               
           

















        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});






Flight::route('GET /getMySchedule/@profileId', function ($profileId) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT schId,mon,tus,wen,thu,fri,sat,sun,maxHoursPerWeek,minHoursPerWeek,sTime FROM generalSchedules where profileId='$profileId'");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'schId' => $row['schId'],
                            'mon' => $row['mon'],
                            'tus' => $row['tus'],
                            'wen' => $row['wen'],
                            'thu' => $row['thu'],
                            'fri' => $row['fri'],
                            'sat' => $row['sat'],
                            'sun' => $row['sun'],
                            'maxTime' => $row['maxHoursPerWeek'],
                            'minTime' => $row['minHoursPerWeek'],
                            'sTime' => $row['sTime']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['sche'=>$values]);
          
               
           

        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});



Flight::route('GET /getModelLog/@profileId', function ($profileId) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT statusId,modelId,isConnected,isBreak,isLunch,isMeet,isIssue,isBroom FROM modelStatus where modelId='$profileId'");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'statusId' => $row['statusId'],
                            'modelId' => $row['modelId'],
                            'isConnected' => $row['isConnected'],
                            'isBreak' => $row['isBreak'],
                            'isLunch' => $row['isLunch'],
                            'isMeet' => $row['isMeet'],
                            'isIssue' => $row['isIssue'],
                            'isBroom' => $row['isBroom']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['models'=>$values]);
          
               
           

        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});

Flight::route('GET /getMyAlerts/@profileId', function ($profileId) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT alertId,comments,profileId,ownerId,alertType,alertResponse FROM generalAlerts where profileId='$profileId' and isActive=1");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'alertId' => $row['alertId'],
                            'comments' => $row['comments'],
                            'profileId' => $row['profileId'],
                            'ownerId' => $row['ownerId'],
                            'alertType' => $row['alertType'],
                            'alertResponse' => $row['alertResponse']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['alerts'=>$values]);
          
               
           

        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});



Flight::route('GET /getMyAlertsr/@profileId', function ($profileId) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT alertId,comments,profileId,ownerId,alertType,alertResponse FROM generalAlerts where profileId='$profileId' and isActive=0");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'alertId' => $row['alertId'],
                            'comments' => $row['comments'],
                            'profileId' => $row['profileId'],
                            'ownerId' => $row['ownerId'],
                            'alertType' => $row['alertType'],
                            'alertResponse' => $row['alertResponse']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['alerts'=>$values]);
          
               
           

        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});


Flight::route('GET /getMyReminds/@profileId', function ($profileId) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            date_default_timezone_set('America/Bogota');
            
            $horaActual = date('H:i:s');
            $fechaActual = date('Y-m-d');

          
            $query= mysqli_query($conectar,"SELECT remindId,comments,profileId,ownerId,remindType,rDate,rTime FROM generalReminds where isActive=1 and remindType in ('GENERAL','$profileId') and rDate<='$fechaActual' and rTime<='$horaActual'");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'remindId' => $row['remindId'],
                            'comments' => $row['comments'],
                            'profileId' => $row['profileId'],
                            'ownerId' => $row['ownerId'],
                            'remindType' => $row['remindType'],
                            'rDate' => $row['rDate'],
                            'rTime' => $row['rTime']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['reminds'=>$values]);
          
               
           

        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});


Flight::route('GET /getMyAlertsCounter/@profileId', function ($profileId) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT COUNT(alertid) as alertsCounter FROM generalAlerts where profileId='$profileId' and isActive=1");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'alertsCounter' => $row['alertsCounter']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['alertsCounter'=>$values]);
          
               
           

        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});


Flight::route('GET /getOneRooms/@roomId', function ($roomId) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT roomId,name,comments,profileId,isActive,status,updatedAt FROM rooms where roomId='$roomId'");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'roomId' => $row['roomId'],
                            'name' => $row['name'],
                            'comments' => $row['comments'],
                            'profileId' => $row['profileId'],
                            'isActive' => $row['isActive'],
                            'status' => $row['status'],
                            'updatedAt' => $row['updatedAt']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['rooms'=>$values]);
          
               
           

















        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});




Flight::route('GET /getAllPages/', function () {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT pageId,name,currency,percentValue,updatedAt,isActive,status,urlPage FROM generalPages");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'pageId' => $row['pageId'],
                            'name' => $row['name'],
                            'currency' => $row['currency'],
                            'percentValue' => $row['percentValue'],
                            'updatedAt' => $row['updatedAt'],
                            'status' => $row['status'],
                            'isActive' => $row['isActive'],
                            'urlPage' => $row['urlPage']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['pages'=>$values]);
          
               
           

















        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});



Flight::route('GET /getAllPagesas/', function () {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT pageId,name,currency,percentValue,updatedAt,isActive,status,urlPage FROM generalPages where status=1");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'pageId' => $row['pageId'],
                            'name' => $row['name'],
                            'currency' => $row['currency'],
                            'percentValue' => $row['percentValue'],
                            'updatedAt' => $row['updatedAt'],
                            'status' => $row['status'],
                            'isActive' => $row['isActive'],
                            'urlPage' => $row['urlPage']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['pages'=>$values]);
          
               
           

















        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});




Flight::route('GET /getAllPagesModels/@modelId', function ($modelId) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT tl.transId,tl.profileId,tl.status,tl.isActive,tl.pageId,tl.valueNow,pl.name as pageName,pl.urlPage,tr.startTime,tr.endTime,tr.startDate,tr.transId as trId,tr.endDate, tr.totalTime FROM pageAssignation tl JOIN generalPages pl ON pl.pageId=tl.pageId JOIN transmissionRecord tr ON tr.transId=tl.transId where tl.profileId='$modelId' and tl.valueNow='true' and tr.isActive=1 ");
               // Establecer la zona horaria a Colombia
date_default_timezone_set('America/Bogota');

// Obtener la hora actual en Colombia
$horaActual = new DateTime();
$horaActual->setTimezone(new DateTimeZone('America/Bogota'));
date_default_timezone_set('America/Bogota');

// Obtener la hora actual en Colombia
$timer=date('H:i:s');
//$horaActual->setTimezone(new DateTimeZone('America/Bogota'));
// Imprimir la hora actual en Colombia


           
                $values=[];
          
                while($row = $query->fetch_assoc())
                {

                   // $hora1 = new DateTime($row['startTime']);
                    $fecha = DateTime::createFromFormat('H:i:s', $row['startTime']);
                    $fecha2 = DateTime::createFromFormat('H:i:s', $timer);
     
     //$hora2 = $timer;
     
     $diferencia = $fecha->diff($fecha2);
     
     $diferenciaHoras = $diferencia->format('%H');
     $diferenciaMinutos = $diferencia->format('%i');
     $diferenciaSegundos = $diferencia->format('%s');
     
     $totalHours= $diferenciaHoras.":".$diferenciaMinutos.":".$diferenciaSegundos;
     
                    
                   // echo $diferencia->format('%H:%I:%S'); // Imprime la diferencia en formato horas:minutos:segundos
                    
                        $value=[
                            'transId' => $row['transId'],
                            'modelId' => $row['profileId'],
                            'status' => $row['status'],
                            'isActive' => $row['isActive'],
                            'pageId' => $row['pageId'],
                            'valueNow' => $row['valueNow'],
                            'pageName' => $row['pageName'],
                            'urlPage' => $row['urlPage'],
                            'startTime' => $row['startTime'],
                            'endTime' => $row['endTime'],
                            'startDate' => $row['startDate'],
                            'endDate' => $row['endDate'],
                            'trId' => $row['trId'],
                            'totalTime' => $totalHours
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['pages'=>$values]);
          
               
           

















        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});



Flight::route('GET /getAllPagesModelsNot/@modelId', function ($modelId) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT tl.transId,tl.profileId,tl.status,tl.isActive,tl.pageId,tl.valueNow,pl.name as pageName,pl.urlPage FROM pageAssignation tl JOIN generalPages pl ON pl.pageId=tl.pageId  where tl.profileId='$modelId' and tl.valueNow='false'");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'transId' => $row['transId'],
                            'modelId' => $row['profileId'],
                            'status' => $row['status'],
                            'isActive' => $row['isActive'],
                            'pageId' => $row['pageId'],
                            'valueNow' => $row['valueNow'],
                            'pageName' => $row['pageName'],
                            'urlPage' => $row['urlPage']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['pages'=>$values]);
          
               
           

















        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});




Flight::route('GET /getAllPagesModelsHis/@modelId/@sdate/@edate', function ($modelId,$sdate,$edate) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT tl.transId,tl.profileId,tl.pageId,tl.startTime,tl.endTime,tl.startDate,tl.endDate,tl.totalTime,tl.isActive,pl.name as pageName,pl.urlPage FROM transmissionRecord tl JOIN generalPages pl ON pl.pageId=tl.pageId  where  tl.profileId='$modelId' and tl.startDate>='$sdate' and tl.endDate<='$edate' ORDER BY tl.startDate,tl.startDate ASC ");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'transId' => $row['transId'],
                            'modelId' => $row['profileId'],
                            'isActive' => $row['isActive'],
                            'pageId' => $row['pageId'],
                            'pageName' => $row['pageName'],
                            'urlPage' => $row['urlPage'],
                            'startTime' => $row['startTime'],
                            'endTime' => $row['endTime'],
                            'startDate' => $row['startDate'],
                            'endDate' => $row['endDate'],
                            'totalTime' => $row['totalTime']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['pages'=>$values]);
          
               
           

















        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});


Flight::route('GET /getAllPagesModelsHislogs/@modelId/@sdate', function ($modelId,$sdate) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT type,timer,dater,createdAt,logId,profileId FROM logReport where profileId='$modelId' and dater='$sdate'");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'type' => $row['type'],
                            'timer' => $row['timer'],
                            'dater' => $row['dater'],
                            'createdAt' => $row['createdAt'],
                            'logId' => $row['logId'],
                            'profileId' => $row['profileId']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['logs'=>$values]);
          
               
           

















        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});



Flight::route('GET /getOnePages/@pageId', function ($pageId) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT pageId,name,currency,percentValue,updatedAt,isActive,status,urlPage FROM generalPages where pageId='$pageId'");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'pageId' => $row['pageId'],
                            'name' => $row['name'],
                            'currency' => $row['currency'],
                            'percentValue' => $row['percentValue'],
                            'updatedAt' => $row['updatedAt'],
                            'status' => $row['status'],
                            'isActive' => $row['isActive'],
                            'urlPage' => $row['urlPage']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['pages'=>$values]);
          
               
           

















        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});



Flight::route('GET /getAllCurrency/', function () {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT curId,name,currency,symbol,currentValue,comparative,status,isActive,updatedAt FROM generalCurrency");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'curId' => $row['curId'],
                            'name' => $row['name'],
                            'currency' => $row['currency'],
                            'symbol' => $row['symbol'],
                            'currentValue' => $row['currentValue'],
                            'comparative' => $row['comparative'],
                            'status' => $row['comparative'],
                            'isActive' => $row['isActive'],
                            'updatedAt' => $row['updatedAt']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['currency'=>$values]);
          
               
           

















        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});



Flight::route('GET /getOneCurrency/@currencyId', function ($currencyId) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT curId,name,currency,symbol,currentValue,comparative,status,isActive,updatedAt FROM generalCurrency where curId='$currencyId'");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'curId' => $row['curId'],
                            'name' => $row['name'],
                            'currency' => $row['currency'],
                            'symbol' => $row['symbol'],
                            'currentValue' => $row['currentValue'],
                            'comparative' => $row['comparative'],
                            'status' => $row['status'],
                            'isActive' => $row['isActive'],
                            'updatedAt' => $row['updatedAt']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['currency'=>$values]);
          
               
           

















        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});



Flight::route('GET /getCurrencyList/', function () {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT currency,name,symbol FROM currencyList");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'currency' => $row['currency'],
                            'name' => $row['name'],
                            'symbol' => $row['symbol']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['currency'=>$values]);
          
               
           

















        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});



Flight::route('GET /getOneLogsByAdmin/@profileId', function ($profileId) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT logId,profileId,type,timer,dater FROM logReport where profileId='$profileId'");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'logId' => $row['logId'],
                            'profileId' => $row['profileId'],
                            'type' => $row['type'],
                            'timer' => $row['timer'],
                            'dater' => $row['dater']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['logs'=>$values]);
          
               
           

















        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});






Flight::route('POST /postLogInfoModels/', function () {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    date_default_timezone_set('America/Bogota');
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
        
            
           
       






        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        




        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {

            $profileId= Flight::request()->data->profileId;
            $value= Flight::request()->data->value;
            $roomId= Flight::request()->data->roomId;
            $pages= Flight::request()->data->pages;
            $transId= Flight::request()->data->transId;

    $conectar=conn();
   

    if($value=="start"){
        $query2= mysqli_query($conectar,"UPDATE logInfoModels set isActive=1, roomId='$roomId' where profileId='$profileId'");
        $query2= mysqli_query($conectar,"UPDATE rooms set profileId='$profileId', isActive=0 where roomId='$roomId'");
      
        echo "true";
    }
    if($value=="finished"){
        $query2= mysqli_query($conectar,"UPDATE logInfoModels set isActive=0, roomId='0' where profileId='$profileId'");
        $query2= mysqli_query($conectar,"UPDATE rooms set profileId='0', isActive=1 where roomId='$roomId'");
      
        echo "true";
    }
    
    if($value=="transmission"){
        $query2= mysqli_query($conectar,"UPDATE logInfoModels set isTransmission=1 where profileId='$profileId'");
      
      
        $arrayDatos = explode(" ", $pages);

// Recorre el array de datos e inserta cada registro en la base de datos
foreach ($arrayDatos as $registro) {
    // Aquí puedes realizar la inserción en la base de datos para el registro actual
    // Por ejemplo, asumiendo que tienes una conexión a la base de datos llamada $conexion
  //  $query = "INSERT INTO tabla (campo) VALUES ('$registro')";
    require_once '../../apiControlTower/v1/model/modelSecurity/uuid/uuidd.php';
    $gen_uuid = new generateUuid();
    $myuuid = $gen_uuid->guidv4();
    $primeros_ocho = substr($myuuid, 0, 8);
    $query2= mysqli_query($conectar,"INSERT INTO  transmissionList (transId,profileId,pageId) values ('$primeros_ocho','$profileId','$registro')");
      
    $myuuid2 = $gen_uuid->guidv4();
    $primeros_ocho2 = substr($myuuid2, 0, 8);

    
$timer=date('H:i:s');
$dater = date('Y-m-d');
    $query2= mysqli_query($conectar,"INSERT INTO  transmissionRecord (transId,profileId,pageId,startTime,startDate,parentId) values ('$primeros_ocho2','$profileId','$registro','$timer','$dater','$primeros_ocho')");
    
}
echo "true*¡Transmisión finalizada con exito!";
    }   
    if($value=="nottransmission"){

        $query1= mysqli_query($conectar,"SELECT startTime FROM transmissionRecord where parentId='$transId'");
               
          
        if ($query1) {
            while ($row = $query1->fetch_assoc()) {
                
               $starttime= $row['startTime'];
               $dater = date('Y-m-d');
               $timer=date('H:i:s');
               $hora1 = $starttime;
               $fecha = DateTime::createFromFormat('H:i:s', $hora1);
               $fecha2 = DateTime::createFromFormat('H:i:s', $timer);

$hora2 = $timer;

$diferencia = $fecha->diff($fecha2);

//$diferenciaHoras = $diferencia->format('%H');
//$diferenciaMinutos = $diferencia->format('%i');
$diferenciaSegundos = $diferencia->format('%s');

//$totalHours= $diferenciaHoras.":".$diferenciaMinutos.":".$diferenciaSegundos;




// Horas en formato HH:mm
$horaInicio = $starttime;
$horaFin = $timer;

// Convertir horas a minutos
$inicio = strtotime($horaInicio);
$fin = strtotime($horaFin);

// Si la hora final es anterior a la hora inicial, sumar 24 horas al final para obtener la diferencia correcta
if ($fin < $inicio) {
    $fin += 86400; // 24 horas en segundos (24 * 60 * 60)
}

// Calcular la diferencia en minutos
$diferenciaMinutos = ($fin - $inicio) / 60;

// Calcular las horas y minutos transcurridos
$horasTranscurridas = floor($diferenciaMinutos / 60);
$minutosTranscurridos = $diferenciaMinutos % 60;


$totalHours= $horasTranscurridas.":".$minutosTranscurridos.":".$diferenciaSegundos;

               $query2= mysqli_query($conectar,"DELETE FROM transmissionList where transId='$transId'");
               $query2= mysqli_query($conectar,"UPDATE transmissionRecord set endTime='$timer', endDate='$dater',totalTime='$totalHours' where parentId='$transId'");
             
                

               
               
                echo "true*¡Transmisión finalizada con exito!";


      
            }
       
       
    } 
                         
 





           
          
           // echo json_encode($response1);
        }  
    } else {
        echo 'Error: Autenticación fallida';
         //echo json_encode($response1);
    }
}else {
    echo 'Error: Encabezados faltantes';
}
});




Flight::route('POST /postPages/@apk/@xapk', function ($apk,$xapk) {
   
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    
        // Leer los datos de la solicitud
        
            
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apk, 
          'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {

            $pageName= Flight::request()->data->pageName;
            $urlPage= Flight::request()->data->urlPage;
            $currency= Flight::request()->data->currency;
            $percentValue= Flight::request()->data->percentValue;

           
    $conectar=conn();
    require_once '../../apiControlTower/v1/model/modelSecurity/uuid/uuidd.php';
    $gen_uuid = new generateUuid();
    $myuuid = $gen_uuid->guidv4();
    $primeros_ocho = substr($myuuid, 0, 8);
  
    $query2= mysqli_query($conectar,"INSERT generalPages (pageId,name,currency,urlPage,percentValue) values ('$primeros_ocho','$pageName','$currency','$urlPage','$percentValue')");
               
                         
 echo "true*¡Página agregada con exito!";





           
          
           // echo json_encode($response1);
        } else {
            echo 'false*¡Autenticación fallida!';
             //echo json_encode($response1);
        }
    } else {
        echo 'false*¡Encabezados faltantes!';
    }
});


Flight::route('POST /putPages/@apk/@xapk', function ($apk,$xapk) {
   
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    
        // Acceder a los encabezados
      
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apk, 
          'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {

            $pageName= Flight::request()->data->pageName;
            $urlPage= Flight::request()->data->urlPage;
            $pageId= Flight::request()->data->pageId;
            $percentValue= Flight::request()->data->percentValue;

           
    $conectar=conn();
   
  
    $query2= mysqli_query($conectar,"UPDATE generalPages set name='$pageName',urlPage='$urlPage',percentValue='$percentValue' where pageId='$pageId'");
               
                         
 echo "true*¡Página editada con exito¡";


           // echo json_encode($response1);
        } else {
            echo 'false*¡Autenticación fallida!';
             //echo json_encode($response1);
        }
    } else {
        echo 'false*¡Encabezados faltantes!';
    }
});



Flight::route('POST /putPageStatus/@apk/@xapk', function ($apk,$xapk) {
   
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    

        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apk, 
          'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {

            $value= Flight::request()->data->value;
            $pageId= Flight::request()->data->pageId;

    $conectar=conn();
    if($value=="act"){

        $query2= mysqli_query($conectar,"UPDATE generalPages SET isActive=1 where pageId='$pageId'");
               
    }
    if($value=="dec"){

        $query2= mysqli_query($conectar,"UPDATE generalPages SET isActive=0 where pageId='$pageId'");
               
    }
    if($value=="sho"){

        $query2= mysqli_query($conectar,"UPDATE generalPages SET status=1 where pageId='$pageId'");
               
    }
    if($value=="hid"){

        $query2= mysqli_query($conectar,"UPDATE generalPages SET isActive=0,status=0 where pageId='$pageId'");
               
    }
                         
 echo "true*¡Estado editado con exito!";


           // echo json_encode($response1);
        } else {
            echo 'false*¡Autenticación fallida!';
             //echo json_encode($response1);
        }
    } else {
        echo 'false*¡Encabezados faltantes!';
    }
});




Flight::route('POST /putCurrencyStatus/@apk/@xapk', function ($apk,$xapk) {
   
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    

        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apk, 
          'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {

            $value= Flight::request()->data->value;
            $curId= Flight::request()->data->curId;

    $conectar=conn();
    if($value=="act"){

        $query2= mysqli_query($conectar,"UPDATE generalCurrency SET isActive=1 where curId='$curId'");
               
    }
    if($value=="dec"){

        $query2= mysqli_query($conectar,"UPDATE generalCurrency SET isActive=0 where curId='$curId'");
               
    }
    if($value=="sho"){

        $query2= mysqli_query($conectar,"UPDATE generalCurrency SET status=1 where curId='$curId'");
               
    }
    if($value=="hid"){

        $query2= mysqli_query($conectar,"UPDATE generalCurrency SET isActive=0,status=0 where curId='$curId'");
               
    }
                         
 echo "true*¡Estado editado con exito!";


           // echo json_encode($response1);
        } else {
            echo 'false*¡Autenticación fallida!';
             //echo json_encode($response1);
        }
    } else {
        echo 'false*¡Encabezados faltantes!';
    }
});



Flight::route('POST /putPageCurrency/@apk/@xapk', function ($apk,$xapk) {
   
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    

        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apk, 
          'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {

            $currency= Flight::request()->data->currency;
            $pageId= Flight::request()->data->pageId;

    $conectar=conn();
        $query2= mysqli_query($conectar,"UPDATE generalPages SET currency='$currency' where pageId='$pageId'");
    
                         
 echo "true*¡Moneda editada con exito!";





           
          
           // echo json_encode($response1);
        } else {
            echo 'false*¡Autenticación fallida!';
             //echo json_encode($response1);
        }
    } else {
        echo 'false*¡Encabezados faltantes!';
    }
});



Flight::route('POST /postCurrency/@apk/@xapk', function ($apk,$xapk) {
   
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apk, 
          'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {

           
            $name= Flight::request()->data->name;
            $currency= Flight::request()->data->currency;
            $currentValue= Flight::request()->data->currentValue;
            $comparative= Flight::request()->data->comparative;
            $symbol= Flight::request()->data->symbol;
            
            

           
    $conectar=conn();
    require_once '../../apiControlTower/v1/model/modelSecurity/uuid/uuidd.php';
    $gen_uuid = new generateUuid();
    $myuuid = $gen_uuid->guidv4();
    $primeros_ocho = substr($myuuid, 0, 8);
  
    $query2= mysqli_query($conectar,"INSERT generalCurrency (curId,name,currency,symbol,currentValue,comparative) values ('$primeros_ocho','$name','$currency','$symbol','$currentValue','$comparative')");
               
                         
 echo "true*¡Moneda agregada con exito!";





           
          
           // echo json_encode($response1);
        } else {
            echo 'false*¡Autenticación fallida!';
             //echo json_encode($response1);
        }
    } else {
        echo 'false*¡Encabezados faltantes!';
    }
});



Flight::route('POST /putCurrency/@apk/@xapk', function ($apk,$xapk) {
   
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    

        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apk, 
          'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {

           
            $name= Flight::request()->data->name;
            $currentValue= Flight::request()->data->currentValue;
            $curId= Flight::request()->data->curId;
            $symbol= Flight::request()->data->symbol;
            
            

           
    $conectar=conn();

  
    $query2= mysqli_query($conectar,"UPDATE generalCurrency SET name='$name',symbol='$symbol',currentValue='$currentValue' where curId='$curId'");
               
                         
 echo "true*¡Moneda editada con exito!";





           
          
           // echo json_encode($response1);
        } else {
            echo 'false*¡Autenticación fallida!';
             //echo json_encode($response1);
        }
    } else {
        echo 'false*¡Encabezados faltantes!';
    }
});


Flight::route('GET /getAllTransmissionList/', function () {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT t.transId,t.profileId,t.pageId,r.name as roomName,p.name as pageName,p.urlPage,p.pageId FROM transmissionList t JOIN rooms r ON r.profileId=t.profileId JOIN generalPages p ON p.pageId=t.pageId");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'transmissionId' => $row['transId'],
                            'profileId' => $row['profileId'],
                            'pageId' => $row['pageId'],
                            'roomName' => $row['roomName'],
                            'pageName' => $row['pageName'],
                            'pageId' => $row['pageId'],
                            'urlPage' => $row['urlPage']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['logs'=>$values]);
          
               
           

















        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});








Flight::route('GET /getModelEarn/@modelId/@cutName', function ($modelId,$cutName) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT t.earnId,t.transId,t.modelId,t.pageId,p.name as pageName,p.urlPage,p.pageId,t.startDate,t.startTime,t.endDate,t.endTime,t.totalTime,t.startAmmount,t.endAmmount,t.paymentCurrency,t.cuttingId,t.discountAmmount,t.comments,t.discountPercent,t.isActive,t.status FROM modelEarn t JOIN generalPages p ON p.pageId=t.pageId where t.modelId='$modelId' and t.cuttingId= '$cutName'");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'earnId' => $row['earnId'],
                            'transId' => $row['transId'],
                            'modelId' => $row['modelId'],
                            'pageId' => $row['pageId'],
                            'pageName' => $row['pageName'],
                            'pageId' => $row['pageId'],
                            'urlPage' => $row['urlPage'],
                            
                            'startDate' => $row['startDate'],
                            'startTime' => $row['startTime'],
                            'endDate' => $row['endDate'],
                            'endTime' => $row['endTime'],

                            'totalTime' => $row['totalTime'],
                            'startAmount' => $row['startAmmount'],
                            'endAmount' => $row['endAmmount'],
                            'paymentCurrency' => $row['paymentCurrency'],

                            
                            'cuttingId' => $row['cuttingId'],
                            'discountAmmount' => $row['discountAmmount'],
                            'comments' => $row['comments'],
                            'discountPercent' => $row['discountPercent'],

                            
                            'isActive' => $row['isActive'],
                            'status' => $row['status']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['earns'=>$values]);
          
               
           

















        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});


Flight::route('GET /getModelEarnTotal/@modelId/@cutName', function ($modelId,$cutName) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT cuttingId,modelId,SUM(startAmmount) as sAmm,SUM(endAmmount) as eAmm,SUM(discountAmmount) as disAmm,SUM(discountPercent) as disPer,TIME_FORMAT(SEC_TO_TIME(SUM(TIME_TO_SEC(totalTime))), '%H:%i:%s') AS tTime  from modelEarn WHERE modelId='$modelId' and cuttingId='$cutName'");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'cuttingId' => $row['cuttingId'],
                            'modelId' => $row['modelId'],
                            'start' => $row['sAmm'],
                            'end' => $row['eAmm'],
                            'discount' => $row['disAmm'],
                            'percent' => $row['disPer'],
                            'time' => $row['tTime']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['earns'=>$values]);
          
               
           

















        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});



Flight::route('GET /getModelEarnAdd/@modelId/', function ($modelId) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT t.earnId,t.transId,t.modelId,t.pageId,p.name as pageName,p.urlPage,p.pageId,t.startDate,t.startTime,t.endDate,t.endTime,t.totalTime,t.startAmmount,t.endAmmount,t.paymentCurrency,t.cuttingId,t.discountAmmount,t.comments,t.discountPercent,t.isActive,t.status FROM modelEarn t JOIN generalPages p ON p.pageId=t.pageId where t.modelId='$modelId' and t.isActive=0 and t.status=1 and t.isSend=0");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'earnId' => $row['earnId'],
                            'transId' => $row['transId'],
                            'modelId' => $row['modelId'],
                            'pageId' => $row['pageId'],
                            'pageName' => $row['pageName'],
                            'pageId' => $row['pageId'],
                            'urlPage' => $row['urlPage'],
                            
                            'startDate' => $row['startDate'],
                            'startTime' => $row['startTime'],
                            'endDate' => $row['endDate'],
                            'endTime' => $row['endTime'],

                            'totalTime' => $row['totalTime'],
                            'startAmount' => $row['startAmmount'],
                            'endAmount' => $row['endAmmount'],
                            'paymentCurrency' => $row['paymentCurrency'],

                            
                            'cuttingId' => $row['cuttingId'],
                            'discountAmmount' => $row['discountAmmount'],
                            'comments' => $row['comments'],
                            'discountPercent' => $row['discountPercent'],

                            
                            'isActive' => $row['isActive'],
                            'status' => $row['status']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['puts'=>$values]);
          
               
           

















        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});





Flight::route('GET /getModelEarnAddver/@modelId/', function ($modelId) {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT t.earnId,t.transId,t.modelId,t.pageId,p.name as pageName,p.urlPage,p.pageId,t.startDate,t.startTime,t.endDate,t.endTime,t.totalTime,t.startAmmount,t.endAmmount,t.paymentCurrency,t.cuttingId,t.discountAmmount,t.comments,t.discountPercent,t.isActive,t.status FROM modelEarn t JOIN generalPages p ON p.pageId=t.pageId where t.modelId='$modelId' and t.isActive=0 and t.status=1 and t.isSend=1");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'earnId' => $row['earnId'],
                            'transId' => $row['transId'],
                            'modelId' => $row['modelId'],
                            'pageId' => $row['pageId'],
                            'pageName' => $row['pageName'],
                            'pageId' => $row['pageId'],
                            'urlPage' => $row['urlPage'],
                            
                            'startDate' => $row['startDate'],
                            'startTime' => $row['startTime'],
                            'endDate' => $row['endDate'],
                            'endTime' => $row['endTime'],

                            'totalTime' => $row['totalTime'],
                            'startAmount' => $row['startAmmount'],
                            'endAmount' => $row['endAmmount'],
                            'paymentCurrency' => $row['paymentCurrency'],

                            
                            'cuttingId' => $row['cuttingId'],
                            'discountAmmount' => $row['discountAmmount'],
                            'comments' => $row['comments'],
                            'discountPercent' => $row['discountPercent'],

                            
                            'isActive' => $row['isActive'],
                            'status' => $row['status']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['puts'=>$values]);
          
               
           

















        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});



Flight::route('GET /getVersionList/', function () {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           
require_once 'versions/versions.php';

$ver=new versiones();
$ver1= $ver->ver_change();

           
               echo $ver1;
           

        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});



Flight::route('POST /postCutting/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    
            
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apk, 
          'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {

         
            $cutName= Flight::request()->data->cutName;
            $startDate= Flight::request()->data->startDate;
            $endDate= Flight::request()->data->endDate;
            

    $conectar=conn();
    require_once '../../apiControlTower/v1/model/modelSecurity/uuid/uuidd.php';
    $gen_uuid = new generateUuid();
    $myuuid = $gen_uuid->guidv4();
    $primeros_ocho = substr($myuuid, 0, 8);
    $query2= mysqli_query($conectar,"INSERT INTO generalCutting (cutId,cutName,startDate,endDate) values ('$primeros_ocho','$cutName','$startDate','$endDate')");
               
    if ($query2) {
        echo "true*¡Corte agregado con exito!";
    } else {
        echo "false*¡Error en la consulta! " . mysqli_error($conectar);
    }        
 

          
           // echo json_encode($response1);
        } else {
            echo 'false*¡Autenticación fallida!';
             //echo json_encode($response1);
        }
    } else {
        echo 'false*¡Encabezados faltantes!';
    }
});






Flight::route('POST /adjustModelEarn/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    
            
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apk, 
          'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {

         
            $value= Flight::request()->data->value;
            $earnId= Flight::request()->data->earnId;
            $comment= Flight::request()->data->comment;
            

    $conectar=conn();
   
if($value=="rev"){


    $query1= mysqli_query($conectar,"SELECT startAmmount,discountAmmount,discountPercent FROM modelEarn where earnId='$earnId'");
               
          
    if ($query1) {
        while ($row = $query1->fetch_assoc()) {
            
           $startAm= $row['startAmmount'];
           $disAm= $row['discountAmmount'];
           $disPer= $row['discountPercent'];
           if($disPer>0){

            $numero = $startAm;
$porcentaje = $disPer;

$resultado = ($numero * $porcentaje) / 100;
$total=$startAm-$resultado;

$query2= mysqli_query($conectar,"UPDATE modelEarn SET isVerified=1,endAmmount='$total' where earnId='$earnId'");



echo "true*¡Ajustado con exito!";
        }
        if($disPer<=0){
            $total=$startAm-$disAm;
            $query2= mysqli_query($conectar,"UPDATE modelEarn SET isVerified=1,endAmmount='$total' where earnId='$earnId'");
            echo "true*¡Ajustado con exito!";



        }

        }

       
       

    }   
     else {
        echo "false*¡Error en la consulta! " . mysqli_error($conectar);
    }  

}

if($value=="send"){

    $query2= mysqli_query($conectar,"UPDATE modelEarn SET isSend=1 where earnId='$earnId'");
               
    if ($query2) {
        echo "true*¡Ajustado con exito!";
    } else {
        echo "false*¡Error en la consulta! " . mysqli_error($conectar);
    }        
 
}

if($value=="close"){


    $query1= mysqli_query($conectar,"SELECT e.modelId,e.startAmmount,e.discountAmmount,e.discountPercent,e.endAmmount,e.earnId,e.cuttingId,e.startDate,e.startTime,e.endDate,e.endTime,e.totalTime,e.paymentCurrency,e.comments,p.name FROM modelEarn e JOIN generalPages p ON p.pageId=e.pageId where e.earnId='$earnId'");
               
          
    if ($query1) {
        while ($row = $query1->fetch_assoc()) {
            $dta1=[
           'startAmmount'=> $row['startAmmount'],
           'discountAmmount'=> $row['discountAmmount'],
           'discountPercent'=> $row['discountPercent'],
           'endAmmount'=> $row['endAmmount'],
           'earnId'=> $row['earnId'],
           'cuttingId'=> $row['cuttingId'],
           
           'startDate'=> $row['startDate'],
           'endDate'=> $row['endDate'],
           'startTime'=> $row['startTime'],
           
           'endTime'=> $row['endTime'],
           'totalTime'=> $row['totalTime'],
           'paymentCurrency'=> $row['paymentCurrency'],
           
           'comments'=> $row['comments'],
           'name'=> $row['name'],
           'modelId'=> $row['modelId']
            ];
           

    $query2= mysqli_query($conectar,"UPDATE modelEarn SET isConvalidated=1,status=0 where earnId='$earnId'");
               



    if ($query2) {


      
                 // $rectify=$response2;
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain."/crystalCore/apiUsers/v1/sendMailModelEarn/".$apk."/".$xapk;
        
        $curl = curl_init();
        
        // Configurar las opciones de la sesión cURL
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dta1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        $headers1 = array(
            'Api-Key: ' . $apk,
            'x-api-Key: ' . $xapk
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers1);
        
        // Ejecutar la solicitud y obtener la respuesta
        $response3 = curl_exec($curl);
        

        
        echo "true*¡Ajustado con exito!";
    } else {
        echo "false*¡Error en la consulta! " . mysqli_error($conectar);
    }        
}
}
}
else{

    $query2= mysqli_query($conectar,"UPDATE modelEarn SET $value='$comment' where earnId='$earnId'");
               
    if ($query2) {
        echo "true*¡Ajustado con exito!";
    } else {
        echo "false*¡Error en la consulta! " . mysqli_error($conectar);
    }        
 
}

          
           // echo json_encode($response1);
        } else {
            echo 'false*¡Autenticación fallida!';
             //echo json_encode($response1);
        }
    } else {
        echo 'false*¡Encabezados faltantes!';
    }
});



Flight::route('POST /putCuttingStatus/@apk/@xapk', function ($apk,$xapk) {
  
    header("Access-Control-Allow-Origin: *");
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apk) && !empty($xapk)) {    
            
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apk, 
          'xApiKey' => $xapk
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
            date_default_timezone_set('America/Bogota');
         
            $cutId= Flight::request()->data->cutId;
            $value= Flight::request()->data->value;
            
            $timer=date('H:i:s');
$dater = date('Y-m-d');

    $conectar=conn();
    

if($value=="open"){


    $query2= mysqli_query($conectar,"UPDATE generalCutting SET isActive=1,realStartDate='$dater' where cutId='$cutId'");
    if ($query2) {
        echo "true*¡Corte activado con exito!";
    } else {
        echo "false*¡Error en la consulta! " . mysqli_error($conectar);
    }   
}

if($value=="del"){


    $query2= mysqli_query($conectar,"DELETE FROM generalCutting where cutId='$cutId'");
    if ($query2) {
        echo "true*¡Corte eliminado con exito!";
    } else {
        echo "false*¡Error en la consulta! " . mysqli_error($conectar);
    }   
}

if($value=="close"){
    $query2= mysqli_query($conectar,"UPDATE generalCutting SET isActive=0 where cutId='$cutId'");
    if ($query2) {
        echo "true*¡Corte desactivado con exito!";
    } else {
        echo "false*¡Error en la consulta! " . mysqli_error($conectar);
    }   

}
if($value=="stop"){

    $query1= mysqli_query($conectar,"SELECT realStartDate FROM generalCutting where cutId='$cutId'");
               
          
    if ($query1) {
        while ($row = $query1->fetch_assoc()) {
        
         
            $startdate= $row['realStartDate'];

            $fechaInicioObj = new DateTime($startdate);
$fechaFinObj = new DateTime($dater);

// Calcular la diferencia entre las fechas
$diferencia = $fechaInicioObj->diff($fechaFinObj);

// Obtener el número de días de la diferencia
$numDias = $diferencia->days;
            $query2= mysqli_query($conectar,"UPDATE generalCutting SET isActive=0,status=0,realTotalDays='$numDias',realEndDate='$dater' where cutId='$cutId'");
   
        }

    if ($query2) {







        $query1= mysqli_query($conectar,"SELECT startDate,endDate,realStartDate,realEndDate FROM generalCutting where cutId='$cutId'");
               
          
        if ($query1) {
            while ($row = $query1->fetch_assoc()) {
            
             
                $startdate= $row['startDate'];
                $enddate= $row['endDate'];
                $rstartdate= $row['realStartDate'];
                $renddate= $row['realEndDate'];
    
                $fechaInicioObj = new DateTime($startdate);
    $fechaFinObj = new DateTime($enddate);

    $rfechaInicioObj = new DateTime($rstartdate);
    $rfechaFinObj = new DateTime($renddate);
    
    // Calcular la diferencia entre las fechas
    $diferencia = $fechaInicioObj->diff($fechaFinObj);
    $rdiferencia = $rfechaInicioObj->diff($rfechaFinObj);
    
    // Obtener el número de días de la diferencia
    $numDias = $diferencia->days;
    $rnumDias = $rdiferencia->days;


    $query1= mysqli_query($conectar,"SELECT SUM(endAmmount) as endAm FROM modelEarn where cuttingId IN (SELECT cutName from generalCutting where cutId='$cutId')");
               
          
    if ($query1) {
        while ($row = $query1->fetch_assoc()) {
        
         
            $endAmm= $row['endAm'];
            $query2= mysqli_query($conectar,"UPDATE generalCutting SET totalDays='$numDias',realTotalDays='$rnumDias',totalAmount='$endAmm' where cutId ='$cutId'");
       
        }
    }

               
            }
    
        if ($query2) {
    
            
            echo "true*¡Corte activado con exito!";
    
        } else {
            echo "false*¡Error en la consulta! " . mysqli_error($conectar);
        }   







        

    } else {
        echo "false*¡Error en la consulta! " . mysqli_error($conectar);
    }   
    }
}

        
 

          
           // echo json_encode($response1);
        } else {
            echo 'false*¡Autenticación fallida!';
             //echo json_encode($response1);
        }
    } else {
        echo 'false*¡Encabezados faltantes!';
    }
}
});






Flight::route('GET /getPutsCreatedNotStart/', function () {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT cutId,cutName,startDate,endDate,totalDays,totalAmount,isActive,status,realEndDate,realStartDate,realTotalDays,realTotalAmount FROM generalCutting where isActive=0 and status=1");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'cutId' => $row['cutId'],
                            'cutName' => $row['cutName'],
                            'startDate' => $row['startDate'],
                            'endDate' => $row['endDate'],
                            'totalDays' => $row['totalDays'],
                            'totalAmount' => $row['totalAmount'],
                            'isActive' => $row['isActive'],
                            'status' => $row['status'],
                            'realEndDate' => $row['realEndDate'],
                            
                            'realStartDate' => $row['realStartDate'],
                            'realTotalDays' => $row['realTotalDays'],
                            'realTotalAmount' => $row['realTotalAmount']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['puts'=>$values]);
          
               
           

















        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});




Flight::route('GET /getPutsCreatedStart/', function () {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT cutId,cutName,startDate,endDate,totalDays,totalAmount,isActive,status,realEndDate,realStartDate,realTotalDays,realTotalAmount FROM generalCutting where isActive=1 and status=1");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'cutId' => $row['cutId'],
                            'cutName' => $row['cutName'],
                            'startDate' => $row['startDate'],
                            'endDate' => $row['endDate'],
                            'totalDays' => $row['totalDays'],
                            'totalAmount' => $row['totalAmount'],
                            'isActive' => $row['isActive'],
                            'status' => $row['status'],
                            'realEndDate' => $row['realEndDate'],
                            
                            'realStartDate' => $row['realStartDate'],
                            'realTotalDays' => $row['realTotalDays'],
                            'realTotalAmount' => $row['realTotalAmount']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['puts'=>$values]);
          
               
           

















        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});


Flight::route('GET /getPutsCreatedFinished/', function () {
    header("Access-Control-Allow-Origin: *");
    // Leer los encabezados
    $headers = getallheaders();
    
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (isset($headers['Api-Key']) && isset($headers['x-api-Key'])) {
        // Leer los datos de la solicitud
       
        // Acceder a los encabezados
        $apiKey = $headers['Api-Key'];
        $xApiKey = $headers['x-api-Key'];
        
        $sub_domaincon=new model_domain();
        $sub_domain=$sub_domaincon->dom();
        $url = $sub_domain.'/crystalCore/apiAuth/v1/authApiKey/';
      
        $data = array(
          'apiKey' =>$apiKey, 
          'xApiKey' => $xApiKey
          
          );
      $curl = curl_init();
      
      // Configurar las opciones de la sesión cURL
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      
      // Ejecutar la solicitud y obtener la respuesta
      $response1 = curl_exec($curl);

      


      curl_close($curl);

      

        // Realizar acciones basadas en los valores de los encabezados


        if ($response1 == 'true' ) {
           



           
            $conectar=conn();
            
          
            $query= mysqli_query($conectar,"SELECT cutId,cutName,startDate,endDate,totalDays,totalAmount,isActive,status,realEndDate,realStartDate,realTotalDays,realTotalAmount FROM generalCutting where isActive=0 and status=0");
               
          
                $values=[];
          
                while($row = $query->fetch_assoc())
                {
                        $value=[
                            'cutId' => $row['cutId'],
                            'cutName' => $row['cutName'],
                            'startDate' => $row['startDate'],
                            'endDate' => $row['endDate'],
                            'totalDays' => $row['totalDays'],
                            'totalAmount' => $row['totalAmount'],
                            'isActive' => $row['isActive'],
                            'status' => $row['status'],
                            'realEndDate' => $row['realEndDate'],
                            
                            'realStartDate' => $row['realStartDate'],
                            'realTotalDays' => $row['realTotalDays'],
                            'realTotalAmount' => $row['realTotalAmount']
                        ];
                        
                        array_push($values,$value);
                        
                }
                $row=$query->fetch_assoc();
                //echo json_encode($students) ;
                echo json_encode(['puts'=>$values]);
          
               
           

















        } else {
            echo 'Error: Autenticación fallida';
             //echo json_encode($response1);
        }
    } else {
        echo 'Error: Encabezados faltantes';
    }
});



Flight::start();
