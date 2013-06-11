<?php
session_start();

$color=$_POST['color'];
SetCookie("CSS",$color, 0, "/");
include ('CSS/Style.php'); //CSS Меню;

$log=$_POST['log'];
$pass=$_POST['pass'];
$pas=MD5($pass); //Хешируем пароль md5
?>

<html>


<body>
<?php

if( $_POST['log'] == 'root' && $_POST['pass'] == 'root' )
{
 $_SESSION['login'] = "$log";
 $_SESSION['password'] = "$pas";
 
 
  echo "<meta http-equiv='Refresh' content='0; URL=cookies.php'>"; //Редирект на главную страницу
}
else
{
 echo '<center><p><b>Ошибка авторизации, неправильный логин или пароль!</b></p></center>';
   echo "<meta http-equiv='Refresh' content='3; URL=index.php'>"; //Редирект на главную страницу через 3 секунды
}
?>

</body>
</head>
</html>