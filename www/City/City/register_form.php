<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>�������� �����������</title>
<link rel="stylesheet" type="text/css" href="CSS/Register.css" />

</head>
<body>
<div id="header"></div>

<?php include ('CSS/Style.php'); //CSS ����

?>

<form method='POST' action='register.php'>
<table align=center border=1>
<!--����������� ��������� ����
onkeyup="check();"
onkeypress="check();"
onchange="check();"
-->
		<TR>
                <TD COLSPAN=2><center>�����������:</center></TD>
        </TR>
        <TR>
                <TD>���:</TD>
				<TD><input type='text' id="1" value="Anonimus" name='nik' onkeyup="check();" onkeypress="check();" onchange="check();"/></TD>
        </TR>
        <TR>
                <TD>���:</TD>
				<TD><input type='text' id="1" value="Serega" name='name' onkeyup="check();" onkeypress="check();" onchange="check();"/></TD>
        </TR>
        <TR>
                <TD>�������:</TD>
				<TD><input type='text' id="1" value="MoST" name='last_name' onkeyup="check();" onkeypress="check();" onchange="check();"/></TD>
        </TR>
        <TR>
                <TD>�������:</TD>
				<TD><input type='text' size="2" id="1" value="21" name='age' onkeyup="check();" onkeypress="check();" onchange="check();"/></TD>
        </TR>
        <TR>
                <TD>���:</TD>
				<TD><select name="gender"><option selected value="�">�</option><option disabled value="�">�</option></select></TD>
        </TR>
        <TR>
                <TD>�����:</TD>
				<TD><input type='text' id="1" value="Niko-City" name='city' onkeyup="check();" onkeypress="check();" onchange="check();"/></TD>
        </TR>
        <TR>
                <TD>� ����:</TD>
				<TD><input type='text' id="2" value="Make Social-Network" name='about' onkeyup="check();" onkeypress="check();" onchange="check();"/></TD>
        </TR>
		<TR>
                <TD COLSPAN=2><center><input type='submit' id="button" disabled="disabled" value='������������������'/></center></TD>
				
        </TR>	
		
</table>

<!--�������� ���������� ����� ����� ����� id-->
<script type="text/javascript">
function check()
{
    var field_1 = document.getElementById('1');
	var field_2 = document.getElementById('2');

    field_1.value != '' && field_2.value != '' ? button.disabled = false : button.disabled = true;
}
</script>

</form>
</body>
</html>