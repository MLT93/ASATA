// Usa async aquí para permitir el uso de await dentro
document.addEventListener("DOMContentLoaded", async function () {
  //url (endpoint) de una API pública que me devuelve un JSON con 10 usuarios ficticios
  const apiUrl = "https://jsonplaceholder.typicode.com/users";

  //definición de la función "fetchUsers" para obtener los usuarios que devuelve la API. Es una función asincrona, la veremos en clase, de momento usadla para obtener los valores del JSON y trabajar con él, algo semejante a como lo hemos hecho cuando el JSON era un archivo en nuestro equipo.
  //Las FUNCIONES ASíNCRONAS cons MUY ÚTILES e IMPORTANTES
  const fetchUsers = async () => {
    try {
      const response = await fetch(apiUrl);
      if (!response.ok) throw new Error("La red no funciona correctamente.");
      const users = await response.json();
      //obtengo por consola la info proveniente de la API en formato JSON
      console.log(users);
      return users; // Retorna los usuarios obtenidos de la promesa
    } catch (error) {
      console.error("Error: ", error);
      return []; // Retorna un array vacío en caso de error
    }
  };

  try {
    // Asignación de los datos obtenidos en la API en formato JSON a una variable
    // Al ser una función asincrona necesito invocarla con un await para que el script "espere" a recibir los datos. LO COMENTAREMOS EN CLASE
    const dataUsuariosEnJSON = await fetchUsers();
    // Para mostrar los usuarios de forma legible, convierte el objeto JSON a un string con formato
    const dataUsuariosEnString = JSON.stringify(dataUsuariosEnJSON, null, 2);

    const body = document.getElementById("cuerpo");
    // La etiqueta <pre></pre> representa texto preformateado. El texto en este elemento típicamente se muestra en una fuente fija, no proporcional, exactamente como es mostrado en el archivo. Es una etiqueta semantica.
    /* body.innerHTML = "<pre>" + dataUsuariosEnString + "</pre>"; */

    const mySection_HTML = document.getElementById("section");
    mySection_HTML.style.padding = "10px 20px";
    mySection_HTML.style.borderRadius = "20px";
    mySection_HTML.style.width = "100%";
    mySection_HTML.style.maxWidth = "580px";
    mySection_HTML.style.boxShadow = "1px 3px 10px 1px black";

    // Para manipular el contenido del array de objetos, se debe "parsear" la data que me trae la llamada de la API
    const dataUsuariosEnParsed = JSON.parse(dataUsuariosEnString);

    // Obtener arrays para de los elementos que deseamos mostrar
    const nombresUsuarios = dataUsuariosEnParsed.map((e) => e.name);
    const emailsUsuarios = dataUsuariosEnParsed.map((e) => e.email);
    const ciudadesUsuarios = dataUsuariosEnParsed.map((e) => e.address.city);

    // DOM
    const myNames_HTML = document.getElementById("names");
    const myEmails_HTML = document.getElementById("emails");
    const myCities_HTML = document.getElementById("cities");

    // Pintar elementos
    function displayElements(array1, array2, array3) {
      myNames_HTML.innerHTML = `${array1.map((e) => `<p>${e}</p>`).join("")}`;
      myEmails_HTML.innerHTML = `${array2.map((e) => `<p>${e}</p>`).join("")}`;
      myCities_HTML.innerHTML = `${array3.map((e) => `<p>${e}</p>`).join("")}`;
    }
    displayElements(nombresUsuarios, emailsUsuarios, ciudadesUsuarios);

    // Botón para onclick
    const buttonSearch = document.getElementById("buttonSearch");
    buttonSearch.onclick = function (e) {
      e.preventDefault();

      search();
    };

    // Crear función de búsqueda y obtener el valor del input
    let elementSearched = [];
    let emailsCorresponding = [];
    let citiesCorresponding = [];
    async function search() {
      let searched = document.getElementById("searchingText").value;
      searched = searched.toLowerCase(); // PASO A MINÚSCULA

      // Crear una expresión regular que coincida con las letras en cualquier posición. La bandera `gi` en la expresión regular indica que la búsqueda debe ser general e insensible a mayúsculas y minúsculas.
      const regExp = new RegExp(searched, "gi");
      await dataUsuariosEnParsed.filter((e) => {
        // Si hay un match con el `regExp` entonces lo guarda en `elementSearched`
        if (regExp.test(e.name) === true) {
          // Reemplazar las palabras encontradas con un `<span></span>` con el nuevo estilo. La variable `$&` llama a la variable en la cual se almacena este mismo valor
          const highlightedName = e.name.replace(
            regExp,
            `<span style="background-color: yellow;">$&</span>`,
          );

          // Reemplaza también los viejos elementos con los nuevos elementos encontrados y los agrega al nuevo array
          myNames_HTML.innerHTML = `<p>${highlightedName}</p>`;
          elementSearched.push(highlightedName);
          emailsCorresponding.push(e.email);
          citiesCorresponding.push(e.address.city);
        }

        // Pinto los nuevos valores
        displayElements(
          elementSearched,
          emailsCorresponding,
          citiesCorresponding,
        );
      });

      // Restablezco los arrays para que no acumule valores en cada búsqueda
      elementSearched = [];
      emailsCorresponding = [];
      citiesCorresponding = [];
    }

    // Crear función de pagination y obtener el valor del input
    async function usersPerPage() {
      let usersPerPage = document.getElementById("usersPerPage");
      usersPerPage.addEventListener("change", () => {
        // Obtener la cantidad e elementos por página
        let valueOfElementsPerPage = Number(usersPerPage.value);
        console.log(`Valor en el input: ${valueOfElementsPerPage}`);

        // Calcular el tamaño de cada página
        let numberOfPages = Math.ceil(
          dataUsuariosEnParsed.length / valueOfElementsPerPage,
        );
        console.log(`Cantidad de secciones: ${numberOfPages}`);

        // Arrays vacíos para las nuevas secciones
        let namesPerPage = [];
        let emailsPerPage = [];
        let citiesPerPage = [];

        // Creo un contador para saber en qué página estoy y recorto el array original según el valor del input para guardar los elementos en el array que iré a iterar
        let pageCounter = 1;
        const startSlicer = valueOfElementsPerPage * (pageCounter - 1); // Número usuarios por página x (pagActual - 1);
        const endSlicer = startSlicer + valueOfElementsPerPage; // Número inicial del recorte + el número del input
        let elementsToSavePerPage = dataUsuariosEnParsed.slice(
          startSlicer,
          endSlicer,
        ); // `slice(start(included), end(excluded))`
        const slicedArray = [];
        slicedArray.push(elementsToSavePerPage);
        console.log(slicedArray);

        // Itero el array recortado y aumento la cantidad de páginas dinamicamente
        for (let i = 0; i < slicedArray.length; i++) {
          console.log(slicedArray[i].name);
          namesPerPage.push(slicedArray[i].name);

          // Si el resto de la división entre i que recorre el array y el numberOfPages es igual a 0, entonces aumenta la cantidad de secciones
          if (i % numberOfPages === 0) {
            pageCounter++;
          }
        }
        console.log(namesPerPage);

        return displayElements(namesPerPage, emailsPerPage, citiesPerPage);
      });
    }
    usersPerPage();
  } catch (error) {
    console.error("Error mostrando usuarios: ", error);
  }
});

//La variable "dataUsuariosEnJSON" tiene todos los datos en formato JSON, es la variable más aconsejable para usar a la hora de trabajar con lso datos de la API

//La variable "dataUsuariosEnString" tiene los datos transformados en string pro el metodo JSON.stringify()

// ----------------------------------------------------------------------------------

/* 

const originalArray = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];

const arrayLength = originalArray.length;
const sectionSize = Math.floor(arrayLength / 4);

const section1 = [];
const section2 = [];
const section3 = [];
const section4 = [];

let sectionCounter = 1;
for (let i = 0; i < arrayLength; i++) {
  if (sectionCounter === 1) {
    section1.push(originalArray[i]);
  } else if (sectionCounter === 2) {
    section2.push(originalArray[i]);
  } else if (sectionCounter === 3) {
    section3.push(originalArray[i]);
  } else {
    section4.push(originalArray[i]);
  }

  if (i % sectionSize === 0) {
    sectionCounter++;
  }
}

console.log("Section 1:", section1);
console.log("Section 2:", section2);
console.log("Section 3:", section3);
console.log("Section 4:", section4);


*/
