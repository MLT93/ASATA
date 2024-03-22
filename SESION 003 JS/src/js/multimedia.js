const buttonFade = document.getElementById("buttonFade");
buttonFade.onclick = function () {
  const element = document.getElementById("fade");

  /* `classList` manipula las clases que posea el elemento HTML */
  /* `add()` es un método de la función que manipula las clases */
  /* Posee más métodos, como `remove()`, `toggle()` y más */
  element.classList.add("fade-out");
};

const buttonZoom = document.getElementById("buttonZoom");
buttonZoom.onclick = function () {
  const element = document.getElementById("zoom");
  element.classList.add("zoom");
};

const buttonOscilar = document.getElementById("buttonOscilar");
buttonOscilar.onclick = function () {
  const element = document.getElementById("oscilar");
  element.classList.add("oscilar");
};

const buttonBigRotate = document.getElementById("buttonBigRotate");
buttonBigRotate.onclick = function () {
  const element = document.getElementById("agrandarYRotar");
  element.classList.add("big-rotate");
};

const buttonReset = document.getElementById("buttonReset");
buttonReset.onclick = function () {
  /* Tomo todos los elementos con clase `.box` */
  /* Itero el array que devuelve `querySelectorAll()` */
  /* Por cada elemento del array restablezco sus clases precedentes asignándole una única clase `box` */
  /* Esto permite restablecer todos los elementos HTML */
  const boxes = document.querySelectorAll(".box");
  boxes.forEach((e) => (e.className = "box"));
};

// CANVAS
/**
 * !: ANTES DE DIBUJAR:
 * !: para calcular los RADIANES, debemos hacer una regla de 3
 * ?: Si el valor de los grados es => 360º --> 2Pi
 * ?: El valor en radianes será    =>   0º --> XRad
 *                                 => 360 -> (2*Math.PI)
 *                                 =>  30 -> x
 *                               * => xRad = ((2*Math.PI) * 30) / 360
 */

/* Obtener el elemento donde voy a dibujar cualquier cosa */
const lienzo = document.getElementById("lienzo");
/* Tenemos que darle contexto al lienzo para que pueda pintar cosas */
const ctx = lienzo.getContext("2d");

/* Dibujar la estructura del CÍRCULO en el contexto del lienzo */
// 1º
/* Esto crea el/los `path` del trazado de un dibujo */
/* Si hay más dibujos en debajo de un mismo `beginPath()`, todos los elementos formarán parte de un mismo path. Es siempre mejor utilizar uno para cada elemento dibujado */
ctx.beginPath();
// 2º
ctx.fillStyle = "rgb(70, 30, 23)";
// 3º
ctx.arc(200, 100, 50, 0, 2 * Math.PI, true); //
// 4º
ctx.fill();

/* Dibujar la estructura del RECTÁNGULO en el contexto del lienzo */
// 1º
ctx.beginPath();
// 2º
ctx.fillStyle = "rgba(0, 255, 0, 0.5)";
// 3º
ctx.rect(200, 70, 300, 150); // coordenadaX, coordenadaY, width, height
// 4º
ctx.fill();

/* Dibujar la estructura del ELIPSE en el contexto del lienzo */
// 1º
ctx.beginPath();
// 2º
ctx.fillStyle = "rgba(230, 21, 21, 0.5)";
// 3º
ctx.ellipse(130, 100, 120, 50, 0, Math.PI / 2, (3 * Math.PI) / 2); // coordenadaX, coordenadaY, radioX, radioY, rotaciónEnRadianes, startAngle, endAngle
// 4º
ctx.fill();

/* Dibujar la estructura del RECTÁNGULO REDONDEADO en el contexto del lienzo */
ctx.beginPath();
ctx.strokeStyle = "red";
ctx.roundRect(10, 20, 150, 100, [10, 20, 0, 50]); // coordenadaX, coordenadaY, width, height, radii
ctx.strokeStyle();

/**
 * ToDo: Ejercicio pa casa
 */
const lienzo2 = document.getElementById("lienzo2");
const ctx2 = lienzo.getContext("2d");
ctx2.beginPath();
ctx2.fillStyle = "rgb(20, 10, 150)";
