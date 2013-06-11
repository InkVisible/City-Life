<html>
<body>

<style type="text/css"> 
#user {
position: absolute;
bottom: 1em;
left: 1em;
text-align: left;
top: 1.3em;

	text-transform: uppercase;
	font-family: 'Helvetica Neue',helvetica,'microsoft sans serif',arial,sans-serif;
	font-size: 70%;
	color: #FFFFFF;	
}
</style>

</body>
</html>

<?php
$user=$_COOKIE["login"]; //Имя пользователя
echo "<div id='user'><font color=white>Пользователь: (<b>$user</b>)</font></div>"
?>