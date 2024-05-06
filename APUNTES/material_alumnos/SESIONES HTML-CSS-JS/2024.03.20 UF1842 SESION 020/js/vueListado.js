new Vue({


    el:"#listado",
    data: {

        items:[]
    },

    methods:{

        procesarArchivo(evento){
            const archivo = evento.target.files[0];
            
            if(archivo.type == "application/json"){

                
                const reader = new FileReader();
                reader.readAsText(archivo);
                
                //cuando termine de ser leido se dispara "onload"
                reader.onload = (event) =>{
                    this.items = JSON.parse(event.target.result);
                } 
            }

        },
        eliminarItem(index){
            this.items.splice(index,1);
            console.log(this.items);
        }
        
    }



})