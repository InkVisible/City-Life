#!/usr/bin/python
# -*- coding:cp1251 -*-

import cgi
import _mysql

print "Content-Type: text/html; charset=cp1251"
print ""

print "<html><body>"
form=cgi.FieldStorage()
print len(form[0])
cod=form['photo'].value
print "\n",cod
f=open("/home/clife/www/img.jpeg","w")
f.write(cod)
f.close()
print "</html></body>"