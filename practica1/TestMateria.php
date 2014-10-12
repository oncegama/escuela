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
}
else{
    require('headerm.php');
}
require('Materia.php');


$materia = new Materia();
echo"<div class=table-responsive>
        <form name=maestro action='TestMateria.php' method=Post>
            <table class=table table-bordered>
             <tr><td>Nombre</td><td><input type=text name=nombre></input></td></tr>
             <tr><td>Avatar</td><td><input type=text name=avatar></input></td></tr>
             <tr><td>Orden</td><td><input type=text name=orden></input></td></tr>
             <tr><td colspan='2' align=center><input type=submit name=submit value=Alta></input></td></tr>
             <tr><td >ID:<input type=text name=idm></input><input type=submit name=submit value=Modificar></input></td></tr>
             <tr><td >Nombre:<input type=text name=idbb></input><input type=submit name=submit value=Buscar></input></td></tr>
            </table>
        </form>
     </div>";
/*echo "<br>".$materia->cretateMateria();
echo "<br>".$materia->readMateriaG();
echo "<br>".$materia->readMateriaS();
echo "<br>".$materia->deleteMateria();
echo "<br>".$materia->updateMateria();
echo "<br>".$materia->seleccionaMaestro(4);
echo "<br>".$materia->datosMaestro(4);
echo "<br>".$materia->materiaSeleccionada(4);
echo "<br>".$materia->asignarMateriaMaestro(4);
echo "<br>".$materia->materiasAsignadas(4);*/
if(isset($_POST['submit'])){
    switch($_POST['submit']){
        case "Alta":
            echo"<div class='alert alert-danger' role='alert'>";
            echo"<br><strong>Materia: ".($_POST['nombre'])." guardada!!!</strong>";
            echo"</div>";
            $materia->cretateMateria("$_POST[nombre]","$_POST[avatar]","$_POST[orden]");
            break;
        case "Borrar":
            echo"<div class='alert alert-info' role='alert'>";
            echo"<br>Se borraron los datos: ";
            echo"</div>";
            $materia->deleteMateria("$_POST[idb]");
            break;
        case "Modificar":
            echo"<div class='alert alert-success' role='alert'>";
            echo"<br>Los datos se modificaron exitosamente: ";
            echo"</div>";
            $materia->updateMateria("$_POST[idm]","$_POST[nombre]","$_POST[avatar]","$_POST[orden]");
            break;
        case "Buscar":
            echo"<div class='alert alert-warning' role='alert'>";
            echo"<br>Los resultados de la búsqueda son: ";
            echo"</div>";
            if("$_POST[idbb]"!=''){
                $materia->readMateriaS("$_POST[idbb]");
            }
            else{
                $materia->readMateriaG();
            }
            break;
    }
  }/*poner acciones 0 a 2 switch($accion)  ajax=vista, testmateria=controlador, materia=metodos*/
echo "<br>".$materia->seleccionaMaestro();
require('footer.php');
?>