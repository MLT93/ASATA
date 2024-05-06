<?php
include("../FUNCIONES/tablas.php");
include("../FUNCIONES/apis.php");

// tabla(10,6);


$titulos = array(
    "id",
    "nombre",
    "apellido 1",
    "apellido 2",
    "pais",
    "edad"
);

// tablaConTitulos($titulos, 20);


// $data = [
// ["1", "pedro", "martinez", "lopez", "peru", 22],
// ["2", "ana", "perez", "lopez", "argentina", 32],
// ["3", "maria", "martin", "lopez", "mexico", 42],
// ["4", "lucia", "martinez", "del nido", "españa", 36],

// ];

// tablaConDatos($titulos, $data);


$url = "https://www.freetogame.com/api/games?platform=pc";
$games = GET($url);
$data = [];

for($i=0; $i<count($games); $i++ ){
    array_push($data, 
    [
        $games[$i]["id"],
        $games[$i]["title"],
        $games[$i]["thumbnail"],
        $games[$i]["short_description"],
        $games[$i]["game_url"],
        $games[$i]["genre"],
        $games[$i]["platform"],
        $games[$i]["publisher"],
        $games[$i]["developer"],
        $games[$i]["release_date"],
        $games[$i]["freetogame_profile_url"]
    ]
    );
}

$titulos = array_keys($games[0]);


function compararPrimerIndice($a,$b){
        if($a[0] == $b[0]){ return 0;  }
    elseif($a[0] >  $b[0]){ return 1;  }
    elseif($a[0] <  $b[0]){ return -1; }
}

function compararSegundoIndice($a,$b){
    if ($a[1] == $b[1]){
        return 0;
    }
    elseif($a[1] > $b[1]){
        return 1;
    }
    elseif($a[1] < $b[1]){
        return -1;
    }
}


//ordeno data de acuerdo a como le indique en mi funcion 
// "compararSegundoIndice";
usort($data, "compararPrimerIndice");
tablaConDatos($titulos,$data);










// 140	Government	Dawum	German election polls	https://api.dawum.de/
$url2 = "https://api.dawum.de/";
$datosRaw =  GET($url2);


//TABLA PARLIAMENTS
$parliaments = $datosRaw['Parliaments'];
$dataParliaments = [];
for($i=0; $i<count($parliaments); $i++ ){
    array_push($dataParliaments,
    [
        $parliaments[$i]["Shortcut"],
        $parliaments[$i]["Name"],
        $parliaments[$i]["Election"]
    ]
);
}
$titulosParliaments = array_keys($parliaments[0]);
// tablaConDatos($titulosParliaments,$dataParliaments);



//TABLA PARTIES
$parties = $datosRaw['Parties'];
$dataParties = [];
for($i=0;$i<count($parties);$i++){

    if(isset($parties[$i])){

        array_push($dataParties,
        [
            $parties[$i]["Shortcut"],
            $parties[$i]["Name"],
            ]
        );
    }
};
$titulosParties = array_keys($parties[0]);
// tablaConDatos($titulosParties,$dataParties);



//TABLA SURVEYS
$surveys = $datosRaw['Surveys'];
$dataSurveys = [];

foreach ($surveys as $clave => $valor){

    $results = $surveys[$clave]["Results"];
    $resultsString = implode(", ", $results);
    
    array_push($dataSurveys,
        [
            $surveys[$clave]["Date"],
            $surveys[$clave]["Survey_Period"]["Date_Start"],
            $surveys[$clave]["Survey_Period"]["Date_End"],
            $surveys[$clave]["Surveyed_Persons"],
            $surveys[$clave]["Parliament_ID"],
            $surveys[$clave]["Institute_ID"],
            $surveys[$clave]["Tasker_ID"],
            $surveys[$clave]["Method_ID"],
            $resultsString
        ]
    );
}

$titulosSurveys = array_keys($surveys[365]);
// print_r($titulosSurveys);

$titulosSurveys = ["Date", "Date_Start","Date_End", "Surveyed_Persons", "Parliament_ID", "Institute_ID","Tasker_ID","Method_ID","Results"];

// tablaConDatos($titulosSurveys,$dataSurveys);



?>