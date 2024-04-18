// ToDo: Pasar este código a "arrayMethods.js"

const myButtonAdd = document.getElementById("buttonAdd");
const myWords = [];
myButtonAdd.onclick = function (event) {
  event.preventDefault();

  let myInputText = document.getElementById("myInputText").value;
  myInputText = myInputText.toLocaleLowerCase();

  // `substring()` busca únicamente en strings. Empieza deste un índice de la cadena de texto y se para en otro (recibe dos argumentos. Los argumentos no se incluyen en el resultado de la búsqueda). Si se le da solo una prop, empezará desde ese elemento y acabará en el final de la cadena de texto
  myInputText.substring(0.1).toLocaleUpperCase() + myInputText.substring(1);
  console.log(myInputText);

  myWords.push(myInputText);
  console.log(myWords);

  showWords();
};
function showWords() {
  const HTML_p_textShowWords = document.getElementById("textShowWords");
  HTML_p_textShowWords.innerHTML = `${myWords.join(", ")}`;
}
// ORDENAR LA INFORMACIÓN Y BUSCAR LETRA "b"
const myButtonSort = document.getElementById("buttonSortByb");
myButtonSort.onclick = function (e) {
  e.preventDefault();

  sortByb(myWords);

  showOrderedWords();
};
let filteredArray = [];
function sortByb(array) {
  /* `map().filter()` busca el elemento, le aplica una función y lo filtra para obtener algo específico */
  let wordsWithSecondLetterB = array
    .map((e) => {
      if (e[1] === "b" || e[1] === "B") {
        let theSecondLetterOfElementItsB = e;
        return theSecondLetterOfElementItsB;
      }
    })
    .filter((e) => e !== undefined);
  console.log(wordsWithSecondLetterB);
  filteredArray = wordsWithSecondLetterB;
}
function showOrderedWords() {
  const HTML_p_textSortWords = document.getElementById("textSortBybWords");
  HTML_p_textSortWords.innerHTML = `${filteredArray.join(", ")}`;
}
