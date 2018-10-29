<?php

include 'conection.php';
session_start();
$user = $_REQUEST['user'];
$pass = $_REQUEST['pass'];


$q = "SELECT * FROM users WHERE user_name='$user' OR user_mail='$user' AND user_password='$pass'";
$q_usuarios = mysqli_query($link, $q);

echo "$q";

if (mysqli_num_rows($q_usuarios)>0) {
	$array = mysqli_fetch_array($q_usuarios);
	$_SESSION['nombre']=$array['user_name'];
	$_SESSION['id']=$array['id_user'];
	header('Location: reservar.php');
}else{
	header('Location: index.php?err=1');
}



?>