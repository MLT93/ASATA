document.addEventListener("DOMContentLoaded", function () {
  // VARIABLES
  const formulario = document.getElementById("formulario");
  const comments = document.getElementById("comments");
  const buttonShow = document.getElementById("buttonShow");
  const textarea = document.getElementById("textAreaID");

  // VALIDAR TEXTAREA
  function validation() {
    try {
      /* Validación TextArea */
      if (!textarea.value) {
        throw { msg: "Este campo no puede estar vacío", element: textarea };
      }

      /* Mostrar documento escrito */
      const myP_HTML = document.createElement("p");
      myP_HTML.textContent = `" ${textarea.value} "`;
      comments.appendChild(myP_HTML);
    } catch (error) {
      console.error(error.msg);
      error.element.style.borderColor = "red";

      if (error.element.style.borderColor) {
        error.element.style.color = "white";
        error.element.innerHTML = `Esta área de texto debe tener caracteres.`;
      }

      error.element.style.backgroundColor = "tomato";
      error.element.focus();
    }
  }

  /* Restablecer valores iniciales de los inputs */
  function resetTextArea() {
    textarea.onclick = function () {
      textarea.innerHTML = "";
      textarea.style.color = "";
      textarea.style.borderColor = "";
      textarea.style.backgroundColor = "";
    };
    textarea.addEventListener("keypress", () => {
      textarea.innerHTML = "";
      textarea.style.color = "";
      textarea.style.borderColor = "";
      textarea.style.backgroundColor = "";
    });
  }

  if (formulario) {
    buttonShow.onclick = function (e) {
      e.preventDefault();
      validation();
      resetTextArea();
    };
  }
});
