<?php

// ? CREAR UNA CLASE igual que JavaScript, sólo que la creas de verdad, no es un prototype
// Las clases siempre van en Upper Camel Case
class WebButton
{
  // Variables o `propiedades` de la class. Normalmente son siempre `protected` o `private`
  var $width;
  var $height;
  var $color;
  var $CSS;
  var $disable;
  var $text;

  // Método constructor. Es siempre público y se ejecuta inmediatamente al instanciar. Debemos pasarle unos valores al crear una instancia (obj) o ponérselos por defecto a los parámetros, así cuando creamos la instancia (obj) recibe esos valores
  // Nos facilita la vida al crear una nueva instancia (obj) sin acceder a cada método individualmente, proporcionando la información necesaria para que esa instancia (obj) exista
  // Cada constructor es único para cada clase, si hay un `extends` lo hereda, pero si creas uno en el nuevo instancia (obj), lo sobrescribe
  function __construct($width = "100px", $height = "35px", $color = "lightskyblue", $styleCSS = "primary-button", $isDisable = true, $text = "Haz Click Aquí")
  {
    // Igual que en JavaScript se accede con `this` a las propiedades y métodos de la clase, y se les asignan los parámetros de la función para poder proporcionárselos desde afuera
    // Si no le damos un valor por defecto, al crear una instancia sin parámetros me dará un error
    $this->width = $width;
    $this->height = $height;
    $this->color = $color;
    $this->CSS = $styleCSS;
    $this->disable = $isDisable;
    $this->text = $text;
  }

  // `MÉTODOS` de la class, `GETTERS` (devuelve la información) y `SETTERS` (transforma la información)
  function setDimension($ancho, $alto)
  {
    echo "El botón tendrá el tamaño de:" .  $this->width = $ancho . " " . $this->height = $alto . "<br/>";
  }

  function setColor($color)
  {
    echo "El color del botón será: " . $this->color = $color . "<br/>";
  }

  function setStyleCSS($classNameCSS)
  {
    echo "El estilo del botón será: " . $this->CSS = $classNameCSS . "<br/>";
  }

  function toggleDisable($isDisable)
  {
    $this->disable = $isDisable;

    if ($isDisable !== true) {
      echo "El botón está habilitado.";
    } else {
      echo "El botón está deshabilitado. Controla si has puesto correctamente el booleano." . "<br/>";
    };
  }

  function setText($text)
  {
    echo "El texto del botón será: " . $this->text = $text . "<br/>";
  }
}

echo "<h3>Instancia de WebButton con los valores por defecto</h3>";

$primaryButton = new WebButton();
echo "(default) Ancho btn: $primaryButton->width" . "<br/>"; //=> (default) Ancho btn: 100px
echo "(default) Alto btn: $primaryButton->height" . "<br/>"; //=> (default) Alto btn: 35px
echo "(default) Color btn: $primaryButton->color" . "<br/>"; //=> (default) Color btn: lightskyblue
echo "(default) Clase CSS btn: $primaryButton->CSS" . "<br/>"; //=> (default) Clase CSS btn: primary-button
echo "(default) ¿Está deshabilitado?: $primaryButton->disable" . "<br/>"; //=> (default) ¿Está deshabilitado?: 1
echo "(default) Texto btn: $primaryButton->text" . "<br/>"; //=> (default) Texto btn: Haz Click Aquí

echo "<hr/>";
echo "<h3>Nueva instancia de WebButton creada con el constructor</h3>";

$secondaryButton = new WebButton("150px", "78ox", "blue", "secondary-button", false, "Pincha Aquí");
echo "(nuevo) Ancho btn: $secondaryButton->width" . "<br/>"; //=> (nuevo) Ancho btn: 150px
echo "(nuevo) Alto btn: $secondaryButton->height" . "<br/>"; //=> (nuevo) Alto btn: 78px
echo "(nuevo) Color btn: $secondaryButton->color" . "<br/>"; //=> (nuevo) Color btn: blue
echo "(nuevo) Clase CSS btn: $secondaryButton->CSS" . "<br/>"; //=> (nuevo) Clase CSS btn: secondary-button
echo "(nuevo) ¿Está deshabilitado?: $secondaryButton->disable" . "<br/>"; //=> (nuevo) ¿Está deshabilitado?: 0
echo "(nuevo) Texto btn: $secondaryButton->text" . "<br/>"; //=> (nuevo) Texto btn: Pincha Aquí

// ToDo: acabar esta parte
echo "<hr/>";
echo "<h3>Modifico los valores por defecto con los métodos disponibles en la clase WebButton</h3>";
