function calcularSuma(){

 var numero = prompt("Dame un numero entero");
 
 var suma = 0;

 for(var i=1; i<=numero; i++ ){

    suma = suma + i;

 }

 var resultado = document.getElementById("resultado");
 const total = document.createElement("div");
 total.textContent = "la suma total total es " + suma;

 resultado.appendChild(total);

}