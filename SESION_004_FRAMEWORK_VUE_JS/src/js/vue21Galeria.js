new Vue({
  el: "#vm",
  data: () => ({
    numImg: 21,
    dimImg: 120,
    images: [],
  }),
  methods: {
    generarGaleria: function () {
      /* https://picsum.photos/500/720.jpg?random=2 */
      for (let index = 0; index < this.numImg; index++) {
        var URL = `https://picsum.photos/${this.dimImg}/${
          this.dimImg
        }.jpg?random=${index + 1}`;
        this.images.push({
          src: URL,
        });
      }
      console.log(this.images);
    },
    borrarFoto: function (index) {
      if (confirm("¿Deseas borrar la foto?")) {
        return this.images.splice(index, 1);
      }
      console.log("Foto borrada");
    },
    /**
     * !: Al agregar el prompt la posibilidad de utilizar `borrarFoto` desaparece
     */
    moverFoto: function (index) {
      var movimientoUsuario = Number(
        prompt("¿Cuántas posiciones deseas mover la foto?")
      );

      if (isNaN(movimientoUsuario)) {
        alert("Introduce un valor correcto");
      }

      // La nueva posición corresponderá al valor introducido del usuario sumado al índice correspondiente al elemento antes de moverlo
      var newPosition = index + movimientoUsuario;

      // Evita que el nuevo índice tome posiciones negativas con respecto al array
      if (newPosition < 0) {
        newPosition = 0;
      }

      // Hago que el nuevo índice tome la última posición del array si el cliente introduce un valor superior a la longitud del array
      if (newPosition >= this.images.length) {
        newPosition = this.images.length - 1;
      }
      // Tomo el valor del elemento que deseo mover de su posición original
      const imgToMove = this.images.splice(index, 1)[0];
      // Añado el elemento en la nueva posición
      this.images.splice(newPosition, 0, imgToMove);
    },
  },
  computed: {},
});
