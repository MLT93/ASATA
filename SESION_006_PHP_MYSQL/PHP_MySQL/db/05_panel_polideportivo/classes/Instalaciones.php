<?php

// ? `NAMESPACE` SE USA PARA DEFINIR EL NOMBRE DE LA CARPETA O ESPACIO DONDE ESTOY
// `namespace` define el nombre del espacio (carpeta) donde estoy trabajando. Se define con Upper Camel Case
// Esto nos sirve para invocar clases desde otros archivos
// Básicamente sirven de contenedores para el código de PHP, de modo que cuando creemos elementos del lenguaje como constantes, funciones o clases, se queden en un ámbito más restringido, evitando colisiones o conflictos de nombres con otros elementos que puedas crear tú más adelante, otras personas de tu equipo o incluso otros desarrolladores
namespace Instalaciones;

// Importo otra clase para utilizar la base de datos
require_once("./TEACHER_FOLDER/SESIONES%20PHP/SITIO_WEB/classes/db.php");

use Database\Db as Db;

// ? CREAR UNA CLASE igual que JavaScript, sólo que la creas de verdad, no es un prototype
// Las clases siempre van en Upper Camel Case
class Instalacion
{
  // ? `PUBLIC`, `PRIVATE` Y `PROTECTED`
  // `private` es unicamente accesible desde la propia clase
  // `protected` es accesible desde la propia clase y desde las clases hijas, pero no desde una instancia (obj)
  // `public` es accesible desde todos los lados

  // `PROPIEDADES` o variables de la class. Normalmente son siempre `private`
  /**
   * Summary of properties
   * @var string $nombre Nombre único de la instalación
   * @var string $descripcion Detalle de la instalación
   * @var int $capacidad Número máximo de personas
   * @var boolean $disponibilidad Por defecto será false 
   */
  private string $nombre; // En la base de datos tendremos el nombre de la instalación único, por lo tanto éste será el identificador principal
  private string $descripcion;
  private int $capacidad;
  private string $disponibilidad;


  // `MÉTODO CONSTRUCTOR` es siempre público y se ejecuta inmediatamente al instanciar. Debemos pasarle unos valores al crear una instancia (obj) o ponérselos por defecto a los parámetros, así cuando creamos la instancia (obj) recibe esos valores
  // Nos facilita la vida al crear una nueva instancia (obj) sin acceder a cada método individualmente, proporcionando la información necesaria para que esa instancia (obj) exista
  // Cada constructor es único para cada clase, si hay un `extends` lo hereda, pero si creas uno en el nuevo instancia (obj), lo sobrescribe
  function __construct(string $nombre, string $descripcion = "", int $capacidad, $disponibilidad = true)
  {
    // Igual que en JavaScript se accede con `this` a las propiedades y métodos de la clase, y se les asignan los parámetros de la función para poder proporcionárselos desde afuera
    // Si no le damos un valor por defecto, al crear una instancia sin parámetros me dará un error
    $this->nombre = $nombre;
    $this->descripcion = $descripcion;
    $this->capacidad = $capacidad;
    $this->disponibilidad = $disponibilidad;
  }

  // ? `GETTERS` AND `SETTERS` SON MÉTODOS SINGULARES RELACIONADOS CON LAS PROPIEDADES PARA OBTENER VALORES Y ASIGNARLES VALORES
  // `getters` su función es permitir obtener el valor (protegido o privado) de una propiedad de la clase y así poder utilizar dicho valor en diferentes métodos y desde afuera de la clase
  // `setters` su función permite brindar acceso a propiedades especificas para poder asignar un valor desde afuera de la clase

  // `GETTERS` (devuelve la información de una propiedad para usarla en un método y desde afuera de la class). Normalmente son siempre `protected`
  protected function getNombre()
  {
    return $this->nombre;
  }
  protected function getDescripcion()
  {
    return $this->descripcion;
  }
  protected function getCapacidad()
  {
    return $this->capacidad;
  }
  protected function getDisponibilidad()
  {
    return $this->disponibilidad;
  }

  // `SETTERS` (transforma la información de una propiedad desde afuera de la clase). Normalmente son siempre `protected`
  protected function setNombre($parametro)
  {
    $this->nombre = $parametro;
  }
  protected function setDescripcion($parametro)
  {
    $this->descripcion = $parametro;
  }
  protected function setCapacidad($parametro)
  {
    $this->capacidad = $parametro;
  }
  protected function setDisponibilidad($parametro)
  {
    $this->disponibilidad = $parametro;
  }

  // `MÉTODOS` (utilizan los setters y getters para acceder a la información)
  public function registrarInstalacion()
  {
    $cnx = new Db ("localhost", "root", "", "polideportivo");
    $nombre = $this->getNombre();
    $descripcion = $this->getDescripcion();
    $capacidad = $this->getCapacidad();
    $consultaSQL = "INSERT INTO instalaciones (nombre, descripcion, capacidad) VALUES ('$nombre', '$descripcion', $capacidad);";
    $cnx->execute($consultaSQL);
  }
  public function reservarInstalacion()
  {
    
  }
  public function cancelarReserva()
  {
    
  }

  // `MÉTODOS ESTÁTICOS` (no tiene relación con las propiedades o métodos de la clase y se puede llamar desde afuera)
  // ? `STATIC` NO DEPENDE DE NINGUNA PROPIEDAD O MÉTODO DE LA INSTANCIA O CLASE DEFINIDA, PERO TIENE RELACIÓN CON ELLA Y PUEDE SER UTILIZADA A TRAVÉS DE LAS INSTANCIAS
  // Sólo puede ser estático si no tiene relación con las propiedades o métodos de la clase o instancia establecida, pero sí tiene que ver con ella y puede ser utilizada a través de las instancias
  /* Ejemplo: una clase `Agente` nos informará sobre el agente con su grado, especialidad, el cuerpo al cual pertenece, etc... Pero también poseerá un método `estático` que será `comprobar documentación` que no utiliza sus métodos o sus propiedades pero sí tiene que ver con la clase y puede ser utilizada por cada agente [instancia (obj)] */
  // ? `$INSTANCE_OR_CLASS::STATIC_FUNCION()` PARA LLAMAR UNA FUNCIÓN ESTÁTICA
  // `$NameClass::staticFunction()` llama a la función estática desde la propia clase. Se utilizan 4 puntitos en vez de una flecha porque es un método sin relación con los métodos o las propiedades de la clase
  // `$martina::staticFunction()` llama a la función estática desde la instancia creada. Se utilizan 4 puntitos en vez de una flecha porque es un método sin relación con los métodos o las propiedades de la clase
  public function actualizar($instalacion)
  {
  
  }
  public function darDeBaja($instalacion)
  {
  
  }
}

// ? `NEW` CREA UNA INSTANCIA DE UNA CLASS. UNA INSTANCIA ES LA MATERIALIZACIÓN DE UNA CLASE
// `new` es una palabra clave para crear una instancia de una clase. Un "nuevo" objeto al fin y al cabo
$instalacion = new Instalacion("Tennis A", "Cancha de tierra", 4, true);

// ? `GET_DECLARED_CLASSES()` PARA VER TODAS LAS CLASES QUE HAY
// `get_declared_classes()` nos devuelve un array con todas las clases declaradas

// ? `CLASS_EXISTS()` PARA VER SI UNA CLASE EXISTE
// `class_exists()` devuelve true (1) o false (0) si existe o no

// ? `METHOD_EXISTS()` PARA VER SI UNA CLASE EXISTE
// `method_exists()` devuelve true (1) o false (0) si existe o no. Recibe 2 parámetros
// 1 La class
// 2 El método

// ? `GET_CLASS()` SABER A QUÉ CLASE PERTENECE UNA INSTANCIA
// `get_class()` nos devuelve el nombre de la clase a la cual pertenece la instancia (el objeto)

// ? `->` ACCEDE DESDE EL OBJETO INSTANCIADO A UN MÉTODO O PROPIEDAD DE LA PROPIA CLASE. Es como el `.` en los objetos de JavaScript
// `->` nos ayuda a acceder a un método o propiedad disponible en la class `Gato` desde el objeto que se ha instanciado

// ? `EXTENDS` SIRVE PARA CREAR UNA CLASE HIJA DE OTRA CLASE
// `extends` hace uso del principio de herencia y visibilidad. La nueva clase heredará todas sus propiedades y métodos públicos y protegidos del padre, pudiendo agregar más funcionalidades. Los métodos privados de una clase padre no son accesibles para una clase hija. Atento! Lo que se hereda no se puede modificar

// ? `NAME_FATHER_CLASS::__CONSTRUCT()` LLAMA AL CONSTRUCTOR PADRE PARA FUSIONAR LOS DOS CONSTRUCTORES. RECUERDA PASAR LOS PARÁMETROS DEL CONSTRUCTOR PADRE EN EL CONSTRUCTOR HIJO TAMBIÉN
// `Gato::__construct()` nos ayuda a utilizar el constructor de la class padre dentro del constructor de la class hija

// ? `IS_SUBCLASS_OF()` SIRVE PARA COMPROBAR SI UNA CLASE O UNA INSTANCIA (OBJ) ES HIJA DE OTRA. DEVUELVE TRUE (1) O FALSE (0)
// `is_subclass_of()` Comprueba si una clase o una instancia (obj) tiene una clase en particular como uno de sus padres o si la implementa. Devuelve true (1) si pertenece a la classe del segundo parámetro, false (0) en caso contrario. Tiene 3 argumentos
// 1 Un nombre de clase o una instancia de objeto
// 2 El nombre de clase a comprobar
// 3 Booleano que impide que se llame al cargador automático. Es opcional

// ? `GET_PARENT_CLASS` SIRVE PARA SABER CUÁL ES EL PADRE Y SABER A LO QUE PUEDO ACCEDER
// `get_parent_class()` nos dice quién es el padre de la class que ha sido extendida
