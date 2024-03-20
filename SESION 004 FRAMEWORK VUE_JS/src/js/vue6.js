var myApp = new Vue({
  el: "#app" /* Es como el `querySelector()` para obtener el `id` de una etiqueta HTML */,
  data: () => ({
    msg: `Fijate en la consola de Dev Tools`,
  }) /* Acá se pone lo que se renderiza */,
  methods: {
    showMessage: function (msg) {
      console.log(msg);
    },
  } /* Estas son las funciones */,
});

console.log(myApp);
