<?php

  class alumno{
    private $matricula;
    private $nombre;
    private $apellido;

    function __construct($matricula, $nombre, $apellido)
    {
      $this->matricula = $matricula;
      $this->nombre= $nombre;
      $this->apellido = $apellido;

    }

    function getMatricula(){ return $this->matricula;}
    function getNombre(){ return $this->nombre;}
    function getApellido(){ return $this->apellido;}

    function setMatricula($matricula){$this->matricula=$matricula;}
    function setNombre($nombre){$this->nombre= $nombre;}
    function setApellido($apellido){$this->apellido = $apellido;}

      function imprimir(){
        return $this->getMatricula()." ".$this->getNombre()." ".$this->getApellido();
      }

      function _toString()
      {
        return "toString:".$this->getMatricula()." ".$this->getNombre()." ".$this->getApellido();
      }

  }
 ?>
