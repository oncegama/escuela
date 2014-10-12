<?php
require('header.php');
require('Grupo.php');
require('bd.php');
$grupo=new Grupo();
$id_alumno=$_POST['idal'];
$grupselec=$_POST['grupo'];
//echo"$id_alumno[0],$id_alumno[1]";
$count = count($id_alumno);
/*$sql02="SELECT * FROM users WHERE estatus=1 and nivel='3' ORDER BY app DESC ";
$resultado02=mysql_query($sql02)or die ('ERROR $sql02');*/
$i=0;
while($i <= $count){

    echo"<br>$id_alumno[$i]$count";

    $i=$i+1;
}
require('footer.php');
?>