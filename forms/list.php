<?php
require_once '../bd/bd.php';
require_once '../class/paginador.php';

$Obj_Paginador = new Paginador();
$Obj_Paginador->Cadena = "SELECT * FROM tbl_tasks WHERE StatusTask='Created'";
$Obj_Paginador->CadenaCount = "SELECT COUNT(IdTask) FROM tbl_tasks WHERE StatusTask='Created'";
$Obj_Paginador->FilasPorPagina = 5;
$Obj_Paginador->NumPagina = @$_GET['np'];
$Obj_Paginador->EnlaceListar = "forms/list.php";

$Obj_Paginador->ConfPaginador();
$Obj_Paginador->MostrarControles();
?>

<table class="taskList">
  <thead>
    <tr>
      <th width="50%" align="start">Titulo</th>
      <th width="8%" align="start">Tipo</th>
      <th width="22%" align="start">Fecha</th>
      <th width="10%" align="start">Hora</th>
      <th colspan="3" align="start">&nbsp;</th>
    </tr>
  </thead>
  <tbody class="tbody">
    <?php
    foreach ($Obj_Paginador->ResultadoLimit as $Fila) {
    ?>
      <tr>
        <td style="border-bottom: 2px solid <?= $Fila['Color'] ?>"><?= $Fila['Title'] ?></td>
        <td><?= $Fila['TypeTask'] ?></td>
        <td><?= $Fila['DateTask'] ?></td>
        <td><?php echo $Fila['Hour'] .":". $Fila['Minutes'] . " " . $Fila['Time']  ?></td>
        <td width="5%"><a href="#" onclick="javascript:Success(<?= $Fila['IdTask'] ?>);"><img src="img/check.png" title="Completado"></a></td>
        <td width="5%"><a href="#" onclick="javascript:ShowFormEdit(<?= $Fila['IdTask']; ?>);"><img src="img/edit.png" title="Editar"></a></td>
        <td width="5%"><a href="#" onclick="javascript:Delete(<?= $Fila['IdTask'] ?>);"><img src="img/delete.png" title="Eliminar"></a></td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>
