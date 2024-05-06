var myApp = new Vue({
  el: "#vm" /* Es como el `querySelector()` para obtener el `id` de una etiqueta HTML */,
  data: () => ({
    msg: ``,
    viejoValor: `_`,
    nuevoValor: `_`,
  }) /* Acá se pone lo que se renderiza */,
  methods: {
    method: function () {},
  } /* Estas son las funciones. Se utilizan normalmente */,
  computed: {
    compute: function () {},
  } /* Propiedad computada, no hace falta invocarla. Al ser una propiedad computada, realiza la invocación automáticamente */,
  watch: {
    msg: function (newValue, oldValue) {
        this.viejoValor = oldValue;
        this.nuevoValor = newValue;
      console.log(`El mensaje ha cambiado de ${oldValue} a ${newValue}`);
    },
  } /* Es un listener para escuchar cambios (como un `useEffect()` en React.js). Observa cambios en propiedades específicas y ejecuta funciones cuando esas propiedades cambian */,
});

console.log(myApp);
