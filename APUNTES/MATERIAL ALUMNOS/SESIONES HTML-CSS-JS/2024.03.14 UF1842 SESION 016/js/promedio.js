
var listaNumeros = [];


function insertarNumero(){

    let numero = parseInt(document.getElementById("numero").value);

    if( !isNaN(numero)){
        listaNumeros.push(numero); 
        mostrarLista();
    }


}

function promedio(){
    var suma = 0;
    for(var i=0; i<listaNumeros.length; i++){
        suma = suma + listaNumeros[i] 
    }

    var promedioSuma = suma / listaNumeros.length;
    mostrarPromedio(promedioSuma);

}


function mostrarLista(){

    var milista = document.getElementById("listanumeros");
    milista.textContent = listaNumeros.join(", ");

}



function mostrarPromedio(numero){
    // var miPromedio = document.getElementById("promedio");

    promedio.textContent = numero.toFixed(2);

}