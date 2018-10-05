<?php

header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');


include('conexion.php');


	$con = conexion();

$resultado = $con -> query("SELECT `id_user`, `nameUser`, `lastName`, `nickname`, `birthday`, `address`, `phone`, `gender`, `password`, `photoProfile`, `email`, `coverPhoto` FROM `tbl_user`");

$datos[] = array();

while($row = $resultado ->fetch_assoc()){
    $datos[]= $row;
}

echo json_encode($datos);

?>