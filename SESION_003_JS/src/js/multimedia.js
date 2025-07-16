const buttonFade = document.getElementById('buttonFade');
buttonFade.onclick = function () {
  const element = document.getElementById('fade');

  /* `classList` manipula las clases que posea el elemento HTML */
  /* `add()` es un método de la función que manipula las clases */
  /* Posee más métodos, como `remove()`, `toggle()` y más */
  element.classList.add('fade-out');
};

const buttonZoom = document.getElementById('buttonZoom');
buttonZoom.onclick = function () {
  const element = document.getElementById('zoom');
  element.classList.add('zoom');
};

const buttonOscilar = document.getElementById('buttonOscilar');
buttonOscilar.onclick = function () {
  const element = document.getElementById('oscilar');
  element.classList.add('oscilar');
};

const buttonBigRotate = document.getElementById('buttonBigRotate');
buttonBigRotate.onclick = function () {
  const element = document.getElementById('agrandarYRotar');
  element.classList.add('big-rotate');
};

const buttonReset = document.getElementById('buttonReset');
buttonReset.onclick = function () {
  /* Tomo todos los elementos con clase `.box` */
  /* Itero el array que devuelve `querySelectorAll()` */
  /* Por cada elemento del array restablezco sus clases precedentes asignándole una única clase `box` */
  /* Esto permite restablecer todos los elementos HTML */
  const boxes = document.querySelectorAll('.box');
  boxes.forEach((e) => (e.className = 'box'));
};
