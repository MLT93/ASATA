document.addEventListener("DOMContentLoaded", () => {
  /* VARIABLES */
  const contenido_HTML = document.getElementById("contenido");

  /* URL DE REFERENCIA */
  const URL = "https://v2.jokeapi.dev/joke/Any?safe-mode";

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

      const data = await response.json();
      console.log(data);

      const questionAnswerjoke = {
        pregunta: `${data.setup}`,
        respuesta: `${data.delivery}`,
      };

      const otherJoke = {
        joke: `${data.joke}`,
      };

      if (data.setup && data.delivery) {
        displayData(questionAnswerjoke);
      } else {
        displayData(otherJoke);
      }
    } catch (error) {
      if (error instanceof Error) {
        console.error(error);
      }
    }
  })(URL);

  /* MOSTRAR CONTENIDO DE LA PETICIÓN GET */
  function displayData(obj) {
    const p_HTML = document.createElement("p");

    if (!obj.pregunta && !obj.respuesta) {
      p_HTML.innerHTML = `<strong>Joke:</strong> ${obj.joke}`;
      contenido_HTML.appendChild(p_HTML);
    } else {
      p_HTML.innerHTML = `<strong>Pregunta:</strong> ${obj.pregunta}<br><strong>Respuesta:</strong> ${obj.respuesta}`;
      contenido_HTML.appendChild(p_HTML);
    }
  }
});
