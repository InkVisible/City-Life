<?php
//Cookies
session_start();
$id=$_COOKIE["user-id"]; //������������� ��������� ������������
//echo $id;
//__________________________
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>������������</title>
<link rel="stylesheet" type="text/css" href="CSS/Register.css" />


<div id="header"></div>

<form name="fileshare" action="/upload_files.php" method="POST" ENCTYPE="multipart/form-data">
 <p><font color=white>�������� ���� ��� �������� (*.jpg/png/doc/docx/rar/txt): </font></p>
 <input type="file" name="userfile">
 <input type="submit" name="upload" value="���������">
</form>

<?php
	
//���������� � ���� �����
$db_name = "citylife";
$db_user = "root";
$db_pass = "";
$db_loc = "localhost";

$db = mysql_connect($db_loc,$db_user,$db_pass);
//���������, ������ �� ������ �����������
if(!$db)
{
exit();
}
//��������� ����������� ������ ��
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
							<title>���������� ���������</title>

							</head>
							<body>

							<?php

							echo '����� : ';
							echo $_COOKIE["login"];
							echo '<br>';
							echo '������ (md5) : ';
							echo $_COOKIE["pass"];

							?>

							<center>___________________________________________________________________________________________________</center>

							<center><a href='Clear_messages.php'>�������� ������� ��������� �������������</a></center>
							<center><a href='Clear_chat.php'>�������� ���</a></center>
							<center><a href="delete.php">�������� ���� ��������</a></center>

							<?php
							include ('connect.php');
*/
							function resultbrowser($result){
							//��������� � ������� ���������� ��������� ������ �� �� � ������ ������� HTML
							
								
								echo "<table align=center border=1>\n";
								
							//����� �������
								$n	= mysql_num_fields($result);
								for($i=0; $i<$n; $i++) {
								$name = mysql_field_name($result, $i);
								echo "<td><center><b> $name </center></b></td>";
								}
								echo "</tr>";
							//����� �����
							}

							//�������� ���������� �� ���� ����� � ����� �����
							$query="Select id as 'ID', type as 'Type', file as 'File', time as 'Time', date as 'Date' From fileshare";

							$result=mysql_query($query);
							if( empty($result) )
							{
							 echo '<center><p><b>���� ����� ���������!</b></p></center>';
							}
							else
							{
							resultbrowser($result);
							}
							
							//<a href='Clear_chat.php'>�������� ���</a>
							//echo "<table align=center border=1>\n";
							
								//$listbox = mysql_query("SELECT * FROM fileshare");
								$listbox = mysql_query("SELECT * FROM fileshare where user='$id'"); //������� ����� ���������� ���� �������������
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
									echo "�� ������� �������������";
								}
								
							echo "</table>\n";
							
	$text = "���� ��������� ���� :)";
	$replace_file_name = str_replace(array('-', '�', ' '), '_', trim($text)); //�������� ������� � �������� �� _
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
									echo "�� ������� �������������";
								}
	*/
?>

</body>
</html>