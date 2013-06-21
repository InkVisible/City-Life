<?php
//Cookies
session_start();
$id=$_COOKIE["user-id"]; //Устанавливаем переменую пользователя
//echo $id;
//__________________________

 $uploaddir = 'FileShare/'; // Relative path under webroot
 $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

 
 if( $_FILES['userfile']['name'] == '')	//ПРОВЕРКА что файл выбран
 {
 echo "<b>Ошибка:</b> Файл не выбран"; //Если файл не выбран
 }
 else
 {
 
 //_________________________________________
 
 $filename=$_FILES['userfile']['name']; //Имя файла
 //echo $_FILES['userfile']['type'];
 //if( $_FILES['userfile']['type'] == 'image/jpeg' OR $_FILES['userfile']['type'] == 'image/png')	//ПРОВЕРКА что файл картинка
 
//ЗАМЕНА И ТРАНСЛИТЕРАЦИЯ СТРОКИ
	echo $filename;
	echo <br>;
	$replace_file_name = str_replace(array('-', '—', ' '), '_', trim($filename)); //Заменить пробели в названии на _
	echo $replace_file_name;
	echo <br>;
	
	$uploadfile = $uploaddir . basename($replace_file_name); 
//______________________________________________
	
	
 if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile))
 {
 //$dir='/'.$uploadfile;
 // echo $dir;
 
   echo "Файл: <b>$filename</b> загружен успешно";
   
//Определяем тип файла
if( $_FILES['userfile']['type'] == 'image/jpeg' OR $_FILES['userfile']['type'] == 'image/png')
{
$type='Image'; //jpg & png
}
if( $_FILES['userfile']['type'] == 'text/plain')
{
$type='Text file'; // txt
}
if( $_FILES['userfile']['type'] == 'application/x-rar-compressed')
{
$type='Archive'; // rar
}
if( $_FILES['userfile']['type'] == 'application/vnd.openxmlformats')
{
$type='Document'; //doc
}

//echo $type;

   
					//Добавление в базу даных
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

					$user = $id;				
					$date = date("m.d.y");
					$time = date("H:i:s");
					//$file = $uploadfile;
					//echo $file;
					
					//$file = iconv('utf-8', 'windows-1251', $uploadfile);

					
					$query="INSERT INTO fileshare (user, type, file, date, time) VALUES ('$user', '$type', '$file', '$date', '$time')";

					//$query="UPDATE Users SET photo = '$dir' WHERE id = '$id';";
					//echo ("<script type='text/javascript'>document.location.href='/cgi/log.cgi?user_id=$id&page_id=$id'</script>");
										
					if(!mysql_query($query))
					{echo '<center><p><b>Ошибка при загрузке файла!</b></p></center>';} 
 }
 }
?>


<meta http-equiv='Refresh' content='70; URL=files.php'>

