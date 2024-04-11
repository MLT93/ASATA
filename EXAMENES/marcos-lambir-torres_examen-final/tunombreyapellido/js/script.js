document.addEventListener("DOMContentLoaded", function (e) {
  e.preventDefault();

  // VARIABLES
  const buttonSubmit = document.getElementById("buttonSubmit");
  const buttonShow = document.getElementById("buttonShow");
  const comments = document.getElementById("comments");

  // LOG IN
  buttonSubmit.onclick = function (e) {
    e.preventDefault();

    try {
      /* Validación Nombre */
      const user = document.getElementById("userID");
      if (!user.value) {
        throw { msg: "El nombre de usuario es obligatorio", element: user };
      }
      /* Validación de Password */
      const password = document.getElementById("passwordID");
      if (
        !password.value ||
        password.value.match(
          /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}$/,
        ) ||
        Number(password.value) < 8
      ) {
        throw {
          msg: "La contraseña debe tener minimo 8 caracteres",
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

      /* Si el usuario es correcto, carga la otra página */
      if (password.value === "asdf123#Z" && user.value === "asdf123#Z") {
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

  // TEXTAREA
  buttonShow.onclick = function (event) {
    event.preventDefault();

    try {
      /* Validación TextArea */
      const textarea = document.getElementById("textAreaID");
      if (!textarea.value) {
        throw { msg: "Este campo no puede estar vacío", element: textarea };
      }

      comments.innerHTML = `<p>${myP_HTML}</p>`;

      /* Restablezco valores */
      const formInputs = Array.from(document.querySelectorAll("input"));
      formInputs.forEach((e) => {
        e.style.borderColor = "";
        e.style.backgroundColor = "";
        e.style.color = "";
      });
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
