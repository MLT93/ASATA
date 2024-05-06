document.getElementById("formulario").addEventListener("submit", (event) => {
  event.preventDefault();

  const namee = document.getElementById("nameID").value;
  const surname = document.getElementById("lastNameID").value;
  const age = Number(document.getElementById("ageID").value);
  const email = document.getElementById("emailID").value;
  const password = document.getElementById("passwordID").value;

  // `Array.from()` convierte "NodeList" en un "Array" entonces lo podremos iterar como cualquier otro arreglo
  const selectedStudies = [];
  const studies = Array.from(document.getElementsByName("check-school")); // Convierto "NodeList" en un `Array`
  studies.map((element, index) => {
    console.log(`Indice: ${index} | El checkbox = ${element.checked}`);
    const isChecked = element.checked;
    if (isChecked) {
      selectedStudies.push(element);
      // Marcar los anteriores si se selecciona FP o Bachiller
      if (element.value === "Bachiller" || element.value === "Universidad") {
        for (let i = 0; i < index; i++) {
          studies[i].checked = true;
        }
      }
    }
  }); // Itero el array para encontrar lo que necesito
  console.log(selectedStudies);

  const selectedCourse = [];
  const course = Array.from(document.getElementsByName("course"));
  course.map((element, index) => {
    console.log(`Indice: ${index} | El check del radio = ${element.checked}`);

    element.checked === true ? selectedCourse.push(element) : null;
  });
  console.log(selectedCourse);

  const center = document.getElementById("schoolCenter").value;

  const alumno = {
    name: namee,
    surname: surname,
    age: age,
    email: email,
    password: password,
    studies: selectedStudies,
    course: selectedCourse,
    center: center,
  };
  console.log(alumno);

  comprobarInfo(alumno);
});

function comprobarInfo(params) {
  // COMPROBAR REGEXP EMAIL
  const regExpMail = /[\w._%+-]+@[\w.-]+\.[a-zA-Z]{2,4}/;

  const { email, age, center, name, surname } = params;

  !regExpMail.exec(email)
    ? alert("El email es incorrecto. \n\n Hágalo bien.")
    : null;
  // COMPROBAR FORMACIÓN
  const checkIfStudied = Array.from(document.getElementsByName("check-school"));
  const formPrimaria = checkIfStudied[0].checked; // Esto me devuelve true o false de PRIMARIA
  const formSecundaria = checkIfStudied[1].checked; // Esto me devuelve true o false de SECUNDARIA
  const formBachiller = checkIfStudied[2].checked; // Esto me devuelve true o false de BACHILLER
  const formUniversidad = checkIfStudied[3].checked; // Esto me devuelve true o false de UNIVERSIDAD

  if (formUniversidad || formBachiller) {
    if (formPrimaria && formSecundaria) {
      if (!formBachiller) {
        alert(
          "Debes marcar Bachiller si has seleccionado Primaria, Secundaria y Universidad."
        );
      } else {
        console.log("Formación OK");
      }
    } else {
      alert("Deberías marcar Primaria y Secundaria");
    }
  }
  // COMPROBAR EDAD
  const buttonSubmit = document.getElementById("buttonSubmit");
  if (age < 18) {
    alert("Sos menor de edad!");
    buttonSubmit.setAttribute("disabled");
    buttonSubmit.style.backgroundColor = "red";
  }
  // COMPROBAR CENTRO
  center === "ASATA" || center === "CODENOTCH"
    ? alert("Oferta en los centros ASATA y CODENOTCH durante un mes")
    : null;
  // COMPROBAR CHARSET
  if (name.length > 30) {
    alert("Max. 30 caracteres.");
    document.getElementsByName("name").focus();
  }
  if (surname.length > 30) {
    alert("Max. 30 caracteres.");
    document.getElementsByName("last-name").focus();
  }
}
