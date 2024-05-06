// var  frutas = ['manzana', 'pera', 'fresa', 'platano','manzana', 'pera', 'chirimoya'];

// console.log(frutas);

// // SACAR LONGTUD DEL ARRAY
// console.log("TAMAÑO:")
// console.log(frutas.length);

// // METODO PUSH
// frutas.push("melón", "sandia");
// console.log("MÉTODO PUSH:")
// console.log(frutas);


// // METODO UNSHIFT
// frutas.unshift("melón", "sandia");
// console.log("MÉTODO UNSHIFT:")
// console.log(frutas);


// //METODO POP
// frutas.pop();
// console.log("MÉTODO POP:")
// console.log(frutas);

// //METODO SHIFT
// frutas.shift();
// console.log("MÉTODO SHIFT:")
// console.log(frutas);


// //METODO SHIFT
// delete frutas[7];
// console.log("MÉTODO DELETE:")
// console.log(frutas);

var coches = ['BMW','Seat','Renault'];

console.log(coches);
console.log(coches[0]);

console.log(coches.length);

console.log(coches.push("Citroen"), coches.length);
console.log(coches);

console.log(coches.unshift("Peugeot", "Audi"), coches.length);
console.log(coches);

console.log(coches[0]);
console.log(coches.shift());
console.log(coches);
console.log(coches[0]);


console.log(coches.splice(2,1,"Citroen", "Mazda"))
console.log(coches);


var coches2 = ["Hyundai", "Suzuki"];
// var coches2 = ("Hyundai", "Suzuki");//mall


console.log(coches.concat(coches2));


console.log(coches.slice(1,3));

console.log(coches.sort());
console.log(coches.reverse());

console.log(coches.indexOf("Mazda"));


var a1 = ["coche", "moto"];
var a2 = ["avión","bicicleta"];
var vehiculos = [];

vehiculos[0]=a1;
vehiculos[1]=a2;

console.log(vehiculos);

console.log(vehiculos[0][1]);
console.log(vehiculos[1][1]);



var coches1 = ["BMW", "Seat", "Reanult"];
var coches2 = ["Mercedes","Peugeot"];
var coches3 = ["Citroen"];
var coches = [];

coches = coches1.concat(coches2).concat(coches3);
console.log(coches);


coches.splice(3,0,"Audi","Fiat");
console.log(coches);


console.log(coches.sort());