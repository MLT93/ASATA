// Usa async aquí para permitir el uso de await dentro
document.addEventListener("DOMContentLoaded", async function () {
  //url (endopint) de una API pública que me devuelve un JSON con 10 usuarios ficticios
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
    /* Obtener Nombres */
    const nombresUsuarios = dataUsuariosEnParsed.map((e) => {
      return e.name;
    });
    /* Obtener Emails */
    const emailsUsuarios = dataUsuariosEnParsed.map((e) => {
      return e.email;
    });
    /* Obtener Ciudades */
    const ciudadesUsuarios = dataUsuariosEnParsed.map((e) => {
      return e.address.city;
    });
    /* Pintar Nombres */
    const myNames_HTML = document.getElementById("names");
    myNames_HTML.innerHTML = `${nombresUsuarios
      .map((e) => {
        return `<p>${e}</p>`;
      })
      .join("")}`;
    console.log(nombresUsuarios);
    /* Pintar Emails */
    const myEmails_HTML = document.getElementById("emails");
    myEmails_HTML.innerHTML = `${emailsUsuarios
      .map((e) => {
        return `<p>${e}</p>`;
      })
      .join("")}`;
    console.log(emailsUsuarios);
    /* Pintar Ciudades */
    const myCities_HTML = document.getElementById("cities");
    myCities_HTML.innerHTML = `${ciudadesUsuarios
      .map((e) => {
        return `<p>${e}</p>`;
      })
      .join("")}`;
    console.log(ciudadesUsuarios);

    /* Obtener info input y buscar */
    const buttonSearch = document.getElementById("buttonSearch");
    buttonSearch.onclick = function () {
      search();
    };
    var elementSearched = [];
    function search() {
      var searched = document.getElementById("searchingText").value;
      searched = searched.toLowerCase(); //PASO A MINÚSCULA
      /* searched = searched.substring(0, 1).toUpperCase() + searched.substring(1); //PONGO EN MAYÚSCULA LA PRIMERA LETRA */
      // Crear una expresión regular que coincida con las letras en cualquier posición. La bandera `gi` en la expresión regular indica que la búsqueda debe ser insensible a las mayúsculas y minúsculas.
      const regExp = new RegExp(searched, "i");
      dataUsuariosEnParsed.forEach((e) => {
        elementSearched.push(regExp.test(e));
      });
    }
    console.log(elementSearched);
  } catch (error) {
    console.error("Error mostrando usuarios: ", error);
  }
});

//La variable "dataUsuariosEnJSON" tiene todos los datos en formato JSON, es la variable más aconsejable para usar a la hora de trabajar con lso datos de la API

//La variable "dataUsuariosEnString" tiene los datos transformados en string pro el metodo JSON.stringify()
