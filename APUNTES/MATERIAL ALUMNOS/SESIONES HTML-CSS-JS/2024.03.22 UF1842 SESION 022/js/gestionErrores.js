function validarFormulario(){

try{//aqui va el código siempre


    //RESETEAR EL FORMATO
    const inputs = document.querySelectorAll('input');
    inputs.forEach( input =>{
        input.style.borderColor="";
        input.style.backgroundColor="";
        }
    )


    //VALIDACION NOMBRE
    const nombre = document.getElementById("nombre");
    if(!nombre.value) throw { msj: "El nombre es obligatorio", elemento: nombre }

    //VALIDACION APELLIDO
    const apellido = document.getElementById("apellido");
    if(!apellido.value) throw { msj: "El apellido es obligatorio", elemento: apellido }

    //VALIDACION EMAIL
    const email = document.getElementById("email");
    if( !email.value.match(/^[\w-.]+@([\w-]+.)+[\w-]{2,4}$/)  ) throw { msj: "El correo electronico no tiene el formato adecuado.", elemento: email }

    //VALIDACION EDAD
    const edad = document.getElementById("edad");
    if(edad.value < 18 || edad.value > 100 || !edad.value  || isNaN(edad.value) )  throw{ msj: "Es obligatorio ser mayor de edad para registrarse y menor de 100", elemento:edad }

    //VALIDACION WEB
    const web =document.getElementById("paginaweb");
    if( !web.value || !web.value.match(/(?:https?):\/\/(\w+:?\w*)?(\S+)(:\d+)?(\/|\/([\w#!:.?+=&%!\-\/]))?/) ) throw{ msj:"La URL de la página no es correcta" , elemento: web}
   
    //VALIDACION CODIGO POSTAL
    const cpostal = document.getElementById("cpostal");
    if(!cpostal.value ||  isNaN(cpostal.value) ) throw { msj:"El código postal es obligatorio.", elemento: cpostal}

    //VALIDACIÓN CONTRASEÑA
    const contrasena = document.getElementById("contra");
    // La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.
    // NO puede tener otros símbolos.
    if( !contrasena.value || !contrasena.value.match( /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/ )) throw { msj:"la contraseña no es correcta", elemento: contrasena}

    alert("Formulario enviado con éxito.");
    document.getElementById("errores").innerHTML ="";

}catch(error){// si se produce un error entra por aqui el flujo dle código

    document.getElementById("errores").innerHTML = `<p> ${error.msj} </p>`

    error.elemento.style.borderColor = "red";
    error.elemento.style.backgroundColor = '#f8d7da';
    error.elemento.focus();

}



}