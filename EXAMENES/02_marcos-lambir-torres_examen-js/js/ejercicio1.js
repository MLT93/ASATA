var todolist = new Vue({
  el: "#todolist",
  data: {
    nuevaTarea: "",
    listaTareas: [],
    visibilidad: "todas",
  },
  computed: {
    tareasFiltradas() {
      //INTRODUCIR EL CÓDIGO NECESARIO
      if (this.visibilidad === "todas") {
        return this.listaTareas;
      } else if (this.visibilidad === "pendientes") {
        return this.listaTareas.filter((e) => !e.completada);
      } else if (this.visibilidad === "completadas") {
        return this.listaTareas.filter((e) => e.completada);
      }
    },
    tareasPendientes() {
      //INTRODUCIR EL CÓDIGO NECESARIO
      var tareasPendientes = this.listaTareas.filter(
        (e) => !e.completada,
      ).length;
      return tareasPendientes;
    },
  },
  methods: {
    agregarTarea() {
      //INTRODUCIR EL CÓDIGO NECESARIO
      // Registra la fecha y hora actual
      this.listaTareas.push({
        id: this.listaTareas.length + 1,
        descripcion: this.nuevaTarea,
        completada: false,
        fechaRegistro: new Date().toLocaleString(),
        fechaCompletado: "",
      });
      this.nuevaTarea = "";
      console.log(this.listaTareas);
    },
    setVisibilidad(estadoVisibilidad) {
      //INTRODUCIR EL CÓDIGO NECESARIO
      this.visibilidad = estadoVisibilidad;
    },
    toggleCompletada(idElementoLista) {
      //INTRODUCIR EL CÓDIGO NECESARIO
      // Registra la fecha de completado
      // Reset de la fecha de completado si se desmarca
      var tarea = this.listaTareas.find((e) => e.id === idElementoLista);
      if (!tarea.completada) {
        tarea.fechaCompletado = new Date().toLocaleString();
      } else {
        tarea.fechaCompletado = "";
      }
      tarea.completada = !tarea.completada;
    },
  },
});
