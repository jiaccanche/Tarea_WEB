<?php

session_start();

if(isset($_SESSION['usuario'])){



  $info="";
  $mysqli = new mysqli('localhost', 'root', '','sistemaescolar');

  if(!$mysqli){
    $info = "<script>alert('No se pudo realizar la conección con la BD')</script>";
  }
  else{
    $sql = "select * from alumnos";
    $resultado = $mysqli->query($sql);

    if($resultado->num_rows > 0){



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
              <link rel="stylesheet" type="text/css" href="estilolistar.css" />
            <title></title>
          </head>
          <body class="text-center">
            <div id="usuario">Usuario: <?php echo $_SESSION['usuario'] ?></div>
            <div class="container">
              <h1>ESTUDIANTES</h1>
              <form class="" action="Consulta.php" method="post">

                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                        <th scope="col">MATRICULA</th>
                        <th scope = "col">NOMBRE</th>
                        <th scope = "col">SELECCIONAR</th>
                    </tr>
                  </thead>
                  <?php   while($aValues = $resultado->fetch_assoc()){ ?>
                  <tbody>
                    <tr>
                        <td class="table-primary"><?php echo $aValues['matricula']?></td>
                        <td class="table-success"><?php echo $aValues['nombre']." ".$aValues['apellidos']?></td>
                        <td class="table-danger"><input name="seleccion" type="radio" value=<?php echo $aValues['matricula']?> required></td>
                    </tr>
                  <?php }?>
                  </tbody>
                </table>
              </div>
              <div>
                <input type="submit" value="Actualizar">
                  </form>
              </div>
            </body>
          </html>
    <?php
    }else{
      $info = "<script>alert('No existe alumnos.')</script>";
    }
    $resultado->free();
    $mysqli->close();
  }

  echo $info;
}else {
    echo "<script>alert('No se ha iniciado sesión.')</script>";

}
 ?>
