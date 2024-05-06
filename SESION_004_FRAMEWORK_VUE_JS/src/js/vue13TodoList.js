var myApp = new Vue({
  el: "#vm",
  data: {
    nuevaTarea: "",
    listaTareas: [],
    visibilidad: "todas",
  },
  methods: {
    agregarTarea: function () {
      this.listaTareas.push({
        id: this.listaTareas.length + 1,
        descripcion: this.nuevaTarea,
        completada: false,
      });
      this.nuevaTarea = "";
      console.log(this.listaTareas);
    },
    setVisibilidad: function (estadoDeVisibilidad) {
      this.visibilidad = estadoDeVisibilidad;
    },
    /* Elegimos el `id` para el parámetro porque es único y referencia directamente el elemento para encontrarlo */
    toggleCompletada: function (idElementoLista) {
      var tarea = this.listaTareas.find((e) => e.id === idElementoLista);
      // valor final     // valor previo
      tarea.completada = !tarea.completada;
    },
  },
  computed: {
    tareasFiltradas() {
      if (this.visibilidad === "todas") {
        return this.listaTareas;
      } else if (this.visibilidad === "pendientes") {
        return this.listaTareas.filter(
          (e) => !e.completada
        );
      } else if (this.visibilidad === "completadas") {
        return this.listaTareas.filter(
          (e) => e.completada
        );
      }
    },
    numTareas() {
      var tareasTotales = this.listaTareas.length
      var tareasPendientes = this.listaTareas.filter((e) => !e.completada).length
      var tareasCompletadas = this.listaTareas.filter((e) => e.completada).length
      return {tareasTotales, tareasPendientes, tareasCompletadas};
    },
  },
});
