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
        2. Entonces, para conseguir la información dinamicamente iteraremos este array y conseguimos cada controller y su método correspondiente por cada caso específico
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

  // Static Methods
}
