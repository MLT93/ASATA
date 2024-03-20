var myApp = new Vue({
  el: "#vm" /* Es como el `querySelector()` para obtener el `id` de una etiqueta HTML */,
  data: () => ({
    msg: ``,
    myBackground: "cyan",
    colorText: "blue",
  }) /* Acá se pone lo que se renderiza */,
  methods: {
    method: function () {},
  } /* Estas son las funciones. Se utilizan normalmente */,
  computed: {
    compute: function () {},
  } /* Propiedad computada, no hace falta invocarla. Al ser una propiedad computada, realiza la invocación automáticamente */,
});

console.log(myApp);
