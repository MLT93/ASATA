document.addEventListener("DOMContentLoaded", function () {
  // FORMULARIO

  const buttonSubmit = document.getElementById("buttonSubmit");
  const buttonShow = document.getElementById("buttonShow");
  const comments = document.getElementById("comments");

  buttonSubmit.onclick = function (e) {
    e.preventDefault();

    // VALIDACIONES LOG IN
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

      if (password.value === "asdf3#" && user.value === "asdf") {
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

  buttonShow.onclick = function (event) {
    event.preventDefault();

    // VALIDACIÓN TEXTAREA
    try {
      /* Validación TextArea */
      const textarea = document.getElementById("textAreaID");
      if (!textarea.value) {
        throw { msg: "Este campo no puede estar vacío", element: textarea };
      } else {
        const myP_HTML = document.createElement("p");
        myP_HTML.innerHTML = `${comments.value}`;
        comments.appendChild(myP_HTML);
      }

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
