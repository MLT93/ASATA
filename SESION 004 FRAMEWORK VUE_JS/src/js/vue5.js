var myApp = new Vue({
  el: "#app" /* Es como el `querySelector()` para obtener el `id` de una etiqueta HTML */,
  data: () => ({
    msg: `La página se cargó el: ${new Date().toLocaleString()}`,
  }) /* Acá se pone lo que se renderiza */,
  methods: { method: function () {} } /* Estas son las funciones */,
});

console.log(myApp);
