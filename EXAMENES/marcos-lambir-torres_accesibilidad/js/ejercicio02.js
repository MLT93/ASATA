// Ajuste del tamaño del texto y el modo de alto contraste
document.addEventListener("DOMContentLoaded", function () {
  const body = document.body;
  const increaseTextBtn = document.getElementById("increaseText");
  const decreaseTextBtn = document.getElementById("decreaseText");
  const highContrastBtn = document.getElementById("highContrast");
  const resetBtn = document.getElementById("reset");
  const buttonSubmit = document.getElementById("buttonSubmit");

  // Función para cambiar el tamaño del texto
  let counter = 16;
  function changeFontSize() {
    increaseTextBtn.onclick = function () {
      body.style.fontSize = `${counter++}px`;
    };
    decreaseTextBtn.onclick = function () {
      body.style.fontSize = `${counter--}px`;
    };
  }
  changeFontSize();

  // Función para alternar el modo de alto contraste
  isHighLightContrast = false;
  function toggleHighContrast() {
    highContrastBtn.onclick = function () {
      if (isHighLightContrast) {
        body.style.background = "var(--color-contrast-4)";
        body.style.color = "white";
        body.style.letterSpacing = "0.1rem";

        buttonSubmit.style.background = "var(--color-contrast-5)";
        buttonSubmit.style.border = "3px solid white";

        increaseTextBtn.style.background = "var(--color-contrast-5)";
        increaseTextBtn.style.border = "3px solid white";

        decreaseTextBtn.style.background = "var(--color-contrast-5)";
        decreaseTextBtn.style.border = "3px solid white";

        highContrastBtn.style.background = "var(--color-contrast-5)";
        highContrastBtn.style.border = "3px solid white";

        resetBtn.style.background = "var(--color-contrast-5)";
        resetBtn.style.border = "3px solid white";
      } else {
        isHighLightContrast = !isHighLightContrast;
        resetAccessibilitySettings();
      }
    };
  }
  toggleHighContrast();

  // Función para restablecer los ajustes de accesibilidad a los valores predeterminados
  function resetAccessibilitySettings() {
    resetBtn.onclick = function () {
      body.style.background = "";
      body.style.color = "";
      body.style.fontSize = "";
      body.style.letterSpacing = "";

      buttonSubmit.style.background = "";
      buttonSubmit.style.border = " ";
      buttonSubmit.style.fontSize = "";

      increaseTextBtn.style.background = "";
      increaseTextBtn.style.border = " ";
      increaseTextBtn.style.fontSize = "";

      decreaseTextBtn.style.background = "";
      decreaseTextBtn.style.border = " ";
      decreaseTextBtn.style.fontSize = "";

      highContrastBtn.style.background = "";
      highContrastBtn.style.border = " ";
      highContrastBtn.style.fontSize = "";

      resetBtn.style.background = "";
      resetBtn.style.border = " ";
      resetBtn.style.fontSize = "";
    };
  }

  // Event listeners para los botones de control
  increaseTextBtn.addEventListener("click", function () {});

  decreaseTextBtn.addEventListener("click", function () {});

  highContrastBtn.addEventListener("click", toggleHighContrast);
});
