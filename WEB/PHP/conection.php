<?php

$ip = "172.24.17.144";
$user = "Marc";
$pass = "159753";
$db = "bd_casal_ww";


$link = mysqli_connect($ip, $user, $pass, $db); 
mysqli_set_charset($link, "utf8");

?>