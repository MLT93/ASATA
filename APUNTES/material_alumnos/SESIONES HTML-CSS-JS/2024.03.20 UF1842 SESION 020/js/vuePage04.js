new Vue({

    el:'#reviews',
    data:{
        form:{
            puntuacion:0,
            comentarios:""
        },
        mensajeSubmit:""

    },
    computed:{
        formularioValido(){
            // this.form.comentarios = this.form.comentarios.trim();
            return  this.form.puntuacion > 0  &&  this.form.comentarios.length >= 10;
        }

    },
    methods:{
        submitForm(){
            this.mensajeSubmit = ` Gracias por tu comentario. Puntuación ${this.form.puntuacion}   Comentario ${this.form.comentarios}`
        },


    }

})