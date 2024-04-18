
// Math.random()  genera un numeor aleatorio entre 0 y 1
// Math.round()  rredondea. Quita decimales.

var numaleatorio =  Math.round( Math.random() *10 );
console.log(numaleatorio);

var numusuario = 0;


do{

numusuario = prompt("Introduzca un numero entre 0 y 10");
console.log(numusuario);

if(numaleatorio>numusuario){
    alert("El número que buscas es más alto. Intentalo de nuevo");
}
else if(numaleatorio<numusuario){
    alert("El número que buscas es más bajo. Intentalo de nuevo");
}


} while(numaleatorio!=numusuario);

alert("Enohrabuena. Ese es el numero.");