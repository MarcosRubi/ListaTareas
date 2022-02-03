<form action="#" name="frmNewTask" id="frmTask" method="post">
  <div class="form-group flex">
    <p>Crear un evento </p><i data-feather="calendar"></i>
  </div>
  <div class="form-group">
    <input type="text" name="title" id="title" required="" oninvalid="setCustomValidity(' ')">
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
    <input type="text" name="date">
    <label class="icon"><i data-feather="calendar"></i></label>
    <div id="calendarContainer"></div>
  </div>
  <div class="form-group flex ">
    <span>Color</span>
    <ul class="flex">
      <li>
        <input type="radio" name="rdbColor" value="red" checked>
        <span class="color" id="red">
          <i data-feather="check-circle"></i>
          <span class="border"></span>
        </span>
      </li>
      <li>
        <input type="radio" name="rdbColor" value="orange">
        <span class="color" id="orange">
          <i data-feather="check-circle"></i>
          <span class="border"></span>
        </span>
      </li>
      <li>
        <input type="radio" name="rdbColor" value="yellow">
        <span class="color" id="yellow">
          <i data-feather="check-circle"></i>
          <span class="border"></span>
        </span>
      </li>
      <li>
        <input type="radio" name="rdbColor" value="green">
        <span class="color" id="green">
          <i data-feather="check-circle"></i>
          <span class="border"></span>
        </span>
      </li>
      <li>
        <input type="radio" name="rdbColor" value="blue">
        <span class="color" id="blue">
          <i data-feather="check-circle"></i>
          <span class="border"></span>
        </span>
      </li>
      <li>
        <input type="radio" name="rdbColor" value="purple">
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
          <option value="01">01 </option>
          <option value="02">02 </option>
          <option value="03">03 </option>
          <option value="04">04 </option>
          <option value="05">05 </option>
          <option value="06">06 </option>
          <option value="07">07 </option>
          <option value="08">08 </option>
          <option value="09">09 </option>
          <option value="10">10 </option>
          <option value="11">11 </option>
          <option value="12">12 </option>
        </select>
      </div>
      <div>
        <select name="minutes">
          <option value="00">00 </option>
          <option value="15">15 </option>
          <option value="30">30 </option>
          <option value="45">45 </option>
        </select>
      </div>
      <div>
        <select class="time" name="time">
          <option value="AM">AM </option>
          <option value="PM">PM </option>
        </select>
      </div>
    </div>
  </div>
  <div class="form-group flex submit">
    <div class="flex">
      <span class="advanced">Avanzado</span>
      <i class="advanced" data-feather="chevron-down"> </i>
    </div>
    <button class="button btn-secondary" onclick="javascript:MostrarFormNuevo();">Cancelar</button>
    <button class="button btn-primary" onclick="javascript:Insert();">Crear</button>
  </div>
</form>

<script type="text/javascript">
  function Insert() {
    let fd = new FormData(document.forms['frmNewTask']);
    xhr = new XMLHttpRequest();
    xhr.open("POST", "forms/insert.php", false);
    xhr.send(fd);
    con = document.getElementById('TaskList');
    res = xhr.responseText;
    con.innerHTML = res.ConvertirResponseText();
    ListarTodo();
    resetForm();
  }
</script>