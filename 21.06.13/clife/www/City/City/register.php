<?php
session_start();


$nik=$_POST['nik'];
SetCookie("nik",$nik, 0, "/");

$name=$_POST['name'];
SetCookie("name",$name, 0, "/");

$last_name=$_POST['last_name'];
SetCookie("last_name",$last_name, 0, "/");

$age=$_POST['age'];
SetCookie("age",$age, 0, "/");

$gender=$_POST['gender'];
SetCookie("gender",$gender, 0, "/");

$city=$_POST['city'];
SetCookie("city",$city, 0, "/");

$about=$_POST['about'];
SetCookie("about",$about, 0, "/");

include ('CSS/Style.php'); //CSS Меню
echo '<center><p><b>Пользователь зарегистрирован!</b></p></center>';
?>

<a href='login_form.php'><center><u>Страница авторизации</u></center></a>
<meta http-equiv='Refresh' content='2; URL=login_form.php'>