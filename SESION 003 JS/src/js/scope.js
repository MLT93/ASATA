// 1 variable  var

var array = ["Barcelona", "Bilbao", "Oviedo"];
console.log(array);

for (let i = 0; i < array.length; i++) {
  array[i] = i;
}
console.log(array);

var array = [3, 3, 3];
console.log(array);

// 2 variable  let

let array2 = ["Barcelona", "Bilbao", "Oviedo"];
console.log(array2);

for (let i = 0; i < array2.length; i++) {
  array2[i] = i;
}
console.log(array2);

// let array2 = [3,3,3];
console.log(array2);

// 3 declaracion var dentro de un bucle

for (let i = 0; i < 3; i++) {
  var array3 = ["Barcelona", "Bilbao", "Oviedo"];
  // console.log(array3);
  array3[i] = i;
}
console.log(array3);

var array3 = [3, 3, 3];
console.log(array3);

// 4 declaracion let dentro de un bucle

for (let i = 0; i < 3; i++) {
  let array4 = ["Barcelona", "Bilbao", "Oviedo"];
  // console.log(array3);
  array4[i] = i;
}

// console.log(array4);

let array4 = [3, 3, 3];
console.log(array4);

// 5 ambito de declaración de variabels dentro de una función

function ambitoVar1(input) {
  var suma = 0;
  return (suma = suma + input);
}

console.log(ambitoVar1(3));
console.log(suma);

function ambitoVar2(input) {
  let suma2 = 0;
  return (suma2 = suma2 + input);
}
console.log(ambitoVar2(3));
console.log(suma2);
