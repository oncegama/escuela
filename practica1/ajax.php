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
require('header.php');
require('Materia.php');
require('bd.php');
$materia = new Materia();
$id_maestro=$_POST['idmae'];

$materia->datosMaestro($id_maestro);
$materia->asignarMateriaMaestro($id_maestro);

$sql="SELECT * FROM users WHERE id=$idu";
$consulta=mysql_query($sql)or die ("Error $sql");
$nombre=mysql_result($consulta,0,'nombre');
$app=mysql_result($consulta,0,'app');
$apm=mysql_result($consulta,0,'apm');
$nivel=mysql_result($consulta,0,'nivel');

if(isset($_POST['submit'])){
    switch($_POST['submit']){
        case "Borrar":
            $materia->desasignarMateria("$_POST[materia2]","$_POST[idmae]");
            $materia->materiasAsignadas($id_maestro,$nivel);
            break;
        case "Seleccionar":
            $matselec=$_POST['materia'];
            $materia->materiaSeleccionada($matselec,$id_maestro);
            $materia->materiasAsignadas($id_maestro,$nivel);
            break;
    }
}
/*$materia = new Materia();
$materia->datosMaestro($id_maestro);
$materia->asignarMateriaMaestro($id_maestro);
$materia->materiaSeleccionada($id_maestro);
$materia->materiasAsignadas($id_maestro);*/
require('footer.php');
?>