
// var VERDADERO = true;
// var FALSO     = false;

// new Vue({
    
//     el:"#vm",
//     data:{
//         mostrarMensaje: FALSO,
//         saludo: ""
//     },
    
//     watch:{
//         saludo: function(){
//             if(this.saludo == "hola"){
//                 console.log(`OK`);
//             }
//             else{
//                 console.log(`No me has dicho hola`);
//             }
            
//         }
//     }
    
// })


// new Vue({
//     el:"#vm2",
//     data:{
//         estado:"inicio" 
//     }
// })



// new Vue({

//     el:"#vm3",
//     data:{
//         visible: FALSO
//     }

// })



Vue.component("componente-a",{
    template: '<div> Componente A </div>'
})

Vue.component("componente-b",{
    template: '<div> Componente B </div>'
})

new Vue({
    el:"#vm4",
    data:{
        mostrarA: false
    }
})