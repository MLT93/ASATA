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
    moverFoto: function (index) {
      var movimientoUsuario = prompt(
        "¿Cuántas posiciones deseas mover la foto?"
      );

      var newPosition = index + movimientoUsuario;

      this.images.forEach((e) => splice(index, 1, newPosition));

      if (movimientoUsuario > this.images.length) {
        this.images.push(e);
      }
    },
  },
  computed: {},
});
