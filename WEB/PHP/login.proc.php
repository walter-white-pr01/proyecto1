<?php

include 'conection.php';

$user = $_REQUEST['user'];
$pass = $_REQUEST['pass'];


$q = "SELECT * FROM users WHERE user_name='$user' OR user_mail='$user' AND user_password='$pass'";
$q_usuarios = mysqli_query($link, $q);

echo "$q";

if (mysqli_num_rows($q_usuarios)>0) {
	$array = mysqli_fetch_array($q_usuarios);
	session_start();
	$_SESSION['nombre']=$user;
	$_SESSION['id']=$array[''];
	header('Location: misreservas.php');
}else{
	header('Location: index.php?err=1');
}



?>