<?php

$tema = $_POST['tema'];

include('misfunciones.php');
$mysqli = conectaBBDD();

?>
<div class="alert alert-success" role="alert">
<?php echo $tema; ?>
</div>
<?php
$consulta = $mysqli->query("SELECT * FROM `preguntas` WHERE `tema` = '$tema'  ORDER BY RAND() LIMIT 1");
  $r = $consulta->fetch_array();

?>
<div class="container">
  <div class="row">

    <div class="col-12">
      <button class="btn btn-warning disabled col-12">
        <?php echo $r['enunciado'];
        ?>
      </button>
      <br><br>
      <button class="btn btn-primary col-12" onclick="chequeaRespuesta('1','<?php echo $r['numero']; ?>' );">
        <?php echo $r['r1'];
        ?>
      </button>
      <br><br>
      <button class="btn btn-primary col-12" onclick="chequeaRespuesta('2','<?php echo $r['numero']; ?>' );">
        <?php echo $r['r2'];
        ?>
      </button>
      <br><br>
      <button class="btn btn-primary col-12" onclick="chequeaRespuesta('3', '<?php echo $r['numero']; ?>');">
        <?php echo $r['r3'];
        ?>
      </button>
      <br><br>
      <button class="btn btn-primary col-12" onclick="chequeaRespuesta('4', '<?php echo $r['numero']; ?>');">
        <?php echo $r['r4'];
        ?>
      </button>
      <br><br>
    </div>

  </div>

</div>
<div id="cargaRespuesta"></div>
<script>
function chequeaRespuesta(_respuesta, _numeroPregunta){
    $('#cargaRespuesta').load('chequeaRespuesta.php', 
    {
      respuesta: _respuesta,
      numeroPregunta: _numeroPregunta
    });


}
</script>
