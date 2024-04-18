new Vue({

    el:"#calificaciones",
    data:{
        alumnos:[]
    },
    methods:{
        procesadoJSON(evento){

            // recogemos la información del archivo cargado
            const archivo = evento.target.files[0];
            // console.log(evento);
            // console.log(archivo);

            //comprobamos que el archivo cargado es de tipo JSON
            if(archivo.type == "application/json" ){

                //creamos una instancia de FileReader y lo asociamos a reader
                //con esa variable y sus métodos asociados podré leer archivos
                const reader = new FileReader();

                //recojo la inoformación y la asocio a la variable de mi instancia de VUE alumnos
                reader.onload = (elemento) =>{
                    this.alumnos = JSON.parse(elemento.target.result);
                    // console.log(this.alumnos);
                }

                //leo el archivo
                reader.readAsText(archivo);
            }
        },

        promedio(notas){

            var sumaNotas = 0;
            for(var i=0; i<notas.length; i++){
                sumaNotas = sumaNotas + notas[i];
            }
            return (sumaNotas/ notas.length).toFixed(2);

        }

    }

})