

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
    textoBuscado = textoBuscado.toLowerCase(); //PASO A MINUSCULA
    textoBuscado = textoBuscado.substring(0,1).toUpperCase() +textoBuscado.substring(1); //PONGO EN MAYUSCULA LA PRIMERA LETRA
    var indiceTextoBuscado = arrayTextos.indexOf(textoBuscado);
    var miIndice = document.getElementById("indice");
    miIndice.innerHTML = indiceTextoBuscado;
}

function encuentraUltimo(){
    var textoBuscado = document.getElementById("textobuscoult").value;
    textoBuscado = textoBuscado.toLowerCase(); //PASO A MINUSCULA
    textoBuscado = textoBuscado.substring(0,1).toUpperCase() +textoBuscado.substring(1); //PONGO EN MAYUSCULA LA PRIMERA LETRA
    var indiceTextoBuscado = arrayTextos.lastIndexOf(textoBuscado);
    var miIndice = document.getElementById("indiceult");
    miIndice.innerHTML = indiceTextoBuscado;
}


function encontrar(){
    var cadenaTexto = document.getElementById("encontrar").value;
    var cadena = arrayTextos.find(  (element) => element.includes(cadenaTexto) );
    var miCadena = document.getElementById("textoencontrado");
    miCadena.innerHTML = cadena;
}


function concatenar(){///REVISAR POR toString()
    var textoConcatenado = arrayTextos.concat();
    var listaConcatenada = document.getElementById("listaconcatenada");
    listaConcatenada.innerHTML = textoConcatenado;
}



function invertir(){//MODIFICA
    var arrayInvertido = arrayTextos;
    var textoInvertido = arrayInvertido.reverse();
    var listaInvertida = document.getElementById("listainvertida");
    listaInvertida.innerHTML = textoInvertido; 

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


function pordos(){

    const arrayDobles = arrayNumeros.map( numero => numero*2 );
    var miNuevoArray = document.getElementById("pordos");
    miNuevoArray.innerHTML = arrayDobles.join(", ");
}


function parimpar(){
    const arrayPares = arrayNumeros.map ( numero => (numero%2 == 0) ? "par" : "impar" );
    var miArray = document.getElementById("parimpar");
    miArray.innerHTML = arrayPares.join(", ");

}

function filtrar(){
    var arrayFiltrado = arrayNumeros;

    arrayFiltrado = arrayFiltrado.filter( element => element > 4 );
    var arrayF = document.getElementById("filtro");
    arrayF.innerHTML = arrayFiltrado.join(", ");


}

