/* Esto se crea siempre antes de instanciar la aplicación Vue */
/* El nombre del componente `container`, debe escribirse en HTML */
/* `<slot></slot>` sirve solo para poder renderizar contenido dentro del componente. Si duplico este elemento, se duplica idénticamente el contenido que inserto en el HTML */
// Vue.component("container", {
//   template: `
//       <div class="my-container">
//           <slot>
//               
//           </slot>
//       </div>
//       `,
// }); /* Crea un componente que devuelve una etiqueta personalizada HTML */

var VERDADERO = true;
var FALSO = false;

var myApp = new Vue({
  el: "#vm" /* Es como el `querySelector()` para obtener el `id` de una etiqueta HTML */,
  data: () => ({
    mostrarMensaje: FALSO,
    saludito: "",
  }) /* Acá se pone lo que se renderiza */,
  methods: {
    method: function () {},
  } /* Estas son las funciones. Se utilizan normalmente */,
  computed: {
    compute: function () {},
  } /* Propiedad computada, no hace falta invocarla. Al ser una propiedad computada, realiza la invocación automáticamente */,
  watch: {
    saludito: function () {
      if (this.saludito === "HOLA") {
        console.log("OK. Has dicho 'HOLA' finalmente");
        this.mostrarMensaje = VERDADERO;
      } else {
        console.log("MAL. Hay que decir: 'HOLA'");
        this.mostrarMensaje = FALSO;
      }
    },
  } /* Es un listener para escuchar cambios (como un `useEffect()` en React.js). Observa cambios en propiedades específicas y ejecuta funciones cuando esas propiedades cambian */,
});
console.log(myApp);

new Vue({
  el: "#vm2" /* Es como el `querySelector()` para obtener el `id` de una etiqueta HTML */,
  data: () => ({
    estado: "completado",
  }) /* Acá se pone lo que se renderiza */,
  methods: {
    method: function () {},
  } /* Estas son las funciones. Se utilizan normalmente */,
  computed: {
    compute: function () {},
  } /* Propiedad computada, no hace falta invocarla. Al ser una propiedad computada, realiza la invocación automáticamente */,
  watch: {
    atributeOfData: function () {},
  } /* Es un listener para escuchar cambios (como un `useEffect()` en React.js). Observa cambios en propiedades específicas y ejecuta funciones cuando esas propiedades cambian */,
});

new Vue({
  el: "#vm3" /* Es como el `querySelector()` para obtener el `id` de una etiqueta HTML */,
  data: () => ({
    visible: VERDADERO,
  }) /* Acá se pone lo que se renderiza */,
  methods: {
    method: function () {},
  } /* Estas son las funciones. Se utilizan normalmente */,
  computed: {
    compute: function () {},
  } /* Propiedad computada, no hace falta invocarla. Al ser una propiedad computada, realiza la invocación automáticamente */,
  watch: {
    atributeOfData: function () {},
  } /* Es un listener para escuchar cambios (como un `useEffect()` en React.js). Observa cambios en propiedades específicas y ejecuta funciones cuando esas propiedades cambian */,
});

Vue.component("component-a", {
  template: `
    <div>Componente A</div>
  `,
});

Vue.component("component-b", {
  template: `
    <div>Componente B</div>
  `,
});

new Vue({
  el: "#vm4",
  data: () => ({
    mostrarA: true,
    mostrarB: true,
  }),
});

