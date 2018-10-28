<?php
header("Access-Control-Allow-Origin:http://localhost:8100");
header("Content-Type: application/x-www-form-urlencoded");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
  //PARAMETROS DE LA BASE DE DATOS 
    $dns = "mysql:host=localhost;dbname=taller";
    $user = "root";
    $pass = "";

  
    //RECUPERAR DATOS DEL FORMULARIO
    //$data = file_get_contents("php://input");
    //$objData = json_decode($data);
    
    // ASIGNAR LOS VALORES A LA VARIABLE
    /*$nombre = $objData->nombre;
    $apellido = $objData->apellido;
    $usuario = $objData->usuario;
    $password = $objData->password;

    
    // lIMPIAR LOS DATOS 
    $nombre = stripslashes($nombre);
    $apellido = stripslashes($apellido);
    $usuario = stripslashes($usuario);
    $password = stripslashes($password);


    $nombre = trim($nombre);
    $apellido = trim($apellido);
    $usuario = trim($usuario);
    $password = password_hash( trim($password), PASSWORD_DEFAULT);
    
    */
   
   $db = new PDO($dns, $user, $pass);
  
    if($db){

        //campos obligatorios nameUser, last name, nickname--> verificar que no hay un nombre igual, birthday, si es mayor de 18 si puede pagar con tarjeta de lo contrario no, contraseña, email
        // campos NO abligatorios: direccion telefono genero 
        //NOTAS: si el usuario quiere pedir algun pedido a domicilio es obligatorio ingresar el telefono y direccion.
        $sql = "SELECT `id_usuario`, `nombre`, `apellido`, `password`, `usuario` FROM `tbl_usuario`";
        $query = $db->query("SELECT `id_usuario`, `nombre`, `apellido`, `password`, `usuario` FROM `tbl_usuario`");
        //$query ->execute();

        $datos[] = array();

        while($row = $query ->fetch(PDO::FETCH_ASSOC)){
            $datos[]= $row;
        }
        
        echo json_encode($datos);
        
    }
   else{
          $datos = array('mensaje' => "Error, intente nuevamente");
          echo json_encode($datos);
    }

    
    ?>