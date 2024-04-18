const url= "https://en.wikipedia.org/w/api.php?action=query&prop=revisions&titles=Pet_door&rvprop=content&format=json";


async function fetchArticleContent(){

    try{

        
        const response = await fetch(url); //recibo info
        const data     = await response.json();//proceso los datos
        
        
        const pages = data.query.pages;
        const pageID = Object.keys(pages)[0]; //obtengo el ID de la página (dbería haber solo 1)
        
        const content = pages[pageID].revisions[0]['*'];
        console(content);
        
    }catch(error){
        console.error('Error al obtener el contenido', error );
    }



}


fetchArticleContent();


function factorial(n){
    var result = 1;
    for(i=1;i<=n;i++){
        result = result*i;
    }

    console.log(result);
    return result;
}


factorial(10);