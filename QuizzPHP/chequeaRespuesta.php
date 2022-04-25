<?php
include('misfunciones.php');
$mysqli = conectaBBDD();


$respuesta = $_POST['respuesta'];
$numeroPregunta = $_POST['numeroPregunta'];


//$consulta = $mysqli->query("SELECT * FROM `preguntas` WHERE numero = '$numeroPregunta'");
  //$r = $consulta->fetch_array();

  //query correcta
  $consulta = $mysqli-> prepare("SELECT correcta FROM `preguntas` WHERE numero = ? ");


  $consulta  -> bind_param("s", $numeroPregunta);
$consulta-> execute();
$consulta-> store_result();
$consulta-> bind_result($correcta);
$consulta-> fetch();




  if($correcta == $respuesta){
      echo '<button class="btn btn-success col-12">ACERTASTE!!!!!!</button>';
      

  }else{
      echo '<button class="btn btn-danger col-12">INCORRECTA LUSER!!!</button>';
  }
?>