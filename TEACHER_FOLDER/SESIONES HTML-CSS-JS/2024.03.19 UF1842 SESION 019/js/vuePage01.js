var todolist = new Vue({

    el:"#todolist",
    data:{
        nuevaTarea:"",
        listaTareas:[],
        visibilidad:"todas"

    },

    computed:{
        tareasFiltradas(){
            if(this.visibilidad == "todas"){
                return this.listaTareas;
            }
            else if(this.visibilidad == "pendientes"){
                return this.listaTareas.filter( tarea => !tarea.completada);
            }
            else if(this.visibilidad == "completadas"){
                return this.listaTareas.filter( tarea => tarea.completada);
            }




            
        },
        tareasPendientes(){
            return this.listaTareas.filter( tarea => !tarea.completada ).length;
        }

    },
    methods:{
        agregarTarea(){
            this.listaTareas.push({
                id: this.listaTareas.length + 1,
                descripcion: this.nuevaTarea,
                completada: false
            })

            this.nuevaTarea = "";
            console.log(this.listaTareas);
        },

        setVisibilidad(estadoVisibilidad){
            this.visibilidad = estadoVisibilidad;
        },

        toggleCompletada(id){

            var tarea = this.listaTareas.find( tarea => tarea.id == id);
            tarea.completada = !tarea.completada;

        }
    }
    
    
    
})


