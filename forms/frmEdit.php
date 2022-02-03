<?php
require_once '../bd/bd.php';
require_once '../class/tasks.php';

$Obj_tasks = new Tasks();
$Res_task = $Obj_tasks->BuscarPorId($_GET['id']);

foreach ($Res_task as $Fila) {
  $DataTask = $Fila;
}


?>

<form action="#" name="frmEditTask" id="frmTask" method="post">

  <div class="form-group flex">
    <p>Editar <?= $DataTask['TypeTask']; ?> </p><i data-feather="calendar"></i>
  </div>
  <div class="form-group">
    <input type="text" name="title" id="title" required="" oninvalid="setCustomValidity(' ')" value="<?= $DataTask['Title']; ?>">
    <label for="title">Titulo </label>
    <div id="txtCount">60 </div>
  </div>
  <div class="form-group">
    <span class="btn btn-1">
      <input type="checkbox" name="typeTask" id="chkSwitch" value="E">
      <label for="chkSwitch"> </label>
    </span>
  </div>
  <div class="calendar"><span>Fecha</span>
    <input type="text" name="date" value="<?= $DataTask['DateTask']; ?>">
    <label class="icon"><i data-feather="calendar"></i></label>
    <div id="calendarContainer"></div>
  </div>
  <div class="form-group flex ">
    <span>Color</span>
    <ul class="flex">
      <li>
        <input type="radio" name="rdbColor" value="red" <?php if ($DataTask['Color'] == 'red') {echo "checked";}; ?>>
        <span class="color" id="red">
          <i data-feather="check-circle"></i>
          <span class="border"></span>
        </span>
      </li>
      <li>
        <input type="radio" name="rdbColor" value="orange" <?php if ($DataTask['Color'] == 'orange') {echo "checked";}; ?>>
        <span class="color" id="orange">
          <i data-feather="check-circle"></i>
          <span class="border"></span>
        </span>
      </li>
      <li>
        <input type="radio" name="rdbColor" value="yellow" <?php if ($DataTask['Color'] == 'yellow') {echo "checked";}; ?>>
        <span class="color" id="yellow">
          <i data-feather="check-circle"></i>
          <span class="border"></span>
        </span>
      </li>
      <li>
        <input type="radio" name="rdbColor" value="green" <?php if ($DataTask['Color'] == 'green') {echo "checked";}; ?>>
        <span class="color" id="green">
          <i data-feather="check-circle"></i>
          <span class="border"></span>
        </span>
      </li>
      <li>
        <input type="radio" name="rdbColor" value="blue" <?php if ($DataTask['Color'] == 'blue') {echo "checked";}; ?>>
        <span class="color" id="blue">
          <i data-feather="check-circle"></i>
          <span class="border"></span>
        </span>
      </li>
      <li>
        <input type="radio" name="rdbColor" value="purple" <?php if ($DataTask['Color'] == 'purple') {echo "checked";}; ?>>
        <span class="color" id="purple">
          <i data-feather="check-circle"></i>
          <span class="border"></span>
        </span>
      </li>
    </ul>
  </div>
  <div class="form-group "><span>Hora</span>
    <div class="flex">
      <div>
        <select name="hour">
          <option value="01" <?php if ($DataTask['Hour'] == '01') {echo "Selected";}; ?>>01 </option>
          <option value="02" <?php if ($DataTask['Hour'] == '02') {echo "Selected";}; ?>>02 </option>
          <option value="03" <?php if ($DataTask['Hour'] == '03') {echo "Selected";}; ?>>03 </option>
          <option value="04" <?php if ($DataTask['Hour'] == '04') {echo "Selected";}; ?>>04 </option>
          <option value="05" <?php if ($DataTask['Hour'] == '05') {echo "Selected";}; ?>>05 </option>
          <option value="06" <?php if ($DataTask['Hour'] == '06') {echo "Selected";}; ?>>06 </option>
          <option value="07" <?php if ($DataTask['Hour'] == '07') {echo "Selected";}; ?>>07 </option>
          <option value="08" <?php if ($DataTask['Hour'] == '08') {echo "Selected";}; ?>>08 </option>
          <option value="09" <?php if ($DataTask['Hour'] == '09') {echo "Selected";}; ?>>09 </option>
          <option value="10" <?php if ($DataTask['Hour'] == '10') {echo "Selected";}; ?>>10 </option>
          <option value="11" <?php if ($DataTask['Hour'] == '11') {echo "Selected";}; ?>>11 </option>
          <option value="12" <?php if ($DataTask['Hour'] == '12') {echo "Selected";}; ?>>12 </option>
        </select>
      </div>
      <div>
        <select name="minutes">
          <option value="00" <?php if ($DataTask['Minutes'] == '00') {echo "Selected";}; ?>>00 </option>
          <option value="15" <?php if ($DataTask['Minutes'] == '15') {echo "Selected";}; ?>>15 </option>
          <option value="30" <?php if ($DataTask['Minutes'] == '30') {echo "Selected";}; ?>>30 </option>
          <option value="45" <?php if ($DataTask['Minutes'] == '45') {echo "Selected";}; ?>>45 </option>
        </select>
      </div>
      <div>
        <select class="time" name="time">
          <option value="AM" <?php if ($DataTask['Time'] == 'AM') {echo "Selected";}; ?>>AM </option>
          <option value="PM" <?php if ($DataTask['Time'] == 'PM') {echo "Selected";}; ?>>PM </option>
        </select>
      </div>
    </div>
  </div>
  <div class="form-group flex submit">
    <div class="flex">
      <span class="advanced">Avanzado</span>
      <i class="advanced" data-feather="chevron-down"> </i>
    </div>
    <input type="hidden" name="IdTask" value="<?= $DataTask['IdTask']; ?>">
    <button class="button btn-secondary" onclick="javascript:MostrarFormNuevo();">Cancelar</button>
    <button class="button btn-primary" onclick="javascript:Update();">Guardar</button>
  </div>
</form>

<script type="text/javascript">
  IsCheck();

  function Update() {
    let fd = new FormData(document.forms['frmEditTask']);
    xhr = new XMLHttpRequest();
    xhr.open("POST", "forms/update.php", false);
    xhr.send(fd);
    con = document.getElementById('TaskList');
    res = xhr.responseText;
    con.innerHTML = res.ConvertirResponseText();
    ListarTodo();
    MostrarFormNuevo();
  }

  function IsCheck() {
    if ('<?= $DataTask['TypeTask']; ?>' != 'Alarma') {
      setTimeout(() => {
        document.getElementById('chkSwitch').checked = true;
      }, 100);
    }
  }
</script>