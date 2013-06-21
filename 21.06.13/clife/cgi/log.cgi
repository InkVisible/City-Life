#!/usr/bin/python
# -*- coding:cp1251 -*-

import cgi
import _mysql
import Cookie



def who_is():
  if user_id==page_id:
    return "user"
  else:
    return "guest"

form = cgi.FieldStorage()
db=_mysql.connect(host="localhost", user="root", passwd="", db="citylife")
db.query("SET NAMES cp1251")
 

if "login" in form and "passwd" in form:
  login=form['login'].value
  passwd=form['passwd'].value
  query="SELECT * FROM users WHERE mail=\'%s\' AND parol=\'%s\'"%(login,passwd)
  db.query(query)
  data=db.store_result()
  user=data.fetch_row(1,1) 
  if len(user)==0:
    pass
  else:
    user=user[0]
    global user_id
    global page_id
    user_id=user.get('id')
    page_id=user_id
    print "Content-Type: text/html; charset=cp1251"
    print "Set-Cookie: user-id=%s; path=/;"%user.get("id")
    print ""  

   
    
elif "user_id" in form and "page_id" in form:
  print "Content-Type: text/html; charset=cp1251"
  print ""  
  global user_id
  global page_id
  user_id=form["user_id"].value
  page_id=form["page_id"].value
  if who_is()=="user":
    db.query("SELECT * FROM users WHERE id=\'%s\'"%user_id)
  elif who_is()=="guest":
    db.query("SELECT * FROM users WHERE id=\'%s\'"%page_id)    
  data=db.store_result()
  user=data.fetch_row(1,1)
  if len(user)==0:
    print "<html><body><script type=\"text/javascript\">alert (\"Такого пользователя не существует\");document.location.href=\"/index.htm\"; </script></body></html>"  
  else:
    user=user[0]
else:
  print "<html><body><script type=\"text/javascript\">document.location.href=\"/index.htm\" </script></body></html>"

print "<html><head>"
if len(user)==0:
  pass
else:
  print "<title>%s %s</title>"%(user.get("name"),user.get("l_name")) 
print "<link rel=\"stylesheet\" href=\"/page.css\" type=\"text/css\" /></head><body>"
if len(user)==0:
  print "<script type=\"text/javascript\"> alert (\"Такого пользователя не существует\"); document.location.href=\"/index.htm\" </script>"
print "<div id=\"container\">"
if who_is()=="user":
  print "<div id=\"Horizontal\"><ul style=\"margin:0 150px\">";
  print   """
   <li class='active'><a href='#'><span>сообщения</span></a></li>
   <li class='active'><a href='#'><span>фото</span></a></li>
   <li class='active'><a href='#'><span>друзья</span></a></li>
   <li class='active'><a href='#'><span>настройки</span></a></li>
   <li class='active'><a href='/files.php'><span>файлы</span></a></li>
   <li class='active'><a href='#'><span>редактировать</span></a></li>"""
elif who_is()=="guest":
  
  db.query("SELECT id,name,l_name FROM users WHERE id=\"%s\""%user_id)
  data=db.store_result()
  u=data.fetch_row(1,1)
  if len(u)==0:
    print "<script type=\"text/javascript\">document.location.href=\"/index.htm\" </script>"
  else:
    u=u[0]    
    print "<div id=\"Horizontal\"><ul style=\"margin:0 390px\">"
    print   """
     <li class='active'><a href='#'><span>%s %s</span></a></li>
     <li class='active'><a href='#'><span>фото</span></a></li>
     <li class='active'><a href='#'><span>друзья</span></a></li>
            """%(u.get('name'),u.get('l_name'))
print "</ul></div>"
print "*" 
print "<div id=\"left\">";
print "<div id=\"avatar\">";
if user.get('photo')=="":
  if who_is()=="user":
    print "<a href=\"#\" onclick=\"setOpacity();\"><img src=\"/CSS/images/ask_add.jpg\" /></a>"
	
	
  elif who_is()=="guest":
    print "<img src=\"/CSS/images/ask.jpg\" />"
	
else:
  print "<img src=\"%s\" />"%user.get('photo')
  
print """</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></div></div>"""



print """ 
<SCRIPT LANGUAGE="JavaScript">

var value = 0;

function setOpacity() {
   value += .3;
   var testObj = document.getElementById('transparent');
   
   testObj.style.width = "100%";
   testObj.style.height = "100%";
   testObj.style.display = "block";
   testObj.style.opacity = value/10;
   testObj.style.filter = 'alpha(opacity=' + value*10 + ')';
   myTimeout = setTimeout("setOpacity()", 1);
   
   if ((value/10) >= .5) {
      clearTimeout(myTimeout);
   }
}

function removeOpacity() {
   value -= .3;
   var testObj = document.getElementById('transparent');
   
   myTimeout2 = setTimeout("removeOpacity()", 1);
   testObj.style.opacity = value/10;
   testObj.style.filter = 'alpha(opacity=' + value*10 + ')';
   
   if ((value/10) <= 0) {
      testObj.style.display = "none";
      clearTimeout(myTimeout2);
   }
}
</SCRIPT>

    <style type="text/css">
    body {
       margin: 0;
       padding: 0;
    }

    #transparent {
       background: #000;
       display: none;
       opacity: 0;
       filter: alpha(opacity=0);
       position: absolute;
       top: 0;
       left: 0;
       z-index: 100;
    }
</style>
"""

print """
 <div id="transparent">
       <div style="width: 400px; height:50px; text-align: center;  top: 40%; left: 35%;
	
	position: absolute;	
	border:1px solid #F4F4F4;
	overflow:hidden;
	-moz-box-shadow:0 0 10px #C4C4C4;
	-webkit-box-shadow:0 0 10px #C4C4C4;
	box-shadow:0 0 10px #C4C4C4;">
		  	  
<form name="upload" action="/upload.php" method="POST" ENCTYPE="multipart/form-data">
 <p><font color=white>Выберите картинку для загрузки (*.jpg/png): </font></p>
 <input type="file" name="userfile">
 <input type="submit" name="upload" onclick="removeOpacity();" value="Загрузить">
 <input type="Button" size="2" name="close" onclick="removeOpacity();" value="X">
</form>

       </div>
    </div>
"""

print "<div id=\"footer\"></div>";
print "</body></html>"