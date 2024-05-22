<?php

namespace Database;

use mysqli;


class Db{

private string $host;
private string $user;
private string $accessKey;
private string $db;

private $connection;



public function  __construct( string $host="localhost", string $user="root", string $accessKey="", string $db="test"){

    $this->host = $host;
    $this->user = $user;
    $this->accessKey = $accessKey;
    $this->db = $db;

    //aqui tengo una variable $con que representa un objeto con las propiedades para conectarse a la BD
    $con = new mysqli($this->host, $this->user, $this->accessKey, $this->db);

    if($con->connect_errno){
        echo "Error de conexión";
    }
    else{
        // $con->query("SET NAMES 'utf-8'");
        $this->connection = $con;
    }
}




//getters y setters


protected function getHost(){
    return $this->host;
}

protected function getUser(){
    return $this->user;
}

protected function getAccessKey(){
    return $this->accessKey;
}

protected function getDb(){
    return $this->db;
}

protected function getConnection(){
    return $this->connection;
}


protected function setHost($host){
    $this->host = $host;
}

protected function setUser($user){
    $this->user = $user;
}

protected function setAccessKey($accessKey){
    $this->accessKey = $accessKey;
}

protected function setDb($db){
    $this->db = $db;
}

protected function setConnection($connection){
    $this->connection = $connection;
}


///métodos

//me devuelve la conexión a la BD
public function connect(){
    return $this->getConnection();
}

//haga consulta básica a la BD
public function myQuerySimple($sqlQuery, $associativeArray=true){
    $regs = array();//aqui guardaré todos los registros que obtenga de mi consulta
    if( $sqlQuery != ""){

        $response = $this->getConnection()->query($sqlQuery);//aqui es donde hace la consulta y devuelve la información
        
        if($associativeArray){
            $regs = $response->fetch_assoc();//devuelve la respuesta del query como un array asociativo
        }else{
            $regs = $response->fetch_row();
        }
        
    }
    return $regs;
}


//hago consulta multiple a la BD
public function myQueryMultiple($sqlQuery, $associativeArray = true){
    $regs = array();
    if($sqlQuery != ""){

        $response = $this->getConnection()->query($sqlQuery);

        if($associativeArray){
            while($row = $response->fetch_assoc()){
                array_push($regs,$row);
            }
        }
        else{
            while($row = $response->fetch_row()){
                array_push($regs,$row);
            }
        } 

    }

    return $regs;
}



//ejecutar sentencias SQL
public function execute($sqlQuery){
    if($sqlQuery != ""){
        $this->getConnection()->query($sqlQuery);
    }
}


public function close(){
    $this->getConnection()->close();
}


//insertar registros en una tabla
// Decido la tabla   $tableName
// Decido los campos de la tabla donde quiero registrar información    $campos
// Decido el numero de registros que quiero ingresar en una sentencia    $data

// INSERT INTO ingredientes (nombreIngrediente,stock,costeUnitario) VALUES
// ("pepinillos",100,0.5),
// ("cola",150,0.5);



public function insertMultipleRegisters(string $tableName, array $campos, array $data){

    //inicio la sentencia
    $sqlQuery = "INSERT INTO ".$tableName." (";


    //actualizo la sentencia añadiendo los campos de mi tabla de los que quiero pasar info
    $listaCampos = "";
    for($i=0; $i<count($campos); $i++){
        if($i<count($campos)-1 ){
            $listaCampos = $listaCampos.$campos[$i].", ";
        }else{
            $listaCampos = $listaCampos.$campos[$i];
        }
    }
    $sqlQuery = $sqlQuery.$listaCampos." ) VALUES ";



    //actualizo la sentencia para poner los registros que quiera ingresar
    $listaRegistros = "";
    
    for($i=0;$i<count($data);$i++){//recorre filas
        $listaRegistros = $listaRegistros."( ";


    if($i<count($data)-1){

        for($j=0;$j<count($data[$i]);$j++){ //recorre columnas dentro de una fila
            if($j<count($data[$i])-1){

                if(is_string($data[$i][$j])){
                    $listaRegistros = $listaRegistros."'".$data[$i][$j]."', ";
                }else{
                    $listaRegistros = $listaRegistros.$data[$i][$j].", ";
                }

            }else{
                if(is_string($data[$i][$j])){
                    $listaRegistros = $listaRegistros."'".$data[$i][$j]."'";
                }else{
                    $listaRegistros = $listaRegistros.$data[$i][$j];
                }
            }
        }
        $listaRegistros = $listaRegistros." ),";

    }else{

        for($j=0;$j<count($data[$i]);$j++){ //recorre columnas dentro de una fila
            if($j<count($data[$i])-1){
                if(is_string($data[$i][$j])){
                    $listaRegistros = $listaRegistros."'".$data[$i][$j]."', ";
                }else{
                    $listaRegistros = $listaRegistros.$data[$i][$j].", ";
                }

            }else{
                if(is_string($data[$i][$j])){
                    $listaRegistros = $listaRegistros."'".$data[$i][$j]."'";
                }else{
                    $listaRegistros = $listaRegistros.$data[$i][$j];
                }
            }
            
        }
        $listaRegistros = $listaRegistros." );";

    }

    }

    $sqlQuery = $sqlQuery.$listaRegistros;

    echo $sqlQuery;

    $this->execute($sqlQuery);
}



public function insertSingleRegister(string $tableName, array $campos, array $data){

    $sqlQuery = "INSERT INTO ".$tableName." (";

    $listaCampos = "";
    for($i=0;$i<count($campos);$i++){
        if($i<count($campos)-1){
            $listaCampos = $listaCampos.$campos[$i].", ";
        }else{
            $listaCampos = $listaCampos.$campos[$i].") VALUES ";
        }

    }
    $sqlQuery = $sqlQuery.$listaCampos;

    $listaDatos = "(";
    for($i=0;$i<count($data);$i++){

        if($i<count($data)-1){
            if(is_string($data[$i])){
                $listaDatos = $listaDatos."'".$data[$i]."', ";
            }else{
                $listaDatos = $listaDatos.$data[$i].", ";
            }
        }else{
            if(is_string($data[$i])){
                $listaDatos = $listaDatos."'".$data[$i]."'); ";
            }else{
                $listaDatos = $listaDatos.$data[$i]."); ";
            }

        }
    }
    
    $sqlQuery = $sqlQuery.$listaDatos;
    $this->execute($sqlQuery);

}


}



// $miconexion = new DB();
// $cnx = $miconexion->connect();//aqui es donde esta mi conexión a la BD;
// print_r ($miconexion->myQuerySimple("SELECT * FROM alumnos"));
// print_r ($miconexion->myQueryMultiple("SELECT * FROM alumnos", false));
// $miconexion->execute("ALTER TABLE alumnos DROP COLUMN edad;");
// $miconexion->close();
// print_r ($miconexion->myQueryMultiple("SELECT * FROM alumnos", false));


?>