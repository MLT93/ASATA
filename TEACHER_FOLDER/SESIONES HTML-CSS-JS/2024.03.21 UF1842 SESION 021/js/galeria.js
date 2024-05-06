new Vue({
 el: '#app',
 data: {
     imagenes: [ ],
     numeroImagenes: 100,
     dimImagenes: 100
 },
 methods: {
     hoverImagen(index, estado) {
         this.imagenes[index].hover = estado;
     },
     confirmarEliminacion(index) {
         if (confirm('¿Deseas eliminar esta imagen?')) {
             this.imagenes.splice(index, 1);
         }
     },
     crearGaleriaAleatoria(numero){
      var lenini  =this.imagenes.length;
      for(var i= lenini; i<( parseInt(lenini) + parseInt(numero)); i++){
         this.imagenes.push({ src: 'https://picsum.photos/'+this.dimImagenes+'?random='+ (i+1), hover: false });
        }
        console.log(this.imagenes);
     },
     desplazarImagenes(index){
        let desplazamiento = prompt("¿Cuantas posiciones quieres desplazar la imagen?");

        desplazamiento = parseInt(desplazamiento);

        if (isNaN(desplazamiento)){  //isNaN --> isNotaNumber
            alert("Introduce un valor correcto.");
            return
        }

        let nuevaPosicion = index + desplazamiento;

        //evitar que el indice toeme valores negativos si le resto más posiciones de las disponibles a la izquierda
        if(nuevaPosicion < 0){ 
            nuevaPosicion = 0;
        }else if( nuevaPosicion >= this.imagenes.length ){
            nuevaPosicion = this.imagenes.length -1;
        }
        //cojo el elemento de su posición original
        const imagenAMover = this.imagenes.splice(index,1)[0];
        //lo pongo en la posicion destino
        this.imagenes.splice(nuevaPosicion, 0, imagenAMover );

     }


 },
 computed:{
  


 }
});