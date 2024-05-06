function animacion(){

    //Hago get al elemento a animar
    var animar = document.getElementById("animar");

    var posicion = 0;

    var id = setInterval(frame,10);



    function frame(){

        if(posicion > 350){
            clearInterval(id);
        }
        else{
            posicion++;
            animar.style.top = posicion + "px";
            animar.style.left = posicion + "px";
        }


    }

}