<?php
session_start();

//Удалить Cookies
SetCookie("login","");
SetCookie("pass","");

unset($_SESSION['login']); // уничтожаем логин
unset($_SESSION['password']);// уничтожаем пароль

unset($_SESSION['id']);// уничтожаем переменую пользователя ID
session_destroy();
header('Location: index.php');
?>