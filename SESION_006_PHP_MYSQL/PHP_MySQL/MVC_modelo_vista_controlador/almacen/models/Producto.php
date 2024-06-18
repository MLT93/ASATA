<?php
/* Esta clase va a gestionar la tabla `productos` */

class Producto
{
  // Propiedades
  private $connection;

  // Constructor
  public function __construct()
  {

    // Instanciamos `\mysqli` para crear conexión a la base de datos
    $this->connection = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME); // Utilizo las variables constantes declaradas en `index.php`

    // ESTO ES PARA GESTIONAR POSIBLES ERRORES DE CONEXIÓN
    if ($this->connection->connect_error) {
      echo 'Error de conexión: ' . $this->connection->connect_error;
    }
  }

  // Getters y Setters



  // Methods
  public function getAllProductos()
  {
    $consultaSQL = "SELECT productos.id, productos.nombre, productos.precio, productos.stock, categorias.nombre AS categoria, proveedores.nombre AS proveedor FROM productos 
    INNER JOIN categorias ON productos.categoria_id = categorias.id 
    INNER JOIN proveedores ON productos.proveedor_id = proveedores.id;"; // Aquí saco todos los productos y sus Foreign Keys asociados
    $registros = $this->connection->query($consultaSQL); // Utilizamos los métodos de la instancia `\mysqli`. `query` ejecuta la sentencia y devuelve cosas, `execute` ejecuta solo la sentencia
    // $arrAssoc = $registros->fetch_assoc(); // Convertimos cada uno de los registros en forma de array asociativo
    $arrAssoc = $registros->fetch_all(MYSQLI_ASSOC); // Convertimos cada uno de los registros en forma de array asociativo
    return $arrAssoc;
  }

  // Static Methods



}
