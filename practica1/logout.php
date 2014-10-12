<?php
$idu=$_COOKIE['id'];
setCookie('id',"");
setCookie('acceso',"");
session_start();
session_unset();
session_destroy();
print"<meta http-equiv='refresh' content='0; url=login.php'>";
?>