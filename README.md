Admin Dashboard for Time Tracking 
<br/>
<br/>
<b>LOGIN ADMIN</b><br/>
Username : admin<br/>
Password : admin<br/><br/>
<b>LOGIN CLIENT TO GET TOKEN </b><br/>
URL : /client/login <br/>
Method : POST <br/
Form = username & password
<br/>
<br/>
<b>LOGOUT CLIENT TO DELETE TOKEN </b><br/>
Require header token, <br/>
URL : /client/logout <br/>
Method : POST
<br/>
<br/>
<b>TASKS</b><br/>
Require header token.<br/>
URL : /tasks,<br/>
Form : project, name, date, status
<br/>
<br/>
<b>ACTIVITIES</b><br/>
Require header token.<br/>
URL : /activities,<br/>
Form : app, title, date, time
<br/>
<br/>
<b>SCREENSHOT</b><br/>
Require header token.<br/>
URL : /screenshot<br/>
Form : screenshots [type=file], app, title, date, time
<br/><br/>
Required installing firebase/jwt-auth from package with composer (vendor) <code>composer require firebase/php-jwt</code> to trying API<br/>
<code>Format for 'date' => 14-03-2018</code><br/>
<code>Format for 'time' => 03:03</code><br/>
<code>Form project di isi sesuai id project</code><br/>