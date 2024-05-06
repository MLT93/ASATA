const buttonAnimacion = document.getElementById("buttonAnimacion");

/* `buttonAnimacion.addEventListener("click", () => {});` */
// `buttonAnimation.onclick = function() {};` es lo mismo que utililzar `addEventListener()`
buttonAnimacion.onclick = function () {
  let animar = document.getElementById("animar");

  let position = 0;

  let clearIntervalID = setInterval(() => frame(), 10);

  function frame() {
    if (position >= 330) {
      clearInterval(clearIntervalID); // Detener el intervalo
    } else {
      position++;
      animar.style.top = `${position}px`;
      animar.style.left = `${position}px`;
    }
  }
};
