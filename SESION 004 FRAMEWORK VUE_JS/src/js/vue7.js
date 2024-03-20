var myApp = new Vue({
  el: "#vm" /* Es como el `querySelector()` para obtener el `id` de una etiqueta HTML */,
  data: () => ({
    msg: ``,
  }) /* Acá se pone lo que se renderiza */,
  methods: {
    invertirMensaje: function () {
      return this.msg.split("").reverse().join("");
    },
  } /* Estas son las funciones. Se utilizan normalmente */,
  computed: {
    ponerEnMayuscula: function () {
      return this.msg.toUpperCase();
    },
  } /* Propiedad computada, no hace falta invocarla. Al ser una propiedad computada, realiza la invocación automáticamente */,
});

console.log(myApp);
