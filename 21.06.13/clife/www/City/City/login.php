<?php
session_start();

$color=$_POST['color'];
SetCookie("CSS",$color, 0, "/");
include ('CSS/Style.php'); //CSS ����;

$log=$_POST['log'];
$pass=$_POST['pass'];
$pas=MD5($pass); //�������� ������ md5
?>

<html>


<body>
<?php

if( $_POST['log'] == 'root' && $_POST['pass'] == 'root' )
{
 $_SESSION['login'] = "$log";
 $_SESSION['password'] = "$pas";
 
 
  echo "<meta http-equiv='Refresh' content='0; URL=cookies.php'>"; //�������� �� ������� ��������
}
else
{
 echo '<center><p><b>������ �����������, ������������ ����� ��� ������!</b></p></center>';
   echo "<meta http-equiv='Refresh' content='3; URL=index.php'>"; //�������� �� ������� �������� ����� 3 �������
}
?>

</body>
</head>
</html>