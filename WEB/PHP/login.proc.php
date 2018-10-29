<?php
$link = mysqli_connect('172.24.16.11', 'walter', '1234', 'bd_casal_ww');
//include 'conection.php';
session_start();
$user = $_REQUEST['user'];
$pass = $_REQUEST['pass'];
$encriptada=md5($pass);



$q = "SELECT * FROM users WHERE user_name='$user' OR user_mail='$user' AND user_password='$encriptada'";
$q_usuarios = mysqli_query($link, $q);

echo "$q";

if (mysqli_num_rows($q_usuarios)>0) {
	$array = mysqli_fetch_array($q_usuarios);
	$_SESSION['nombre']=$array['user_name'];
	$_SESSION['id']=$array['user_id'];
	header('Location: reservar.php');
}else{
	header('Location: index.php?err=1');
}



?>