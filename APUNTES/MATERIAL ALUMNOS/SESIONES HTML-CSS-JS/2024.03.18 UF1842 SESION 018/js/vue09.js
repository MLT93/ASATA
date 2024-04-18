new Vue({

    el:"#vm",
    data: {
        mensaje:"",
        nuevoValor:"",
        viejoValor:""

    },

    watch:{
        mensaje: function(nuevoValor, viejoValor){
            this.nuevoValor = nuevoValor;
            this.viejoValor = viejoValor;
            console.log(`el mensaje ha cambiado  de ${viejoValor} al ${nuevoValor}`);
        }
    }


})