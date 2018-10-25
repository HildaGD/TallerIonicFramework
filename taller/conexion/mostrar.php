<?php

header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');


include('conexion.php');


	$con = conexion();

$resultado = $con -> query("SELECT `id_usuario`, `nombre`, `apellido`, `password`, `usuario` FROM `tbl_usuario`");

$datos[] = array();

while($row = $resultado ->fetch_assoc()){
    $datos[]= $row;
}

echo json_encode($datos);

?>