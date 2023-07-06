<?php

require 'flight/Flight.php';

require_once 'database/db_users.php';
require_once 'env/domain.php';

Flight::route('POST /postSchedule/', function () {
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

            $profileId= Flight::request()->data->profileId;

    $conectar=conn();
    require_once '../../apiControlTower/v1/model/modelSecurity/uuid/uuidd.php';
    $gen_uuid = new generateUuid();
    $myuuid = $gen_uuid->guidv4();
    $primeros_ocho = substr($myuuid, 0, 8);
    $myuuid2 = $gen_uuid->guidv4();
    $primeros_ocho2 = substr($myuuid2, 0, 8);
    $query2= mysqli_query($conectar,"INSERT generalSchedules (schId,profileId) values ('$primeros_ocho','$profileId')");
    $query2= mysqli_query($conectar,"INSERT logInfoModels (logId,profileId) values ('$primeros_ocho2','$profileId')");
               
                         
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



Flight::route('POST /postRooms/@headerslink', function ($headerslink) {
  
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
    $parts = explode(" ", $headerslink);

    $apiKey=$parts[0];
    $xApiKey=$parts[1];
    // Verificar si los encabezados 'Api-Key' y 'Secret-Key' existen
    if (!empty($apiKey) && !empty($xApiKey)) {    
            
           
       






        




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

            $name= Flight::request()->data->name;
            $comments= Flight::request()->data->comments;

    $conectar=conn();
    require_once '../../apiControlTower/v1/model/modelSecurity/uuid/uuidd.php';
    $gen_uuid = new generateUuid();
    $myuuid = $gen_uuid->guidv4();
    $primeros_ocho = substr($myuuid, 0, 8);
    $query2= mysqli_query($conectar,"INSERT rooms (roomId,name,comments) values ('$primeros_ocho','$name','$comments')");
               
                         
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





Flight::route('POST /putRooms/', function () {
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

            $name= Flight::request()->data->name;
            $comments= Flight::request()->data->comments;
            $roomId= Flight::request()->data->roomId;

    $conectar=conn();
    
    $query2= mysqli_query($conectar,"UPDATE rooms SET name='$name',comments='$comments' where roomId='$roomId'");
               
                         
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


Flight::route('POST /putRoomsStatus/', function () {
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

            $value= Flight::request()->data->value;
            $roomId= Flight::request()->data->roomId;

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



Flight::route('POST /postLogReport/', function () {
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

            $profileId= Flight::request()->data->profileId;
            $type= Flight::request()->data->type;



            date_default_timezone_set('America/Bogota');
$timer=date('H:i:s');
$dater = date('Y-m-d');
/*
$hora1 = new DateTime('10:00:00');
$hora2 = new DateTime('13:30:00');

$diferencia = $hora1->diff($hora2);

$diferenciaHoras = $diferencia->format('%H');
$diferenciaMinutos = $diferencia->format('%i');
$diferenciaSegundos = $diferencia->format('%s');

echo "Diferencia de horas: $diferenciaHoras horas, $diferenciaMinutos minutos, $diferenciaSegundos segundos";

*/
    $conectar=conn();
    require_once '../../apiControlTower/v1/model/modelSecurity/uuid/uuidd.php';
    $gen_uuid = new generateUuid();
    $myuuid = $gen_uuid->guidv4();
    $primeros_ocho = substr($myuuid, 0, 8);
    $query2= mysqli_query($conectar,"INSERT logReport (logId,profileId,type,timer,dater) values ('$primeros_ocho','$profileId','$type','$timer','$dater')");
             
                         
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
        echo "true";
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

$diferenciaHoras = $diferencia->format('%H');
$diferenciaMinutos = $diferencia->format('%i');
$diferenciaSegundos = $diferencia->format('%s');

$totalHours= $diferenciaHoras.":".$diferenciaMinutos.":".$diferenciaSegundos;

               $query2= mysqli_query($conectar,"DELETE FROM transmissionList where transId='$transId'");
               $query2= mysqli_query($conectar,"UPDATE transmissionRecord set endTime='$timer', endDate='$dater',totalTime='$totalHours' where parentId='$transId'");
             
                

               
               
                echo "true";


      
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




Flight::route('POST /postPages/', function () {
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


Flight::route('POST /putPages/', function () {
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

            $pageName= Flight::request()->data->pageName;
            $urlPage= Flight::request()->data->urlPage;
            $pageId= Flight::request()->data->pageId;
            $percentValue= Flight::request()->data->percentValue;

           
    $conectar=conn();
   
  
    $query2= mysqli_query($conectar,"UPDATE generalPages set name='$pageName',urlPage='$urlPage',percentValue='$percentValue' where pageId='$pageId'");
               
                         
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



Flight::route('POST /putPageStatus/', function () {
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




Flight::route('POST /putCurrencyStatus/', function () {
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



Flight::route('POST /putPageCurrency/', function () {
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

            $currency= Flight::request()->data->currency;
            $pageId= Flight::request()->data->pageId;

    $conectar=conn();
        $query2= mysqli_query($conectar,"UPDATE generalPages SET currency='$currency' where pageId='$pageId'");
    
                         
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



Flight::route('POST /postCurrency/', function () {
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



Flight::route('POST /putCurrency/', function () {
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

           
            $name= Flight::request()->data->name;
            $currentValue= Flight::request()->data->currentValue;
            $curId= Flight::request()->data->curId;
            $symbol= Flight::request()->data->symbol;
            
            

           
    $conectar=conn();

  
    $query2= mysqli_query($conectar,"UPDATE generalCurrency SET name='$name',symbol='$symbol',currentValue='$currentValue' where curId='$curId'");
               
                         
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


Flight::start();
