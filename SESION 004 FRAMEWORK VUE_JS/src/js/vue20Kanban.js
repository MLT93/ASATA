new Vue({
  el: "#vm",
  data: () => ({
    bloques: [
      {
        id: 1,
        titulo: "Titulo 1",
        lineas: [],
        color: "#ffcccc",
        colorTexto: "#000",
      },
      {
        id: 2,
        titulo: "Titulo 2",
        lineas: [],
        color: "#ffcccc",
        colorTexto: "#000",
      },
      {
        id: 3,
        titulo: "Titulo 3",
        lineas: [],
        color: "#ffcccc",
        colorTexto: "#000",
      },
    ],
    nuevaLinea: [""],
    nuevoTitulo: "",
  }),
  methods: {
    colorAleatorio: function () {
      /* `Math.random()` crea un valor aleatorio con decimales desde 0 hasta 1 */
      /* Se redondea hacia abajo con `Math.floor()` y quitamos los decimales */
      /* Multiplicar por 256 los números aleatorios redondeados para obtener valores entre 0 y 255 (0 incluido y 256 excluso) */
      var R = Math.floor(Math.random() * 256);
      var G = Math.floor(Math.random() * 256);
      var B = Math.floor(Math.random() * 256);

      /* Transformo a `hexadecimal` */
      /* Asigno un `0` adelante porque en hexadecimal hacen falta 2 números por color */
      /* Utilizo `toString()` para parsear los valores a 16 caracteres */
      /* Uso el método para cadenas de texto `slice()` para eliminar lo sobrante desde un índice hasta otro. Asignando el `-` delante la lectura empieza de dcha a izq (al revés), y no de izq a dcha */
      var hexR = `0${R.toString(16)}`.slice(-2);
      var hexG = `0${G.toString(16)}`.slice(-2);
      var hexB = `0${B.toString(16)}`.slice(-2);

      /* Añado el `#` necesario para la escritura */
      var colorAleatorio = "#" + hexR + hexG + hexB;
      console.log(colorAleatorio);
      return colorAleatorio;
    },

    /**
     * !: Al agregar un nuevo bloque e intentar escribir una linea sin caracteres, me devuelve un error.
     * ToDo: Resolver el error de arriba.
     */

    agregarBloque: function () {
      var colorRandom = this.colorAleatorio();
      this.bloques.push({
        id: this.bloques.length + 1,
        titulo: this.nuevoTitulo,
        lineas: [],
        color: colorRandom,
        colorTexto: "#000",
      });
      this.nuevoTitulo = "";
      console.log(this.bloques);
    },
    insertarLinea: function (indexBloque) {
      if (this.nuevaLinea[indexBloque].trim() != "") {
        this.bloques[indexBloque].lineas.push(this.nuevaLinea[indexBloque]);
        this.nuevaLinea[indexBloque] = "";
      } else {
        alert(`Escribe algo primero`);
      }
    },
    eliminarBloque: function (index) {
      this.bloques.splice(index, 1);
    },
    borrarLinea: function (indexBloque, indexLinea) {
      this.bloques[indexBloque].lineas.splice(indexLinea, 1);
    },
  },
  computed: {},
});
