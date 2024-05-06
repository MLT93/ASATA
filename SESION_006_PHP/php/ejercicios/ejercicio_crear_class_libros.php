<!--

**** NOMBRE DE LA CLASE ****

class Libro

**** PROPIEDADES ****

titulo
autor
editorial
añoPublicacion
precio
cantidadPaginas
stock
ventasAcumuladas

**** GETTERS, SETTERS Y CONSTRUCTOR ****

getters
setters
constructor

**** METHODS ****

mostrarInfo -> info instancia
aplicarDescuento -> aplica descuento al precio
actualizarStock -> actualiza el stock
revisarEdicionEspecial -> se revisará si es de edición especial
calcularCostoEnvio -> calcular coste de envío según distancia cliente
esBestSeller -> se comprueba si es best seller (+1000 copias vendidas)

**** CLONE METHODS ****

La función clone tendrá un título "Libro antiguo (copia)"

**** STATIC METHODS ****

esPublicacionReciente
sonLibrosIguales - comprueba si dos libros son iguales

-->

<?php

class Libros
{

  // PROPIEDADES
  protected $title;
  protected $author;
  protected $publisher;
  protected $publicationYear;
  protected $price;
  protected $numPages;
  protected $stock;
  protected $accumulatedSales;

  // CONSTRUCTOR
  /**
   * Summary of __construct
   * @param string $title Harry Potter and the Philosopher’s
   * @param string $author J. K. Rowling
   * @param string $publisher Bloomsbury
   * @param string $publicationYear 10 June 1999
   * @param float $price 27.87
   * @param int $numPages 223
   * @param int $stock 2000
   * @param int $accumulatedSales 100000
   */
  function __construct(string $title, string $author, string $publisher, string $publicationYear, float $price, int $numPages, int $stock, int $accumulatedSales)
  {
    $this->title = $title;
    $this->author = $author;
    $this->publisher = $publisher;
    $this->publicationYear = strtotime($publicationYear); // timestamp
    $this->price = $price;
    $this->numPages = $numPages;
    $this->stock = $stock;
    $this->accumulatedSales = $accumulatedSales;
  }

  // GETTERS
  public function getTitle(): string
  {
    return $this->title;
  }

  public function getAuthor(): string
  {
    return $this->author;
  }

  public function getPublisher(): string
  {
    return $this->publisher;
  }

  public function getPublicationYear(): string
  {
    $formattedDate = date("d-m-y", intval(strtotime($this->publicationYear)));
    return $formattedDate;
  }

  public function getPrice(): float
  {
    return $this->price;
  }

  public function getNumPages(): int
  {
    return $this->numPages;
  }

  public function getStock(): int
  {
    return $this->stock;
  }

  public function getAccumulatedSales(): int
  {
    return $this->accumulatedSales;
  }

  // SETTERS
  public function setTitle($newTitle): void
  {
    $this->title = $newTitle;
  }

  public function setAuthor($newAuthor): void
  {
    $this->author = $newAuthor;
  }

  public function setPublisher($newPublisher): void
  {
    $this->publisher = $newPublisher;
  }

  public function setPublicationYear($newPublicationYear): void
  {
    $this->publicationYear = $newPublicationYear;
  }

  public function setPrice($newPrice): void
  {
    $this->price = $newPrice;
  }

  public function setNumPages($newNumPages): void
  {
    $this->numPages = $newNumPages;
  }
  public function setStock($newStock): void
  {
    $this->stock = $newStock;
  }

  public function setAccumulatedSales($newAccumulatedSales): void
  {
    $this->accumulatedSales = $newAccumulatedSales;
  }

  // METHODS
  public function showInfo(): void
  {
    echo "<h3>Info Libro: </h3>" . "<br/>";
    echo "El título es: " . $this->getTitle() . "<br/>";
    echo "El autor es: " . $this->getAuthor() . "<br/>";
    echo "Editorial: " . $this->getPublisher() . "<br/>";
    echo "Fecha de publicación: " . $this->getPublicationYear() . "<br/>";
    echo "Precio: " . $this->getPrice() . "<br/>";
    echo "Cantidad de páginas: " . $this->getNumPages() . "<br/>";
    echo "Libros disponibles: " . $this->getStock() . "<br/>";
    echo "Número de ventas: " . $this->getAccumulatedSales() . "<br/>";
  }

  public function applyDiscount(int $numDiscount, int $amount): int
  {
    $percentage = $numDiscount / 100;
    $discount = $amount * $percentage;
    $tot = $amount - $discount;

    echo "El precio es " . $amount . "<br/>";
    echo "El descuento es " . $percentage * 100 . "%" . "<br/>";
    echo "Total con descuento: " . $tot . "<br/>";

    return $tot;
  }

  public function actualizeStock(int $newStock): int
  {
    $actualizedStock = $this->stock + $newStock;
    return $actualizedStock;
  }

  public function isSpecialEdition(bool $isSpecialEdition): bool
  {
    $msg = "";
    $isSpecialEdition ? $msg = "Este libro tiene edición especial" : $msg = "Este libro no posee edición especial";
    echo $msg . "<br/>";
    return $isSpecialEdition;
  }

  public function calcSendPrice(float $distance) : float|int
  {
    $currentDistance = 0.0;
    $newPrice = 0;
    if ($distance !== $currentDistance) {
      if ($distance > 0 && $distance <= 25) {
        echo "El precio de envío se incrementa en 5" . "<br/>";
        $newPrice = $this->price + 5;
      } elseif ($distance > 25) {
        echo "El precio de envío se incrementa en 10" . "<br/>";
        $newPrice = $this->price + 10;
      }
    } else {
      echo "No hay incremento en el precio" . "<br/>";
      $newPrice = $this->getPrice();
    }
    $this->setPrice($newPrice);
    return $newPrice;
  }

  public function isBestSeller()
  {
  }

  // STATIC METHODS
  public static function isRecentPublication()
  {
  }

  public static function isTheSameBook()
  {
  }

  public static function twoDigit(int $num)
  {
    if (!is_nan($num)) {
      $msg = "";

      $num < 10 ? $msg = "0$num" : $msg = "$num";

      return $msg;
    } else {
      echo "Tiene que escribir un número";
    }
  }

  // CLONE METHODS
  public function __clone()
  {
  }
}
