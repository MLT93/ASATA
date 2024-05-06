new Vue({

    el:"#vm",
    data:{

        instalaciones:[
            { id:1, nombre:"Piscina" , reservada:false, usuario:"" },
            { id:2, nombre:"Pista tenis 1" , reservada:false, usuario:"" },
            { id:3, nombre:"Pista tenis 2" , reservada:false, usuario:"" },
            { id:4, nombre:"Pista tenis 3" , reservada:false, usuario:"" },
            { id:5, nombre:"Frontón 1" , reservada:false, usuario:"" },
            { id:6, nombre:"Frontón 2" , reservada:false, usuario:"" }
        ],
        incidencias:[],
        nuevaIncidencia:""

    },
    methods:{

        toggleReserva(instalacion){
         if((instalacion.usuario.length > 3 && !instalacion.reservada) ||instalacion.reservada){

          instalacion.reservada = !instalacion.reservada;

          instalacion.usuario = instalacion.reservada ? instalacion.usuario  :"";
         }
         else{
          alert("INTRODUCE UN NOMBRE CON AL MENOS 4 CÁRACTERES");
         }

        },
        agregarIncidencia(){
            if(this.nuevaIncidencia != ""){
 
                this.incidencias.push(this.nuevaIncidencia);
                this.nuevaIncidencia ="";

            }
        },
        eliminarIncidencia(indice){
            this.incidencias.splice(indice,1);
        },
        textoSuficiente(index, long){
         return this.instalaciones[index].length >long;
     }
    },
    computed:{
        instalacionesLibres(){
            return this.instalaciones.filter( instalacion => !instalacion.reservada).length
        },
  

    }



})