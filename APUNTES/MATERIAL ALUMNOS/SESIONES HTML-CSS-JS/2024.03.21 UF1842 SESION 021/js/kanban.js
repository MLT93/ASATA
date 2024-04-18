new Vue({

    el:"#vm",
    data:{
        bloques:[
            {id:1, titulo:"Titulo 1", lineas:[], color: "#ffcccc", tcolor:"#000" },
            {id:2, titulo:"Titulo 2", lineas:[], color: "#ffcccc", tcolor:"#000" },
            {id:3, titulo:"Titulo 3", lineas:[], color: "#ffcccc", tcolor:"#000" },
        ],
        nuevaLinea:[""],
        nuevoTitulo:""
    },
    computed:{

    },

    methods:{

        agregarBloque(){
            var nuevoColor= this.randomColor();
            this.bloques.push({id:this.bloques.length +1, titulo:this.nuevoTitulo, lineas:[], color: nuevoColor, tcolor:"#000" });
            this.nuevoTitulo = "";
            console.log(this.nuevaLinea);
            this.nuevaLinea = [""];
            console.log(this.nuevaLinea);
            console.log(this.bloques);
        },

        randomColor(){
            // Math.random()  me devuelv eun valor entre 0 y 1
           var r = Math.floor(Math.random()*255); // Esto me devolvera un numero decimal entre 0 y 255
           var g = Math.floor(Math.random()*255); // Esto me devolvera un numero decimal entre 0 y 255
           var b = Math.floor(Math.random()*255); // Esto me devolvera un numero decimal entre 0 y 255

           var hexar = ("0" + r.toString(16)).slice(-2); // Esta linea me devuelve siempre dos cáracteres
           var hexag = ("0" + g.toString(16)).slice(-2); // Esta linea me devuelve siempre dos cáracteres
           var hexab = ("0" + b.toString(16)).slice(-2); // Esta linea me devuelve siempre dos cáracteres

           var color = "#" + hexar + hexag + hexab ;
           console.log(color);
           return color;

        },

        eliminarBloque(index){
            this.bloques.splice(index,1);


        },
        insertarLinea(indexBloque){
            if(this.nuevaLinea[indexBloque].trim() != ""){
                this.bloques[indexBloque].lineas.push(this.nuevaLinea[indexBloque]);
                this.nuevaLinea[indexBloque]="";
            }else{
                alert("Escribe algo primero.");
            }

        },
        eliminarLinea(indexBloque,indexLinea){
            this.bloques[indexBloque].lineas.splice(indexLinea,1);
        }

    }




})