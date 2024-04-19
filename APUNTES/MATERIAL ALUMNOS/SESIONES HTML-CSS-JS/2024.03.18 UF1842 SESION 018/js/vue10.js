
// Me crea un componente ("etiqueta personalizada de HTML") 
Vue.component('contenedor',{
    template: `<div class="contenedor"> <p> <slot></slot> </p> </div> `
})


new Vue({

    el:"#vm",

})


new Vue({

    el:"#vm2",

})
