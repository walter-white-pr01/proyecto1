<?php

include 'conection.php';

$user = $_REQUEST['user'];
$pass = $_REQUEST['pass'];


$q = "SELECT * FROM users";
$q_usuarios = mysqli_query($link, $q);
$array = mysqli_fetch_array($q_usuarios);


if (isset($user) && isset($pass)) {
	if ($user==$array['user_name'] || $user==$array['user_mail'] && $pass==$array['user_password']) {
		header('Location: misreservas.php');
	}else{
		header('Location: misreservas.php?err=1');
	}
}

?>