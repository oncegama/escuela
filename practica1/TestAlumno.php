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
require ('Alumno.php');
require('bd.php');
$alumno = new Alumno();
echo"<div class=table-responsive>
        <form name=maestro action='TestAlumno.php' method=Post>
            <table class=table table-bordered>
             <tr><td>Nombre</td><td><input type=text name=nombre></input></td></tr>
             <tr><td>Apellido Paterno</td><td><input type=text name=app></input></td></tr>
             <tr><td>Apellido Materno</td><td><input type=text name=apm></input></td></tr>
             <tr><td>Telefono</td><td><input type=text name=tel></input></td></tr>
             <tr><td>Calle</td><td><input type=text name=calle></input></td></tr>
             <tr><td>Número exterior</td><td><input type=text name=noext></input></td></tr>
             <tr><td>Número interior</td><td><input type=text name=noint></input></td></tr>
             <tr><td>Colonia</td><td><input type=text name=col></input></td></tr>
             <tr><td>Municipio</td><td><input type=text name=mun></input></td></tr>
             <tr><td>Estado</td><td><input type=text name=edo></input></td></tr>
             <tr><td>CP</td><td><input type=text name=cp></input></td></tr>
             <tr><td>E-mail</td><td><input type=email name=mail></input></td></tr>
             <tr><td>Usuario</td><td><input type=text name=user></input></td></tr>
             <tr><td>Password</td><td><input type=password name=pass></input></td></tr>
             <tr><td>Nivel:</td><td><select name=nivel>
             <option value='3'>Alumno</option>
             </select></td></tr>
             <tr><td colspan='2' align=center><input type=submit name=submit value=Alta></input></td></tr>
             <tr><td >ID:<input type=text name=idm></input><input type=submit name=submit value=Modificar></input></td></tr>
             <tr><td >ID:<input type=text name=idbb></input><input type=submit name=submit value=Buscar></input></td></tr>
            </table>
        </form>
     </div>";
/*echo "<br>".$alumno->createUsuario();
echo "<br>".$alumno->delete();
echo "<br>".$alumno->readEspecifico();
echo "<br>".$alumno->readGeneral();
echo "<br>".$alumno->update();*/
if(isset($_POST['submit'])){
    switch($_POST['submit']){
        case "Alta":
            echo"<div class='alert alert-danger' role='alert'>";
            echo"<br><strong>Datos del Alumno(a): ".($_POST['nombre']." ".$_POST['app']." ".$_POST['apm'])." guardados!!!</strong>";
            echo"</div>";
            $alumno->createUsuario("$_POST[nombre]","$_POST[app]","$_POST[apm]","$_POST[tel]","$_POST[calle]","$_POST[noext]","$_POST[noint]","$_POST[col]","$_POST[mun]","$_POST[edo]","$_POST[cp]","$_POST[mail]","$_POST[user]","$_POST[pass]","$_POST[nivel]");
            break;
       case "Borrar":
            echo"<div class='alert alert-info' role='alert'>";
            echo"<br>Se borraron los datos: ";
            echo"</div>";
            $alumno->delete("$_POST[idb]");
            break;
       case "Modificar":
           echo"<div class='alert alert-success' role='alert'>";
           echo"<br>Los datos se modificaron exitosamente: ";
           echo"</div>";
           $alumno->update("$_POST[idm]","$_POST[nombre]","$_POST[app]","$_POST[apm]","$_POST[nivel]");
           break;
       case "Buscar":
           echo"<div class='alert alert-warning' role='alert'>";
           echo"<br>Los resultados de la búsqueda son: ";
           echo"</div>";
           if("$_POST[idbb]"!=''){
           $alumno->readEspecifico("$_POST[idbb]");
           }
           else{
           $alumno->readGeneral();
           }
           break;
    }
}
require('footer.php');
?>