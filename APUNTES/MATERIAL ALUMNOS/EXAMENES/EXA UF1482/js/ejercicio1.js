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
      agregarTarea() {
       const fechaActual = new Date().toLocaleString(); // Registra la fecha y hora actual
       this.listaTareas.push({
           id: this.listaTareas.length + 1,
           descripcion: this.nuevaTarea,
           completada: false,
           fechaRegistro: fechaActual,
           fechaCompletado: null // Inicialmente, no está completada
       });
       this.nuevaTarea = "";
      },


     setVisibilidad(estadoVisibilidad){
         this.visibilidad = estadoVisibilidad;
     },
     toggleCompletada(id) {
      const tarea = this.listaTareas.find(tarea => tarea.id == id);
      tarea.completada = !tarea.completada;
      if (tarea.completada) {
          tarea.fechaCompletado = new Date().toLocaleString(); // Registra la fecha de completado
      } else {
          tarea.fechaCompletado = null; // Resetea la fecha de completado si se desmarca
      }
  }
 }
 
 
 
})


