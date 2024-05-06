/* Esto se crea siempre antes de instanciar la aplicación Vue */
/* El nombre del componente `container`, debe escribirse en HTML */
/* `<slot></slot>` sirve para poder renderizar el contenido del componente. Si duplico este elemento, se duplica idénticamente el contenido que inserto en el HTML */
Vue.component("container", {
  template: `
    <div class="my-container">
        <slot>
            
        </slot>
    </div>
    `,
}); /* Crea un componente que devuelve una etiqueta personalizada HTML */

var myApp = new Vue({
  el: "#vm" /* Es como el `querySelector()` para obtener el `id` de una etiqueta HTML */,
  data: () => ({
    msg: ``,
  }) /* Acá se pone lo que se renderiza */,
  methods: {
    method: function () {},
  } /* Estas son las funciones. Se utilizan normalmente */,
  computed: {
    compute: function () {},
  } /* Propiedad computada, no hace falta invocarla. Al ser una propiedad computada, realiza la invocación automáticamente */,
  watch: {
    atributeOfData: function (newValue, oldValue) {},
  } /* Es un listener para escuchar cambios (como un `useEffect()` en React.js). Observa cambios en propiedades específicas y ejecuta funciones cuando esas propiedades cambian */,
});

console.log(myApp);
