<?php

$ip = "localhost";
$user = "root";
$pass = "";
$db = "bd_casal_ww";


$link = mysqli_connect($ip, $user, $pass, $db); 
mysqli_set_charset($link, "utf8");

if (!$link) {
	    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
	    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
	    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}
?>