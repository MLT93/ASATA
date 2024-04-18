function fade(){

    const  element = document.getElementById("fade");
    element.classList.add("fade-out");

}

function resetAnimacion(){
    const boxes=document.querySelectorAll(".box");

    boxes.forEach(box =>{
        box.className ="box";
    })
}


function zoom(){
    const element = document.getElementById("zoom");
    element.classList.add("zoom-in");
}

function swing(){
    const element = document.getElementById("swing");
    element.classList.add("swing");
}

function giroAumento(){
    const element = document.getElementById("giro");
    element.classList.add("giro");
}


//DIBUJAR EN EL CANVAS

//obtengo el elemento lienzo del DOM
const lienzo = document.getElementById("lienzo");

//aqui le doy contexto al lienzo
const ctx = lienzo.getContext("2d");

// //Dibujar un circulo
// ctx.beginPath();//comienzo a dibujar
// ctx.arc (200, 100, 50, 0, Math.PI, true);
// ctx.fillStyle="red";
// ctx.fill();

// // ctx.beginPath();//comienzo a dibujar
// //Dibujar una rectangulos
// ctx.fillStyle="rgba(0,255,0, 0.5)";
// ctx.fillRect(150, 75, 100, 50);


// //Dibujar elipse
// ctx.beginPath();
// ctx.fillStyle="rgba(200,0,0, 0.2)";
// ctx.ellipse(100,100, 100, 50, 0, Math.PI/2, 3*Math.PI/2);
// ctx.fill();


//Dibujar rectangulo redondeado
ctx.strokeStyle = "red";
ctx.beginPath();
ctx.roundRect(10, 20, 150, 100, [10,20,0,50]);
ctx.stroke();

//roundRect(x, y, width, height, radii)


// [top-left, top-right, bottom-right, bottom-left]