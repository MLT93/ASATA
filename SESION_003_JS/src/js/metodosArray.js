
const arrayTextos = [];
const arrayNumeros = [];

function anadir(){
    let lineaTexto = document.getElementById("text").value;
    lineaTexto = lineaTexto.toLowerCase(); //PASO A MINUSCULA
    lineaTexto = lineaTexto.substring(0,1).toUpperCase() +lineaTexto.substring(1); //PONGO EN MAYUSCULA LA PRIMERA LETRA
    arrayTextos.push(lineaTexto);
}

function lista(){
    var lista = document.getElementById("lista");
    lista.innerHTML = `${arrayTextos.join(", ")}`
}

function ordenar(){
    var arrayOrdenado = arrayTextos;
    var arrayOrdenado = arrayOrdenado.sort();
    var lorden = document.getElementById("listaordenada");
    lorden.innerHTML = `${arrayOrdenado.join(", ")}`;

}


function buscar(){
    var textoBuscado = document.getElementById("textobusco").value;
    textoBuscado = textoBuscado.toLowerCase(); //PASO A MINÚSCULA
    textoBuscado = textoBuscado.substring(0,1).toUpperCase() +textoBuscado.substring(1); //PONGO EN MAYÚSCULA LA PRIMERA LETRA
    var indiceTextoBuscado = arrayTextos.indexOf(textoBuscado);
    var miIndice = document.getElementById("indice");
    miIndice.innerHTML = indiceTextoBuscado;
}


function concatenar(){
    var textoConcatenado = arrayTextos.concat();
    var listaConcatenada = document.getElementById("listaconcatenada");
    listaConcatenada.innerHTML = textoConcatenado;
}


function invertir(){
    var arrayInvertido = arrayTextos;
    var textoInvertido = arrayInvertido.reverse();
    var listaInvertida = document.getElementById("listainvertida");
    listaInvertida.innerHTML = textoInvertido; 

}




function numprimomayor(){



}


function anadirNum(){
    let inputNumero = document.getElementById("number").value;
    arrayNumeros.push(inputNumero);
    console.log(inputNumero);
}

function pares(){

    var cantidadPares = 0;

    for( var i=0; i<arrayNumeros.length; i++){
        if((arrayNumeros[i]%2) == 0){ //condicion de que arrayNumeros[i]  es PAR
            cantidadPares++;
        }
    }
    var canPares= document.getElementById("cantidadpares");
    canPares.innerHTML = cantidadPares; 


}
