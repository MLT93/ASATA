document.addEventListener("DOMContentLoaded", () => {
  const questionElement_HTML = document.getElementById("question");
  const answersElement_HTML = document.getElementById("answers");
  const progressElement_HTML = document.getElementById("progress");
  const submitElement_HTML = document.getElementById("submit");

  let questions = [];
  let indexCurrentQuestion = 0;

  let correctChoice = false;
  let score = 0;

  // Esta función envía una petición de preguntas y obtiene una respuesta con las condiciones que le pidamos
  // amount = 10
  // category = 18
  // difficulty = easy
  // type = multiple
  const URL =
    "https://opentdb.com/api.php?amount=10&category=18&difficulty=easy&type=multiple";

  async function fetchQuestions(params) {
    try {
      const response = await fetch(params);
      const data = await response.json();
      console.log(data);
      questions = data.results;
      displayQuestions();
    } catch (error) {
      console.error(error);
    }
  }

  function displayQuestions() {
    const question = questions[indexCurrentQuestion]; // Selecciono la información de una de las preguntas
    questionElement_HTML.innerHTML = `${question.question}`; // Introduzco en la etiqueta de id="question" el enunciado de la pregunta
    answersElement_HTML.innerHTML = ``; // Reset del contenido anterior
    progressElement_HTML.innerHTML = `
    Pregunta ${indexCurrentQuestion + 1} de ${questions.length}
    `;

    // El `spread operator` aglutina el array correspondiente a `question.incorrect_answers` dentro del array `answers` porque crea una copia y lo agrega al array actual. Entonces me queda un único array con todas las respuestas
    // `.sort(() => Math.random() - 0.5);` hace aleatorio cualquier orden dentro del array
    const answers = [
      question.correct_answer,
      ...question.incorrect_answers,
    ].sort(() => Math.random() - 0.5);

    console.log(answers);

    answers.forEach((e) => {
      const li = document.createElement("li");
      li.innerHTML = `${e}`;
      li.addEventListener("click", () =>
        selectAnswer(e, question.correct_answer)
      ); // El escuchador de eventos invocará al método `selectAnswer` para saber que respuesta está seleccionada
      answersElement_HTML.appendChild(li);
    });
  }

  function selectAnswer(selectedAnswer, correctAnswer) {
    const checkCorrectAnswer = document.querySelectorAll("#answers li"); // `querySelectorAll y querySelector` funcionan como CSS. Para seleccionar los elementos o el elemento deseado se accede primero al elemento padre y después al hijo, en el caso de las etiquetas. La diferencia sustancial entre uno y el otro es que `querySelectorAll` devuelve un array porque los acumula todos y el otro solo devuelve uno

    checkCorrectAnswer.forEach((e) => {
      e.classList.remove("selected"); // Quito la clase selected de todas las respuestas en la primer vuelta del bucle

      if (e.innerHTML === correctAnswer) {
        e.classList.add("correct");
      } else {
        e.classList.add("incorrect");
      }
    });

    if (selectedAnswer === correctAnswer) {
      score++;
    }

    // Ver la respuesta seleccionada y añadir clase `selected`
    const selectedElement = Array.from(checkCorrectAnswer).find(
      (element) => element.innerHTML === selectedAnswer
    );
    if (selectedElement) {
      selectedElement.classList.add("selected");
    }
  }

  submitElement_HTML.addEventListener("click", () => {
    // Cuando llegue exactamente al penúltimo índice del array, acabará el bucle
    if (indexCurrentQuestion < questions.length - 1) {
      indexCurrentQuestion++;
      displayQuestions();
    } else {
      // En el último índice del array, mostraré el resultado
      questionElement_HTML.innerHTML = `Juego terminado. Tu puntuación es de: ${score} / ${questions.length}`;
      answersElement_HTML.innerHTML = ``; // Reset de las respuestas
    }
  });

  fetchQuestions(URL);
});
