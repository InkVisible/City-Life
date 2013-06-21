<?php
session_start();
/*
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
//Если есть Сookies*/
//$_SESSION['user-id']=$_COOKIE["login"];
$id=$_COOKIE["user-id"]; //Устанавливаем переменую пользователя
echo $id;
echo "________";
echo "<br>";


$uploaddir = "users/$id/"; // Relative path under webroot

//Переименование файлов в 1.jpg / 1.png
if( $_FILES['userfile']['type'] == 'image/jpeg')	//ПРОВЕРКА что файл выбран
 {
 $uploadfile = $uploaddir . basename('Avatar.jpg'); //JPG
 }
 else
 {
 $uploadfile = $uploaddir . basename('Avatar.png'); //PNG
 }
 
 // $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

 
 if( $_FILES['userfile']['name'] == '')	//ПРОВЕРКА что файл выбран
 {
 echo "<b>Ошибка:</b> Файл не выбран"; //Если файл не выбран
 }
 else
 {
 
 //_________________________________________
 
 $filename=$_FILES['userfile']['name']; //Имя файла
 //echo $_FILES['userfile']['type'];
 if( $_FILES['userfile']['type'] == 'image/jpeg' OR $_FILES['userfile']['type'] == 'image/png')	//ПРОВЕРКА что файл картинка
 {
 //Если файл картника
 if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile))
 {
 $dir='/'.$uploadfile;
 
 echo $dir;
 
   echo "Файл: (<b>$filename</b>) загружен успешно";
   
   	echo '<br>';
	echo '<center><IMG border="1" src="'.$uploadfile.'"></center>';
	
//Добавление в базу даных
$domain='192.168.102.38/';
$db_name = "citylife";
$db_user = "root";
$db_pass = "";
$db_loc = "localhost";

$db = mysql_connect($db_loc,$db_user,$db_pass);
//Проверяем, удачно ли прошло подключение
if(!$db)
{
exit();
}
//Проверяем доступность нужной БД
if(!mysql_select_db($db_name,$db))
{
exit();
}
//Вывод сообщения об удачном выполнении подключения

$query="UPDATE Users SET photo = '$dir' WHERE id = '$id';";
echo ("<script type='text/javascript'>document.location.href='/cgi/log.cgi?user_id=$id&page_id=$id'</script>");
					
if(!mysql_query($query))
{echo '<center><p><b>Ошибка при загрузке файла!</b></p></center>';}

 }
 else
 {
   echo "Ошибка загрузки файла";
 }

 }
 else
 {
 //Если файл не картника
echo "<b>Ошибка:</b> Ето не изображение";
 }
 
  //_________________________________________
 
 }
?>
