const date = new Date().toLocaleString();

console.log(`Bienvenido a tu primer script! \n\n ${date}`);

let saludo = "Hola";
let nombre = "Marcos";

let saludar = `${saludo} ${nombre}`;

console.log(saludar);

var x = 3; //   3
x = x + 1; // + 1
x += 1; // + 1
x++; // + 1

console.log(x); // 6

var numTexto = "23";
console.log(numTexto + x); // 236 -> Esto ocurre porque le estamos añadiendo un Number a un String, entonces los concatena
console.log(Number(numTexto) + x); // 29 -> Esto ocurre porque modificamos el tipo de 'numTexto' a Number, entonces ambas variables serán números y se sumarán


var coche = ["BMW", "200CV", "ROJO", "5 PUERTAS"];