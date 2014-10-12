<?php
require('header.php');
require('Usuario.php');
require('bd.php');

$criterio='2';

$usuario = new Usuario();
if(isset($_POST['submit'])){
    switch($_POST['submit']){
        case "Alta":
            echo"<div class='alert alert-danger' role='alert'>";
            echo"<br>Bot&oacute;n: ".$_POST['submit'];
            echo"</div>";
            $usuario->createUsuario("$_POST[nombre]","$_POST[app]","$_POST[apm]","$_POST[nivel]");
                break;
        case "Borrar":
            echo"<div class='alert alert-info' role='alert'>";
            echo"<br>Bot&oacute;n: ".$_POST['submit'];
            echo"</div>";
            $usuario->delete("$_POST[idb]");
                break;
        case "Modificar":
            echo"<div class='alert alert-success' role='alert'>";
            echo"<br>Bot&oacute;n: ".$_POST['submit'];
            echo"</div>";
            $usuario->update("$_POST[idm]","$_POST[nombre]","$_POST[app]","$_POST[apm]","$_POST[nivel]");
            break;
        case "Buscar":
            echo"<div class='alert alert-warning' role='alert'>";
            echo"<br>Bot&oacute;n: ".$_POST['submit'];
            echo"</div>";
            $usuario->readEspecifico("$_POST[idbb]");
            break;
    }
}
echo"<div class=table-responsive>
        <form name=alumno action='TestUsuario.php' method=Post>
            <table class=table table-bordered>
             <tr><td>Nombre</td><td><input type=text name=nombre></input></td></tr>
             <tr><td>Apellido Paterno</td><td><input type=text name=app></input></td></tr>
             <tr><td>Apellido Materno</td><td><input type=text name=apm></input></td></tr>
             <tr><td>Nivel:</td><td><select name=nivel>
             <option value='1'>Administrador</option>
             <option value='2'>Maestro</option>
             <option value='3'>Alumno</option>
             </select></td></tr>
             <tr><td colspan='2' align=center><input type=submit name=submit value=Alta></input></td></tr>
             <tr><td >ID:<input type=text name=idm></input><input type=submit name=submit value=Modificar></input></td></tr>
             <tr><td >ID:<input type=text name=idb></input><input type=submit name=submit value=Borrar></input></td></tr>
             <tr><td >ID:<input type=text name=idbb></input><input type=submit name=submit value=Buscar></input></td></tr>
            </table>
        </form>
     </div>";

//echo "<br>".$usuario->createUsuario('Pedro','Hernandez','Terron',2);
echo "<br>".$usuario->delete(4);
echo "<br>".$usuario->readEspecifico($criterio);
echo "<br>".$usuario->readGeneral();
echo "<br>".$usuario->update(1,'Martha','Mendoza','Flores',3);


require('footer.php');
?>
