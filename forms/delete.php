<?php
  require_once '../bd/bd.php';
  require_once '../class/tasks.php';

  $Obj_tasks = New Tasks();

  $Obj_tasks->Eliminar($_GET['id']);