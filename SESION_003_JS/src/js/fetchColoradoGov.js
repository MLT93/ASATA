document.addEventListener("DOMContentLoaded", () => {
  /* VARIABLES */
  const contenido_HTML = document.getElementById("contenido");

  /* URL DE REFERENCIA */
  const URL = "https://data.colorado.gov/resource/4ykn-tg5h.json";

  /* EXPLICACIÓN DE LAS OPCIONES DENTRO DE FETCH */
  const OPTIONS = {
    method: "POST", // *GET, POST, PUT, DELETE, etc.
    mode: "cors", // no-cors, *cors, same-origin
    cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
    credentials: "omit", // include, *same-origin, omit
    headers: {
      "Content-Type": ["application/json", "charset=utf-8"],
      /* "Access-Control-Allow-Origin": "*", */ // Optional adding this header for doing a POST method, and allow any CORS policy into navigator explorers
      /* "Access-Control-Allow-Headers": "*". */ // The same of previously
    },
    redirect: "follow", // manual, *follow, error
    referrerPolicy: "no-referrer", // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
    body: JSON.stringify({
      msg: "This is your data on POST method",
      data: "Anything",
    }), // body data type must match with "Content-Type" header and only use with POST or PUT methods
  };

  /* FUNCIÓN FETCH QUE SE AUTO INVOCA */
  (async () => {
    try {
      let response = await fetch(URL);

      if (!response.ok) {
        throw new Error(
          `La llamada no ha tenido éxito, respuesta[${response.ok}]`
        );
      }

      const data = await response.text();
      const dataParsed = JSON.parse(data);
      console.log(dataParsed);

      const limitArray = dataParsed.splice(0, 10);
      console.log(limitArray);

      displayData(limitArray);
    } catch (error) {
      if (error instanceof Error) {
        console.error(error);
      }
    }
  })(URL);

  /* MOSTRAR CONTENIDO DE LA PETICIÓN GET */
  // ToDo: Elaborar tabla con los resultados y crear filtrado de los mismos por nombre
  function displayData(arr) {
    let li_HTML = document.createElement("li");
    let values = arr.map((element) => {
      return {
        entityName: `<strong>${element.entityname}</strong> <br>`,
        principalAddress1: `<strong>${element.principaladdress1}</strong> <br>`,
        principalCity: `<strong>${element.principalcity}</strong> <br>`,
      };
    });
    console.log(values.entityName);
    li_HTML.innerHTML = `${values.map((e) => e.principalAddress1).join("\n")}`;
    contenido_HTML.appendChild(li_HTML);
  }
});

// --------------------------------------------------------------------------

function factorial(n) {
  let result = 1;
  for (let i = 0; i < n; i++) {
    const element = n[i];
    result = result * element;
  }
  console.log(result);
  return result;
}
