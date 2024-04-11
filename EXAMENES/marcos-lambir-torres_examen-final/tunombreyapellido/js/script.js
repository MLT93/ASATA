document.addEventListener("DOMContentLoaded", function () {
  // VARIABLES
  const user = document.getElementById("userID");
  const password = document.getElementById("passwordID");
  const buttonSubmit = document.getElementById("buttonSubmit");
  const divUser = document.getElementById("divUserID");
  const divPassword = document.getElementById("divPassID");
  const mySpan_HTML = document.createElement("span");

  // VALIDAR LOG IN
  buttonSubmit.onclick = function (e) {
    e.preventDefault();

    try {
      /* Validación Nombre */
      if (!user.value) {
        mySpan_HTML.classList.add("error");
        mySpan_HTML.textContent = `Introduce tu nombre de usuario`;
        divUser.appendChild(mySpan_HTML);
        throw { msg: "El nombre de usuario es obligatorio", element: user };
      }

      /* Validación de Password */
      if (
        !password.value ||
        password.value.match(
          /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}$/,
        ) ||
        Number(password.value) < 8
      ) {
        mySpan_HTML.classList.add("error");
        mySpan_HTML.textContent = `8 Chart, 1 Mayúscula, 1 Minúscula, 1 Símbolo`;
        divPassword.appendChild(mySpan_HTML);
        throw {
          msg: "La contraseña debe tener al menos 8 caracteres, 1 letra mayúscula, 1 letra minúscula y 1 símbolo",
          element: password,
        };
      }

      /* Restablezco valores */
      const formInputs = Array.from(document.querySelectorAll("input"));
      formInputs.forEach((e) => {
        e.style.borderColor = "";
        e.style.backgroundColor = "";
        e.style.color = "";
      });
      mySpan_HTML.textContent = ""

      /* Autenticación del usuario */
      if (password.value === "asdf#123%" && user.value === "asdf#123%") {
        alert("El usuario y contraseña son correctos");
        window.location.href = "pag02.html";
      }
    } catch (error) {
      console.error(error.msg);
      error.element.style.borderColor = "red";
      if (error.element.style.borderColor) {
        error.element.style.color = "white";
      }
      error.element.style.backgroundColor = "tomato";
      error.element.focus();
    }
  };
});
