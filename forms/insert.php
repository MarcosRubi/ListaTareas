<?php
require_once '../bd/bd.php';
require_once '../class/tasks.php';

$Obj_tasks = new Tasks();

if (isset($_POST['typeTask']) && $_POST['typeTask'] == 'A') {
  $Obj_tasks->TypeTask = "Evento";
} else {
  $Obj_tasks->TypeTask = "Alarma";
};

if (empty(trim($_POST['title'])) || strlen($_POST['title']) > 60) {
  echo "<script>
          alert('Por favor asignar el titulo a la tarea y que no sea mayor a 60 caracteres!');
        </script>";
} else {
  $Obj_tasks->Title = $_POST['title'];
  $Obj_tasks->DateTask = $_POST['date'];
  $Obj_tasks->Color = $_POST['rdbColor'];
  $Obj_tasks->Hour = $_POST['hour'];
  $Obj_tasks->Minutes = $_POST['minutes'];
  $Obj_tasks->Time = $_POST['time'];

  $Obj_tasks->Insertar();
}
