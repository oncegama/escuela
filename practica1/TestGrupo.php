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
require('bd.php');/*
$sql="SELECT * FROM users WHERE id=$idu";
$consulta=mysql_query($sql)or die ("Error $sql");
$nombre=mysql_result($consulta,0,'nombre');
$app=mysql_result($consulta,0,'app');
$apm=mysql_result($consulta,0,'apm');
$nivel=mysql_result($consulta,0,'nivel');
require('Grupo.php');

if($nivel==1)
{*/
    require('header.php');/*
}
else{
    require('headerm.php');
}*/
require('Grupo.php');



$grupo = new Grupo();
echo"<div class=table-responsive>
        <form name=grupo action='TestGrupo.php' method=Post>
            <table class=table table-bordered>
             <tr><td>Grupo</td><td><input type=text name=grupo></input></td></tr>
             <tr><td>Avatar</td><td><input type=text name=avatar></input></td></tr>
             <tr><td>Orden</td><td><input type=text name=orden></input></td></tr>
             <tr><td colspan='2' align=center><input type=submit name=submit value=Alta></input></td></tr>
             <tr><td >ID:<input type=text name=idg></input><input type=submit name=submit value=Modificar></input></td></tr>
             <tr><td >Grupo:<input type=text name=idbb></input><input type=submit name=submit value=Buscar></input></td></tr>
            </table>
        </form>
     </div>";
if(isset($_POST['submit'])){
    switch($_POST['submit']){
        case "Alta":
            echo"<div class='alert alert-danger' role='alert'>";
            echo"<br><strong>Grupo: ".($_POST['grupo'])." guardado!!!</strong>";
            echo"</div>";
            $grupo->cretateGrupo("$_POST[grupo]","$_POST[avatar]","$_POST[orden]");
            break;
        case "Borrar":
            echo"<div class='alert alert-info' role='alert'>";
            echo"<br>Se elimino el grupo: ";
            echo"</div>";
            $grupo->deleteGrupo("$_POST[idb]");
            break;
        case "Modificar":
            echo"<div class='alert alert-success' role='alert'>";
            echo"<br>Los datos se modificaron exitosamente: ";
            echo"</div>";
            $grupo->updateGrupo("$_POST[grupo]","$_POST[idg]","$_POST[avatar]","$_POST[orden]");
            break;
        case "Buscar":
            echo"<div class='alert alert-warning' role='alert'>";
            echo"<br>Los resultados de la búsqueda son: ";
            echo"</div>";
            if("$_POST[idbb]"!=''){
                $grupo->readGrupoS("$_POST[idbb]");
            }
            else{
                $grupo->readGrupoG();
            }
            break;
        case "Seleccionar":

           foreach ($_POST['id'] as $alumselec){
             //  echo"<br>$gruposelec";
               $gruposelec=$_POST['grupo'];
               $grupo->asignarAlumnos($gruposelec,$alumselec);
           }
           unset ($alumselec);
            break;
        case "Eliminar":
            $grupo->desasignarAlumnos($_POST['idelim']);
            break;
    }
}
echo "<br>".$grupo->seleccionaAlumno();

//echo "<br>".$grupo->seleccionaGrupo();
require('footer.php');
?>