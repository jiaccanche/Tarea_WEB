<?php
session_start();

if(isset($_SESSION['usuario'])){


$matricula= $_POST['seleccion'];
$info="";
$mysqli = new mysqli('localhost', 'root', '','sistemaescolar');

if(!$mysqli){
  $info = "<script>alert('No se pudo realizar la conección con la BD.');</script>";
}
else{
  $sql ="select * from alumnos inner join boleta on alumnos.matricula = boleta.matricula_alumno
  inner join asignatura on boleta.clv_asignatura = asignatura.clave_asignatura where matricula=".$matricula;
  $resultado = $mysqli->query($sql);

  if($resultado->num_rows > 0){
    $aValues = $resultado->fetch_array();
  ?>

  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <link rel="stylesheet" type="text/css" href="estiloconsulta.css" />
      <title>Consulta</title>
    </head>
    <body >
      <div id=usuario>Usuario: <?php echo $_SESSION['usuario'] ?></div>
      <div class="container">
        <div class="col-md-6">
          <h2 class="text-center">Calificaciones</h2>
        </div>
        <div class="text-center" id=formulario>
          <form action="update.php" method="post" name="alta" id="alta" class="center-block">
            <p>Matricula<input type="text" name="matricula" value="<?php echo $aValues['matricula']?>" disabled></p>
            <p>Nombre <input type="text" name="nombre" value="<?php echo $aValues['nombre']?>" disabled></p>
            <p>Apellidos <input type="text" name="apellidos" value="<?php echo $aValues['apellidos']?>" disabled></p>
            <p>Asignatura <input type="text" name="asignatura" value= <?php echo $aValues['nombre_asignatura']?> disabled></p>
            <p>Calificación <input type="text" name="calificacion" value=<?php echo $aValues['calificacion']?> disabled></p>

            <a href="listar.php" class="btn btn-secondary">Regresar</a>
          </form>
        </div>

      </div>
    </body>
  </html>

  <?php
  }else{
    $info = "<script>alert('No existen datos con boleta.');</script>";
  }
  $resultado->free();
  $mysqli->close();
}

echo $info;

}else{

    echo "<script>alert('No ha iniciado sesión.');</script>";
}


 ?>
