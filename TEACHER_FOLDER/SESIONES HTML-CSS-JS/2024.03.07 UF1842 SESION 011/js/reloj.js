function reloj(){

    var hora = new Date();

    var h = hora.getHours();
    var m = hora.getMinutes();
    var s = hora.getSeconds();


    document.getElementById("reloj").innerHTML = h + ":" + m + ":" + s ;
    
    
    setTimeout( 'reloj()', 500 );

}


window.onload = function(){

    reloj();

}