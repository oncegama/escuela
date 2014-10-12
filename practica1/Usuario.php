<?php

class Usuario{
  private $Id;
  private $nombre;
  private $app;
  private $apm;
  private $tel;
  private $calle;
  private $numext;
  private $numint;
  private $col;
  private $mun;
  private $estado;
  private $cp;
  private $correo;
  private $usuario;
  private $contraseña;
  private $nivel;
  private $estatus;

  private $criterio;
    public function createUsuario($nombre,$apellidop,$apellidom,$tel,$calle,$numext,$numint,$col,$mun,$estado,$cp,$correo,$usuario,$pass,$nivel){
      //  echo"crearUsuario";
      $insert01 = "INSERT INTO users (nombre,app,apm,tel,calle,numext,numint,col,mun,estado,cp,correo,usuario,pass,nivel,estatus)
      VALUES ('$nombre','$apellidop','$apellidom','$tel','$calle','$numext','$numint','$col','$mun','$estado','$cp','$correo','$usuario','$pass','$nivel',1)";
      $result01= mysql_query($insert01)or die("Error $insert01");
    }
    public function readGeneral(){
       // echo"readGeneral";
        $sql01= "SELECT * FROM users WHERE estatus =1 ORDER BY app ASC";
        $result01= mysql_query($sql01)or die("Error $sql01");
        echo"<div class=table-striped>";
        echo"<table class=table table-striped>";
        echo"<tr><td colspan='6' align='center'><strong>Lista de Usuarios</strong></td></tr>";
        echo"<tr><th>Id</th><th>Nombre</th><th>Apellido P.</th><th>Apellido M.</th><th>Nivel</th></tr>";
        while($field = mysql_fetch_array($result01)){
            $this->Id = $field["id"];
            $this->nombre = ($field["nombre"]);
            $this->app = ($field["app"]);
            $this->apm = ($field["apm"]);
            $this->nivel = $field['nivel'];
            switch($this->nivel){
                case 1:
                    $type = "Administrador";
                    break;
                case 2:
                    $type = "Maestro";
                    break;
                case 3:
                    $type = "Alumno";
                    break;

            }
        if($this->nivel==2 or $this->nivel==1)
        {
           echo"<form name=maestro action='TestMaestro.php' method=Post>";
        echo"<tr><td>".$this->Id."</td><td>".$this->nombre."</td><td>".$this->app."</td><td>".$this->apm."</td><td>$type</td><td><input type=hidden name=idb value=$this->Id></input><input type=submit name=submit value=Borrar></input></td></tr></tr>";
        echo"</form>";
        }
        else{
            echo"<form name=maestro action='TestAlumno.php' method=Post>";
            echo"<tr><td>".$this->Id."</td><td>".$this->nombre."</td><td>".$this->app."</td><td>".$this->apm."</td><td>$type</td><td><input type=hidden name=idb value=$this->Id></input><input type=submit name=submit value=Borrar></input></td></tr></tr>";
            echo"</form>";
        }
        }
        echo"</table>";
    }
    public  function readEspecifico($criterio){
       // echo"readEspecifico";

        $this->criterio=utf8_decode($criterio);
        $sql01="SELECT * FROM users WHERE estatus=1 and (id = $criterio ) ORDER BY app ASC";
        $result01= mysql_query($sql01)or die("Error $sql01");
        echo"<div class=table-striped>";
        echo"<table class=table table-striped>";
        echo"<tr><td colspan='6' align='center'><strong>Consulta de Usuarios</strong></td></tr>";
        echo"<tr><th>Id</th><th>Nombre</th><th>Apellido P.</th><th>Apellido M.</th><th>Nivel</th></tr>";
        while($field = mysql_fetch_array($result01)){
            $this->Id = $field["id"];
            $this->nombre = ($field["nombre"]);
            $this->app = ($field["app"]);
            $this->apm = ($field["apm"]);
            $this->nivel = $field['nivel'];
            switch($this->nivel){
                case 1:
                    $type = "Administrador";
                    break;
                case 2:
                    $type = "Maestro";
                    break;
                case 3:
                    $type = "Alumno";
                    break;

            }
            if($this->nivel==2 or $this->nivel==1)
            {
                echo"<form name=maestro action='TestMaestro.php' method=Post>";
                echo"<tr><td>".$this->Id."</td><td>".$this->nombre."</td><td>".$this->app."</td><td>".$this->apm."</td><td>$type</td><td><input type=hidden name=idb value=$this->Id></input><input type=submit name=submit value=Borrar></input></td></tr></tr>";
                echo"</form>";
            }
            else{
                echo"<form name=maestro action='TestAlumno.php' method=Post>";
                echo"<tr><td>".$this->Id."</td><td>".$this->nombre."</td><td>".$this->app."</td><td>".$this->apm."</td><td>$type</td><td><input type=hidden name=idb value=$this->Id></input><input type=submit name=submit value=Borrar></input></td></tr></tr>";
                echo"</form>";
            }
        }
        echo"</table>";
    }
    public  function update($id,$nombre,$apellidop,$apellidom,$nivel){
      //  echo"update";
        $update01 = "UPDATE users SET nombre='$nombre', app='$apellidop', apm='$apellidom', nivel='$nivel' WHERE id='$id'";
        $execute01 = mysql_query($update01) or die ("Error $update01");
    }
    public function  delete($id){
       // echo"delete";
        $delete01 = "DELETE FROM users WHERE id=$id";
        $execute01 = mysql_query($delete01) or die ("Error $delete01");
    }
}
?>