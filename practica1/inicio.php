<?php
$idu=$_COOKIE['id'];
$acceso=$_COOKIE['acceso'];
if($idu=="" or $acceso=="")
{
    print"<meta http-equiv='refresh' content='0; url=login.php'>";
}
session_start();
$idu2=$_SESSION['id'];
$acceso2=$_SESSION['acceso'];
if($idu2=="" or $acceso2=="")
{
    print"<meta http-equiv='refresh' content='0; url=login.php'>";
}
require('bd.php');
$sql="SELECT * FROM users WHERE id=$idu";
$consulta=mysql_query($sql)or die ("Error $sql");
$nombre=mysql_result($consulta,0,'nombre');
$app=mysql_result($consulta,0,'app');
$apm=mysql_result($consulta,0,'apm');
$nivel=mysql_result($consulta,0,'nivel');

if($nivel==1)
{
    require('header.php');
    $msg="Bienvenido al sistema escolar ".$nombre." ".$app." ".$apm;
    echo"<div class='alert alert-success' role='alert'>";
    echo"<br><strong>$msg</strong>";
    echo"</div>";
    require('footer.php');
}
else{
    require('headerm.php');
    $msg="Bienvenido al sistema escolar ".$nombre." ".$app." ".$apm;
    echo"<div class='alert alert-info' role='alert'>";
    echo"<br><strong>$msg</strong>";
    echo"</div>";
    require('footer.php');
}
?>