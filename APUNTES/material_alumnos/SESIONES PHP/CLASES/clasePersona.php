<?php

class Persona{

protected $nombre;
protected $apellido;
protected $fechaNacimiento;//timestamp
protected $estatura;//cm

function __construct($nombre,$apellido,$fechaNacimiento){
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->fechaNacimiento = $fechaNacimiento;  
}


// TODOS LOS SETTERS
public function setNombre($nombre){
    $this->nombre = $nombre;
}
public function setApellido($apellido){
    $this->apellido = $apellido;
}
public function setEstatura($estatura){
    $this->estatura = $estatura;
}
public function setFechaNacimiento($fechanacimiento){
    $this->fechaNacimiento = $fechanacimiento;
}


// TODOS LOS GETTERS

public function getNombre(){
    return $this->nombre;
}
public function getApellido(){
    return $this->apellido;
}
public function getEstatura(){
    return $this->estatura;
}
public function getFechaNacimiento(){
    $fnacimiento = date("d-m-Y", $this->fechaNacimiento);
    return $fnacimiento;
}

public function mostrarDatosPersonales(){

    $nacimiento = $this->fechaNacimiento; //timestamp de nacimiento segundos
    $ahora = strtotime("now"); // timestamp de ahora  en segundos
    $edad = $ahora - $nacimiento; //edad en segundos 
    $anios = floor ($edad / (60*60*24*365));

    echo "Los datos de la persona son Nombre: ".$this->nombre.", Apellido: ".$this->apellido." y tiene ".$anios; 
}


public function cumpleEstaturaMinima(){
    $estaturaMinima = 160;
    if(!empty($this->estatura)){
        if($this->estatura >= $estaturaMinima){
            echo "Cumple la estatura minima.";
            // return true;
        }else{
            echo "No cumples estatura minima.";
            // return false;
        }
    }else{
        echo "No hay ninguna estatura para este usuario.";
    }
}


}


class Ciudadano extends Persona{

    protected $tipoId;//dni, pasaporte, ..
    protected $identificador;//numero identificador
    protected $fechaExpiracionId;//TIMESTAMP
    protected $nacionalidad;
    protected $lugarResidencia;
    protected $estadoCivil;


    function __construct($tipoId,$identificador,$nacionalidad,$lugarResidencia,$estadoCivil,$nombre,$apellido,$fechaNacimiento){
        $this->tipoId = $tipoId;
        $this->identificador = $identificador;
        $this->nacionalidad = $nacionalidad;
        $this->lugarResidencia = $lugarResidencia;
        $this->estadoCivil = $estadoCivil;

        //utilizo el constructor del padre para dal valor a esas propiedades
        Persona::__construct($nombre,$apellido,$fechaNacimiento);
    }



    // TODOS LOS SETTERS
    public function setTipoId($tipoId){
        $this->tipoId = $tipoId;
    }
    public function setIdentificador($identificador){
        $this->identificador = $identificador;
    }
    public function setFechaExpiracionId($fechaExpiracionId){
        $this->fechaExpiracionId = $fechaExpiracionId;
    }
    public function setNacionalidad($nacionalidad){
        $this->nacionalidad = $nacionalidad;
    }
    public function setLugarResidencia($lugarResidencia){
        $this->lugarResidencia = $lugarResidencia;
    }
    public function setEstadoCivil($estadoCivil){
        $this->estadoCivil = $estadoCivil;
    }

// TODOS LOS GETTERS
    public function getTipoId(){
        return $this->tipoId;
    }
    public function getIdentificador(){
        return $this->identificador;
    }
    public function getFechaExpiracionId(){
        return $this->fechaExpiracionId;
    }
    public function getNacionalidad(){
        return $this->nacionalidad;
    }
    public function getLugarResidencia(){
        return $this->lugarResidencia;
    }

    public function getEstadoCivil(){
        return $this->estadoCivil;
    }

}

$ciudadano1 = new Ciudadano("Pasaporte","PP-333333","Francesa","Francia","Soltero","Pierre","Macrón",strtotime("13 June 1970"));

echo $ciudadano1->getEstadoCivil();echo "<br/>";
echo $ciudadano1->getFechaNacimiento();echo "<br/>";
echo $ciudadano1->mostrarDatosPersonales();echo "<br/>";
echo $ciudadano1->cumpleEstaturaMinima();echo "<br/>";
echo $ciudadano1->setEstatura(170);echo "<br/>";
echo $ciudadano1->cumpleEstaturaMinima();echo "<br/>";



class CiudadanoEuropeo extends Ciudadano{

    protected $tieneTSE;
    protected $TSENumero;
    protected $fechaExpiracionTSE;
    protected $tieneAntecedentes;
    protected $segundaNacionalidad;


    function __construct($tieneAntecedentes,$segundaNacionalidad,$tipoId,$identificador,$nacionalidad,$lugarResidencia,$estadoCivil,$nombre,$apellido,$fechaNacimiento){

        $this->tieneAntecedentes = $tieneAntecedentes;
        $this->segundaNacionalidad = $segundaNacionalidad;
        Ciudadano::__construct($tipoId,$identificador,$nacionalidad,$lugarResidencia,$estadoCivil,$nombre,$apellido,$fechaNacimiento);

    }

    //setters
    //getters
    public function getFechaExpiracionTSE(){
        return $this->fechaExpiracionTSE;
    }



    public function cambioResidencia($nuevaResidencia){
        $this->setLugarResidencia($nuevaResidencia);
    }
    
    public function documentoIdentificativoCaducado(){
        if(strtotime('now') >= $this->getFechaExpiracionId()){
            echo "El documento identificativo esta caducado.";
            return true;
        }else{
            echo "El documento identificativo esta en vigor.";
            return false;
        }
    }

    public function documentoTSEEnVigor(){
        if(strtotime('now') >= $this->getFechaExpiracionTSE()){
            echo "El documento TSE esta caducado.";
            return false;
        }else{
            echo "El documento TSE esta en vigor.";
            return true;
        }
    }

    


}




?>