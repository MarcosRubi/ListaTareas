<?php
  class Tasks extends BD{
    public $Title;
    public $TypeTask;
    public $DateTask;
    public $Color;
    public $Hour;
    public $Minutes;
    public $Time;
    public $Status;

    public function Insertar(){
      $cadena = "INSERT INTO tbl_tasks( 
        Title,
        TypeTask,
        DateTask,
        Color,
        Hour,
        Minutes,
        Time )
        VALUES (
        '".$this->Title."',
        '".$this->TypeTask."',
        '".$this->DateTask."',
        '".$this->Color."',
        '".$this->Hour."',
        '".$this->Minutes."',
        '".$this->Time."'
        )";
        return $this->EjecutarQuery($cadena);
    }

    public function Eliminar($id){
      $cadena = "UPDATE tbl_tasks SET StatusTask='Delete' WHERE IdTask='". $id . "'";
      return $this->EjecutarQuery($cadena);
    }

    public function TareaCompletada($id){
      $cadena = "UPDATE tbl_tasks SET StatusTask='Success' WHERE IdTask='".$id."'";
      return $this->EjecutarQuery($cadena);
    }

    public function BuscarPorId($id){
      $cadena = "SELECT * FROM tbl_tasks WHERE IdTask='".$id. "'";
      return $this->EjecutarQuery($cadena);
    }

    public function Actualizar($id){
      $cadena = "UPDATE tbl_tasks SET 
      Title= '".$this->Title."',
      TypeTask= '".$this->TypeTask."',
      DateTask= '".$this->DateTask."',
      Color= '".$this->Color."',
      Hour= '".$this->Hour."',
      Minutes= '".$this->Minutes."',
      Time= '".$this->Time."'
      WHERE IdTask='".$id."'
      ";
      return $this->EjecutarQuery($cadena);
    }
  }
