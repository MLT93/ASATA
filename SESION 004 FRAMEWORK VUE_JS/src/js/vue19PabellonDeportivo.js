new Vue({
  el: "#vm",
  data: () => ({
    instalaciones: [
      {
        id: 1,
        nombre: "Instalación 1",
        reservada: false,
        usuarioReserva: "",
      },
      {
        id: 2,
        nombre: "Instalación 2",
        reservada: false,
        usuarioReserva: "",
      },
      {
        id: 3,
        nombre: "Instalación 3",
        reservada: false,
        usuarioReserva: "",
      },
      {
        id: 4,
        nombre: "Instalación 4",
        reservada: false,
        usuarioReserva: "",
      },
      {
        id: 5,
        nombre: "Instalación 5",
        reservada: false,
        usuarioReserva: "",
      },
      {
        id: 6,
        nombre: "Instalación 6",
        reservada: false,
        usuarioReserva: "",
      },
    ],
    incidencias: [],
    nuevaIncidencia: "",
  }),
  methods: {
    toggleReserva: function (arrayParam) {
      arrayParam.reservada = !arrayParam.reservada;
      console.log(this.instalaciones);
      console.log(`Reserva realizada ${arrayParam.usuarioReserva}!`);
    },
    agregarIncidencia() {
      if (this.nuevaIncidencia !== "") {
        this.incidencias.push(this.nuevaIncidencia);
        this.nuevaIncidencia = "";
      }
    },
    eliminarIncidencia(indexParam) {
      this.incidencias.splice(indexParam, 1);
    },
    /* Añadir input para indicar el usuario que reserva (el nombre) la instalación. ese campo hay que metérselo a "instalaciones" con el nombre "ususarioReserva" */
    validReservation(arr) {
      var isValid = arr.usuarioReserva.length >= 3;
      if (arr.reservada === true) {
        arr.usuarioReserva = "";
      }

      return isValid;

      /**
       * ??? Cómo hacer si deseo reemplazar el botón sin utilizar el `document.getElementById` para hacer aparece un botón de "cancelar reserva"
       */
    },
  },
  computed: {
    isLibre() {
      var longitudArray = this.instalaciones.filter((e) => !e.reservada).length;
      return longitudArray;
    },
  },
});
