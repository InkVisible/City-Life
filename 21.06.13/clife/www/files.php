<?php
//Cookies
session_start();
$id=$_COOKIE["user-id"]; //Устанавливаем переменую пользователя
//echo $id;
//__________________________
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Файлообменик</title>
<link rel="stylesheet" type="text/css" href="CSS/Register.css" />


<div id="header"></div>

<form name="fileshare" action="/upload_files.php" method="POST" ENCTYPE="multipart/form-data">
 <p><font color=white>Выберите файл для загрузки (*.jpg/png/doc/docx/rar/txt): </font></p>
 <input type="file" name="userfile">
 <input type="submit" name="upload" value="Загрузить">
</form>

<?php
	
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

	echo "<hr>";
//print "Hello";






/*

							<html>
							<head>
							<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
							<title>Управление акаунтами</title>

							</head>
							<body>

							<?php

							echo 'Админ : ';
							echo $_COOKIE["login"];
							echo '<br>';
							echo 'Пароль (md5) : ';
							echo $_COOKIE["pass"];

							?>

							<center>___________________________________________________________________________________________________</center>

							<center><a href='Clear_messages.php'>Очистить историю сообщений пользователей</a></center>
							<center><a href='Clear_chat.php'>Очистить чат</a></center>
							<center><a href="delete.php">Очистить базу акаунтов</a></center>

							<?php
							include ('connect.php');
*/
							function resultbrowser($result){
							//виведення у браузер результату виконання запиту до БД у вигляді таблиці HTML
							
								
								echo "<table align=center border=1>\n";
								
							//Шапка таблицы
								$n	= mysql_num_fields($result);
								for($i=0; $i<$n; $i++) {
								$name = mysql_field_name($result, $i);
								echo "<td><center><b> $name </center></b></td>";
								}
								echo "</tr>";
							//Конец шапки
							}

							//Проверка существует ли база даных и вывод даных
							$query="Select id as 'ID', type as 'Type', file as 'File', time as 'Time', date as 'Date' From fileshare";

							$result=mysql_query($query);
							if( empty($result) )
							{
							 echo '<center><p><b>База даных несоздана!</b></p></center>';
							}
							else
							{
							resultbrowser($result);
							}
							
							//<a href='Clear_chat.php'>Очистить чат</a>
							//echo "<table align=center border=1>\n";
							
								//$listbox = mysql_query("SELECT * FROM fileshare");
								$listbox = mysql_query("SELECT * FROM fileshare where user='$id'"); //Выбрать файлы загруженые етим пользователем
								if ($listbox == true) {
									// echo "<select name='to'>";
									//echo "\t<tr>\n";
									 while ($s = mysql_fetch_array($listbox)) {
										echo "<tr>";
										  echo "<td>".$s['id']."</td>";
										  echo "<td>".$s['type']."</td>";
										  echo "<td><a href='".$s['file']."'>".$s['file']."</a></td>";
										  echo "<td>".$s['time']."</td>";
										  echo "<td>".$s['date']."</td>";
										echo "</tr>";
									 }
									//echo "</select>";
									//echo "\t</tr>\n";
								}
								else {
									echo "Не найдено пользователей";
								}
								
							echo "</table>\n";
							
	$text = "Лишь несколько слов :)";
	$replace_file_name = str_replace(array('-', '—', ' '), '_', trim($text)); //Заменить пробели в названии на _
	echo $queryString;
	//$trimmed = trim($text); 
	/*
	$date = date("m.d.y");
	$time = date("H:i:s");
	print $date;
	print " ";
	print $time;

	*/
	
	//_____________________
	/*
								$listbox = mysql_query("SELECT * FROM users");
								if ($listbox == true) {
									 echo "<select name='to'>";
									 while ($s = mysql_fetch_array($listbox)) {
										  echo "<option value='".$s['username']."'>".$s['username']."</option>";
									 }
									echo "</select>";
								}
								else {
									echo "Не найдено пользователей";
								}
	*/
?>

</body>
</html>