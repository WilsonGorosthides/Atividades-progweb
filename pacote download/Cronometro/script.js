var milisegundos = 0;
var segundos = 0;
var minutos = 0;
var horas = 0;

var cronometro;

function updateVisualization() {

  var hora = document.getElementsByClassName('hora')[0];
  var minuto = document.getElementsByClassName('minuto')[0];
  var segundo = document.getElementsByClassName('segundo')[0];
  var milissegundo = document.getElementsByClassName('milissegundo')[0];

  if (milisegundos < 99) {
    milisegundos++;
    if (milisegundos < 10) {
      milisegundos = "0" + milisegundos
    }
    document.getElementById("milissegundo").innerHTML = milisegundos;
  }
  if (milisegundos == 99) {
    milisegundos = -1;
  }
  if (milisegundos == 0) {
    segundos++;
    if (segundos < 10) {
      segundos = "0" + segundos
    }
    document.getElementById("segundo").innerHTML = segundos;
  }
  if (segundos == 59) {
    segundos = -1;
  }
  if ((milisegundos == 0) && (segundos == 0)) {
    minutos++;
    if (minutos < 10) {
      minutos = "0" + minutos
    }
    document.getElementById("minuto").innerHTML = minutos;
  }
  if (minutos == 59) {
    minutos = -1;
  }
  if ((milisegundos == 0) && (segundos == 0) && (minutos == 0)) {
    horas++;
    if (horas < 10) {
      horas = "0" + horas
    }
    document.getElementById("hora").innerHTML = horas;
  }
}

function start() {
  cronometro = setInterval(updateVisualization, 10);

  document.getElementById("start").disabled = true;
  document.getElementById("pause").disabled = false;
  document.getElementById("restart").disabled = false;
}

function stop() {
  clearInterval(cronometro);

  document.getElementById("pause").disabled = true;
  document.getElementById("start").disabled = false;
}


function reiniciar() {
  clearInterval(cronometro);
  
  horas = 0;
  minutos = 0;
  segundos = 0;
  milisegundos = 0;

  document.getElementById("start").disabled = false;
  document.getElementById("pause").disabled = true;

  document.getElementById("hora").innerHTML = '00';
  document.getElementById("minuto").innerHTML = '00';
  document.getElementById("segundo").innerHTML = '00';
  document.getElementById("milissegundo").innerHTML = '000';
}