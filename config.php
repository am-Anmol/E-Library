<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "e-library";
$conn=mysqli_connect($servername, $username, $password, $database);
if(!$conn){
	die('Connection Failed - ' . $mysqli->connect_error);
}

?>