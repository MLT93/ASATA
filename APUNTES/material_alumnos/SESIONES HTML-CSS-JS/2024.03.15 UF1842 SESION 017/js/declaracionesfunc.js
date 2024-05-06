// 1. Declaración más habitual
// Permite usar la función antes de su definición en el código.
console.log("PRIMERA FORMA DE DECLARAR UNA FUNCIÓN ");
console.log( saludar("Federico") );

function saludar(nombre){
    return `Hola, ${nombre}`
}


//2. Declaración de una función como función anonima
// Esta declaración de las funciones no me permite usar las funciones antes de declararlas

const despedir = function(nombre){
    return `Adios, ${nombre}`
}
console.log("SEGUNDA FORMA DE DECLARAR UNA FUNCIÓN : FUNCIÓN ANÓNIMA");
console.log( despedir("Federico")  );


//3. Declaración de una función como función nombrada
// Esta declaración de las funciones no me permite usar las funciones antes de declararlas
// La función tiene un nombre
// Els útil para recursividad

const factorial = function fact(n) {
    return  n < 2 ? 1 : n * fact(n-1);
}

console.log("TERCERA FORMA DE DECLARAR UNA FUNCIÓN : FUNCIÓN NOMBRADA");
console.log("El factorial de 5 es: ")
console.log( factorial(5)); 


//4. Declaración como función flecha
// Esta declaración de las funciones no me permite usar las funciones antes de declararlas

const cuadrado = n => n*n;

console.log("CUARTA FORMA DE DECLARAR UNA FUNCIÓN : FUNCIÓN FLECHA");
console.log("El cuadrado de 5 es: ")
console.log( cuadrado(5)); 



//5. Constructor de Funciones

const sumar = new Function('a', 'b',"return a + b");

console.log("QUINTA FORMA DE DECLARAR UNA FUNCIÓN : MEDIANTE CONSTRUCTOR");
console.log("La suma de 5 y 3 es: ")
console.log( sumar(5,3)); 


/////////////////////////////////////


//1

function conversion1FtoC(temperaturaF){

    return ((temperaturaF - 32) * (5/9)).toFixed(2) ;
}
console.log("PRIMERA MANERA DE DECLARAR LA FUNCIÓN");
console.log("100 ºF son en ºC igual a : ")
console.log( conversion1FtoC(100));


//2 

const  conversion2FtoC = function(temperaturaF){

    return ((temperaturaF - 32) * (5/9)).toFixed(2) ;

}
console.log("SEGUNDA MANERA DE DECLARAR LA FUNCIÓN");
console.log("100 ºF son en ºC igual a : ")
console.log( conversion2FtoC(100));


//3 

const conversion3FtoC = function convert(temperaturaF){

    return ((temperaturaF - 32) * (5/9)).toFixed(2) ;

}
console.log("TERCERA MANERA DE DECLARAR LA FUNCIÓN");
console.log("100 ºF son en ºC igual a : ")
console.log( conversion3FtoC(100));


//4

const conversion4FtoC = temperaturaF => ((temperaturaF - 32) * (5/9)).toFixed(2);

console.log("CUARTA MANERA DE DECLARAR LA FUNCIÓN");
console.log("100 ºF son en ºC igual a : ")
console.log( conversion4FtoC(100));


//5 

const conversion5FtoC = new Function("temperaturaF","return ((temperaturaF - 32) * (5/9)).toFixed(2)");
console.log("QUINTA MANERA DE DECLARAR LA FUNCIÓN");
console.log("100 ºF son en ºC igual a : ")
console.log( conversion5FtoC(100));