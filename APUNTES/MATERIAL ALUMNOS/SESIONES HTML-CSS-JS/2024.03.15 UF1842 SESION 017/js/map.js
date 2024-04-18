const arrayInputs = [];


function anadir(){
    let input = document.getElementById("input").value;
    arrayInputs.push(input);
}


function lista(){
    var lista = document.getElementById("lista");
    lista.innerHTML = `${arrayTextos.join(", ")}`
}



function buscarSegundaLetraB(){

    var arrayFiltrado = arrayInputs.filter( element => element.substring(1,2) == "b"  );

    var miFiltro = document.getElementById("segundaletra");
    miFiltro.innerHTML = arrayFiltrado.join(", ");


}

