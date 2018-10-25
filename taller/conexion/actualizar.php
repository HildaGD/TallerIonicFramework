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
    /*$gender = $objData->gender;
    $nickname = $objData->nickname;
    $address = $objData->address;
    $phone = $objData->phone;
    $birthday = $objData->birthday;
    $email = $objData->email;
    $password = $objData->password;*/

    
    // lIMPIAR LOS DATOS
    $id_user= stripslashes($id_user); 
    $nombre = stripslashes($nombre);
    $apellido = stripslashes($apellido);
    /*$gender = stripslashes($gender);
    $nickname = stripslashes($nickname);
    $address = stripslashes($address);
    $phone = stripslashes($phone);
    $birthday = stripslashes($birthday);
    $email = stripslashes($email);
    $password = stripslashes($password);*/

    $id_user= trim($id_user); 
    $nombre = trim($nombre);
    $apellido = trim($apellido);
    /*$gender = trim($gender);
    $nickname = trim($nickname);
    $address = trim($address);
    $phone = trim($phone);
    $birthday = trim($birthday);
    $email = trim($email);
    $password = trim($password);*/
    
   
    $db = new PDO($dns, $user, $pass);
   
    if($db){
         // $sql = "INSERT INTO `tbl_user`(`id_user`, `nameUser`, `lastName`, `nickname`, `birthday`, `address`, `phone`, `gender`, `email`, `password`)
          //VALUES (NULL,'".$name."','".$lastName."','".$nickname."','".$birthday."','".$address."','".$phone."','".$gender."','".$email."','".$password."')";
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