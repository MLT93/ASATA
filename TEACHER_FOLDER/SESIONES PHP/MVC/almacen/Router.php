<?php


class Router
{

  // Propiedades
  private array $routes = [];

  // Constructor


  // Getters y Setters
  protected function getRoutes(): array
  {
    return $this->routes;
  }

  protected function setRoutes(array $routes)
  {
    $this->routes = $routes;
  }


  // Methods
  public function addRoute($path, $controller, $method)
  {
    /* 
      1. Esta función nos permite crear una nueva ruta, asignándole un controlador y un método del mismo controlador de forma específica
      2. Ejemplo: "/" => ['controller' => "ProductoController", 'method' => "index"]
    */
    $this->routes[$path] = ['controller' => $controller, 'method' => $method];
  }

  public function dispatch($uri)
  {
    if (array_key_exists($uri, $this->getRoutes())) {

      /* 
        1. La propiedad routes (array) va a poseer la siguiente información para cada ruta:
          $routes = [
            '/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/almacen/' => ['controller' => 'ProductoController', 'method' => 'index'],
            '/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/almacen/productos/create' => ['controller' => 'ProductoController', 'method' => 'create'],
            '/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/almacen/productos/store' => ['controller' => 'ProductoController', 'method' => 'store'],
            '/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/almacen/productos/detail' => ['controller' => 'ProductoController', 'method' => 'detail'], // Aquí deberé pasarle el Query Param para que lo guarde en `$_GET`
            '/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/almacen/proveedores/' => ['controller' => 'ProveedorController', 'method' => 'index'], // Aquí deberé pasarle el Query Param para que lo guarde en `$_GET`
          ]
        2. Entonces, para conseguir la información dinamicamente iteraremos este array y conseguimos cada controller y su método correspondiente por cada ruta específica
      */
      $controllerName = $this->routes[$uri]['controller'];
      $methodName = $this->routes[$uri]['method'];

      // Llamamos el controlador correspondiente
      require "./controllers/$controllerName.php";
      $controller = new $controllerName();
      $controller->$methodName();
    } else {
      // echo "404 - Not Found";
      require "controllers/ErrorController.php";
      $controllerError = new ErrorController();
      $controllerError->error404();
    }
  }

  public function dispatch2($uri)
  {

    /* 
      1. Controlamos las rutas que posea el array `routes[]`, donde `$key` será cada ruta y `$value` el array anidado en esa clave con el controller y el método 
      2. `preg_replace` toma `$key` y sustituye el primer parámetro con el segundo. Todo ello utilizando expresiones regulares porque nunca sabremos exactamente qué posee esa `Path Variable`
      3. El primer parámetro busca todos el contenido alfanumérico que esté entre `{}` => /ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/almacen/productos/detail/{id}
      4. El segundo parámetro reemplaza el primero con contenido alfanumérico
      5. El tercer parámetro es la variable donde se realizan los cambios
      6. Asignamos a una variable para poder realizar el `if`
    */
    foreach ($this->getRoutes() as $key => $value) {
      $pathPattern = preg_replace('#{[a-zA-Z][a-zA-Z0-9]*}#', '([a-zA-Z0-9]+)', $key); // #:[a-zA-Z][a-zA-Z0-9]*# con `:` antes => /ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/almacen/productos/detail/:id

      /* 
        1. Comprobamos si alguna de las `$pathPattern` coinciden con la URI del navegador, y se almacena en `$matches`
        2. Utilizamos `$value`
      */
      if (preg_match("#^$pathPattern$#", $uri, $matches)) {

        // Asignamos la información dinamicamente para conseguir cada controller y su método correspondiente por cada ruta específica
        $controller = $value['controller'];
        $method = $value['method'];

        require "./controllers/$controller.php";
        $controllerInstance = new $controller();

        // var_dump($matches);
        $pathVariables = array_slice($matches, 1);

        call_user_func_array([$controllerInstance, $method], array_slice($matches, 1));

        return; // Si entra en este `if`, ejecuta el código y sale de la función para que no se ejecute `error404()`
      }
    }

    require "controllers/ErrorController.php";
    $controllerError = new ErrorController();
    $controllerError->error404();
  }

  // Static Methods
}
