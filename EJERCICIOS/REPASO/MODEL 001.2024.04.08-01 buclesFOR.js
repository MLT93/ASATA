// Sumar los números del 1 a 'n'
// Usa un bucle for para sumar un número del 1 a 'n'
// Función ad hoc: sumarNumeros
function sumarNumeros(n) {
  let suma = 0;
  for (let i = 0; i <= n; i++) {
    suma += i;
  }
  console.log(suma);
  return suma;
}
sumarNumeros(100);

// Multiplica los 10 primeros números naturales (del 1 al 10)
// Función ad hoc: multiplicarNumeros
function multiplicarNumeros() {
  // ********************* ESCRIBE AQUÍ TU CÓDIGO PARA RESOLVER EL EJC ********************* /
  let multiplication = 1;
  for (let i = 1; i <= 10; i++) {
    multiplication *= i;
  }
  console.log(multiplication);
  return multiplication;
}
// ********************* ESCRIBE A CONTINUACIÓN LA INVOCACIÓN DE LA FUNCIÓN ********************* /
multiplicarNumeros();

// Listar los números pares del 0 al 50
// Usa un bucle for para imprimir los números pares del 0 al 50
// Función ad hoc: listarPares
function listarPares() {
  // ********************* ESCRIBE AQUÍ TU CÓDIGO PARA RESOLVER EL EJC ********************* /
  let pares;
  for (let i = 0; i <= 50; i++) {
    if (i % 2 === 0) {
      pares = i;
      console.log(pares);
    }
  }
  return pares;
}
// ********************* ESCRIBE A CONTINUACIÓN LA INVOCACIÓN DE LA FUNCIÓN ********************* /
listarPares();

// Genera un array con los cuadrados de los primeros 10 números enteros
// Función ad hoc: generarCuadrados
function generarCuadrados() {
  // ********************* ESCRIBE AQUÍ TU CÓDIGO PARA RESOLVER EL EJC ********************* /
  let cuadrados = [];
  for (let i = 0; i <= 10; i++) {
    cuadrados.push(i ** 2);
  }
  return cuadrados;
}
// ********************* ESCRIBE A CONTINUACIÓN LA INVOCACIÓN DE LA FUNCIÓN ********************* /
let ArrayDeCuadrados = generarCuadrados();
console.log(ArrayDeCuadrados);

// Contar cuántas veces aparece una letra en una cadena
// Dada una cadena y una letra, cuántas veces aparece la letra en la cadena
// Función ad hoc: contarLetra
function contarLetra(cadena, letra) {
  let contador = 0;
  for (let i = 0; i < cadena.length; i++) {
    const element = cadena[i];
    if (element === letra) {
      contador++;
    }
  }
  console.log(contador);
  return contador;
}
contarLetra("Hola mundo", "o");

// Escribe una función que tome una cadena como argumento y devuelva esa cadena invertida. Por ejemplo, si pasas la cadena "hola", la función debería devolver "aloh".
function invertirCadena(cadena) {
  // ********************* ESCRIBE AQUÍ TU CÓDIGO PARA RESOLVER EL EJC ********************* /
  let cadenaInvertida = "";
  for (let i = cadena.length - 1; i >= 0; i--) {
    const element = cadena[i];
    console.log(`Index ${i} | ${element}`);
    cadenaInvertida += element;
  }
  console.log(cadenaInvertida);
  return cadenaInvertida;
}
// ********************* ESCRIBE A CONTINUACIÓN LA INVOCACIÓN DE LA FUNCIÓN ********************* /
invertirCadena("Hola");

// Crea una función que reciba una cadena y devuelva el número total de vocales (a, e, i, o, u) que  contiene esa cadena, sin importar si son mayúsculas o minúsculas.
function contarVocales(cadena) {
  // ********************* ESCRIBE AQUÍ TU CÓDIGO PARA RESOLVER EL EJC ********************* /
  let contador = 0;
  let result = [];
  
  for (let i = 0; i < cadena.length; i++) {
    const element = cadena[i];
    if (element === "a") {
      contador++;
      result.push(`Hay ${contador} vocales 'a'`);
    } else if (element === "e") {
      contador++;
      result.push(`Hay ${contador} vocales 'e'`);
    } else if (element === "i") {
      contador++;
      result.push(`Hay ${contador} vocales 'i'`);
    } else if (element === "o") {
      contador++;
      result.push(`Hay ${contador} vocales 'o'`);
    } else if (element === "u") {
      contador++;
      result.push(`Hay ${contador} vocales 'u'`);
    }
  }
  console.log(result);
  return result;
}
// ********************* ESCRIBE A CONTINUACIÓN LA INVOCACIÓN DE LA FUNCIÓN ********************* /
contarVocales("Pepe");
