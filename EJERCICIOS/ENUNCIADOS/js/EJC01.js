// Usa async aquí para permitir el uso de await dentro
document.addEventListener('DOMContentLoaded', async function () { 
 
 //url (endopint) de una API pública que me devuelve un JSON con 10 usuarios ficticios
 const apiUrl = 'https://jsonplaceholder.typicode.com/users';

 //definición de la función "fetchUsers" para obtener los usuarios que devuelve la API. Es una función asincrona, la veremos en clase, de momento usaadla para obtener los valores del JSON y trabajar con él, algo semejante a como lo hemos hecho cuando el JSON era un archivo en nuestro equipo.
 //Las FUNCIONES ASINCRONAS cons MUY UTILES e IMPORTANTES
 const fetchUsers = async () => {
     try {
         const response = await fetch(apiUrl);
         if (!response.ok) throw new Error('La red no funciona correctamente.');
         const users = await response.json();
         //obtengo por consola la info provenientte de la API en formato JSON
         console.log(users);
         return users; // Retorna los usuarios obtenidos de la promesa
     } catch (error) {
         console.error("Error: ", error);
         return []; // Retorna un array vacío en caso de error
     }
 };

 try {
     // Asignación de los datos obtenidos en la API en formato JSON a una variable
     // Al ser una función asincrona necesito invocarla con un await para que el script "espere" a recibir los datos. LO COMENTAREMOS EN CLASE
     const dataUsuariosEnJSON = await fetchUsers(); 
     // Para mostrar los usuarios de forma legible, convierte el objeto JSON a un string con formato
     const dataUsuariosEnString= JSON.stringify(dataUsuariosEnJSON, null, 2);

     const body = document.getElementById('cuerpo');
     //la etiqueta <pre></pre> representa texto preformateado. El texto en este elemento típicamente se muestra en una fuente fija, no proporcional, exactamente como es mostrado en el archivo. Es una etiqueta semantica.
     body.innerHTML = '<pre>' + dataUsuariosEnString + '</pre>';

 } catch (error) {
     console.error("Error mostrando usuarios: ", error);
 }
});


//La variable "dataUsuariosEnJSON" tiene todos los datos en formato JSON, es la varible más aconsejable para usar a la hora de trabajar con lso datos de la API

//La variable "dataUsuariosEnString" tiene los datos transformados en string pro el metodo JSON.stringify()