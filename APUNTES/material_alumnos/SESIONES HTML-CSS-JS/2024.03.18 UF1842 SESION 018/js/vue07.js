new Vue({

    el:"#vm",
    data:{
        mensaje:""
    },
    computed:{

        // PonerEnMayusculas: function(){
        //     return this.mensaje.toUpperCase();
        // }


        EscribirInvertido: function(){
            // return this.mensaje.split("");
            // return this.mensaje.split("").reverse();
            return this.mensaje.split("").reverse().join("");

            
        }

    }


})