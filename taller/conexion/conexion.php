<?php

function conexion(){
global $servername;
global $username;
global $password;
global $dbname;

$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "taller";


$mysqli = @new mysqli($severname, $username, $password, $dbname);
if(mysqli_connect_errno()){
    printf(error_db_connect());
    exit();
}
return $mysqli;


}
?>