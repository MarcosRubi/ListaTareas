function countText(contador, titulo) {
  const maxText = 60;

  titulo.addEventListener("keydown", () => {
    txtTitulo = titulo.value;
    contador.innerHTML = maxText - txtTitulo.length;
    txtTitulo.length > 49
      ? (contador.style = "color:#f44336")
      : (contador.style = "color:#fff");
  });
}
function calendar() {
  var calendar = new Calendar(
    "calendarContainer",
    "small",
    ["Lunes", 3],
    ["#424242", "#424242", "#ffffff", "#eeeeee"],
    {
      days: [
        "Domingo",
        "Lunes",
        "Martes",
        "Miércoles",
        "Jueves",
        "Viernes",
        "Sábado",
      ],
      months: [
        "Enero",
        "Febrero",
        "Marzo",
        "Abril",
        "Mayo",
        "Junio",
        "Julio",
        "Agosto",
        "Septiembre",
        "Octubre",
        "Noviembre",
        "Diciembre",
      ],
      indicator_pos: "bottom",
    }
  );
}
function showCalendar() {
  let divCalendar = document.getElementById("calendarContainer");
  divCalendar.classList.toggle("show");
  divCalendar.addEventListener("click", () => {
    getDateForm();
  });

  let day = document.querySelector(
    'input[name="calendarContainer-day-radios"]:checked'
  ).parentElement.parentElement;

  day.addEventListener("click", () => {
    divCalendar.classList.remove("show");
  });
}
function getDateForm() {
  let input = document.querySelector('input[name="date"]');
  let day = document
    .querySelector('input[name="calendarContainer-day-radios"]:checked')
    .nextSibling.querySelector(".cjslib-day-num").textContent;
  let month = document.getElementById("calendarContainer-month").textContent;
  let year = document.getElementById("calendarContainer-year").textContent;

  input.value = `${day} de ${month} del ${year}`;
  return `${day} de ${month} del ${year}`;
}
function resetDate(dateNow) {
  document.querySelector('input[name="date"]').value = dateNow;
}
function statusColor() {
  let color = document.querySelector('input[name="rdbColor"]:checked').value;

  tags = document.querySelectorAll("li span.color");

  tags.forEach((tag) => {
    if (tag.id === color) {
      tag.querySelector(`span#${color} > * `).style = "opacity: 1";
      tag.querySelector(".border").style =
        "opacity:1; border:2px solid " + color + ";";
    } else {
      item = document.querySelector(`span#${tag.id} > *`);
      item.style = "opacity: 0";
      tag.querySelector(".border").style = "opacity:0";
    }
  });
  return color;
}
function time(reset = false) {
  let hour = document.querySelector('select[name="hour"]');
  let minutes = document.querySelector('select[name="minutes"]');
  let time = document.querySelector('select[name="time"]');

  if (reset) {
    hour.value = "01";
    minutes.value = "00";
    time.value = "AM";
  } else {
    return `${hour.value}:${minutes.value} ${time.value}`;
  }
}
function resetForm() {
  let dateNow = document.querySelector('input[name="date"]').value;
  document.getElementById("title").value = "";
  document.getElementById("txtCount").innerHTML = 60;
  time(true);

  resetDate(dateNow);
}

function Init(edit = false) {
    let contador = document.getElementById("txtCount");
    let titulo = document.getElementById("title");

    feather.replace();
    calendar();
    edit ? '' : getDateForm() ;
    statusColor();
    countText(contador, titulo);

    document.querySelector("ul").addEventListener("click", () => {
      statusColor();
    });

    document
      .querySelector('input[name="date"]')
      .addEventListener("click", () => {
        showCalendar();
      });
}
Init();