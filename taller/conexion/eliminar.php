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
    $id_usuario = $objData->id_usuario;
  

    
    // lIMPIAR LOS DATOS
    $id_usuario= stripslashes($id_usuario); 
    

    $id_usuario= trim($id_usuario); 
    
    
   
    $db = new PDO($dns, $user, $pass);
   
    if($db){

        $sql = "DELETE FROM `tbl_usuario` WHERE `id_usuario`= '".$id_usuario."'";
        $query = $db->prepare($sql);
        $query ->execute();
        
        if(!$query){
                   $datos = array('mensaje' => "No se ha eliminado! ");
                   echo json_encode($datos);
         }
        else{
                   $datos = array('mensaje' => "Se ha eliminado correctamente");
                  echo json_encode($datos);
         }
         echo json_encode($datos);
    }
   else{
          $datos = array('mensaje' => "Error, intente nuevamente");
          echo json_encode($datos);
    }

    //include('cerrar_conexion.php');
    ?>