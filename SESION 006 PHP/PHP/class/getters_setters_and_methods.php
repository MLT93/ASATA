<?php

// ? `GETTERS` AND `SETTERS` 
//
class Person
{
  // Variables o `propiedades` de la class. Normalmente son siempre `protected` o `private`
  protected $name;
  protected $lastName;
  protected $tall; // Supongamos que deseamos la estatura estará en cm
  protected $birthday;  // Supongamos que deseamos la fecha de nacimiento la conseguimos en timestamp

  // Método constructor. Es siempre público y se ejecuta inmediatamente al instanciar. Debemos pasarle unos valores al crear una instancia (obj) o ponérselos por defecto a los parámetros, así cuando creamos la instancia (obj) recibe esos valores
  // Nos facilita la vida al crear una nueva instancia (obj) sin acceder a cada método individualmente, proporcionando la información necesaria para que esa instancia (obj) exista
  // Cada constructor es único para cada clase, si hay un `extends` lo hereda, pero si creas uno en el nuevo instancia (obj), lo sobrescribe
  function __construct($nombre, $apellido, $estatura, $fechaNacimiento)
  {
    $this->name = $nombre;
    $this->lastName = $apellido;
    $this->tall = $estatura; // centímetros
    $this->birthday = strtotime($fechaNacimiento); // timestamp
  }

  // `MÉTODOS` de la class, `GETTERS` (devuelve la información) y `SETTERS` (transforma la información)
  public function setName($newName)
  {
    $this->name = $newName;
  }

  public function setLastName($newLastName)
  {
    $this->lastName = $newLastName;
  }

  public function setTall($newTall)
  {
    $this->tall = $newTall;
  }

  public function setTimeStampBirthday($newBirthday)
  {
    $this->birthday = strtotime($newBirthday);
  }

  public function getName()
  {
    return $this->name;
  }

  public function getLastName()
  {
    return $this->lastName;
  }

  public function getTall()
  {
    echo $this->tall . "cm";
  }

  public function getBirthday()
  {
    $bornTimeStamp = $this->birthday; // timestamp de nacimiento
    $currentTimeStamp = strtotime("now"); // timestamp actual
    $age = $currentTimeStamp - $bornTimeStamp;
    $formattedBirthday = date("d-m-y", intval($age));
    return $formattedBirthday;
  }

  function showPersonalData()
  {
    $born = $this->birthday; // Timestamp de nacimiento
    $currentTimeStamp = strtotime("now"); // Timestamp actual
    $age = $currentTimeStamp - $born; // Edad en segundos (porque restamos los timestamp)
    $years = floor($age / (60 * 60 * 24 * 365)); // De segundos a años

    echo "Los datos de la persona son:" . "<br/>";
    echo "Nombre: " . $this->name . "<br/>";
    echo "Apellido: " . $this->lastName . "<br/>";
    echo "Años: $years" . "<br/>";
    echo "Estatura: " . $this->tall . "cm" . "<br/>";
  }

  function isCorrectTall()
  {
    $minTall = 165;

    if (!empty($this->tall)) {

      if ($this->tall < $minTall) {
        echo "No cumple la estatura mínima" . "<br/>";
        /* return false; */
      } else {
        echo "Cumple estatura mínima" . "<br/>";
        /* return true; */
      }
    } else {
      echo "No hay estatura para este usuario";
    }
  }
}


class Ciudadano extends Person
{
  protected $nationality;
  protected $typeID; // Passport, DNI, ecc..
  protected $numID; // Number of typeID
  protected $expirationDateID; // Timestamp de la fecha
  protected $residence;
  protected $married;
  protected $age;

  // Método constructor. Es siempre público y se ejecuta inmediatamente al instanciar. Debemos pasarle unos valores al crear una instancia (obj) o ponérselos por defecto a los parámetros, así cuando creamos la instancia (obj) recibe esos valores
  // Nos facilita la vida al crear una nueva instancia (obj) sin acceder a cada método individualmente, proporcionando la información necesaria para que esa instancia (obj) exista
  // Cada constructor es único para cada clase, si hay un `extends` lo hereda, pero si creas uno en el nuevo instancia (obj), lo sobrescribe
  function __construct($nacionalidad, $tipoId, $numeroId, $residencia, $estadoCivil, $nombre, $apellido, $estatura, $fechaNacimiento)
  {
    $this->nationality = $nacionalidad;
    $this->typeID = $tipoId;
    $this->numID = $numeroId;
    $this->residence = $residencia;
    $this->married = $estadoCivil;

    // ? `NAME_FATHER_CLASS::__CONSTRUCT()` LLAMA AL CONSTRUCTOR PADRE PARA FUSIONAR LOS DOS CONSTRUCTORES Y OBTENER LA INFORMACIÓN DE UNO Y EL
    // `Person::__construct()` nos ayuda a utilizar el constructor de la class padre dentro del constructor de la class hija
    Person::__construct($nombre, $apellido, $estatura, $fechaNacimiento);
  }

  // `MÉTODOS` de la class, `GETTERS` (devuelve la información) y `SETTERS` (transforma la información)
  public function setNationality($newNationality)
  {
    $this->nationality = $newNationality;
  }

  public function setTypeID($newTypeID)
  {
    $this->typeID = $newTypeID;
  }

  public function setNumID($newNumID)
  {
    $this->numID = $newNumID;
  }

  public function setExpirationDateID($newExpirationDateID)
  {
    $this->expirationDateID = $newExpirationDateID;
  }

  public function setResidence($newResidence)
  {
    $this->residence = $newResidence;
  }

  public function setMarried($newMarried)
  {
    $this->married = $newMarried;
  }


  public function getNationality()
  {
    return $this->nationality;
  }

  public function getTypeID()
  {
    return $this->typeID;
  }

  public function getNumID()
  {
    return $this->numID;
  }

  public function getExpirationDateID()
  {
    return $this->expirationDateID;
  }

  public function getResidence()
  {
    return $this->residence;
  }

  public function getMarried()
  {
    return $this->married;
  }
}


$ciudadano1 = new Ciudadano(
  "Argentina",
  "Pasaporte",
  "33333XP",
  "Av Croissant 18, France",
  "None",
  "Pierre",
  "Bernard",
  173,
  "31 July 1987"
);

$ciudadano1->getMarried();
$ciudadano1->getBirthday();
$ciudadano1->showPersonalData();
$ciudadano1->isCorrectTall();
$ciudadano1->setTall(164);
$ciudadano1->getTall();
$ciudadano1->isCorrectTall();

class CiudadanoEuropeo extends Ciudadano
{
  protected $tieneTSE;
  protected $TSENum;
  protected $fechaExpirationTSE;
  protected $antecedentesPoliciales;
  protected $segundaNacionalidad;

  // Método constructor. Es siempre público y se ejecuta inmediatamente al instanciar. Debemos pasarle unos valores al crear una instancia (obj) o ponérselos por defecto a los parámetros, así cuando creamos la instancia (obj) recibe esos valores
  // Nos facilita la vida al crear una nueva instancia (obj) sin acceder a cada método individualmente, proporcionando la información necesaria para que esa instancia (obj) exista
  // Cada constructor es único para cada clase, si hay un `extends` lo hereda, pero si creas uno en el nuevo instancia (obj), lo sobrescribe
  function __construct($antecedentesPoliciales, $segundaNacionalidad, $nacionalidad, $tipoId, $numeroId, $residencia, $estadoCivil, $nombre, $apellido, $estatura, $fechaNacimiento)
  {
    $this->antecedentesPoliciales = $antecedentesPoliciales;
    $this->segundaNacionalidad = $segundaNacionalidad;

    // ? `NAME_FATHER_CLASS::__CONSTRUCT()` LLAMA AL CONSTRUCTOR PADRE PARA FUSIONAR LOS DOS CONSTRUCTORES Y OBTENER LA INFORMACIÓN DE UNO Y EL
    // `Ciudadano::__construct()` nos ayuda a utilizar el constructor de la class padre dentro del constructor de la class hija
    Ciudadano::__construct($nacionalidad, $tipoId, $numeroId, $residencia, $estadoCivil, $nombre, $apellido, $estatura, $fechaNacimiento);
  }

  // `MÉTODOS` de la class, `GETTERS` (devuelve la información) y `SETTERS` (transforma la información)
  function getFechaExpirationTSE()
  {
    return $this->fechaExpirationTSE;
  }

  public function cambioDeResidencia($newResidencia)
  {
    $this->setResidence($newResidencia);
  }

  public function isDocumentoIdentificativoCaducado()
  {
    if (strtotime("now") >= $this->getExpirationDateID()) {
      echo "El documento identificativo está caducado";
      return true;
    } else {
      echo "El documento identificativo está en vigor";
      return false;
    }
  }

  public function isDocumentoTSEEnVigor()
  {
    if (strtotime("now") >= $this->getExpirationDateID()) {
      echo "El documento TSE está caducado";
      return false;
    } else {
      echo "El documento TSE está en vigor";
      return true;
    }
  }
}

class User extends Person
{
  //propiedades
  private $registrado;
  protected $email;
  protected $nickname;
  private $password;
  private $fechaDeRegistro; // Timestamp
  private $role;

  //constructor
  function __construct($registrado = false, $email, $nickname, $password, $role = "user", $nombre, $apellido, $estatura, $fechaNacimiento)
  {
    $this->registrado = $registrado;
    $this->email = $email;
    $this->nickname = $nickname;
    $this->password = $password;
    $this->role = $role;

    // ? `NAME_FATHER_CLASS::__CONSTRUCT()` LLAMA AL CONSTRUCTOR PADRE PARA FUSIONAR LOS DOS CONSTRUCTORES Y OBTENER LA INFORMACIÓN DE UNO Y EL
    // `Person::__construct()` nos ayuda a utilizar el constructor de la class padre dentro del constructor de la class hija
    Person::__construct($nombre, $apellido, $estatura, $fechaNacimiento);
  }

  //setters
  private function setRegistrado($registrado)
  {
    $this->registrado = $registrado;
  }
  public function setEmail($email)
  {
    $this->email = $email;
  }
  public function setNickname($nickname)
  {
    $this->nickname = $nickname;
  }
  public function setPassword($password)
  {
    $this->password = $password;
  }
  private function setFechaDeRegistro($fechaDeRegistro)
  {
    $this->fechaDeRegistro = strtotime($fechaDeRegistro);
  }
  public function setRole($role)
  {
    $this->role = $role;
  }

  //getters
  public function getRegistrado()
  {
    return $this->registrado;
  }
  public function getEmail()
  {
    return $this->email;
  }
  public function getNickname()
  {
    return $this->nickname;
  }
  private function getPassword()
  {
    return $this->password;
  }
  public function getFechaDeRegistro()
  {
    return $this->fechaDeRegistro;
  }

  //métodos
  public function esMayorEdad()
  {
    $born = $this->birthday; // Timestamp de nacimiento
    $currentTimeStamp = strtotime("now"); // Timestamp actual
    $age = $currentTimeStamp - $born; // Edad en segundos (porque restamos los timestamp)
    $years = floor($age / (60 * 60 * 24 * 365)); // De segundos a años

    if ($years < 18) {
      echo "El usuario es menor de edad";
      return false;
    } else {
      echo "El usuario es mayor de edad";
      return true;
    }
  }
  public function estaRegistrado()
  {
    // Para comprobar la email hay que verificar que el buzón exista a través del DNS, o aplicar un "filter_var()"
    if (!empty($this->email) && filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      echo "El usuario se ha registrado";

      $this->setRegistrado(true);
      // Y emito fecha de registro con el timestamp de ese momento
      $this->setFechaDeRegistro("now");
    }
  }
  protected function esAdmin()
  {
    if ($this->role == "user") {
      echo "No es admin";
    } else {
      $this->setRole("admin");
    }
  }
  protected function registrar()
  {
    /* ??? */
    // No me hace falta registrar porque cuando creo la instancia, el usuario ya se ha registrado
    // No hay sesiones de "invitado"
  }
  protected function comprobarPassword($inputPassword)
  {
    $index = 0;
    while ($index <= 3) {
      // comprobar que la password sea igual a la que tengo guardada
      if ($this->getPassword() !== $inputPassword) {
        echo "501 - Error";
        $index++;
        return false;
      } elseif ($index > 3) {
        echo "Su cuenta se ha bloqueado temporalmente";
        // Esto se utiliza acá para realizar el ejercicio pero la actualización de la password iría de otra forma
        $this->actualizarPassword($inputPassword);
      } else {
        echo "Password Correcta";
        // Creamos código para el acceso al dashboard del usuario en la página
        return true;
      }
    }
  }
  private function actualizarPassword($inputPassword)
  {
    if (!empty($this->email) && filter_var($this->email, FILTER_VALIDATE_EMAIL) && $this->getPassword() !== $inputPassword) {
      echo "Cambia tu password";
      // Enviar una email para que llegue a un input y recibir la nueva password
      return $this->setPassword($inputPassword);
    } else {
      $this->getPassword();
    }
  }
}
