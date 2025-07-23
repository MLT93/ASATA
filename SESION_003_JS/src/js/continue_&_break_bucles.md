## 📘 ¿Qué son `break` y `continue` en programación?

Ambas son **instrucciones de control de flujo** utilizadas dentro de bucles (`for`, `while`, `do...while` y `switch`).

Dentro de un switch, el uso de `continue` puede ser problemático si no se entiende bien su comportamiento. **Aunque `continue` se utiliza principalmente en bucles, si se usa dentro de un switch anidado en un bucle, se salta al final del switch, no al final del bucle**. Para evitar confusiones, se recomienda evitar el uso de `continue` dentro de switch a menos que sea absolutamente necesario y se entienda completamente su comportamiento.

Dentro de un switch, el uso de `break` es fundamental para **evitar la caída automática (fall-through)**, es decir, **que el programa ejecute el código de múltiples casos consecutivos** incluso cuando no coincidan con la condición.

Comportamiento de `break` dentro de un switch:
`break` hace que el programa salte fuera del bloque switch después de ejecutar el código de un caso (case).
Si omites `break`, la ejecución continúa en el siguiente case, sin importar si coincide con el valor de evaluación.

---

## 🔄 Instrucción `break`

### ✅ ¿Qué hace?

> Interrumpe **completamente** el bucle más cercano en el que se encuentra.
> No se ejecutan más iteraciones, y el flujo continúa después del bucle.

### 📌 Ejemplo con `for`:

```js
for (let i = 0; i < 5; i++) {
  if (i === 3) {
    break; // Termina el bucle aquí
  }
  console.log("i:", i);
}
console.log("Fin del bucle");
```

**Salida:**

```
i: 0
i: 1
i: 2
Fin del bucle
```

---

## 🔁 Instrucción `continue`

### ✅ ¿Qué hace?

> **Omite la iteración actual** del bucle y continúa con la siguiente.
> No sale del bucle, pero **se salta el resto del código** de esa vuelta.

### 📌 Ejemplo con `for`:

```js
for (let i = 0; i < 5; i++) {
  if (i === 2) {
    continue; // Salta el 2
  }
  console.log("i:", i);
}
```

**Salida:**

```
i: 0
i: 1
i: 3
i: 4
```

---

## 📊 Tabla comparativa

| Instrucción | ¿Rompe el bucle? | ¿Salta código? | ¿Sigue iterando? | Uso común                                                              |
| ----------- | ---------------- | -------------- | ---------------- | ---------------------------------------------------------------------- |
| `break`     | ✅ Sí             | ✅ Sí           | ❌ No             | Cuando se cumple una condición que hace innecesario seguir en el bucle |
| `continue`  | ❌ No             | ✅ Sí           | ✅ Sí             | Para ignorar ciertos valores sin cortar el bucle                       |

---

## ✅ Aplicación por tipo de bucle

| Bucle        | `break`                 | `continue`         |
| ------------ | ----------------------- | ------------------ |
| `for`        | Finaliza el bucle       | Salta una vuelta   |
| `while`      | Finaliza el bucle       | Salta una vuelta   |
| `do...while` | Finaliza el bucle       | Salta una vuelta   |
| `switch`     | Usado para cortar casos | Salta al default (se usa si está anidado dentro de un bucle) |

---

## 📌 Buenas prácticas y consejos

### ✔️ Cuándo usar `break`

* Cuando una **condición deja sin sentido continuar el bucle**.
* En **búsqueda temprana**, por ejemplo: encontrar un valor en un array.

```js
const arr = [10, 20, 30, 40];

for (let i = 0; i < arr.length; i++) {
  if (arr[i] === 30) {
    console.log("Elemento encontrado");
    break; // No hace falta seguir
  }
}
```

### ✔️ Cuándo usar `continue`

* Cuando hay condiciones que **no deberían ejecutar el resto del código** de una vuelta.

```js
for (let i = 1; i <= 5; i++) {
  if (i % 2 === 0) continue; // Salta los pares
  console.log("Impar:", i);
}
```

```js
for (let i = 0; i < array.length; i++) {
  if (condición_no_cumplida) {
    continue; // Salta la iteración actual y pasa al siguiente índice
  }
  // Código a ejecutar si la condición se cumple
}
```

### ⚠️ Mal uso de `break` y `continue`

Evita un uso excesivo de estas instrucciones porque:

* Dificultan la lectura y mantenimiento del código.
* Pueden romper la lógica de estructuras complejas si no se usan con claridad.

---

## 🎯 Consejos avanzados

### 🔁 Bucle anidado + `break` con `label`

```js
outerLoop:
for (let i = 0; i < 3; i++) {
  for (let j = 0; j < 3; j++) {
    if (j === 1) {
      break outerLoop; // Rompe ambos bucles
    }
    console.log(`i: ${i}, j: ${j}`);
  }
}
```

**Salida:**

```
i: 0, j: 0
```

### 🎯 ¿Qué es `outerLoop:`?

La sintaxis `outerLoop:` define un **label (etiqueta)** para un bloque de código, y es especialmente útil cuando querés usar `break` o `continue` para **salir o continuar desde estructuras anidadas**, como bucles dentro de bucles o `switch` dentro de bucles.

Es un **label statement**, o **etiqueta de control de flujo**.

```javascript
nombreEtiqueta:
bucle o bloque {
  // código
}
```

Luego podés usar:

* `break nombreEtiqueta;` → para **romper** un bucle etiquetado.
* `continue nombreEtiqueta;` → para **saltar a la siguiente iteración** de un bucle etiquetado.

### ✅ Ejemplo: `continue` con `outerLoop`

```javascript
outerLoop:
for (let i = 0; i < 3; i++) {
  switch (i) {
    case 1:
      console.log("Salta i = 1");
      continue outerLoop; // salta al siguiente i del for
    default:
      console.log("i:", i);
  }
}
```

**Salida:**

```
i: 0
Salta i = 1
i: 2
```

### ✅ Ejemplo: `break` con `outerLoop` (rompe completamente el bucle)

```javascript
outerLoop:
for (let i = 0; i < 3; i++) {
  for (let j = 0; j < 3; j++) {
    if (i === 1 && j === 1) {
      break outerLoop; // Sale de ambos bucles
    }
    console.log(`i: ${i}, j: ${j}`);
  }
}
```

**Salida:**

```
i: 0, j: 0
i: 0, j: 1
i: 0, j: 2
i: 1, j: 0
```

### 🧠 Cosas clave sobre los `labels`

* Solo se pueden usar con `break` y `continue`.
* No funcionan con `return`, `throw`, ni otras estructuras.
* Se usan para evitar lógica innecesariamente compleja con banderas o múltiples condiciones.
* El `label` **debe apuntar a un bucle o bloque válido**, o lanza un error.

### 🚫 Mal uso (error típico):

```javascript
label1:
switch (x) {
  case 1:
    continue label1; // ❌ Error: `continue` solo puede usarse con bucles
}
```

### ✅ Tabla

| Sintaxis              | Acción                                                 |
| --------------------- | ------------------------------------------------------ |
| `labelName:`          | Define una etiqueta para usar con `break` o `continue` |
| `continue labelName;` | Salta a la siguiente iteración del bucle etiquetado    |
| `break labelName;`    | Rompe completamente el bucle etiquetado                |

---

## 🧠 Ventajas

| Instrucción  | Ventajas principales                                       |
| ------------ | ---------------------------------------------------------- |
| `break`      | Mejora la eficiencia al evitar iteraciones innecesarias    |
| `continue`   | Hace el código más claro al evitar `if-else` anidados      |
| `outerLoop`  | Hace el código más claro referenciando el bucle que se usa |

---

## 🧪 Ejemplo completo comparativo

```js
for (let i = 1; i <= 5; i++) {
  if (i === 2) continue; // Salta solo esta vuelta
  if (i === 4) break;    // Sale completamente
  console.log("i:", i);
}
```

**Salida:**

```
i: 1
i: 3
```

---

## 🏁 Conclusión final

* `break` **rompe el bucle completo**, útil para cortar la ejecución cuando se cumple una condición.
* `continue` **omite solo una vuelta**, ideal para saltar casos específicos sin abandonar el bucle.

> Usa ambas con cuidado, pero son poderosas herramientas para **controlar el flujo de tus programas**.
