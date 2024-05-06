function hola(){

    setTimeout(animacionH,0);
    setTimeout(animacionO,1000);
    setTimeout(animacionL,2000);
    setTimeout(animacionA,3000);

    document.cookie = "valor=resultado";

    function animacionH(){
        var animacionH = document.getElementById("animarH");
        var posH = 150;
        var idH = setInterval(frameH,10);
        function frameH(){
            if(posH<30){
                clearInterval(idH);
            }
            else{
                posH--;
                animacionH.style.top = posH + "%";
            }
        }
    }

    function animacionO(){
        var animacionO = document.getElementById("animarO");
        var posO = 150;
        var idO = setInterval(frameO,10);
        function frameO(){
            if(posO<30){
                clearInterval(idO);
            }
            else{
                posO--;
                animacionO.style.top = posO + "%";
            }
        }

    }


    function animacionL(){
        var animacionL = document.getElementById("animarL");
        var posL = 150;
        var idL = setInterval(frameL,10);
        function frameL(){
            if(posL<30){
                clearInterval(idL);
            }
            else{
                posL--;
                animacionL.style.top = posL + "%";
            }
        }
        
    }



    function animacionA(){
        var animacionA = document.getElementById("animarA");
        var posA = 150;
        var idA = setInterval(frameA,10);
        function frameA(){

            if(posA<30){
                clearInterval(idA);
            }
            else{
                posA--;
                animacionA.style.top = posA + "%";
            }
        }
    }
}