// Si crease el Array dentro de la función, cada vez que llame la función me vaciaría el Array
const myButtonWithNumber = document.getElementById("addNumber");
let arrayNumbers = [];
function getInfo() {
  myButtonWithNumber.onclick = function (event) {
    event.preventDefault();

    let myInputNumber = Number(document.getElementById("myInputNumber").value);

    arrayNumbers.push(myInputNumber);
    console.log(arrayNumbers);
    showNumbers(arrayNumbers);
  };
}
getInfo();

const HTML_p_numberList = document.getElementById("numberList");
function showNumbers(array) {
  HTML_p_numberList.innerHTML = `${array.join(", ")}`;
}

const myButtonForPromedy = document.getElementById("promedy");
function promedy(array) {
  myButtonForPromedy.onclick = function (event) {
    event.preventDefault();

    let suma = 0;
    let result = 0;
    for (let i = 0; i < array.length; i++) {
      const element = array[i];
      suma += element;
      console.log(`En el índice ${i} el número es: ${suma}`);
    }
    result = suma / array.length;
    console.log(`El promedio es: ${result}`);
    showMedia(result);
  };
}
promedy(arrayNumbers);

const HTML_p_mediaList = document.getElementById("mediaList");
function showMedia(result) {
  HTML_p_mediaList.innerHTML = `${result}`;
}
