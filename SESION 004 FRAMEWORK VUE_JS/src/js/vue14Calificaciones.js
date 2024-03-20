new Vue({
  el: "#vm",
  data: () => ({
    alumnos: [],
  }),
  methods: {
    getAlumnsFromJSON: function (event) {
      /* Agarramos la información del archivo cargado a través de `@change=""` */
      console.log(event);
      const archivo = event.target.files[0];
      console.log(archivo);
      if (archivo.type === "application/json") {
        /* Cramos un a instancia de `Filereader` y lo guardamos en la variable `reader`. Con esta variable y los métodos asociados del constructor, podré leer archivos */
        const reader = new FileReader();
        console.log(reader);

        /* Leo el archivo */
        reader.readAsText(archivo);

        /* Tomo la información cuando se carga y se lee el archivo, y la asocio a la variable dentro de la instancia de Vue `alumnos` */
        reader.onload = (element) => {
          this.alumnos = JSON.parse(element.target.result);
          console.log(this.alumnos);
        };
      }
    },
    notaMedia: function (array) {
      // fuera de los bucles para que no se reinicie cada vez y parta de 0
      var acumulator = 0;
      for (let i = 0; i < array.length; i++) {
        const element = array[i];
        // nuevo valor // viejo valor
        acumulator += element;
      }
      const media = (acumulator / array.length).toFixed(2);
      console.log(`La media es: ${media}`);
      return media;
    },
    ordenaLasNotas: function () {
      const notas = this.alumnos.map((e) => e.notas);
      console.log(notas);
      for (const iterator of notas) {
        var ordered = iterator.sort();
        console.log(ordered);
      }
    },
    ordenaLasNotasMedias: function () {
      const notaMedia = this.alumnos.map((e) => {
        return this.notaMedia(e.notas);
      });
      var ordered = notaMedia.sort();
      console.log(ordered);
    },
  },
});
