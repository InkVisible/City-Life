#!/usr/bin/python
# -*- coding:cp1251 -*-

import cgi
import _mysql

print "Content-Type: text/html; charset=cp1251"
print ""
print "<html><body>"


form = cgi.FieldStorage()

login=form['login'].value
passwd=form['passwd'].value
db=_mysql.connect(host="localhost", user="root", passwd="", db="citylife")
db.query("SET NAMES cp1251")
query="SELECT * FROM users WHERE mail=\'%s\' AND parol=\'%s\'"%(login,passwd)
db.query(query)
data=db.store_result()
user=data.fetch_row(1,1)
print "<br>user info:	",user,"<br>"
id=user[0]["id"]	
query="SELECT name, l_name FROM users WHERE id IN (SELECT user2 FROM friends WHERE user1=\'%s\')"%id
db.query(query)
data=db.store_result()
friends=data.fetch_row(3,1)
print "<br>his friends: ",friends

print "</body></html>"