new Vue({

    el:"#numero",
    data:{
        //Math.random()  genera un numero aleatorio entre 0 y 1
        numeroSecreto:  Math.floor(Math.random()*100) +1 ,
        numeroInput:"",
        mensaje:"",
        finalizado: false,
        nIntentos:0

    },
    methods:{

        comprobar(){
            // console.log(this.numeroInput);
            this.nIntentos++;
            if(this.numeroInput == this.numeroSecreto){
                this.mensaje = "Enhorabuena, has acertado el número. El número era el " + this.numeroSecreto;
                this.finalizado =true;
            }
            else if(this.numeroInput < this.numeroSecreto){
                this.mensaje = "Demasiado bajo tú número";
                console.log(this.numeroInput + " es demasiado bajo.");
            }
            else if(this.numeroInput > this.numeroSecreto){
                this.mensaje = "Demasiado alto tú número";
                console.log(this.numeroInput + " es demasiado alto.");
            }
        },

        resetJuego(){
            this.numeroSecreto =  Math.floor(Math.random()*100) +1 ;
            this.numeroInput = "";
            this.mensaje = "";
            this.finalizado = false;
            this.nIntentos = 0;
        }
    }
        
})