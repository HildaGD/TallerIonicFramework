<?php
header("Access-Control-Allow-Origin:http://localhost:8100");
header("Content-Type: application/x-www-form-urlencoded");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
    //PARAMETROS DE LA BASE DE DATOS 
    $dns = "mysql:host=localhost;dbname=taller";
    $user = "root";
    $pass = "";
    //RECUPERAR DATOS DEL FORMULARIO
    $data = file_get_contents("php://input");
    $objData = json_decode($data);
    
    // ASIGNAR LOS VALORES A LA VARIABLE
    $id_user = $objData->id_user;
    $nombre = $objData->nombre;
    $apellido = $objData->apellido;
    

    
    // lIMPIAR LOS DATOS
    $id_user= stripslashes($id_user); 
    $nombre = stripslashes($nombre);
    $apellido = stripslashes($apellido);
   
    $id_user= trim($id_user); 
    $nombre = trim($nombre);
    $apellido = trim($apellido);
  
    
   
    $db = new PDO($dns, $user, $pass);
   
    if($db){
       
      $sql = "UPDATE `tbl_usuario` SET `nombre`='".$nombre."',`apellido`='".$apellido."' WHERE `id_usuario`= '".$id_user."'";
        $query = $db->prepare($sql);
        $query ->execute();
        
        if(!$query){
                   $datos = array('mensaje' => "No se ha registrado! ");
                   echo json_encode($datos);
         }
        else{
                   $datos = array('mensaje' => "Los datos se ingrearon correctamente");
                  echo json_encode($datos);
         };
         echo json_encode($datos);
    }
   else{
          $datos = array('mensaje' => "Error, intente nuevamente");
          echo json_encode($datos);
    };

    //include('cerrar_conexion.php');
    ?>