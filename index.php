<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Tareas</title>
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <script src="https://unpkg.com/feather-icons"> </script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Khula:wght@300&amp;family=Viga&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.rawgit.com/nizarmah/calendar-javascript-lib/master/calendarorganizer.min.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/paginadores.css">
  <script type="text/javascript" src="js/generico.js"></script>
</head>

<body>
  <section class="flex p-30">
    <div id="DivForm"></div>
    <div id="TaskList"></div>
  </section>
</body>
<script src="js/script.js"> </script>
<script src="https://cdn.rawgit.com/nizarmah/calendar-javascript-lib/master/calendarorganizer.min.js"> </script>

</html>
<script type="text/javascript">
  MostrarFormNuevo();
  ListarTodo();

  // Función para llamar al form de agregar
  function MostrarFormNuevo() {
    xhr = new XMLHttpRequest();
    xhr.open("GET", "forms/frmNew.php", false);
    xhr.send();
    con = document.getElementById("DivForm");
    res = xhr.responseText;
    con.innerHTML = res.ConvertirResponseText();
    Init();
  }

  // Tabla que lista las tareas
  function ListarTodo() {
    xhr = new XMLHttpRequest();
    xhr.open("GET", "forms/list.php", false);
    xhr.send();
    con = document.getElementById("TaskList");
    res = xhr.responseText;
    con.innerHTML = res.ConvertirResponseText();
  }


  function ShowFormEdit(paId) {
    xhr = new XMLHttpRequest();
    xhr.open("GET", "forms/frmEdit.php?id=" + paId, false);
    xhr.send();
    con = document.getElementById('DivForm');
    res = xhr.responseText;
    con.innerHTML = res.ConvertirResponseText();
    Init(true);
  }

  function Delete(paId) {
    if (confirm("Seguro que quiere eliminar la tarea?")) {
      xhr = new XMLHttpRequest();
      xhr.open("GET", "forms/delete.php?id=" + paId, false);
      xhr.send();
      con = document.getElementById('TaskList');
      res = xhr.responseText;
      con.innerHTML = res.ConvertirResponseText();
      ListarTodo();
    }
  }

  function Success(paId) {
    xhr = new XMLHttpRequest();
    xhr.open("GET", "forms/success.php?id=" + paId, false);
    xhr.send();
    con = document.getElementById('TaskList');
    res = xhr.responseText;
    con.innerHTML = res.ConvertirResponseText();
    ListarTodo();
  }
</script>