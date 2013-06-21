<?php
if( empty($_COOKIE["login"]) || empty( $_COOKIE["pass"] ) )
{

}
else
{
 header('Location: index.php'); // если он не зашел, то отправляем на страницу входа
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Страница входа</title>

<link rel="stylesheet" type="text/css" href="CSS/Log-in.css" />

<script type="text/javascript">
<!--
function valid_form ( )
{
	valid = true;
	message="Заполните поля:\n";
        if ( document.register.log.value == "" )
        {
                message+="Логин\n";			
                valid = false;
        }
		if ( document.register.pass.value == "" )
        {
                message+="Пароль\n";			
                valid = false;
        }
		if (valid == false )
        {
                alert(message);
        }
        return valid;
}
//-->
</script>

</head>
<body>

	<form name="register" method='POST' action='Login.php' onsubmit="return valid_form ( );">
	
<p>

<div id="Container2">
<b>Цветовая схема:</b><Br>
  <input type="radio" name="color" value="Red">Red<Br>
  <input type="radio" checked="checked" name="color" value="Green">Green<Br>
  <input type="radio" name="color" value="Blue">Blue<Br>
  <input type="radio" name="color" value="Aqua">Aqua<Br>
  <input type="radio" name="color" value="Orange">Orange<Br>
  <input type="radio" name="color" value="Purple">Purple<Br>
  <input type="radio" name="color" value="Gray">Gray
</p>


</div>


<div id="Container">

	
<table align=center border=0>

<TR>




<TD COLSPAN=2><input TYPE="button" VALUE="Регистрация" style="height: 25px; width: 200px" ONCLICK="Link()"></TD> <script>
function Link()
{
location.href="register_form.php";
}
</script>



</TR>

<TR>
<TD><font color=black>Логин:</font></TD>
<TD><input type='text' id="1" name="log"/></TD>
</TR>

<TR>
<TD><font color=black>Пароль:</font></TD>
<TD><input type='password' id="2" name="pass"></TD>
</TR>

<TR>
<TD COLSPAN=2><center><input type='submit' style="height: 25px; width: 200px" id="button" value='Войти'/></center></TD>	

</TR>	

</table>



</form>

    
</div>



<div id="footer">
	<div class="tri"></div>
	<h1>Log-in</h1>
	<h2>Design by <b>Serega MoST</b>. Social-Dev Team.</h2>
</div>

</body>
</html>