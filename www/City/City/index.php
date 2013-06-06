<?php
session_start();


//Продолжаем сессию(можно сохранять информацию как в COOKIES, только на стороне сервера)
 


if( empty($_COOKIE["login"]) || empty( $_COOKIE["pass"] ) )
{
//Если нет Сookies
 if( empty($_SESSION['login']) || empty( $_SESSION['password'] ) )
{
 header('Location: login_form.php'); // если он не зашел, то отправляем на страницу входа
}

}
else
{
//Если есть Сookies
$_SESSION['id']=$_COOKIE["login"];
$id=$_SESSION['id']; //Устанавливаем переменую пользователя
}

include ('CSS/Style.php'); //CSS Меню
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Главная страница</title>

</head>
<body>

<?php

//echo "<div id='user'><font color=gray>Подключение к базе данных (<b>$_COOKIE['login']</b>) выполнено.</font></div>";
 print('<center><u>Вы успешно авторизировались!!!</u></center>'); // если он был залогинен, то приветствуем!

include ('user.php'); //Имя пользователя , в верхнем левом углу



$nik=$_COOKIE["nik"];
echo "Ник: (<b>$nik</b>)";
echo "<br>";

$name=$_COOKIE["name"];
echo "Имя: (<b>$name</b>)";
echo "<br>";

$last_name=$_COOKIE["last_name"];
echo "Фамилия: (<b>$last_name</b>)";
echo "<br>";

$age=$_COOKIE["age"];
echo "Возраст: (<b>$age</b>)";
echo "<br>";

$gender=$_COOKIE["gender"];
echo "Пол: (<b>$gender</b>)";
echo "<br>";

$city=$_COOKIE["city"];
echo "Город: (<b>$city</b>)";
echo "<br>";

$about=$_COOKIE["about"];
echo "О себе: (<b>$about</b>)";
 ?>

<p class="note">Main Page.</p>

</body>
</html>