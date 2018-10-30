<?php

  class Asignatura
  {
      private $clave;
      private $nombre;

      function __construct($clv, $nombre){

        $this->$clave = $clv;
        $this->$nombre = $nombre;

      }

      function getNombre(){
        return $this->$nombre;
      }

      function getClave(){
        return $this->clave;
      }

      function setNombre($nombre){
          $this->$nombre = $nombre;
      }

      function setClave($clv){
        $this->$clave = $clv;
      }

      function _toString(){
        return $this->getClave()." ".$this->getNombre();
      }

  }

 ?>
