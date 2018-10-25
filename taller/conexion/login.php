<?php

header("Access-Control-Allow-Origin: http://localhost:8100");
header("Content-Type: application/x-www-form-urlencoded");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
    //PARAMETROS DE LA BASE DE DATOS 
$dns = "mysql:host=localhost;dbname=taller";
$user = "root";
$pass = "";
    //RECUPERAR DATOS DEL FORMULARIO
$data = file_get_contents("php://input");
$objData = json_decode($data);

$usuario = $objData->usuario;
$password = $objData->password;

$usuario = stripslashes($usuario);
$password = stripslashes($password);

$usuario = trim($usuario);
$password = trim($password);


try{
	$db = new PDO($dns, $user, $pass);
	if($db){
	$sql ="SELECT * from `tbl_usuario` WHERE `usuario`='".$usuario."' && `password`= '".$password."'";
        
	

	$query = $db-> prepare($sql);

    $query->execute();
    
	$result = $query ->fetch();

	if($usuario==""&&$password==""){
		$resultado = false;
	}

	if(($usuario==$result['usuario'] && $password==$result['password']) {

		$resultado =  true;
        echo "Existe";
	}else{
        $resultado = false;
		echo "no existe";
	}

	if ($password!=$result['password']) {
		$resultado= false;
		//echo "password incorrecta";
	}

	if($usuario != $result['usuario'] ){
		//echo "usuario o correo incorrecto";
		$resultado =false;
	    //$resultado = array("permiso"=>false, "error"=>"Usuario incorrecto");
	}

	echo json_encode($resultado);
	/*if(!$query){
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
}*/

}catch(Exception $e){
	echo "Erro: ". $e->getMessage();
}

   

?>