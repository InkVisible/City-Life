<?php
session_start();

//������� Cookies
SetCookie("login","");
SetCookie("pass","");

unset($_SESSION['login']); // ���������� �����
unset($_SESSION['password']);// ���������� ������

unset($_SESSION['id']);// ���������� ��������� ������������ ID
session_destroy();
header('Location: index.php');
?>