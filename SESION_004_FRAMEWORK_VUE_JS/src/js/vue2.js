var myApp = new Vue({
  el: "#app" /* Es como el `querySelector()` para obtener el `id` de una etiqueta HTML */,
  data: () => ({
    message: "Presiona el botón...",
  }) /* Acá se pone lo que se renderiza */,
  methods: {
    changeMessage: function () {
      this.message = "Nuevo mensaje.";
    },
  } /* Estas son las funciones */,
});

console.log(myApp);
