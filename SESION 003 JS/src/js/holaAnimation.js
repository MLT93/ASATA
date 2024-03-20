const buttonAnimacion = document.getElementById("buttonAnimacion");
/* `buttonAnimacion.addEventListener("click", () => {});` */
// `buttonAnimation.onclick = function() {};` es lo mismo que utililzar `addEventListener()`
buttonAnimation.onclick = function () {
  setTimeout(() => animationH(), 0);
  setTimeout(() => animationO(), 1000);
  setTimeout(() => animationL(), 2000);
  setTimeout(() => animationA(), 3000);
  const animationH = () => {};
  const animateH = document.getElementById("animateH");
  animateH.style.left = "5%";
  let positionH = 1000;
  let clearIntervalID1 = setInterval(() => frameH(), 10);
  function frameH() {
    if (positionH < 30) {
      clearInterval(clearIntervalID1);
    } else {
      positionH--;
      animateH.style.top = `${positionH}px`;
      animateH.style.opacity = `1`;
    }
  }
  const animationO = () => {
    const animateO = document.getElementById("animateO");
    animateO.style.left = "10%";
    let positionO = 1000;
    let clearIntervalID2 = setInterval(() => frameO(), 10);
    function frameO() {
      if (positionO < 30) {
        clearInterval(clearIntervalID2);
      } else {
        positionO--;
        animateO.style.top = `${positionO}px`;
        animateO.style.opacity = `0.75`;
      }
    }
  };
  const animationL = () => {
    const animateL = document.getElementById("animateL");
    animateL.style.left = "15%";
    let positionL = 1000;
    let clearIntervalID3 = setInterval(() => frameL(), 10);
    function frameL() {
      if (positionL < 30) {
        clearInterval(clearIntervalID3);
      } else {
        positionL--;
        animateL.style.top = `${positionL}px`;
        animateL.style.opacity = `0.55`;
      }
    }
  };
  const animationA = () => {
    const animateA = document.getElementById("animateA");
    animateA.style.left = "20%";
    let positionA = 1000;
    let clearIntervalID4 = setInterval(() => frameA(), 10);
    function frameA() {
      if (positionA < 30) {
        clearInterval(clearIntervalID4);
      } else {
        positionA--;
        animateA.style.top = `${positionA}px`;
        animateA.style.opacity = `0.30`;
      }
    }
  };
};
