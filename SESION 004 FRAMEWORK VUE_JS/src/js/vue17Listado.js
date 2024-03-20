new Vue({
  el: "#vm",
  data: () => ({
    items: [],
  }),
  methods: {
    readFile: function (event) {
      // Tomo el evento `$event` del HTML (la carga del archivo) para procesarla. Esto es estándard (se hace siempre)
      const file = event.target.files[0];
      // Me aseguro que el tipo de archivo sea de formato JSON
      if (file.type === "application/json") {
        // Instancio un nuevo lector de archivo
        const reader = new FileReader();
        // Leo el archivo y lo transformo en texto el archivo cargado
        reader.readAsText(file);
        // Cuando termine de ser leído, se dispara un trigger `onload()` para parsear la información para poderla utilizar, a través de otro evento
        reader.onload = (e) => {
          this.items = JSON.parse(e.target.result);
        };
      }
    },
    deleteItem: function (index) {
      this.items.splice(index, 1);
      console.log(this.items.length);
    },
  },
});
