new Vue({

    el:"#vm",
    data:{

        productos:[
            {id:1, nombre: "Producto 1", precio: 9.99, divisa:"€", imagen:"https://via.placeholder.com/100/123"},
            {id:2, nombre: "Producto 1", precio: 19.99, divisa:"€", imagen:"https://via.placeholder.com/100/123"},
            {id:3, nombre: "Producto 1", precio: 3.99, divisa:"€", imagen:"https://via.placeholder.com/100/123"},
            {id:4, nombre: "Producto 1", precio: 5.99, divisa:"€", imagen:"https://via.placeholder.com/100/123"},
            {id:5, nombre: "Producto 1", precio: 0.99, divisa:"€", imagen:"https://via.placeholder.com/100/123"},
            {id:6, nombre: "Producto 1", precio: 23.99, divisa:"€", imagen:"https://via.placeholder.com/100/123"},
            {id:7, nombre: "Producto 1", precio: 55.99, divisa:"€", imagen:"https://via.placeholder.com/100/123"},
            {id:8, nombre: "Producto 1", precio: 66.99, divisa:"€", imagen:"https://via.placeholder.com/100/123"},
            {id:9, nombre: "Producto 1", precio: 109.99, divisa:"€", imagen:"https://via.placeholder.com/100/123"},
            {id:10, nombre: "Producto 1", precio: 999.99, divisa:"€", imagen:"https://via.placeholder.com/100/123"},
            {id:11, nombre: "Producto 1", precio: 0.59, divisa:"€", imagen:"https://via.placeholder.com/100/123"},
        ],
        carrito:[],



    },
    methods:{
        agregarProducto(producto){
            this.carrito.push(producto);
            console.log(this.carrito);
        }
    },
    computed:{
        totalCarrito(){

            var total = 0 ;
            for(var i=0; i<this.carrito.length; i++){
                total = total + this.carrito[i].precio;
            }
            return total.toFixed(2);


            // this.carrito.reduce((total, producto) => total + producto.precio , 0);
        }
    }


})