var myApp = new Vue({
  el: "#app" /* Es como el `querySelector()` para obtener el `id` de una etiqueta HTML */,
  data: () => ({
    message: "Hola Mundo!",
  }) /* Acá se pone lo que se renderiza */,
});

console.log(myApp);
