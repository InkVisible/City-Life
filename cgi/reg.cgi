#!/usr/bin/python
# -*- coding:cp1251 -*-

import cgi
import _mysql

print "Content-Type: text/html; charset=cp1251"
print ""
print "<html><body>"

def err(flag):
	l="<script type=\"text/javascript\"> document.location.href=\"/register_form.htm\"</script>"
	if flag=="mail":
		print "<script type=\"text/javascript\">alert(\"Пользователь с этим E-mail адресом уже зарегестрирован\")</script>"
		print l
	elif flag=="passwd":
		print "<script type=\"text/javascript\">alert(\"Пароль уже занят\")</script>"
		print l
	
form=cgi.FieldStorage()
login=form["login"].value
passwd=form["passwd"].value
db=_mysql.connect(host="localhost", user="root", passwd="", db="citylife")
db.query("SELECT * FROM USERS WHERE mail=\'%s\'"%login)
data=db.store_result()
mail=data.fetch_row(5)
db.query("SELECT * FROM users WHERE parol=\'%s\'"%passwd)
data=db.store_result()
parol=data.fetch_row(5)
if len(mail)>0:
	err("mail")
elif len(parol)>0:
	err("passwd")
else:
    q="INSERT INTO users (mail,parol,name,l_name,date,sex,city,info) VALUES  "
    name=form["name"].value
    l_name=form["l_name"].value
    dt=form["date"].value

    sex=form["sex"].value

    city=form["city"].value

    info=form["info"].value

    db.query("%s(\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\',\'%s\')"%(q,login,passwd,name,l_name,dt,sex,city,info))

    
print "</body></html>"