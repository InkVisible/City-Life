<?php
session_start();
/*
if( empty($_COOKIE["login"]) || empty( $_COOKIE["pass"] ) )
{
//���� ��� �ookies
 if( empty($_SESSION['login']) || empty( $_SESSION['password'] ) )
{
 header('Location: login_form.php'); // ���� �� �� �����, �� ���������� �� �������� �����
}

}
else
{
//���� ���� �ookies*/
//$_SESSION['user-id']=$_COOKIE["login"];
$id=$_COOKIE["user-id"]; //������������� ��������� ������������
echo $id;
echo "________";
echo "<br>";


$uploaddir = "users/$id/"; // Relative path under webroot

//�������������� ������ � 1.jpg / 1.png
if( $_FILES['userfile']['type'] == 'image/jpeg')	//�������� ��� ���� ������
 {
 $uploadfile = $uploaddir . basename('Avatar.jpg'); //JPG
 }
 else
 {
 $uploadfile = $uploaddir . basename('Avatar.png'); //PNG
 }
 
 // $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

 
 if( $_FILES['userfile']['name'] == '')	//�������� ��� ���� ������
 {
 echo "<b>������:</b> ���� �� ������"; //���� ���� �� ������
 }
 else
 {
 
 //_________________________________________
 
 $filename=$_FILES['userfile']['name']; //��� �����
 //echo $_FILES['userfile']['type'];
 if( $_FILES['userfile']['type'] == 'image/jpeg' OR $_FILES['userfile']['type'] == 'image/png')	//�������� ��� ���� ��������
 {
 //���� ���� ��������
 if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile))
 {
 $dir='/'.$uploadfile;
 
 echo $dir;
 
   echo "����: (<b>$filename</b>) �������� �������";
   
   	echo '<br>';
	echo '<center><IMG border="1" src="'.$uploadfile.'"></center>';
	
//���������� � ���� �����
$domain='192.168.102.38/';
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
//����� ��������� �� ������� ���������� �����������

$query="UPDATE Users SET photo = '$dir' WHERE id = '$id';";
echo ("<script type='text/javascript'>document.location.href='/cgi/log.cgi?user_id=$id&page_id=$id'</script>");
					
if(!mysql_query($query))
{echo '<center><p><b>������ ��� �������� �����!</b></p></center>';}

 }
 else
 {
   echo "������ �������� �����";
 }

 }
 else
 {
 //���� ���� �� ��������
echo "<b>������:</b> ��� �� �����������";
 }
 
  //_________________________________________
 
 }
?>
