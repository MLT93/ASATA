new Vue({

el:"#app",
data:{
    mensaje: 'Presiona el botón...'
},

methods:{
    cambiarMensaje: function(){
        this.mensaje = 'El nuevo mensaje.';
    }

}


})