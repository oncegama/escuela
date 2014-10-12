<?php
class Materia{

    private $id;
    private $nombre;
    private $avatar;
    private $orden;
    private $estatus;

    private $criterio;
   public function cretateMateria($nombre,$avatar,$orden){
      // echo"<br>Crear Materia";
       $insert01 = "INSERT INTO materia (nombre,avatar,orden,estatus)
      VALUES ('$nombre','$avatar','$orden',1)";
       $result01= mysql_query($insert01)or die("Error $insert01");
          }
    public function readMateriaG(){
        /*echo"<br>Read Materia G";*/
        $sql01= "SELECT * FROM materia WHERE estatus =1 ";
        $result01= mysql_query($sql01)or die("Error $sql01");
        echo"<div class=table-striped>";
        echo"<table class=table table-striped>";
        echo"<tr><td colspan='5' align='center'><strong>Lista de Materias</strong></td></tr>";
        echo"<tr><th>Id</th><th>Nombre</th><th>Avatar</th><th>Orden</th></tr>";
        while($field = mysql_fetch_array($result01)){
            $this->Id = $field["id"];
            $this->nombre = ($field["nombre"]);
            $this->avatar = ($field["avatar"]);
            $this->orden = ($field["orden"]);


                echo"<form name=materia action='TestMateria.php' method=Post>";
                echo"<tr><td>".$this->Id."</td><td>".$this->nombre."</td><td>".$this->avatar."</td><td>".$this->orden."</td><td><input type=hidden name=idb value=$this->Id></input><input type=submit name=submit value=Borrar></input></td></tr></tr>";
                echo"</form>";


        }
        echo"</table>";
    }
    public function readMateriaS($criterio){
       /* echo"<br>Read MateriaS";*/
        $this->criterio=utf8_decode($criterio);
        $sql01="SELECT * FROM materia WHERE estatus=1 and (nombre LIKE '%$criterio%' ) ";
        $result01= mysql_query($sql01)or die("Error $sql01");
        echo"<div class=table-striped>";
        echo"<table class=table table-striped>";
        echo"<tr><td colspan='5' align='center'><strong>Consulta de Materias</strong></td></tr>";
        echo"<tr><th>Id</th><th>Nombre</th><th>Avatar</th><th>Orden</th></tr>";
        while($field = mysql_fetch_array($result01)){
            $this->Id = $field["id"];
            $this->nombre = ($field["nombre"]);
            $this->avatar = ($field["avatar"]);
            $this->orden = ($field["orden"]);

                echo"<form name=maestro action='TestMateria.php' method=Post>";
                echo"<tr><td>".$this->Id."</td><td>".$this->nombre."</td><td>".$this->avatar."</td><td>".$this->orden."</td><td><input type=hidden name=idb value=$this->Id></input><input type=submit name=submit value=Borrar></input></td></tr></tr>";
                echo"</form>";



        }
        echo"</table>";
    }
    public  function deleteMateria($id){
       /* echo"<br>Delete Materia";*/
        $delete01 = "DELETE FROM materia WHERE id=$id";
        $execute01 = mysql_query($delete01) or die ("Error $delete01");
    }
    public  function updateMateria($id,$nombre,$avatar,$orden){
        /*echo"<br>Update Materia";*/
        $update01 = "UPDATE materia SET nombre='$nombre', avatar='$avatar', orden='$orden' WHERE id='$id'";
        $execute01 = mysql_query($update01) or die ("Error $update01");
    }
    public function seleccionaMaestro(){
     echo"<div class=table-responsive>";
     echo"<form action=ajax.php method=Post name='maestro' id='maestro' target='_self'>";
     echo"<table class=table table-stripped>";
     echo"<tr><td>Maestro</td><td><select name='idmae'>";
     $sql02="SELECT * FROM users WHERE estatus=1 and nivel='2' ORDER BY app DESC ";
     $resultado02=mysql_query($sql02)or die ('ERROR $sql02');
     while($field = mysql_fetch_array($resultado02)){
         $id_maestro = $field['id'];
         $option = ($field['id'].") ".$field['app']." ".$field["apm"]." ".$field['nombre']);
         echo"<option value=$id_maestro>$option</option>";
     }
     echo"</select></td></tr>";
     echo"<input type='hidden' id='materia' name='materia' value='0'> ";
     echo"<tr><td colspan='2' align='center'><input type=submit name=submit value=Seleccionar align='center'></input></td></tr>";
     echo"</table>";
    }
    public function datosMaestro($id_maestro){
        $sql03="SELECT * FROM users WHERE estatus=1 and nivel='2' and id=$id_maestro ORDER BY app DESC ";
        $resultado03=mysql_query($sql03)or die ('ERROR $sql03');
        while($field2 = mysql_fetch_array($resultado03)){
            $maeslect=($field2['id'].") ".$field2['app']." ".$field2["apm"]." ".$field2['nombre']);
        }
        echo"<br>Mestro seleccionado: ".$maeslect;
    }
    public function materiaSeleccionada($opcion,$maestro){
        if($opcion!=0)
        {
        $sql03="SELECT * FROM materia WHERE id=$opcion ";
        $resultado03=mysql_query($sql03)or die ('ERROR $sql03');
        while($field2 = mysql_fetch_array($resultado03)){
            $matselect=($field2['nombre']);
        }
        echo"<br><br>Materia seleccionada: ".$matselect;
            $sql01="INSERT INTO maestro_materia(id_maestro,id_materia) VALUES  ($maestro,$opcion)";
            $resultado01=mysql_query($sql01)or die ('ERROR $sql01');
    }
    }
    public function asignarMateriaMaestro($id_maestro){
    echo"<div class=table-responsive>";
        echo"<form action=ajax.php method=POST id=materias target='_self'>";
        echo"<table class=table table-stripped>";
        echo"<tr><td colpan='2' align='center'><strong>Asignar Nuevas Materias</strong></td></tr>";
        echo"<tr><td>Materia:</td><td><select id='materia' name='materia'> ";

        $sql01="SELECT * FROM materia WHERE estatus=1 ORDER BY nombre ASC";
        $result01=mysql_query($sql01)or die('Error $sql01');
        while($field=mysql_fetch_array($result01)){
            $id_materia=$field['id'];
            $opcion=($field['nombre']);
            $sql03="SELECT * FROM maestro_materia WHERE id_maestro = $id_maestro AND id_materia = $id_materia";///
            $result03=mysql_query($sql03)or die ('Error $sql03');
            $existe=mysql_num_rows($result03);
            if($existe > 0){
                    echo"<option value=0>no disponible</option>";
                  }
            else{
                echo"<option value=$id_materia>$opcion</option>";
            }
            $i=$i+1;
        }echo"</select></td></tr>";
        echo"<input type='hidden' id='accion' name='accion' value='1'> ";
        echo"<input type='hidden' id='idmae' name='idmae' value='$id_maestro'> ";
        echo"<tr><td colspan='2' align='center'><input type=submit name=submit value=Seleccionar align='center'></input></td></tr>";
        echo"</table>";
    }
    public function materiasAsignadas($id_maestro,$nivel){
     echo"<div class=table-responsive>";
     echo"<table class=table table-strpped>";
     echo"<tr><td colspan='2' align='center'><strong>Maestro</strong></td></tr>";
        $sql01="SELECT * FROM maestro_materia WHERE id_maestro=$id_maestro";
        $result01=mysql_query($sql01)or die ('Error $sql01');
        echo"</table>";
        echo"<br> Las Materias que imparte son: ";
        while($field2 = mysql_fetch_array($result01)){
            $matasig=$field2['id_materia'];
            $sql02="SELECT * FROM materia WHERE id=$matasig";
            $result02=mysql_query($sql02)or die ('Error $sql02');
            while($field3 = mysql_fetch_array($result02)){
             $matasig2=$field3['nombre'];
             $matasig3=$field3['id'];
                echo"<form name=maestro action='ajax.php' method=Post  target='_self'>";
                if($nivel!=1){
                    echo"<br>$matasig2 <input type=hidden name=materia2 value=$matasig3><input type=hidden name=idmae value=$id_maestro></input>";
                }
                else{
              echo"<br>$matasig2 <input type=hidden name=materia2 value=$matasig3><input type=hidden name=idmae value=$id_maestro></input><input type=submit name=submit value=Borrar>";
                }
               echo "</form>";
            }
        }

    }
    public function desasignarMateria($matasig,$id_maestro){
        $delete01 = "DELETE FROM maestro_materia WHERE id_maestro=$id_maestro AND id_materia=$matasig";
        $execute01 = mysql_query($delete01) or die ("Error $delete01");

    }
}
?>