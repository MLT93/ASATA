// ALMACENAR LA INFORMACIÓN DEL INPUT
const myButtonAdd = document.getElementById("buttonAdd");
const myWords = [];
myButtonAdd.onclick = function (event) {
  event.preventDefault();

  let myInputText = document.getElementById("myInputText").value;
  myInputText = myInputText.toLocaleLowerCase(); // Paso a minúsculas para evitar la sensibilidad entre mayúsculas y minúsculas
  myInputText.substring(0, 1).toLocaleUpperCase() + myInputText.substring(1); // Pongo en mayúsculas sólo la primera letra
  console.log(myInputText);

  myWords.push(myInputText);
  console.log(myWords);

  showWords();
};
function showWords() {
  const HTML_p_textShowWords = document.getElementById("textShowWords");
  HTML_p_textShowWords.innerHTML = `${myWords.join(", ")}`;
}
// ORDENAR LA INFORMACIÓN
const myButtonSort = document.getElementById("buttonSort");
myButtonSort.onclick = function (e) {
  e.preventDefault();

  sort(myWords);

  showOrderedWords();
};
let orderedArray = [];
function sort(array) {
  /* `sort()` ordena el Array. También es ideal para ordenar Arrays de Objetos. Atención porque modifica el Array original */
  array.sort();
  orderedArray = array;
  console.log(orderedArray);
}
function showOrderedWords() {
  const HTML_p_textSortWords = document.getElementById("textSortWords");
  HTML_p_textSortWords.innerHTML = `${orderedArray.join(", ")}`;
}
// BUSCAR LA INFORMACIÓN A TRAVÉS DE FIND
const myButtonSearch = document.getElementById("buttonSearchByFind");
myButtonSearch.onclick = function (e) {
  e.preventDefault();

  search(myWords);

  showSearchedWords();
};
let wordSearched = "";
function search(array) {
  let myInputSearchingText = document
    .getElementById("myInputSearchingText")
    .value.toLocaleLowerCase();
  /* `find()` filtra los elementos en base a una función de comparación. Devuelve un nuevo Array con los elementos correspondientes al éxito de la comparación */
  wordSearched = array.find(
    (element) => element.toLowerCase() === myInputSearchingText
  );
  console.log(wordSearched);
}
function showSearchedWords() {
  const HTML_p_textShowSearchedWords = document.getElementById(
    "textShowSearchedWords"
  );
  HTML_p_textShowSearchedWords.innerHTML = `${wordSearched}`;
}
// BUSCAR LA INFORMACIÓN A TRAVÉS DEL ÍNDICE DEL ARRAY
const myButtonSearchByIndex = document.getElementById("buttonSearchByIndex");
myButtonSearchByIndex.onclick = function (e) {
  e.preventDefault();

  searchByIndex(myWords);

  showSearchedWordsByIndex();
};
let wordSearchedByIndex = [];
function searchByIndex(array) {
  let myInputSearchingTextByIndex = document
    .getElementById("myInputSearchingTextByIndex")
    .value.toLocaleLowerCase();
  /* `indexOf()` requiere que se le pase lo que se busca directamente y devuelve el índice de la posición del elemento buscado */
  wordSearchedByIndex = array.indexOf(myInputSearchingTextByIndex);
  console.log(wordSearchedByIndex);
}
function showSearchedWordsByIndex() {
  const HTML_p_textShowSearchedWordsByIndex = document.getElementById(
    "textShowSearchedWordsByIndex"
  );
  HTML_p_textShowSearchedWordsByIndex.innerHTML = `Index: ${wordSearchedByIndex}`;
}
// INVERTIR EL ARRAY
/**
 * ToDo: realizar función para invertir el array
 */
// NÚMEROS
const myButtonNumber = document.getElementById("buttonNumber");
const myNumbers = [];
myButtonNumber.onclick = function (e) {
  e.preventDefault();

  let myInputNumber = document.getElementById("myInputNumber").value;
  myNumbers.push(myInputNumber);
  console.log(myNumbers);

  showNumbers();
};
function showNumbers() {
  const HTML_p_numbers = document.getElementById("numberShow");
  HTML_p_numbers.innerHTML = `${myNumbers.join(", ")}`;
}
// ORDENAR NÚMEROS EN PARES E IMPARES CON OPERADOR %
/**
 * ToDo: comprobar funcionamiento de la siguiente función
 */
const myButtonNumberPairsNoPairs =
  document.getElementById("buttonPairsNoPairs");
myButtonNumberPairsNoPairs.onclick = function (e) {
  e.preventDefault();

  orderByPairs(myNumbers);

  showPairsAndNoPairs();
};
let numbersPair = ["Pares:"];
let numbersNoPair = ["Impares:"];
function orderByPairs(array) {
  array.forEach((element) => {
    /* `%` este operador devuelve el resto de la división entre dos números. En este caso, dividimos el número del input entre 2, y si el resto es igual a 0 el número es par. Si no, es impar */
    if (element % 2 === 0) {
      numbersPair.push(element); // El resto de la división entre 2 es 0? Entonces es par
    } else {
      numbersNoPair.push(element); // El esto de la división entre 2 es 1 o más? Entonces es impar
    }
  });
}

function showPairsAndNoPairs() {
  const HTML_p_PairsNoPairs = document.getElementById("textSortPairsNoPairs");
  HTML_p_PairsNoPairs.innerHTML = `${numbersPair.join(", ")} ${numbersNoPair.join(", ")}`;
}
