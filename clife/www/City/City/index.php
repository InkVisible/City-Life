<?php
session_start();


//���������� ������(����� ��������� ���������� ��� � COOKIES, ������ �� ������� �������)
 


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
//���� ���� �ookies
$_SESSION['id']=$_COOKIE["login"];
$id=$_SESSION['id']; //������������� ��������� ������������
}

include ('CSS/Style.php'); //CSS ����
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>������� ��������</title>

</head>
<body>

<?php

//echo "<div id='user'><font color=gray>����������� � ���� ������ (<b>$_COOKIE['login']</b>) ���������.</font></div>";
 print('<center><u>�� ������� ����������������!!!</u></center>'); // ���� �� ��� ���������, �� ������������!

include ('user.php'); //��� ������������ , � ������� ����� ����



$nik=$_COOKIE["nik"];
echo "���: (<b>$nik</b>)";
echo "<br>";

$name=$_COOKIE["name"];
echo "���: (<b>$name</b>)";
echo "<br>";

$last_name=$_COOKIE["last_name"];
echo "�������: (<b>$last_name</b>)";
echo "<br>";

$age=$_COOKIE["age"];
echo "�������: (<b>$age</b>)";
echo "<br>";

$gender=$_COOKIE["gender"];
echo "���: (<b>$gender</b>)";
echo "<br>";

$city=$_COOKIE["city"];
echo "�����: (<b>$city</b>)";
echo "<br>";

$about=$_COOKIE["about"];
echo "� ����: (<b>$about</b>)";
 ?>

<p class="note">Main Page.</p>

</body>
</html>