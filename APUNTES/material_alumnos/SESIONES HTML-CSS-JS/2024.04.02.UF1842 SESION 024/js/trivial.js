document.addEventListener('DOMContentLoaded', () => {
 const questionElement = document.getElementById('question');
 const answersElement = document.getElementById('answers');
 const submitButton = document.getElementById('submit');
 const nextButton = document.getElementById('next');
 let currentQuestion = 0;
 let score = 0;
 let questions = [];

 function fetchQuestions() {
     fetch('https://opentdb.com/api.php?amount=10&category=17&difficulty=easy&type=multiple')
         .then(response => response.json())
         .then(data => {
             questions = data.results;
             displayQuestion();
         });
 }

 function displayQuestion() {
  const question = questions[currentQuestion];
  questionElement.innerHTML = question.question;
  answersElement.innerHTML = '';
  // Actualiza el elemento de progreso con la pregunta actual y el total
  const progressElement = document.getElementById('progress');
  progressElement.innerHTML = `Pregunta ${currentQuestion + 1} de ${questions.length}`;
  
  const answers = [question.correct_answer, ...question.incorrect_answers].sort(() => Math.random() - 0.5);
  answers.forEach(answer => {
      const li = document.createElement('li');
      li.innerHTML = answer;
      li.addEventListener('click', () => selectAnswer(answer, question.correct_answer));
      answersElement.appendChild(li);
  });
  // submitButton.style.display = 'none';
  // nextButton.style.display = 'none';
}

 function selectAnswer(selectedAnswer, correctAnswer) {
     const answers = document.querySelectorAll('#answers li');
     answers.forEach(answer => {
      answer.classList.remove('selected'); // Quitar la clase 'selected' de todas las respuestas
        
         if(answer.innerHTML === correctAnswer) {
             answer.classList.add('correct');
         } else {
             answer.classList.add('incorrect');
         }
     });
     if(selectedAnswer === correctAnswer) {
         score++;
     }

         // Encuentra la respuesta seleccionada y le añade la clase 'selected'
    const selectedElement = Array.from(answers).find(answer => answer.innerHTML === selectedAnswer);
    if (selectedElement) {
        selectedElement.classList.add('selected'); // Añade la clase 'selected'
    }
     submitButton.style.display = 'block';
 }

 submitButton.addEventListener('click', () => {
     if(currentQuestion < questions.length - 1) {
         currentQuestion++;
         displayQuestion();
     } else {
         questionElement.innerHTML = `Juego terminado. Tu puntuación es ${score}/${questions.length}.`;
         answersElement.innerHTML = '';
         submitButton.style.display = 'none';
         nextButton.style.display = 'none';
     }
 });

 nextButton.addEventListener('click', displayQuestion);
 fetchQuestions();
});
