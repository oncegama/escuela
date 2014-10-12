<?php
class Grupo{

    private $grupo;

    private $criterio;
    public function cretateGrupo($grupo,$avatar,$orden){
        // echo"<br>Crear Grupo";
        $insert01 = "INSERT INTO grupo (grupo,estatus,avatar,orden)
      VALUES ('$grupo',1,'$avatar','$orden')";
        $result01= mysql_query($insert01)or die("Error $insert01");
    }
    public  function updateGrupo($grupo,$id,$avatar,$orden){
        /*echo"<br>Update Grupo";*/
        $update01 = "UPDATE grupo SET grupo='$grupo',avatar='$avatar',orden='$orden' WHERE  id='$id'";
        $execute01 = mysql_query($update01) or die ("Error $update01");
    }
    public function readGrupoG(){
        /*echo"<br>Read Grupo G";*/
        $sql01= "SELECT * FROM grupo WHERE estatus =1 ";
        $result01= mysql_query($sql01)or die("Error $sql01");
        echo"<div class=table-striped>";
        echo"<table class=table table-striped>";
        echo"<tr><td colspan='3' align='center'><strong>Lista de Grupos</strong></td></tr>";
        echo"<tr><th>Id</th><th>Grupo</th><th></th></tr>";
        while($field = mysql_fetch_array($result01)){
            $this->Id = $field["id"];
            $this->nombre = ($field["grupo"]);

            echo"<form name=grupo action='TestGrupo.php' method=Post>";
            echo"<tr><td>".$this->Id."</td><td>".$this->nombre."</td><td><input type=hidden name=idb value=$this->Id></input><input type=submit name=submit value=Borrar></input></td></tr></tr>";
            echo"</form>";


        }
        echo"</table>";
    }
    public function readGrupoS($criterio){
        /* echo"<br>Read MateriaS";*/
        $this->criterio=utf8_decode($criterio);
        $sql01="SELECT * FROM grupo WHERE estatus=1 and (grupo LIKE '%$criterio%' ) ";
        $result01= mysql_query($sql01)or die("Error $sql01");
        echo"<div class=table-striped>";
        echo"<table class=table table-striped>";
        echo"<tr><td colspan='3' align='center'><strong>Consulta de Grupos</strong></td></tr>";
        echo"<tr><th>Id</th><th>Grupo</th><th></th></tr>";
        while($field = mysql_fetch_array($result01)){
            $this->Id = $field["id"];
            $this->nombre = ($field["grupo"]);

            echo"<form name=maestro action='TestGrupo.php' method=Post>";
            echo"<tr><td>".$this->Id."</td><td>".$this->nombre."</td><td><input type=hidden name=idb value=$this->Id></input><input type=submit name=submit value=Borrar></input></td></tr></tr>";
            echo"</form>";

        }
        echo"</table>";
    }

    public  function deleteGrupo($id){
        /* echo"<br>Delete Materia";*/
        $delete01 = "DELETE FROM grupo WHERE id=$id";
        $execute01 = mysql_query($delete01) or die ("Error $delete01");
    }

    public function seleccionaAlumno(){
        echo"<div class=table-responsive>";
        echo"<form action=TestGrupo.php method=Post name='maestro' id='maestro' target='_self'>";
        echo"<table class=table table-stripped>";
        echo"<tr><td colpan='2' align='center'><strong>Asignar Grupo</strong></td></tr>";
        echo"<tr><td>Materia:</td><td><select id='grupo' name='grupo'> ";
        $sql01="SELECT * FROM grupo WHERE estatus=1 ORDER BY grupo ASC ";
        $resultado01=mysql_query($sql01)or die ('ERROR $sql01');
        while($field=mysql_fetch_array($resultado01)){
            $id_grupo=$field['id'];
            $opcion=($field['grupo']);

                echo"<option value=$id_grupo>$opcion</option>";
        }echo"</select></td></tr>";
        echo"</table>";//termina combo para seleccionar grupo
        echo"<table class=table table-stripped>";
        echo"<tr><td></td><td  align='center'><strong>Alumnos</strong></td></tr>";
        $sql02="SELECT * FROM users WHERE estatus=1 and nivel='3' ORDER BY app DESC ";
        $resultado02=mysql_query($sql02)or die ('ERROR $sql02');

        while($field = mysql_fetch_array($resultado02)){
            $id_alumno = $field['id'];
            $option = ($field['id'].") ".$field['app']." ".$field["apm"]." ".$field['nombre']);
            $sql03="SELECT * FROM alumno_grupo WHERE id_alumno = $id_alumno ";///
            $result03=mysql_query($sql03)or die ('Error $sql03');
            $existe=mysql_num_rows($result03);
            if($existe > 0){
                $sql04="SELECT * FROM alumno_grupo,grupo WHERE id_alumno = $id_alumno and id_grupo=id";///
                $result04=mysql_query($sql04)or die ('Error $sql04');
                $field2 = mysql_fetch_array($result04);
                $grupo=$field2['grupo'];
            echo"<input type=hidden name=idelim value=$id_alumno></input>";
            echo"<tr><td colspan='2'  align='center'><input type=checkbox id=$id_alumno name='id[]' value=$id_alumno disabled>$option <font color=#00bfff> esta en el grupo $grupo</font> <form action=TestGrupo.php method=Post name='maestro' id='maestro' target='_self'><input type=hidden name=idelim value=$id_alumno></input><input type=submit name=submit value=Eliminar></input></form></input></td></tr>";
            }
            else{
            echo"<tr><td colspan='2' align='center'><input type=checkbox id=$id_alumno name='id[]' value=$id_alumno>$option </input></td></tr>";
            }

        }
        echo"</select></td></tr>";
        //echo"<input type='hidden' id='grupo' name='grupo' value='0'> ";
        echo"<tr><td colspan='2' align='center'></input><input type=submit name=submit value=Seleccionar align='center'></input></td></tr>";
        echo"</table>";
    }

    public function asignarAlumnos($id_grupo,$id_alumno){
        $sql03="INSERT INTO alumno_grupo (id_alumno,id_grupo) VALUES ('$id_alumno','$id_grupo')";///
        $result03=mysql_query($sql03)or die ('Error $sql03');
    }
    public function desasignarAlumnos($idelim){
        $sql03="DELETE FROM alumno_grupo WHERE id_alumno=$idelim";///
        $result03=mysql_query($sql03)or die ('Error $sql03');
    }
}
?>
