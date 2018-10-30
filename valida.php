<?php

  $matricula = $_POST['usuario'];
  $password = $_POST['password'];
  $info="";
  $mysqli = new mysqli('localhost', 'root', '','sistemaescolar');

  if(!$mysqli){
    $info = "<script>alert('No se pudo realizar la conección con la BD.');</script>";
  }
  else{
    $sql = "select * from alumnos where (matricula=".$matricula.") AND (password=".$password.")";
    $resultado = $mysqli->query($sql);
    if($resultado->num_rows> 0){
      $aValues = $resultado->fetch_array();
      session_start();
      $_SESSION['usuario']=$aValues['nombre']." ".$aValues['apellidos'];

      $info = "<script>alert('Bienvenido".$_SESSION['usuario']." ');</script>";
      echo $info;
      header('Location: listar.php');

    }else{
      $info ="<script>alert('Es posible que la contraseña o el usuario no exista.');</script>";
    }
    $resultado->free();
    $mysqli->close();
  }

  echo $info;

 ?>
