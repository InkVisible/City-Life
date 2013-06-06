<?php
session_start();

//Устанавливаем Cookie
SetCookie("login",$_SESSION['login'], time()+3600);
SetCookie("pass",$_SESSION['password'], time()+3600);

header('Location: index.php');
?>