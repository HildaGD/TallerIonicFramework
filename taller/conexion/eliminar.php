<?php
header("Access-Control-Allow-Origin:http://localhost:8100");
header("Content-Type: application/x-www-form-urlencoded");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
    //PARAMETROS DE LA BASE DE DATOS 
    $dns = "mysql:host=localhost;dbname=bfood";
    $user = "root";
    $pass = "";
    //RECUPERAR DATOS DEL FORMULARIO
    $data = file_get_contents("php://input");
    $objData = json_decode($data);
    
    // ASIGNAR LOS VALORES A LA VARIABLE
    $id_user = $objData->id_user;
  

    
    // lIMPIAR LOS DATOS
    $id_user= stripslashes($id_user); 
    

    $id_user= trim($id_user); 
    
    
   
    $db = new PDO($dns, $user, $pass);
   
    if($db){

        $sql = "DELETE FROM `tbl_usuario` WHERE `id_usuario`= '".$id_user."'";
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