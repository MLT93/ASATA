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
 * 
 * ?: Si el valor de 360º son 2Pi, entonces => 180º = 1Pi
 * ?: El valor en radianes será una regla de tres => [radianes = (grados * Pi) / 180]
 * ?: [const ang30Radi = (30 * Math.PI) / 180]
 * 
 * ?: Después necesitaremos sus razones trigonométricas (seno y coseno):
 * ?: [const sen30 = Math.sin(ang30Radi)] // El seno es el cateto opuesto al ángulo
 * ?: [const cos30 = Math.cos(ang30Radi)] // El coseno es el cateto contiguo al ángulo
 * 
 * ?: También se puede considerar el extremo de la dcha del eje X como punto 0.0 y, en sentido horario, el punto irá sumando su valor hasta llegar al mismo punto habiendo dado la vuelta, con un valor de 2.0, equivalente a 360º o 2Pi.
 *
 * ?: El inicio siempre será el extremo dcha en el eje X en su parte positiva (Math.PI * 0)
 * ?: El extremo inferior del eje Y en su parte negativa (en sentido horario) equivaldrá a (Math.PI * 0.5)
 * ?: El extremo izq. del eje X en su parte negativa valdrá (Math.PI * 1)
 * ?: El extremo superior del eje Y en su parte positiva será (Math.PI * 1.5)
 * ?: El punto final valdrá  (Math.PI * 2)
 *
 * *: const functionCalcularRadianes = (grados) => {
 * *:   var radianes = (grados * Math.PI) / 180;
 * *:   return Math.PI * radianes;
 * *: };
 * 
 */
const calcularRadianes = (grados) => (grados * Math.PI) / 180;

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
ctx.arc(200, 100, 50, 0, 2 * Math.PI, true); // coordenadaX, coordenadaY, radio, startAngle, endAngle, antihorario
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
ctx.roundRect(170, 7, 150, 100, [10, 20, 0, 50]); // coordenadaX, coordenadaY, width, height, radio
ctx.stroke();

/**
 * ToDo: Ejercicio para casa
 */

// LIENZO & CONTEXTO
const lienzo2 = document.getElementById("lienzo-2");
const ctx2 = lienzo2.getContext("2d");
// CÍRCULO ENTERO DE REFERENCIA
ctx2.beginPath();
ctx2.fillStyle = "rgba(130, 130, 130, 0.75)";
ctx2.arc(250, 250, 100, 0, Math.PI * 2, false);
ctx2.fill();
// CÍRCULOS DEL EJERCICIO
/* Primer círculo para los extremos superiores y segundo para el punto inferior */
ctx2.beginPath();
ctx2.fillStyle = "rgb(250, 220, 70)";
let coordinateX = 250;
let coordinateY = 250;
let radius = 100;
let startAngleArc = Math.PI * 1.062;
let endAngleArc = Math.PI * 1.825;
let centerRadiusPoint = 0;
let startAndEndAngleToInsertNewDrawPoint = Math.PI * 0.5;
ctx2.arc(coordinateX, coordinateY, radius, startAngleArc, endAngleArc, false);
ctx2.arc(
  coordinateX,
  coordinateY,
  centerRadiusPoint,
  startAndEndAngleToInsertNewDrawPoint,
  startAndEndAngleToInsertNewDrawPoint,
  false
);
ctx2.fill();
/* Segundo círculo independiente */
ctx2.beginPath();
ctx2.fillStyle = "rgb(190, 0, 0)";
let coordX = 350;
let coordY = 300;
let radi = 30;
let startAngArc = 0;
let endAngArc = Math.PI * 2;
ctx2.arc(coordX, coordY, radi, startAngArc, endAngArc, false);
ctx2.fill();
