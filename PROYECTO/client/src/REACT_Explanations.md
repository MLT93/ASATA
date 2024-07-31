# **REACT**

## **The Declarative Approach y Funciones Relacionadas en React: Una Explicación Detallada**

1. #### **`Introducción a The Declarative Approach`**:

   The Declarative Approach es un enfoque de programación que se centra en describir qué se debe hacer, en lugar de cómo hacerlo. Se basa en la utilización de declaraciones y expresiones para definir la lógica de un programa.

2. #### **`Importancia de The Declarative Approach`**:

   Este enfoque promueve un código más legible, mantenible y reutilizable. Al centrarse en la intención del código, facilita la comprensión de lo que hace cada parte del programa, lo que es especialmente valioso en proyectos grandes y colaborativos.

3. #### **`Sintaxis y Ejemplos de The Declarative Approach`**:

   - **Ejemplo de Enfoque Imperativo**:

     Enfoque Imperativo:

     ```jsx
     let numeros = [1, 2, 3, 4];
     let cuadrados = [];

     for (let i = 0; i < numeros.length; i++) {
       cuadrados.push(numeros[i] * numeros[i]);
     }

     console.log(cuadrados); // Imprime: [1, 4, 9, 16]
     ```

   - **Ejemplo de Enfoque Declarativo**:

     Enfoque Declarativo:

     ```jsx
     let numeros = [1, 2, 3, 4];
     let cuadrados = numeros.map((numero) => numero * numero);

     console.log(cuadrados); // Imprime: [1, 4, 9, 16]
     ```

   En el ejemplo de enfoque declarativo, utilizamos la función `map` para aplicar una operación (elevar al cuadrado) a cada elemento del array `numeros`. Esto resulta en un nuevo array `cuadrados` con los resultados.

4. #### **`Ventajas del Enfoque Declarativo`**:

   - **Legibilidad y Expresividad**:

     Permite expresar la intención del código de manera clara y concisa.

   - **Abstracción y Modularidad**:

     Facilita la división del código en funciones y componentes reutilizables que se centran en tareas específicas.

   - **Menos propenso a errores**:

     Al reducir la necesidad de controlar manualmente el flujo de ejecución, se disminuye la posibilidad de cometer errores.

5. #### **`Funciones Relacionadas en JavaScript`**:

   - **Funciones de Orden Superior**:

     Las funciones de orden superior son aquellas que aceptan otras funciones como argumentos o devuelven funciones como resultado. Esto permite la composición de funciones y la creación de abstracciones más potentes.

     Ejemplo de función de orden superior:

     ```jsx
     function aplicarOperacion(num, operacion) {
       return operacion(num);
     }

     function duplicar(numero) {
       return numero * 2;
     }

     let resultado = aplicarOperacion(5, duplicar);
     console.log(resultado); // Imprime: 10
     ```

   - **Funciones Anónimas**:

     Son funciones sin nombre que se pueden declarar en línea. Son útiles cuando se necesita una función temporal.

     Ejemplo de función anónima:

     ```jsx
     let cuadrado = function (x) {
       return x * x;
     };

     let resultado = cuadrado(4); // resultado = 16
     ```

   - **Funciones Flecha**:

     Son una forma más concisa de escribir funciones en JavaScript introducidas en ECMAScript 6 (ES6). Tienen una sintaxis más corta y heredan el contexto de `this` del ámbito que las rodea.

     Ejemplo de función flecha:

     ```jsx
     let cuadrado = (x) => x * x;

     let resultado = cuadrado(4); // resultado = 16
     ```

   - **Closures**:

     Un closure es una función que tiene acceso a su propio ámbito, al ámbito de la función externa y a las variables globales.

     Ejemplo de closure:

     ```jsx
     function crearContador() {
       let contador = 0;
       return function () {
         contador++;
         console.log(contador);
       };
     }

     let incrementar = crearContador();
     incrementar(); // Imprime: 1
     incrementar(); // Imprime: 2
     ```

   - **Recursividad**:

     La recursividad es un concepto en programación en el que una función se llama a sí misma para resolver un problema. Es útil para resolver problemas que se pueden dividir en subproblemas más pequeños.

     Ejemplo de función recursiva:

     ```jsx
     function factorial(n) {
       if (n <= 1) {
         return 1;
       } else {
         return n * factorial(n - 1);
       }
     }

     let resultado = factorial(5); // resultado = 120
     ```

6. #### **`Conclusiones sobre el Enfoque Declarativo y Funciones Relacionadas`**:

   The Declarative Approach y las funciones relacionadas en JavaScript son herramientas poderosas para escribir código más limpio, legible y modular. Al comprender y aplicar estos conceptos, los desarrolladores pueden mejorar la eficiencia y mantenibilidad de su código, lo que resulta en aplicaciones más robustas y fáciles de mantener a largo plazo.

## **JSX y Funciones Relacionadas en React: Una Explicación Detallada**

1. #### **`Introducción a JSX`**:

   JSX (JavaScript XML) es una extensión de JavaScript que permite escribir código que se parece mucho al HTML pero que se interpreta como JavaScript. JSX es comúnmente utilizado en bibliotecas y frameworks de JavaScript como React para definir la estructura de la interfaz de usuario.

2. #### **`Importancia de JSX`**:

   JSX proporciona una sintaxis más intuitiva y declarativa para definir componentes de interfaz de usuario en aplicaciones web. Al mezclar HTML con JavaScript, se facilita la creación y manipulación de elementos del DOM de manera dinámica y eficiente.

3. #### **`Sintaxis de JSX`**:

   La sintaxis de JSX es similar a la de HTML, pero se integra con JavaScript utilizando llaves `{}` para envolver expresiones JavaScript. Los elementos JSX se parecen a los elementos HTML, pero pueden contener expresiones JavaScript entre llaves.

   Ejemplo de un elemento JSX:

   ```jsx
   const element = <h1>Hola, Mundo!</h1>; // Elemento JSX

   function HelloWorld() {
     return <div>{element} // Renderizado del elemento JSX</div>;
   }
   ```

4. #### **`Componentes en React`**:

   En React, los componentes son bloques de construcción fundamentales de la interfaz de usuario. Pueden estar compuestos de elementos JSX y lógica JavaScript. Los componentes permiten la reutilización y organización del código de manera modular (ES module). Los componentes trabajan siempre con Objetos, por lo tanto hay que tener en cuenta la destructuración de los Objetos.

   Ejemplo de componente funcional en React (es una function):

   ```jsx
   import React from "react";

   export function Saludo(props) {
     return <h1>Hola, {props.nombre}</h1>; // Prop sin destructurar
   }

   export function Saludo({ nombre }) {
     return <h1>Hola, {nombre}</h1>; // Prop destructurado
   }
   ```

   Ejemplo de componente de clase en React (es una class):

   ```jsx
   import React, { Component } from "react";

   class MiComponenteDeClase extends Component {
     render() {
       return (
         <div>
           <h1>Hola, soy un componente de clase</h1>
         </div>
       );
     }
   }
   export default MiComponenteDeClase;
   ```

5. #### **`Expresiones JavaScript en JSX`**:

   Las expresiones JavaScript se pueden insertar dentro de elementos JSX utilizando llaves `{}`. Esto permite la evaluación de variables, cálculos y llamadas a funciones dentro del código JSX.

   Ejemplo de expresión JavaScript en JSX:

   ```jsx
   const nombre = "Juan";
   const element = <h1>Hola, {nombre}</h1>;
   ```

6. #### **`Renderizado de Elementos en React`**:

   Para mostrar un elemento JSX en el DOM, se utiliza el método `ReactDOM.render()`. Este método toma dos argumentos: el elemento JSX que se va a renderizar y el elemento del DOM en el que se va a insertar.

   Ejemplo de renderizado de un elemento JSX:

   ```jsx
   const element = <h1>Hola, Mundo!</h1>;
   ReactDOM.render(element, document.getElementById("root"));
   ```

   Normalmente el proceso típico de estructuración y montaje de una aplicación web utilizando React es utilizando la arquitectura de una sola página (Single Page Application, SPA por sus siglas en inglés) aprovechando el potencial de React para construir interfaces de usuario interactivas y dinámicas.

   La composición es la siguiente:

   **Creación de Componentes**:

   - Los componentes se crean en archivos separados, generalmente con extensiones `.js` o `.jsx`.
   - Los nombres de los componentes suelen comenzar con una letra mayúscula (conocido como convención PascalCase) para distinguirlos de las etiquetas HTML.

   ```jsx
   import "./Texto.css";

   export const Texto = ({ size, color, label }) => {
     return (
       <>
         {size === "title-lg-bold" && (
           <h1 className="title-lg-bold" style={{ color: `var(${color})` }}>
             {label}
           </h1>
         )}
         {size === "title-lg" && (
           <h1 className="title-lg" style={{ color: `var(${color})` }}>
             {label}
           </h1>
         )}
       </>
     );
   };
   ```

   **Archivo Principal (`App.js` o `App.jsx`)**:

   - Este archivo suele actuar como el componente raíz de la aplicación.
   - Puede importar y combinar varios componentes para formar la estructura de la aplicación.
   - Exporta el componente raíz con `export default`.

   ```jsx
   import "./App.css";
   import "./styles/index.scss";
   import Texto from "./componentes/Texto/Texto";

   function App() {
     return (
       <div className="App">
         <section className="App-section">
           <Texto
             size={"title-large"}
             label={"Texto"}
             color={"--color-subtitulo-lila"}
           />
           <Texto
             size={"title-large"}
             label={"Texto"}
             color={"--color-secondary"}
           />
         </section>
       </div>
     );
   }

   export default App;
   ```

   **Renderización de la Aplicación (`index.js` o `index.jsx`)**:

   - Este archivo se encarga de conectar la aplicación con el archivo HTML principal (`index.html`).
   - Utiliza `ReactDOM.render()` para renderizar el componente raíz en el elemento HTML identificado por `root`.

   ```jsx
   import React from 'react';
   import ReactDOM from 'react-dom/client';
   import './index.css';
   import App from './App';

   ReactDOM.createRoot(document.getElementById('root'));.render(
     <React.StrictMode>
       <App />
     </React.StrictMode>
   );
   ```

   **Conexión con `index.html`**:

   - El archivo `index.html` contiene la estructura básica de la página web, incluyendo un elemento con el id `root`.
   - A través de `document.getElementById('root')`, se selecciona este elemento para renderizar la aplicación React.

   ```html
   <!DOCTYPE html>
   <html lang="en">
     <head>
       <meta charset="utf-8" />
       <link rel="icon" href="%PUBLIC_FOLDER%/favicon.ico" />
       <meta name="viewport" content="width=device-width, initial-scale=1" />
       <title>React App</title>
     </head>
     <body>
       <div id="root"></div>
       <!--
      This HTML file is a template.
      If you open it directly in the browser, you will see an empty page.
   
      You can add web fonts, meta tags, or analytics to this file.
      The build step will place the bundled scripts into the <body> tag.
   
      To begin the development, run `npm start` or `yarn start`.
      To create a production bundle, use `npm run build` or `yarn build`.
      -->
     </body>
   </html>
   ```

   Este enfoque facilita la organización y mantenimiento de proyectos de React al dividir la lógica en componentes reutilizables y estructurarlos de manera intuitiva. Además, permite una separación clara entre la lógica de la aplicación y la presentación en HTML.

   ```jsx
   import React from 'react';
   import ReactDOM from 'react-dom/client';
   import './index.css';
   import App from './App';

   ReactDOM.createRoot(document.getElementById('root'));.render(
     <React.StrictMode>
       <App />
     </React.StrictMode>
   );
   ```

7. #### **`Manejo de Eventos en JSX (handleEvent)`**:

   En JSX los eventos funcionan igual que en JavaScript, se espera un evento y este acciona una función. Lo que se diferencia es cómo se manejan las funciones y dónde.

   Las funciones tienen una convención, que es empezar el nombre de la propia función con `handle` (`handleInput`, `handleChange`, etc...).

   Los eventos se fijan a través de un atributo HTML (`onChange`, `onClick`, `onSubmit`, etc...) dentro del tag HTML deseado. Este evento, accionará la función correspondiente para cambiar el estado del tag HTML.

   Recuerda que el `handleEvent` (la función que se ejecuta al accionarse el evento) siempre se lleva consigo el objeto `event` con sus propiedades (en React es una instancia de la clase `SyntheticEvent`), que a su vez es una abstracción de cómo los eventos de la UI deberían ser estructurados al interno de los navegadores siguiendo las especificaciones W3C. Por lo tanto, cada gestor de eventos está efectivamente recibiendo un parámetro, que podemos llamar `event` y utilizarlo cuando nos interese alguno de sus atributos (`event.name`, `event.value`, `event.checked`, `event.type`, etc...).

   Recuerda: si hay un `<input>`, hay un `event` dentro del `handleEvent` conectado al `onChange` que debemos utilizar. Si hay un `<button>` no será necesario utilizar el `event` dentro del `handleEvent` en el atributo `onClick` relacionado.

   Ejemplo de manejo de eventos en JSX:

   ```jsx
   function handleClick() {
     alert("Botón clickeado");
   }

   const element = <button onClick={handleClick}>Haz click</button>;
   ```

   ```jsx
   const handleMouseClick = (event) => console.log(event); // te imprime toda la información guardada en SyntheticEvent

   const element = <button onClick={handleMouseClick}>Click me</button>;
   ```

   ```jsx
   import React, { useState } from "react";

   const App = () => {
     const [inputValue, setInputValue] = useState("");

     const handleInputChange = (e) => {
       console.log(e.target.value);
       setInputValue(e.target.value);
     };

     const handleClick = () => {
       console.log("El valor del input es:", inputValue);
     };

     return (
       <div>
         <input type="text" value={inputValue} onChange={handleInputChange} />
         <button onClick={handleClick}>Capturar Valor</button>
       </div>
     );
   };

   export default App;
   ```

   Recuerda que el `event.target` representa el elemento (nodo HTML) que ha activado el evento, mientras que `event.currentTarget` representa el elemento donde fue asociado el evento.Esto es importante porque aunque tengamos un elemento HTML anidado dentro de otro que posee el gestor de eventos, este ultimo cuando se acciona el evento recorre (`bubble`) todas los anidamientos hasta llegar a la raíz.

   `Gracias a esto podemos leer las informaciones de cada nodo HTML` interactuar con ellos y modificar su comportamiento, porque `tenemos acceso a cada atributo que se le pueda asignar a cualquier nodo HTML (elemento) que utilicemos`.

8. #### **`Estilos en JSX`**:

   Los estilos en JSX se manejan utilizando objetos de JavaScript que contienen propiedades de estilo en `camelCase` en lugar de las propiedades de estilo de CSS en `kebab-case`.

   Ejemplo de estilos en JSX:

   ```jsx
   const divStyle = {
     color: "blue",
     fontSize: "20px",
   };

   const element = <div style={divStyle}>Texto con estilo</div>;
   ```

   También se pueden escribir directamente dentro del elemento html utilizando una doble llave, de la siguiente manera:

   ```jsx
   const element = (
     <div style={{ backgroundColor: "yellow", width: "240px" }}>
       Texto con estilo
     </div>
   );
   ```

9. #### **`Uso de JSX con Babel`**:

   JSX no es válido en JavaScript estándar y debe ser transpilado a código JavaScript válido para su ejecución en el navegador. Esto se hace comúnmente utilizando herramientas como Babel.

10. #### **`Ventajas y Consideraciones sobre el uso de JSX`**:

- **Legibilidad y Mantenibilidad**:

  SX proporciona una sintaxis más clara y legible para definir interfaces de usuario.

- **Facilita la Visualización de la Estructura del DOM**:

  Al combinar HTML y JavaScript, se puede visualizar fácilmente la estructura de la interfaz de usuario.

- **Facilita la Creación de Componentes Reutilizables**:

  Los componentes de React se definen utilizando JSX, lo que facilita la creación de componentes reutilizables y modulares.

- **Integración con JavaScript**:

  JSX permite la integración de expresiones y lógica JavaScript directamente en la definición de la interfaz de usuario.

- **Curva de Aprendizaje**:

  Para quienes están acostumbrados a HTML puro, la sintaxis de JSX puede parecer inicialmente confusa.

- **Requiere Transpilación**:

  JSX no es válido en JavaScript estándar y requiere ser transpilado a código JavaScript válido antes de su ejecución en el navegador.

- **Puede Ser Excesivo para Aplicaciones Simples**:

  Para aplicaciones muy simples, la complejidad de JSX puede ser excesiva.

11. #### **`Resumen`**:

    En resumen, JSX es una extensión de JavaScript que permite la creación de interfaces de usuario de manera más intuitiva y declarativa. Al mezclar HTML con JavaScript, JSX facilita la creación y manipulación de elementos del DOM de manera dinámica y eficiente. Se utiliza comúnmente en bibliotecas y frameworks de JavaScript como React para definir la estructura de la interfaz de usuario y crear componentes reutilizables y modulares. Al comprender y utilizar JSX de manera efectiva, los desarrolladores pueden construir aplicaciones web modernas y escalables.

## **Componentes de React y Funciones Relacionadas en React: Una Explicación Detallada**

1. #### **`Introducción a los Componentes de React`**:

   Los componentes son bloques de construcción fundamentales en React, una biblioteca de JavaScript para construir interfaces de usuario. Un componente es una pieza reutilizable e independiente de la interfaz de usuario que puede contener HTML, CSS y JavaScript.

2. #### **`Importancia de los Componentes`**:

   Los componentes permiten dividir la interfaz de usuario en partes más pequeñas y manejables. Esto facilita el mantenimiento y la reutilización del código, ya que cada componente puede ser desarrollado y probado de manera independiente antes de ser integrado en la aplicación.

3. #### **`Sintaxis y Creación de Componentes`**:

   En React, se pueden crear componentes utilizando funciones o clases. A continuación, se muestra un ejemplo de un componente funcional en React:

   ```jsx
   function MiComponente() {
     return <div>Hola, soy un componente de React</div>;
   }
   ```

4. #### **`Propiedades (Props) en Componentes`**:

   Las propiedades (`props`) son la forma en que los componentes de React pueden recibir datos de su componente padre. Estas se pasan como atributos al componente y se acceden como argumentos de la función del componente.
   Las Props en React son de solo lectura. No se deben modificar en el componente hijo. Si necesitas un valor que pueda cambiar, debe manejarse mediante el estado del componente.

   ```jsx
   function Saludo(props) {
     return <div>Hola, {props.nombre}</div>;
   }

   // Uso del componente con propiedades
   <Saludo nombre="Juan" />;
   ```

5. #### **`Estado en Componentes`**:

   El estado (`state`) es un objeto que contiene datos que afectan la representación de un componente. Es específico de un componente y puede cambiar a lo largo del tiempo en respuesta a interacciones del usuario o cambios en la aplicación.

   ```jsx
   import React, { useState } from "react";

   function Contador() {
     const [contador, setContador] = useState(0);

     return (
       <div>
         <p>Contador: {contador}</p>
         <button onClick={() => setContador(contador + 1)}>Incrementar</button>
       </div>
     );
   }
   ```

6. #### **`Ciclo de Vida de un Componente`**:

   En componentes de clase, hay métodos especiales conocidos como `ciclo de vida` que se ejecutan en diferentes etapas, como montaje, actualización y desmontaje (los componentes funcionales utilizan Hooks para lograr un comportamiento similar).

   - **componentDidMount()**:

     Se ejecuta después de que el componente se monta en el DOM. Es un buen lugar para realizar peticiones de red o suscribirse a eventos.

   - **componentDidUpdate()**:

     Se ejecuta después de que el componente se actualiza en el DOM, lo que puede ocurrir debido a cambios en el estado o las props.

   - **componentWillUnmount()**:

     Se ejecuta antes de que el componente sea eliminado del DOM. Es un buen lugar para limpiar recursos, como desuscribirse de eventos o cancelar peticiones de red.

   Ejemplo con Componente de clase:

   ```jsx
   import React, { Component } from "react";

   class MiComponente extends Component {
     componentDidMount() {
       console.log("Componente montado");
     }

     componentDidUpdate(prevProps, prevState) {
       console.log("Componente actualizado");
     }

     componentWillUnmount() {
       console.log("Componente desmontado");
     }

     render() {
       return <div>Mi Componente</div>;
     }
   }
   ```

7. #### **`Manejo de Eventos en React`**:

   En React, los eventos se manejan utilizando funciones. Por ejemplo, el siguiente código muestra cómo manejar un clic en un botón:

   ```jsx
   function MiComponente() {
     function handleClick() {
       console.log("Botón clickeado");
     }

     return <button onClick={handleClick}>Clic aquí</button>;
   }
   ```

8. #### **`Renderizado Condicional en React`**:

   Permite mostrar diferentes elementos o componentes en función de una condición. Como por ejemplo, el hecho de recibir o no las Props según la necesidad o circunstancia.

   ```jsx
   function MostrarElemento(props) {
     {
       /* If-Else Statement */
     }
     if (props.mostrar) {
       return <div>Elemento visible</div>;
     } else {
       return <div>Elemento oculto</div>;
     }
   }
   ```

   ```jsx
   import HelloWorld from "./HelloWorld.js";

   // Si no recibiéramos una de las dos props, deberíamos crear un condicional
   export function Welcome({ name, age }) {
     return (
       <div>
         {/* Ternary Operator */}
         {name ? <h2>Welcome, {name}</h2> : <HelloWorld />}
         {/* Cuidado con los números al crear condicionales, porque el número 0 por ejemplo es un valor `false` pero también es un valor que React puede renderizar, por lo tanto deberemos tratarlo con cuidado y transformarlo a un valor `Boolean` siempre que trabajemos con números */}
         {Boolean(age) && <p>Your are {age} years.old</p>}
         {/* El número 0 es transformado a `Boolean` nuevamente */}
         {age === 0 && <p>Your are very young!</p>}
       </div>
     );
   }
   ```

9. #### **`Listas y La Clave (Key)`**:

   En React, es común mapear un `array` de datos para renderizar una lista de elementos. Para asegurarse de que React pueda identificar cada elemento de manera única, se utiliza una `key`. Esta es una `prop` especialmente reservada de React para optimizar el renderizado de componentes en una lista.

   ```jsx
   function ListaDeNombres(props) {
     const nombres = props.nombres;
     const listaNombres = nombres.map((nombre) => (
       <li key={nombre.id}>{nombre.nombre}</li>
     ));

     return <ul>{listaNombres}</ul>;
   }
   ```

   ```jsx
   function ListaDeNombres(props) {
     // Llamada a una API...

     // Mapeo de la data devuelta
     const listaNombres = nombres.map((element, index) => (
       <li key={index}>{element.nombre}</li>
     ));

     return <ul>{listaNombres}</ul>;
   }
   ```

10. #### **`Componentes Funcionales vs. Componentes de Clase`**:

    - Los componentes funcionales son funciones de JavaScript que devuelven elementos de React.
    - Los componentes de clase son clases de JavaScript que extienden `React.Component` y tienen un método `render()`.

11. #### **`Hooks en React`**:

Los Hooks son una adición en React 16.8 que permiten asignar un estado y otras características de React en componentes funcionales, lo que antes solo era posible en componentes de clase. Los Hooks tienen una convención y es utilizar siempre `use` delante del nombre del hook. A demás hay que recordar que los Hooks sólo se pueden llamar en en el nivel superior de tu componente funcional, por lo tanto no podrás llamarlo dentro de un ciclo for, de un gestor de un gestor de eventos, de un if-else statement, etc... `Los hooks sólo pueden llamarse dentro del cuerpo del componente funcional y no de forma anidada`.

`Todos los Hooks deben estar siempre en el nivel superior de tu componente`. La razón es que los Hooks en React deben ser llamados en el mismo orden en cada renderizado. Esto significa que no deben estar dentro de bucles, condicionales o cualquier bloque de código que no se ejecute en cada renderizado. `Esto asegura que React pueda rastrear y mantener el estado interno del Hook de manera efectiva`.

Colocar los Hooks en el nivel superior de tu componente `permite que React pueda "recordar" el estado y la lógica entre re-renderizaciones`. Si colocas un Hook dentro de un bloque condicional y ese bloque no se ejecuta en un renderizado posterior, React no sabrá qué hacer con ese Hook y podría resultar en comportamientos inesperados o errores.

Los más comunes son:

- **useState hook**:

  `useState` permite añadir o modificar un estado a un componente y renderizarlo posteriormente a la página. Comienza con una destructuración de array donde el primer elemento es el estado (la variable) que queremos modificar y el segundo es una función para poder modificar ese estado/variable. Posteriormente la función `useState` tiene un argumento, que será el valor inicial de nuestro primer elemento en la destructuración, o sea, la variable.

  Recuerda que `useState es Asíncrono` porque hace una "partición en la memoria" para guardar el valor inicial de la variable del estado `state` que nombramos en la destructuración del array `const [state, setState] = useState(null)`. Esta variable, será lo que renderices en el `return` del componente (la parte HTML), o sea, que va a ser lo primero que se vea en la UI hasta que venga modificado por su función `setState()`. En pocas palabras, la variable de `state` se renderiza en el HTML que devuelve tu componente, se modificada únicamente por su función `setState()` y se inicializa con el valor que le introduzcas a `useState()` en la destructuración.

  Puedes usarlo cuando necesitas mantener y/o actualizar un valor en el componente a través de su función, según la renderización del componente. Por ejemplo, si necesitas almacenar el `event` de un input o el estado de un modal.

  Al final es siempre lo mismo:

  - El `handleChange` va siempre con el `onChange` en el `<input>` y guarda el `event` que introduce el usuario.
  - El `handleClick` va con el `onClick` en el `<button>` y `setea` el valor que ha introducido el usuario.
  - El `useState()` te da la variable que vas a renderizar, que guarda los valores y que se modifica.

  Posee una convención, y es aplicar el mismo nombre de la variable (ej. `estado`), al modificador del estado, con la palabra `set` al inicio (ej. `setEstado()`).

  Sintaxis:

  ```jsx
  import { useState } from "react";

  // El valor de `state` es guardado en una partición de la memoria que será recuperado según la renderización del componente, y después viene modificado a través de su función `setState`
  const [state, setState] = useState(startValueOfState);
  ```

  - `state`:

    Es la variable que va a mantener el estado actual con el valor de `startValueOfState`.

  - `setState`:

    Es una función que te permite actualizar la variable del estado. Esta función toma un argumento, que será el nuevo valor del estado. Este argumento puede ser de dos tipos:

    - Directo: `Estado + modificaciones` que representan el valor inicial de la variable (el valor que está guardado en la memoria) más las modificaciones, que serán las variaciones que cambiarán el valor inicial del estado/variable dentro de `useState`.

    - Función: `Callback` que representa una `arrow-function` que devuelve el estado modificado, igual que la explicación de arriba pero a través de dicha función (`aconsejo usar esta siempre`).

  - `startValueOfState`: Es el valor con el que se inicializa el estado, a través del hook `useState` claramente.

  Ejemplo:

  Contador:

  ```jsx
  import { useState } from "react";

  function Contador() {
    // la variable `contador` empieza desde el número 0
    const [contador, setContador] = useState(0);

    return (
      <div>
        <p>Contador: {contador}</p>
        // Cambio del valor del estado `contador` con `setContador`
        <button onClick={() => setContador(contador + 1)}>
          Incrementar
        </button>{" "}
        // cambio directo al estado "contador"
        <button onClick={() => setContador((c) => c - 1)}>
          Decrementar
        </button> // cambio con callback
      </div>
    );
  }

  export default Contador;
  ```

  Formulario Controlado:

  ```jsx
  import { useState } from "react";

  function Formulario() {
    const [inputValor, setInputValor] = useState("");

    const handleChange = (event) => {
      setInputValor(event.target.value);
    };

    const handleSubmit = (event) => {
      event.preventDefault();
      alert(`Se envió: ${inputValor}`);
    };

    return (
      <form onSubmit={handleSubmit}>
        <input type="text" value={inputValor} onChange={handleChange} />
        <button type="submit">Enviar</button>
      </form>
    );
  }

  export default Formulario;
  ```

  Toggle:

  ```jsx
  import React, { useState } from "react";

  function Alternador() {
    const [visible, setVisible] = useState(true);

    const toggleVisibility = () => {
      setVisible(!visible);
    };

    return (
      <div>
        <button onClick={toggleVisibility}>Alternar Visibilidad</button>
        {visible && <p>Este texto es visible</p>}
      </div>
    );
  }

  export default Alternador;
  ```

- **useEffect hook**:

  `useEffect()` permite realizar efectos secundarios en componentes funcionales. Se ejecuta después de cada renderizado y puede emular varios ciclos de vida de componentes de clase como `componentDidMount`, `componentDidUpdate` y `componentWillUnmount`. Nos permite ejecutar acciones cada vez que ocurre algo.

  Recuerda que las funciones de `useEffect()` deben ser funciones normales, `no pueden ser asíncronas`.

  Este hook te permite llevar a cabo efectos secundarios en tu componente. Esto puede ser útil para realizar acciones como la suscripción a eventos, la carga de datos desde una API o actualizar el DOM después de que el componente se ha renderizado.

  - Memoriza que el código se ejecuta siempre después de cada `Mount` del componente (cada vez que se monta).

  - Ten en cuenta que cada vez que creamos código que al desmontarse pudiera seguir funcionando, tenemos que acordarnos rigurosamente de limpiar o parar el código después de que se desmonte el componente, porque puede provocar varios conflictos y errores. Esto lo conseguimos retornando una función al interno del hook useEffect, porque esa función ejecutará sólo y unicamente después del `Unmount` del componente (cuando se desmonta).

  - Si deseamos simplemente ejecutar un `Update` (actualización del componente) dependiendo de los cambios que puedan ocurrir en base a las actualizaciones de estado (useState), peticiones HTTP con API, la escucha de eventos externos (eventos del navegador o del sistema utilizando los addEventListener y removeEventListener dentro del useEffect), operaciones de limpieza, la manipulación del DOM, escribir algo en una base de datos o modificar una variable global, deberemos utilizar obligatoriamente las `dependencias` correspondientes.

  Sintaxis:

  ```jsx
  import { useEffect } from "react";

  const PruebaUseEffect = () => {
    console.log("Esto se imprime cada vez que el componente se renderiza.");

    useEffect(() => {
      // Código que se acciona cuando cambia una dependencia o siempre que el componente se renderiza si no tiene array
      // Como mínimo se va a ejecutar una vez, al montar el componente

      console.log(
        "Esto se imprime dependiendo de las dependencias, una sola vez si el array de dependencias está vacío (al montar el componente) o cada vez que el componente se renderiza si no tiene array. "
      );
    }, [dependencias]);
  };
  ```

  - `Primer argumento de useEffect`:

    El primer argumento de useEffect es una `arrow-function` (callback). Contiene el código del efecto secundario que quieres que se ejecute cuando el componente se monte `efecto Mount`, o cuando ciertas dependencias cambien `efecto Update`.

    Recuerda que para hacer un `efecto Unmount`, debes retornar una función al interno del `useEffect()` en formato `arrow-function`. Esta función se ejecutará cuando el componente se desmonte. Sirve para limpiar código, como cancelar suscripciones o liberar recursos (como la llamada a una API)

  - `Segundo argumento de useEffect`:

    El segundo argumento es un arreglo de `dependencias` (opcional). Esto nos permite tener "bajo la mira" las dependencias que accionarán nuestro efecto secundario cada vez que cambien. `Normalmente son estados`. Esto puede provocar algunas formas de accionar nuestro primer argumento (callback), de la siguiente manera:

    - `La presencia del array`:

    `Con dependencias` presentes, `[dependencia1, dependencia2]`, indica a React que `el código debe reejecutarse si alguna de esas dependencias cambia`.

    `Si quieres que el efecto se ejecute sólo cuando el componente se monta`, debes pasar un `array vacío` como segundo argumento `[]`.

    - `Si se omite este array`:

    Al `omitir el array dentro del hook indica a React que el efecto secundario se ejecutará cada vez que el componente se renderice`, o sea, que se ejecuta el código por cada modificación que ocurra al interno del componente, pase lo que pase. Si quieres que el efecto se ejecute en cada actualización del componente, puedes omitir el segundo argumento directamente.

  Ejemplo:

  Simulación petición asíncrona:

  ```jsx
  import { useState, useEffect } from "react";

  const EjemploComponente = () => {
    const [datos, setDatos] = useState([]);

    // Arrow function en el primer argumento
    useEffect(() => {
      // Simulando una petición asíncrona a un servidor que se repite cada 2 segundos
      const intervalId = setInterval(() => {
        const nuevosDatos = ["Dato 1", "Dato 2", "Dato 3"];
        setDatos(nuevosDatos);
      }, 2000);

      // efecto `Unmount`, para eliminar la repetición del código una vez que se desmonte el componente
      return () => clearInterval(intervalId);
    }, []); // El segundo argumento (Array vacío []) indica que este efecto se ejecuta solo al montar el componente porque no tiene dependencias. En este caso no sería necesario tenerlas, porque si las tuviera volvería a ejecutar la llamada a la API continuamente al modificarse las dependencias, cosa innecesaria.
    return (
      <div>
        <h2>Datos:</h2>
        <ul>
          {datos.map((dato, index) => (
            <li key={index}>{dato}</li>
          ))}
        </ul>
      </div>
    );
  };

  export default EjemploComponente;
  ```

  Cargar datos desde una API:

  ```jsx
  import { useState, useEffect } from "react";

  function ListaDeUsuarios() {
    const [usuarios, setUsuarios] = useState([]);

    useEffect(() => {
      fetch("https://jsonplaceholder.typicode.com/users")
        .then((response) => response.json())
        .then((data) => setUsuarios(data));
    }, []);

    return (
      <ul>
        {usuarios.map((usuario) => (
          <li key={usuario.id}>{usuario.name}</li>
        ))}
      </ul>
    );
  }

  export default ListaDeUsuarios;
  ```

  Suscripción a eventos globales:

  ```jsx
  import React, { useEffect } from "react";

  function ComponenteConEvento() {
    useEffect(() => {
      // Se crea una función que maneja el evento para que al desmontar el componente y realizar el `componentWillUnmount` haga referencia a la misma memoria de caché, y por lo tanto, a la misma función
      const handleResize = () => {
        console.log("La ventana ha cambiado de tamaño");
      };

      window.addEventListener("resize", handleResize);

      return () => {
        window.removeEventListener("resize", handleResize);
      };
    }, []);

    return <div>Componente con Evento</div>;
  }

  export default ComponenteConEvento;
  ```

  Actualizar el título de la página:

  ```jsx
  import React, { useState, useEffect } from "react";

  function CambiarTitulo() {
    const [contador, setContador] = useState(0);

    useEffect(() => {
      document.title = `Contador: ${contador}`;
    }, [contador]);

    const incrementar = () => {
      setContador(contador + 1);
    };

    return (
      <div>
        <p>Contador: {contador}</p>
        <button onClick={incrementar}>Incrementar</button>
      </div>
    );
  }

  export default CambiarTitulo;
  ```

- **useContext hook**:

  `useContext()` te permite acceder al valor del contexto que ha sido proporcionado por un `.Provider` de contexto superior en jerarquía (es un contenedor que pasa información a los componentes hijos), que a su vez es creado a través de `createContext()` una función de React para crear contextos.

  `createContext()` es una función que acepta solo 1 parámetro (el valor por defecto) y se guarda en una variable para almacenar su valor. Realmente crea un `container` con un valor inicial (el parámetro de la función) para poder compartir información con los componentes hijos sin tener que pasar explícitamente props a través de cada nivel del árbol de componentes y así evitar complicaciones innecesarias de código, permitiendo que cada componente siga siendo reutilizable.

  Sintaxis:

  ```jsx
  import React, { createContext } from "react";

  // Primera letra mayúscula en esta variable siempre
  const Context = React.createContext("valorDelContexto");
  ```

  ```jsx
  import { createContext } from "react";

  // Primera letra mayúscula en la variable
  const LanguageContext = createContext("en");
  ```

  - `Creación del contexto`:

    Esto se hace utilizando la función `createContext()`, que toma un valor por defecto que se utilizará si no hay ningún proveedor de contexto superior (padre). Este valor es opcional y se utiliza principalmente para facilitar el desarrollo, aunque se aconseja utilizarlo para evitar errores.

  - `Proveedor de Contexto`:

    A continuación, necesitas proporcionar un contexto utilizando el componente `.Provider` que se deriva del contexto que has creado. `value` es la prop que se le pasa al proveedor de contexto y conlleva la información que deseas compartir con todos los componentes hijos dentro de este proveedor de contexto.

  - `Acceso al Contexto`:

    Finalmente, en cualquier componente funcional puedes utilizar
    el hook `useContext()` para acceder al valor del contexto. Ahora `valorDelContexto` contiene el valor proporcionado por el proveedor de contexto más cercano en la jerarquía del árbol de componentes. Si no hay proveedor de contexto, se tomará el valor por defecto.

    Para tener acceso al contexto dentro de un componente de clase, deberías utilizar `.Consumer` dentro del método `render()` o en el cuerpo del componente.

  Ejemplo:

  ```jsx
  import { createContext } from "react";
  const MiContexto = createContext();

  const ComponentePadreProvider = ({ children }) => {
    return (
      <MiContexto.Provider value={"Valor del contexto"}>
        {children}
      </MiContexto.Provider>
    );
  };
  ```

  ```jsx
  import { useContext } from "react";
  import { MiContexto } from "./MiContexto";

  const ComponenteHijoConsumer = () => {
    const valorDelContexto = useContext(MiContexto);

    // Acá se harían todas las modificaciones pertinentes para renderizar cosas distintas con el valor del contexto
    return <div>{valorDelContexto}</div>;
  };
  ```

  ```jsx
  const App = () => {
    return (
      <ComponentePadreProvider>
        <ComponenteHijoConsumer />
      </ComponentePadreProvider>
    );
  };

  export default App;
  ```

  En este ejemplo se ve como se utiliza el `createContext` para crear el contexto, después se aplica al componente que proveerá de ese contexto, el `provider`. Posteriormente se utiliza el hook `useContext` para utilizar el contexto creado dentro de otro componente funcional, que será quien utilice ese contexto, este es el `consumer`. Al final se utilizan ambos en el componente de la aplicación principal.

  Ejemplo2:

  ```jsx
  import { createContext } from "react";

  // Crear el contexto
  const ConnectWalletContext = createContext();

  // Crear el proveedor
  const WalletProvider = ({ children }) => {
    const [miEstado, setMiEstado] = useState("Valor inicial");

    return (
      <ConnectWalletContext.Provider value={{ miEstado, setMiEstado }}>
        {children}
      </ConnectWalletContext.Provider>
    );
  };
  ```

  ```jsx
  import { useContext } from "react";

  // Crear el hook personalizado para poder aplicar el estado y modificarlo
  const useProviderHook = () => {
    const context = useContext(ConnectWalletContext);
    if (!context) {
      throw new Error(
        "useProviderHook debe ser usado dentro de WalletProvider"
      );
    }
    return context;
  };
  ```

  ```jsx
  import { useProviderHook } from "./useProviderHook";
  import { WalletProvider } from "./WalletProvider";

  // Uso en un componente
  const MiComponente = () => {
    const { miEstado, setMiEstado } = useProviderHook();

    return (
      <div>
        <p>Estado: {miEstado}</p>
        <button onClick={() => setMiEstado("Nuevo valor")}>
          Actualizar Estado
        </button>
      </div>
    );
  };
  ```

  ```jsx
  // En el componente principal, envuelve la aplicación con el proveedor
  const App = () => {
    return (
      <WalletProvider>
        <MiComponente />
      </WalletProvider>
    );
  };

  export default App;
  ```

  Este código ilustra la creación de un contexto, un proveedor que utiliza ese contexto para proporcionar datos a sus descendientes, un hook personalizado para acceder a esos datos, y un componente que utiliza ese hook para mostrar y actualizar el estado proporcionado por el contexto.

  Ejemplo 3:

  ```jsx
  import React, { createContext, useContext, useState } from "react";

  // Crear el contexto con valor por defecto
  const MiContexto = createContext({
    miEstado: "Valor por defecto",
    setMiEstado: () => {},
  });

  // Crear el proveedor
  const MiProveedor = ({ children }) => {
    const [miEstado, setMiEstado] = useState("Valor inicial");

    return (
      <MiContexto.Provider value={{ miEstado, setMiEstado }}>
        {children}
      </MiContexto.Provider>
    );
  };

  // Crear el hook personalizado
  const useMiHook = () => {
    const context = useContext(MiContexto);
    if (!context) {
      throw new Error("useMiHook debe ser usado dentro de MiProveedor");
    }
    return context;
  };

  // Uso en un componente
  const MiComponente = () => {
    const { miEstado, setMiEstado } = useMiHook();

    return (
      <div>
        <p>Estado: {miEstado}</p>
        <button onClick={() => setMiEstado("Nuevo valor")}>
          Actualizar Estado
        </button>
      </div>
    );
  };

  // En el componente principal, envuelve la aplicación con el proveedor
  const App = () => {
    return (
      <MiProveedor>
        <MiComponente />
      </MiProveedor>
    );
  };

  export default App;
  ```

  Este ejemplo en un solo apartado muestra el uso de un `crateContext` con un `valor por defecto`.

- **useRef hook**:

  `useRef()` te permite crear un objeto mutable que persiste durante todo el ciclo de vida del componente. Esto significa que puedes mantener valores entre renderizaciones sin que provoquen una nueva renderización cuando se actualizan. La mayoría de las veces se utiliza para contener un nodo del DOM.

  Se utiliza para crear referencias a elementos del DOM o para mantener valores mutables que no provocarán una nueva renderización cuando cambien. Esto puede ser útil para interactuar con elementos del DOM, como obtener su valor actual o enfocar un input.

  También funciona para simular una variable `this` de una clase.

  Sintaxis:

  ```jsx
  import { useRef } from "react";

  const Component = () => {
    const refContainer = useRef(null);

    return <input ref={refContainer} />;
  };
  ```

  - `Relación con el atributo ref`:

    En React, el atributo HTML `ref=''` se utiliza para hacer referencia a un elemento del DOM o a un componente de React creado. Puede servir para acceder directamente a un elemento del DOM o para interactuar con un componente React y acceder a sus propiedades desde fuera del mismo componente.

  - `Funcionamiento interno`:

    Devuelve un objeto `refContainer` que es mutable y posee solo una propiedad `.current` que se inicializa con el valor del argumento señalado entre paréntesis `useRef(null)`. Esta propiedad puede ser asignada a cualquier elemento del DOM trámite el atributo `ref` y React no vuelve a renderizar la página cuando cambia su elemento, ni tampoco se vuelve a renderizar si cambia el valor de la propiedad `.current`.

  Ejemplo 1:

  ```jsx
  import { useRef, useEffect } from "react";

  function MyComponent() {
    const myRef = useRef(null);

    useEffect(() => {
      myRef.current.focus(); // Enfoca el elemento cuando se monta el componente (cuando carga la página)
    }, []);

    return <input ref={myRef} />;
  }
  ```

  En este ejemplo, `myRef` será un objeto que contiene una propiedad `.current`. Esta propiedad puede ser asignada a cualquier elemento del DOM. Si asignas `myRef.current` a un elemento, podrás referenciar ese elemento directamente con el valor de tu `useRef()`. Cuando un elemento recibe el foco en una página web, como en este caso, significa que está preparado para recibir entrada del usuario. Esto es especialmente relevante para elementos interactivos como campos de texto, selectores, botones, etc.

  Ejemplo 2:

  ```jsx
  import { useState, useRef } from "react";

  export const ChangeBgColor = () => {
    const count = useRef(null);
    const [number, setNumber] = useState(0);

    const checkNumber = () => {
      if (count.current.value < 10) {
        count.current.style.backgroundColor = "red";
      } else {
        count.current.style.backgroundColor = "green";
      }
    };

    return (
      <div className="App">
        <h1>Enter a number greater than 10</h1>
        <input
          ref={count}
          type="text"
          value={number}
          onChange={(e) => setNumber(e.target.value)}
        />
        <button onClick={() => checkNumber()}>Click</button>
      </div>
    );
  };
  ```

  En este código de ejemplo, el color del elemento de entrada cambia según el número que ingrese en el cuadro de entrada. Primero, asigna el resultado del hook `useRef()` a la variable de conteo. Hay dos elementos: uno de entrada y el botón. El elemento de entrada tiene el valor del número y la propiedad ref de la etiqueta de entrada cuenta para coincidir con la variable.
  Cuando se hace clic en el botón, se llama a la función `checkNumber()`. Esta función verifica si el valor del número es mayor que 10 para luego establecer el color de fondo del elemento de entrada usando la propiedad `count.current.style.backgroundColor`.

- **useMemo hook**:

  `useMemo()` es una herramienta en React que te permite memorizar el resultado de una función y solo recalcularla cuando alguna de sus dependencias cambia. Esto puede ser útil para optimizar el rendimiento de tu aplicación al evitar cálculos costosos en cada renderizado.

  Sintaxis:

  ```jsx
  const memoizedValue = useMemo(() => {
    a + b;
  }, [a, b]);
  ```

  - `Primer argumento de useMemo`:

    Es una herramienta en React que te permite `memoizar` el resultado de una función y solo recalcularla cuando alguna de sus dependencias cambia. React llamará a tu función solo durante el renderizado inicial, guardando en caché el resultado del cálculo. En renderizados posteriores, React devolverá el mismo valor nuevamente si las dependencias no han cambiado desde el último renderizado, si lo hacen, volverá a calcular, devolverá el resultado y lo volverá a guardar. Esta optimización ayuda a evitar cálculos costosos en cada renderizado de la página.

  - `Segundo argumento de useMemo`:

    El array de dependencias contiene las variables que la función utiliza para realizar los cálculos. Si alguna de estas variables cambia, `useMemo()` recalculará la función nuevamente. En cuanto a cuándo debe utilizarse `useMemo()`, es recomendable utilizarlo en cualquier lugar donde se estén realizando cálculos costosos y no es necesario recalcularlos a menos que las dependencias cambien. Es importante tener en cuenta que las dependencias deben ser valores casi inmutables, ya que si una dependencia cambia, el valor `memoizado` se recalcula.

    Recuerda que `una dependencia normalmente es un estado`, como con el hook useEffect.

  Ejemplo:

  ```jsx
  import { useMemo } from "react";

  const props = {
    productos: [
      {
        nombre: "Alcaparras",
        precio: 2.48,
      },
    ],
    tasa: 21 / 100, // 0.21
  };

  const ListaProducto = ({ productos, tasa }) => {
    const tasas = useMemo(() => {
      return productos.map((producto) => {
        return {
          // copia del objeto producto
          ...producto,
          precioConTasas: producto.precio + producto.precio * { tasa },
        };
      });
    }, [productos, tasa]);

    return (
      <ul>
        {tasas.map((producto) => (
          <li key={producto.productos.nombre}>
            `El producto ${producto.productos.nombre} vale $
            {producto.productos.precioConTasas}`
          </li>
        ))}
      </ul>
    );
  };

  <ListaProducto productos={props.productos} tasa={props.tasa} />;

  export default ListaProducto;
  ```

  En el código anterior utilizamos `useMemo` para memorizar el cálculo del precio con impuestos de cada producto en una lista. Utilizamos una función para definir la función que se ejecutará dentro de `useMemo`, y `establecemos las dependencias como productos y tasa. Cada vez que cambian estos valores, la función se vuelve a ejecutar y se actualizan los precios con impuestos`. Luego, utilizamos la variable tasas para renderizar la lista de productos con los precios con impuestos actualizados.

- **useCallback hook**:

  `useCallback()` es un hook de React que tiene como objetivo optimizar el rendimiento de componentes al `memoizar` (cachear) funciones. Esto significa que, si las dependencias de una función no han cambiado, `useCallback()` devolverá la misma función `memoizada` en lugar de crear una nueva en cada renderizado.

  En React, las funciones pueden ser pasadas como `props` a componentes hijos. Si estas funciones se crean en el componente padre y no están `memoizadas`, cada vez que el componente padre se renderice, se creará una nueva instancia de esa función. Esto puede llevar a problemas de rendimiento, especialmente en componentes que se vuelven a renderizar frecuentemente.

  `useCallback()` ayuda a mitigar este problema al memoizar funciones, lo que significa que la misma instancia de función se utilizará en renderizados posteriores si las dependencias no han cambiado. Esto puede reducir el consumo de memoria y mejorar el rendimiento del componente.

  Sintaxis:

  ```jsx
  const memoizedCallbackFunction = useCallback(
    () => {
      // Función que se memoizará (se guardará en el caché)
    },
    [
      /* Dependencias */
    ]
  );
  ```

  - `Primer argumento de useCallback`:

    Es la función que se guardará en la memoria y se utilizará si alguna de las dependencias se modifica

  - `Segundo argumento de useCallback`:

    Un array de dependencias. `La función memoizada se volverá a ejecutar solo si alguna de estas dependencias cambia` para actualizar los valores que devuelve la función pertinente, en base a los cambios sufridos.

    Cuando utilizas `useCallback() con un array de dependencias vacío []`, significa que `está memoizando la función`, `lo que significa que la función ejecutada en la primera renderización se mantendrá en caché y no se volverá a ejecutar` en futuras renderizaciones, `a menos que el componente se monte o desmonte`.

    Esto puede ser útil cuando tienes una función que no depende de ningún valor o estado específico del componente y quieres evitar que se cree una nueva instancia en cada renderizado. `En lugar de crear una nueva función en cada renderización, la misma instancia de la función memoizada se reutiliza`.

    Esta optimización puede ser útil para mejorar el rendimiento en situaciones donde la función no cambia y no necesita ser recalculada en cada renderizado.

  Ejemplo:

  ```jsx
  import { useState, useEffect, useCallback } from "react";

  export function ButtonScroll() {
    const [visible, setVisible] = useState(false);
    const scroll = useCallback(() => {
      window.scrollTo({
        top: 0,
        behavior: "smooth",
      });
    }, []);

    useEffect(() => {
      if (document) {
        var bunny = document.getElementById("bunny");
        bunny.style.transform = "translateY(60px)";
      }

      const handleScroll = () => {
        if (window.scrollY > 500) {
          setVisible(true);
          bunny.style.transform = "translateY(-7px)";
        } else {
          setVisible(false);
        }
      };
      window.addEventListener("scroll", handleScroll);

      return () => {
        window.removeEventListener("scroll", handleScroll);
      };
    });

    return (
      <div>
        <button onClick={scroll}>Scroll Up</button>
      </div>
    );
  }
  ```

  En este código `useCallback()` se utiliza para `memoizar` la función `scroll`. La función `scroll` que guarda el código de `useCallback()` no cambiará a menos que las dependencias pasadas cambien (en este caso hay un array vacío `[]`, por lo que el código no será accionado nuevamente en cada renderizado, a menos que se monte o desmonte). Esto significa que si el componente se vuelve a renderizar pero las dependencias no cambian, se utilizará la misma instancia de la función `scroll` `memoizada`.

Ejemplo aplicando varios hooks contemporáneamente:

```jsx
import { createContext, useContext, useState } from "react";

const TemaContexto = createContext();

const TemaProveedor = ({ children }) => {
  const [tema, setTema] = useState("oscuro");

  const cambiarTema = () => {
    // Acá estamos utilizando el callback de useState `prev` con su valor inicial para modificar los valores o actualizarlos
    setTema((prevTema) => (prevTema === "oscuro" ? "claro" : "oscuro"));
  };

  return (
    <TemaContexto.Provider value={{ tema, cambiarTema }}>
      {children}
    </TemaContexto.Provider>
  );
};

const BotonTema = () => {
  const { cambiarTema } = useContext(TemaContexto);

  return <button onClick={cambiarTema}>Cambiar Tema</button>;
};

const ComponenteConsumidor = () => {
  const { tema } = useContext(TemaContexto);

  return (
    <div
      style={{
        background: tema === "oscuro" ? "#333" : "#fff",
        color: tema === "oscuro" ? "#fff" : "#000",
      }}
    >
      <p>Componente Consumidor</p>p>
    </div>
  );
};

const App = () => {
  return (
    <TemaProveedor>
      <div>
        <BotonTema />
        <ComponenteConsumidor />
      </div>
    </TemaProveedor>
  );
};

export default App;
```

12. #### **`Componentes de Clase vs. Componentes Funcionales con Hooks`**:

    - Los componentes de clase ofrecen un ciclo de vida completo y la capacidad de manejar el estado local.
    - Los componentes funcionales con Hooks llegan con React 16.8 y proporcionan una forma más simple y concisa de trabajar con el estado, el ciclo de vida y otros aspectos de React.

13. #### **`Context en React`**:

El contexto es una característica de React que permite pasar datos a través del árbol de componentes sin tener que pasar props manualmente en cada nivel.

```jsx
import { createContext } from 'react';

const MiContexto = React.createContext();

function Proveedor(props) {
  return <MiContexto.Provider value={/* valor */}>{props.children}</MiContexto.Provider>;
}

function Consumidor() {
  return <MiContexto.Consumer>{valor => /* renderiza algo con el valor */}</MiContexto.Consumer>;
}
```

14. #### **`PropTypes y Tipos en React`**:

PropTypes es una biblioteca que permite validar los tipos de las props pasadas a un componente en React.

```jsx
import PropTypes from "prop-types";

function Saludo(props) {
  return <div>Hola, {props.nombre}</div>;
}

Saludo.propTypes = {
  nombre: PropTypes.string.isRequired,
};
```

15. #### **`Router y Navegación en React`**:
    Para crear aplicaciones de una sola página (SPA), se utiliza una biblioteca de enrutamiento en React como React Router trámite el comando `npm install react-router-dom`.

```jsx
import { BrowserRouter as Router, Switch, Route, Link } from "react-router-dom";

function App() {
  return (
    <Router>
      <div>
        <nav>
          <ul>
            <li>
              <Link to="/">Inicio</Link>
            </li>
            <li>
              <Link to="/acerca">Acerca de</Link>
            </li>
            <li>
              <Link to="/contacto">Contacto</Link>
            </li>
          </ul>
        </nav>

        <Switch>
          <Route path="/acerca">
            <Acerca />
          </Route>
          <Route path="/contacto">
            <Contacto />
          </Route>
          <Route path="/">
            <Inicio />
          </Route>
        </Switch>
      </div>
    </Router>
  );
}
```

16. #### **`Consideraciones Finales y Próximos Pasos`**:

React es una poderosa biblioteca de JavaScript para construir interfaces de usuario interactivas y reactivas. Con un buen entendimiento de los componentes, el estado, las props y otros conceptos fundamentales, puedes construir aplicaciones web modernas y escalables.

## **Pasar Datos con Props en React: Una Explicación Detallada**

1. #### **`Introducción a Props en React`**:

   En React, "props" es una abreviatura de "properties" (propiedades en inglés). Son un mecanismo para pasar datos de un componente padre a un componente hijo. Los props permiten que los componentes sean configurables y reutilizables.

2. #### **`Sintaxis y Uso de Props`**:

   Para pasar props a un componente hijo, simplemente se añaden como atributos en el componente cuando se utiliza en el componente padre. Luego, el componente hijo puede acceder a esos props como argumentos de su función.

   ```jsx
   // En el componente padre
   <ComponenteHijo nombre="Juan" edad={30} />
   ```

   ```jsx
   // En el componente hijo
   const ComponenteHijo = (props) => {
     return (
       <div>
         {props.nombre} tiene {props.edad} años
       </div>
     );
   };
   ```

3. #### **`Props como Argumentos de Función`**:

   En un componente funcional, los props se pasan como un objeto que puede ser desestructurado para acceder a los valores individuales.

   ```jsx
   const ComponenteHijo = ({ nombre, edad }) => {
     return (
       <div>
         {nombre} tiene {edad} años
       </div>
     );
   };
   ```

4. #### **`Props en Componentes de Clase`**:

   En un componente de clase, los props están disponibles a través de `this.props`.

   ```jsx
   class ComponenteHijo extends React.Component {
     render() {
       return (
         <div>
           {this.props.nombre} tiene {this.props.edad} años
         </div>
       );
     }
   }
   ```

5. #### **`Las Props son de Solo Lectura`**:

   Los props en React son de solo lectura. No se deben modificar en el componente hijo. Si necesitas un valor que pueda cambiar, debe manejarse mediante el estado del componente.

6. #### **`Paso de Funciones como Props`**:

   Además de datos, también puedes pasar funciones como props. Esto permite que los componentes hijos interactúen con el componente padre.

   ```jsx
   // En el componente padre (`App.jsx`)
   <ComponenteHijo handleClick={this.handleClick} />
   ```

   ```jsx
   // En el componente hijo (`MiComponente.jsx`)
   <button onClick={props.handleClick}>Click Me</button>
   ```

7. #### **`Propiedades de Componentes Funcionales`**:

   Los componentes funcionales también pueden tener propiedades (props) por defecto. Esto se hace usando el método `defaultProps`.

   ```jsx
   const ComponenteHijo = (props) => {
     return (
       <div>
         {props.nombre} tiene {props.edad} años
       </div>
     );
   };

   ComponenteHijo.defaultProps = {
     nombre: "Usuario",
     edad: 18,
   };
   ```

8. #### **`Uso de Props en la Práctica`**:

   ```jsx
   import React from "react";

   const Usuario = ({ nombre, edad }) => {
     return (
       <div>
         {nombre} tiene {edad} años
       </div>
     );
   };

   const App = () => {
     return (
       <div>
         <h1>Datos del Usuario</h1>
         <Usuario nombre="Juan" edad={30} />
       </div>
     );
   };

   export default App;
   ```

9. #### **`Props en Componentes Anidados`**:

   Puedes pasar props a componentes anidados a través del componente intermedio. Esto sigue el mismo principio de pasar props de un componente padre a un componente hijo.

   ```jsx
   const Abuelo = (props) => {
     return <Padre hijoNombre="Pedro" />;
   };

   const Padre = (props) => {
     return <Hijo nombre={props.hijoNombre} />;
   };

   const Hijo = (props) => {
     return <div>{props.nombre}</div>;
   };
   ```

10. #### **`Props y Componentes de Alto Orden (HOCs)`**:

Los HOCs son patrones avanzados en React donde un componente recibe un componente como argumento y devuelve un nuevo componente con funcionalidades adicionales. Pueden ser utilizados para pasar props adicionales a un componente.

11. #### **`Consideraciones sobre Props`**:

- **Mantenlo Simple**:

  En general, es una buena práctica mantener las props lo más simples y específicas posible. Esto facilita la comprensión y el mantenimiento del código.

- **Nombres Descriptivos**:

  Usa nombres descriptivos para tus props. Esto hará que el código sea más legible y comprensible.

- **Validación de Props**:

  Puedes utilizar `propTypes` para validar los tipos de datos de las props y garantizar que el componente reciba los datos esperados.

  ```jsx
  import PropTypes from "prop-types";

  ComponenteHijo.propTypes = {
    nombre: PropTypes.string.isRequired,
    edad: PropTypes.number.isRequired,
  };
  ```

- **Documentación de Props**:

  Es importante documentar las props que un componente espera recibir. Esto facilita su uso y comprensión por parte de otros desarrolladores.

12. #### **`Conclusión`**:

Pasar datos con props es una parte fundamental de la programación en React. Permite la comunicación entre componentes y es esencial para construir aplicaciones escalables y reutilizables. Comprender cómo funcionan las props y cómo se utilizan correctamente es esencial para desarrollar aplicaciones efectivas en React.

## **Conditional Rendering en React: Una Explicación Detallada**

1. #### **`Introducción al Conditional Rendering`**:

   Conditional Rendering en React se refiere a la capacidad de mostrar diferentes elementos o componentes en función de ciertas condiciones o estados en la aplicación. Esto permite construir interfaces dinámicas que responden a la interacción del usuario o a cambios en los datos.

2. #### **`Uso de Operadores Ternarios para Conditional Rendering`**:

   Uno de los métodos más comunes para el Conditional Rendering es el uso de operadores ternarios (`condition ? true : false`) dentro del JSX. Esto permite renderizar un componente o elemento si una condición es verdadera y otro si es falsa.

   ```jsx
   return <div>{condition ? <Componente1 /> : <Componente2 />}</div>;
   ```

3. #### **`Uso de Operadores Lógicos para Conditional Rendering`**:

   También se pueden utilizar operadores lógicos (`&&` y `||`) para determinar qué elemento o componente se renderiza. Esto se basa en la evaluación booleana de las expresiones.

   ```jsx
   return <div>{isLoggedIn && <Usuario />}</div>;
   ```

   ```jsx
   return <div>{isLoading || <MensajeDeCarga />}</div>;
   ```

4. #### **`Conditional Rendering con if-else`**:

   Aunque no se puede usar una declaración `if-else` directamente en el JSX, puedes utilizar una estructura `if-else` fuera del JSX y luego renderizar el componente apropiado.

   ```jsx
   let componente;
   if (condition) {
     componente = <Componente1 />;
   } else {
     componente = <Componente2 />;
   }

   return <div>{componente}</div>;
   ```

5. #### **`Conditional Rendering con Elementos en una Array`**:

   Puedes usar métodos de Array como `map` para renderizar múltiples elementos condicionalmente, creando operaciones booleanas `num % 2 === 0`.

   ```jsx
   const listaDeComponentes = [1, 2, 3, 4];

   return (
     <ul>
       {listaDeComponentes.map((num) =>
         num % 2 === 0 ? (
           <ComponentePar key={num} />
         ) : (
           <ComponenteImpar key={num} />
         )
       )}
     </ul>
   );
   ```

6. #### **`Conditional Rendering basado en el Estado o Propiedades`**:

   Puedes basar el Conditional Rendering en el estado interno del componente o en las props que recibe.

   ```jsx
   return <div>{this.state.mostrarComponente && <Componente />}</div>;
   ```

   ```jsx
   return (
     <div>{this.props.isLoggedIn ? <Bienvenida /> : <IniciarSesion />}</div>
   );
   ```

7. #### **`Conditional Rendering con Operador de Negación`**:

   El operador de negación `!` puede ser útil para condicionar el renderizado en función de si una condición es falsa.

   ```jsx
   return <div>{!isLoading && <Contenido />}</div>;
   ```

8. #### **`Renderizado Condicional en Componentes de Clase`**:

   En componentes de clase, puedes usar declaraciones `if-else` en el método `render()`.

   ```jsx
   render() {
     if (this.state.mostrarComponente) {
       return <Componente />;
     } else {
       return null;
     }
   }
   ```

9. #### **`Conditional Rendering en la Práctica`**:

   ```jsx
   import React, { Component } from "react";

   class App extends Component {
     constructor(props) {
       super(props);
       this.state = {
         isLoggedIn: true,
       };
     }

     render() {
       return (
         <div>
           {this.state.isLoggedIn ? (
             <div>
               <h1>Bienvenido</h1>
               <button>Cerrar Sesión</button>
             </div>
           ) : (
             <div>
               <h1>Iniciar Sesión</h1>
               <button>Iniciar Sesión</button>
             </div>
           )}
         </div>
       );
     }
   }

   export default App;
   ```

10. #### **`Consideraciones sobre Conditional Rendering`**:

- **Mantenlo Simple**:

  Conditional Rendering es una técnica poderosa pero debe usarse con moderación. Demasiadas condiciones pueden complicar el código y hacerlo menos legible.

- **Separación de Responsabilidades**:

  Es importante mantener la lógica de renderizado condicional separada de la lógica de negocio. Esto facilita la comprensión y el mantenimiento del código.

- **Uso de Componentes Funcionales y de Clase**:

  Ambos tipos de componentes pueden realizar Conditional Rendering. Elige el tipo de componente que mejor se adapte a tus necesidades.

- **Documentación y Comentarios**:

  Cuando se utilizan condiciones complejas, es útil proporcionar documentación o comentarios para explicar el razonamiento detrás del Conditional Rendering.

11. #### **`Cuidado con valores numerales falsy. El 0`**:

En React, incluso si una expresión es considerada como un valor falsy (como `0`), React seguirá renderizándola en el DOM porque de todas formas sigue siendo un número utilizable. Esto es una característica importante de React.

Por lo tanto, si deseas condicionar el renderizado de un componente basado en una variable que podría ser un valor falsy, `debes convertirlo explícitamente a un valor booleano`. Esto se puede hacer utilizando una expresión booleana o una operación de comparación.

En el siguiente ejemplo, la expresión `!!` convierte `valor` a un valor booleano. Esto asegura que se evalúe correctamente en el condicional:

```jsx
const MiComponente = ({ valor }) => {
  if (!!valor) {
    return <div>El valor es verdadero</div>;
  } else {
    return <div>El valor es falso o 0</div>;
  }
};
```

En el próximo ejemplo, también convertimos `valor` en una expresión booleana pero con el constructor por defecto `Boolean()`:

```jsx
const MiComponente = ({ valor }) => {
  if (Boolean(valor)) {
    return <div>El valor es verdadero</div>;
  } else {
    return <div>El valor es falso o 0</div>;
  }
};
```

Y en el último ejemplo, se expone otra forma bastante común, que es utilizar comparaciones explícitas como `===` o `!==` formando operaciones booleanas `valor !== 0`:

```jsx
const MiComponente = ({ valor }) => {
  if (valor !== 0) {
    return <div>El valor no es 0</div>;
  } else {
    return <div>El valor es 0</div>;
  }
};
```

En resumen, al utilizar valores que pueden ser falsy con expresiones condicionales en React, es importante asegurarse de que se esté realizando la comparación adecuada para lograr el comportamiento deseado en tu aplicación.

12. #### **`Conclusión`**:

Conditional Rendering es una técnica fundamental en React que permite construir interfaces dinámicas y reactivas. Al comprender cómo aplicar condicionales en tus componentes, puedes crear aplicaciones que respondan de manera efectiva a las interacciones del usuario y a los cambios en los datos. Es importante utilizar esta técnica de manera prudente para mantener un código limpio y legible.

## **Virtual DOM: Una Explicación Detallada**

1. #### **`Introducción al DOM`**:

   Antes de entender el Virtual DOM (o VDOM), es esencial comprender qué es el DOM. El Document Object Model (DOM) es una representación en forma de árbol de un documento HTML. Cada elemento HTML se convierte en un nodo en este árbol, y podemos interactuar con estos nodos utilizando JavaScript para cambiar la estructura y el contenido de una página web.

2. #### **`Problema de Rendimiento`**:

   Cuando trabajamos con aplicaciones web complejas, especialmente en bibliotecas o frameworks como React, Angular o Vue, hacer cambios en el DOM puede ser costoso en términos de rendimiento. Cada vez que se actualiza el DOM, el navegador debe repintar y recompilar la página, lo que puede llevar tiempo y ralentizar la aplicación.

3. #### **`El Concepto del Virtual DOM`**:

   Para abordar este problema, se introdujo el concepto del Virtual DOM. Es una abstracción ligera del DOM real que reside en la memoria del navegador. Es una copia de la representación actual del DOM, pero no está vinculada a la estructura de la página web.

4. #### **`Cómo Funciona`**:

   - Cuando se realiza un cambio en la aplicación (por ejemplo, un estado de React se actualiza), se crea un nuevo Virtual DOM.

   - Luego, este nuevo Virtual DOM se compara con el Virtual DOM anterior utilizando algoritmos de diferenciación de árboles. Esto permite determinar exactamente qué partes del DOM han cambiado.

   - Después de identificar los cambios, se actualiza solo la parte afectada del DOM real, en lugar de realizar cambios en todo el árbol.

5. #### **`Ventajas del Virtual DOM`**:

   - **Reducción de Operaciones en el DOM Real**:

     Al minimizar los cambios en el DOM real, se reduce la cantidad de trabajo que el navegador debe hacer, lo que mejora significativamente el rendimiento.

   - **Optimización Automatizada**:

     Las bibliotecas y frameworks que utilizan Virtual DOM a menudo tienen mecanismos internos para realizar comparaciones eficientes y actualizar solo lo que es necesario.

   - **Abstracción de la Plataforma**:

     El Virtual DOM proporciona una capa de abstracción entre la plataforma (navegador) y la aplicación, lo que facilita la portabilidad del código a diferentes entornos.

   - **Facilita el Desarrollo**:

     Al no tener que preocuparse tanto por las actualizaciones manuales del DOM, los desarrolladores pueden concentrarse más en la lógica de la aplicación.

6. #### **`Desventajas del Virtual DOM`**:

   - **Consumo de Memoria Adicional**:

     Debido a que se mantiene una copia del DOM en la memoria, puede haber un ligero consumo adicional de memoria. Sin embargo, este costo suele ser insignificante en comparación con los beneficios.

   - **Complejidad Interna**:

     El Virtual DOM añade complejidad al código interno de las bibliotecas y frameworks que lo utilizan. Esto puede hacer que el código sea más difícil de entender para los nuevos desarrolladores.

7. #### **`Uso en React`**:

   React es uno de los frameworks más conocidos que utiliza el Virtual DOM. Cuando se actualiza el estado de un componente en React, se genera un nuevo Virtual DOM y se realiza una comparación para determinar los cambios antes de actualizar el DOM real.

8. #### **`ReactDOM: Importancia y Función`**

   `ReactDOM` es una biblioteca en React que proporciona métodos para interactuar con el DOM (Document Object Model). Su principal responsabilidad es tomar los elementos React (componentes) y renderizarlos en el DOM real, es decir, en la página web que los usuarios ven y con la que interactúan.

   Aquí te explico la importancia y función de ReactDOM:

   - **Renderización de Componentes**:

     La función más fundamental de `ReactDOM` es renderizar componentes React en el DOM real. Esto significa que toma un componente y lo convierte en un conjunto de elementos HTML reales que se muestran en la página.

   - **Reconciliación del Virtual DOM**:

     `ReactDOM` es el encargado de llevar a cabo la reconciliación entre el VDOM y el DOM real. Cuando un componente se actualiza en React, se crea un nuevo VDOM. `ReactDOM` compara este nuevo Virtual DOM con el VDOM anterior y determina qué partes del DOM real deben actualizarse.

   - **Inyección de Componentes en Puntos Específicos**:

     `ReactDOM` proporciona métodos como `ReactDOM.render()` que permiten especificar dónde se debe renderizar un componente en el DOM. Esto es esencial para crear aplicaciones web complejas donde los componentes deben interactuar entre sí y estar ubicados en lugares específicos de la página.

   - **Manejo de Eventos y Ciclo de Vida**:

     `ReactDOM` también se encarga de manejar eventos y el ciclo de vida de los componentes. Por ejemplo, cuando un componente se monta en el DOM, `ReactDOM` asegura que los métodos del ciclo de vida, como `componentDidMount()`, se ejecuten en el momento adecuado.

   - **Re-renderización Eficiente**:

     React es conocido por su eficiencia en la actualización de componentes. `ReactDOM` desempeña un papel crucial en esta eficiencia al utilizar técnicas como la reconciliación del Virtual DOM para actualizar solo las partes del DOM que han cambiado.

   - **Integración con Aplicaciones Existentes**:

     `ReactDOM` permite la integración de componentes React en aplicaciones web existentes. Esto significa que no es necesario reescribir toda una aplicación para utilizar React; se pueden incorporar componentes React en partes específicas de una página web existente.

   - **Facilita el Desarrollo Multiplataforma**:

     Gracias a `ReactDOM`, las aplicaciones React pueden funcionar en diferentes entornos, incluidos navegadores web y plataformas móviles. `ReactDOM` se encarga de la manipulación del DOM en todos estos entornos, lo que facilita la creación de aplicaciones multiplataforma.

   - **Importancia en el Ecosistema React**:

     `ReactDOM` es una parte esencial del ecosistema React. Sin él, no sería posible convertir los componentes React en elementos visibles y funcionales en una página web.

     En resumen, `ReactDOM` es una biblioteca esencial en el ecosistema React que se encarga de la renderización de componentes, la reconciliación del VDOM y la interacción con el DOM real. Su función es crucial para el funcionamiento eficiente y efectivo de las aplicaciones React en el navegador y, si se viera comprometida, nada funcionaría.

9. #### **`Conclusión`**:

   El Virtual DOM es una poderosa técnica para optimizar el rendimiento de las aplicaciones web al minimizar las operaciones en el DOM real. Aunque agrega una capa de complejidad al código interno, los beneficios en términos de rendimiento y eficiencia hacen que valga la pena utilizarlo en aplicaciones web modernas y complejas.

## **Eventos en React y Funciones Relacionadas en React: Una Explicación Detallada**

1. #### **`Introducción a los Eventos en React`**:

   Los eventos en React son acciones que ocurren cuando un usuario interactúa con un elemento de la interfaz, como hacer clic en un botón o mover el cursor sobre una imagen. Estos eventos son manejados por funciones llamadas "manejadores de eventos" que se ejecutan en respuesta a la interacción del usuario.

2. #### **`Sintaxis de Eventos en JSX`**:

   En JSX, los eventos se escriben utilizando una sintaxis similar a la de HTML, pero con camelCase en lugar de minúsculas. Por ejemplo, `onClick` en lugar de `onclick`. Se asigna una función como manejador del evento, y esta se ejecutará cuando ocurra el evento.

   ```jsx
   <button onClick={handleClick}>Haz clic</button>
   ```

3. #### **`Definición de Funciones Manejadoras`**:

   Las funciones manejadoras son funciones de JavaScript que se encargan de manejar un evento específico. Estas funciones deben ser definidas y luego pasadas como referencia en el elemento que generará el evento.

   ```jsx
   function handleClick() {
     alert("Haz hecho clic");
   }
   ```

4. #### **`Paso de Argumentos a Funciones Manejadoras`**:

   A veces, es necesario pasar argumentos adicionales a una función manejadora. Esto se puede hacer utilizando una función de flecha para envolver la función manejadora y pasar los argumentos necesarios.

   ```jsx
   <button onClick={() => handleClickWithArgs("argumento1", "argumento2")}>
     Haz clic
   </button>
   ```

5. #### **`Prevenir el Comportamiento por Defecto`**:

   Algunos elementos HTML tienen comportamientos predeterminados que se activan al ocurrir ciertos eventos (por ejemplo, un formulario que se envía al presionar "Enter"). En React, se puede prevenir este comportamiento utilizando el método `preventDefault()` del evento.

   ```jsx
   function handleSubmit(event) {
     event.preventDefault();
     // Resto del código
   }
   ```

6. #### **`Eventos de Cambio de Estado (State)`**:

   Los eventos en React son a menudo utilizados para actualizar el estado (state) de un componente. Cuando el estado se actualiza, React se encarga de volver a renderizar el componente para reflejar los cambios.

   ```jsx
   function handleInputChange(event) {
     setState({ inputValue: event.target.value });
   }
   ```

   Los eventos de cambio de estado (state) en React son fundamentales para crear componentes más interactivos y dinámicos. Estos eventos permiten que un componente reaccione a las acciones del usuario o a cambios en su entorno y actualice su estado en consecuencia.

   - **Estado en Componentes Funcionales**:

     En los componentes funcionales, el hook `useState` te permite agregar estado a tus componentes. Este hook proporciona una forma de declarar variables de estado y una función para actualizarlas.

     Explicación con ejemplo:

     Si queremos crear un componente funcional con un contador, podemos hacerlo de la siguiente manera:

     ```jsx
     import React, { useState } from "react";

     function Contador() {
       // Declaración del estado
       const [contador, setContador] = useState(0);

       return (
         <div>
           <p>Contador: {contador}</p>
           <button onClick={() => setContador(contador + 1)}>
             Incrementar
           </button>
         </div>
       );
     }
     ```

   - **Inicialización del Estado**:

     La función `useState` retorna un arreglo con dos elementos: el valor actual del estado y una función para actualizarlo. En el ejemplo anterior, `contador` es el valor actual del estado y `setContador` es la función que se utiliza para actualizarlo.

     `useState(0)` inicializa el estado con un valor inicial de `0`.

   - **Actualización del Estado**:

     Para actualizar el estado, utilizamos la función proporcionada por `useState`. En el ejemplo, cuando el botón se presiona, se llama a `setContador` para incrementar el valor actual del contador.

   - **Eventos de Cambio de Estado**:

     Los eventos de cambio de estado se manejan de la misma manera que en los componentes de clase, pero en este caso utilizamos funciones declaradas dentro del componente funcional.

     Ejemplo y explicación:

     Si queremos cambiar el estado en respuesta a un evento, podemos hacer lo siguiente:

     ```jsx
     import React, { useState } from "react";

     function InputText() {
       const [texto, setTexto] = useState("");

       const handleChange = (event) => {
         setTexto(event.target.value);
       };

       return (
         <div>
           <input type="text" value={texto} onChange={handleChange} />
           <p>Texto ingresado: {texto}</p>
         </div>
       );
     }
     ```

     En este ejemplo, el estado `texto` se actualiza cada vez que el usuario escribe algo en el campo de texto.

   - **Uso de Funciones de Flecha**:

     Al igual que en los componentes de clase, se utilizan funciones de flecha para definir las funciones manejadoras de eventos. Esto asegura que el contexto de `this` se mantenga correctamente.

     ```jsx
     import React, { useState } from "react";

     function Contador() {
       const [contador, setContador] = useState(0);

       const incrementarContador = () => {
         setContador(contador + 1);
       };

       return (
         <div>
           <p>Contador: {contador}</p>
           <button onClick={incrementarContador}>Incrementar</button>
         </div>
       );
     }
     ```

   - **Renderización en Cambio de Estado**:

     Al igual que en los componentes de clase, cuando se llama a la función que actualiza el estado, React automáticamente programará una nueva renderización del componente. Esto significa que la interfaz de usuario se actualizará para reflejar el nuevo estado.

   - **Componentes Funcionales y el Hook `useState`**:

     Como se mencionó anteriormente, los componentes funcionales modernos en React hacen uso del hook `useState` para manejar el estado. Esto proporciona una forma más sencilla y concisa de trabajar con el estado en React.

     Por ejemplo, el componente funcional `Contador` mostrado anteriormente es un ejemplo de cómo se puede utilizar el hook `useState` en un componente funcional.

   - **Uso en Conjunto con Otros Hooks**:

     Los componentes funcionales en React pueden hacer uso de una variedad de hooks, como `useState`, `useEffect`, `useContext`, `useRef`, `useMemo`, entre otros. Estos hooks permiten a los componentes funcionales tener funcionalidades similares a los componentes de clase sin la necesidad de gestionar ciclos de vida o estados de manera compleja.

     Por ejemplo, el hook `useEffect` se utiliza para realizar efectos secundarios en componentes funcionales, como suscripciones a datos o manipulación del DOM.

     ```jsx
     import React, { useState, useEffect } from "react";

     function MiComponente() {
       const [contador, setContador] = useState(0);

       useEffect(() => {
         document.title = `Contador: ${contador}`;
       }, [contador]);

       return (
         <div>
           <p>Contador: {contador}</p>
           <button onClick={() => setContador(contador + 1)}>
             Incrementar
           </button>
         </div>
       );
     }
     ```

     En este ejemplo, el título del documento se actualizará cada vez que el contador cambie.

7. #### **`Eventos en Componentes de Clase vs. Funcionales`**:

   En los componentes de clase, los eventos se manejan utilizando métodos. Por ejemplo, `onClick` se maneja con un método llamado `handleClick`. En los componentes funcionales, se utilizan funciones y el hook `useState` para manejar el estado.

   ```jsx
   // Componente de Clase
   class MiComponente extends React.Component {
     handleClick() {
       alert("Haz hecho clic");
     }

     render() {
       return <button onClick={this.handleClick}>Haz clic</button>;
     }
   }
   ```

   ```jsx
   // Componente Funcional con Hooks
   function MiComponente() {
     const handleClick = () => {
       alert("Haz hecho clic");
     };

     return <button onClick={handleClick}>Haz clic</button>;
   }
   ```

8. #### **`Eventos de Ciclo de Vida (Lifecycle Events)`**:

   En componentes de clase, hay métodos específicos que se ejecutan en diferentes etapas del ciclo de vida de un componente (montaje, actualización y desmontaje). Estos métodos pueden ser utilizados para realizar acciones específicas en cada etapa.

   ```jsx
   class MiComponente extends React.Component {
     componentDidMount() {
       // Se ejecuta después de que el componente se monta
     }

     componentDidUpdate() {
       // Se ejecuta después de que el componente se actualiza
     }

     componentWillUnmount() {
       // Se ejecuta antes de que el componente se desmonte
     }

     render() {
       return <div>Contenido del componente</div>;
     }
   }
   ```

9. #### **`Eventos Sintéticos en React`**:

   React normaliza los eventos para garantizar que funcionen de la misma manera en todos los navegadores. Los eventos en React se pasan a las funciones manejadoras como objetos sintéticos en lugar de eventos nativos de navegador.

   ```jsx
   function handleClick(event) {
     event.preventDefault();
     alert("Haz hecho clic");
   }
   ```

10. #### **`Contexto <this> en Funciones Manejadoras`**:

En los componentes de clase, el contexto de `this` en una función manejadora puede ser diferente del componente en sí. Para solucionar esto, es necesario enlazar la función manejadora o utilizar funciones de flecha para mantener el contexto.

```jsx
class MiComponente extends React.Component {
  handleClick() {
    console.log(this); // El contexto de "this" puede ser diferente
  }

  render() {
    return <button onClick={this.handleClick.bind(this)}>Haz clic</button>;
  }
}
```

```jsx
class MiComponente extends React.Component {
  handleClick = () => {
    console.log(this); // "this" siempre se refiere al componente
  };

  render() {
    return <button onClick={this.handleClick}>Haz clic</button>;
  }
}
```

11. #### **`Funciones Flecha como Funciones Manejadoras`**:

Las funciones flecha heredan automáticamente el contexto `this` del ámbito que las rodea, lo que las hace especialmente útiles como funciones manejadoras. Esto evita la necesidad de enlazarlas manualmente.

```jsx
class MiComponente extends React.Component {
  handleClick = () => {
    console.log(this); // "this" siempre se refiere al componente
  };
  render() {
    return <button onClick={this.handleClick}>Haz clic</button>;
  }
}
```

12. #### **`En resumen`**:

Los eventos en React permiten la interactividad en una aplicación al responder a las acciones del usuario. Las funciones manejadoras se utilizan para manejar estos eventos y actualizar el estado o realizar otras acciones según sea necesario. Comprender cómo funcionan los eventos en React es esencial para construir aplicaciones interactivas y dinámicas.

## **Forms - Controlled Form y Funciones Relacionadas en React: Una Explicación Detallada**

1. #### `Introducción a Controlled Forms`:

   En React, los formularios controlados (controlled forms) son una técnica para manejar los datos de un formulario a través del estado de React. Esto significa que el estado de la aplicación mantiene el control sobre los valores de los elementos de formulario. Ofrecen una mayor personalización del formulario a costa de una mayor lógica, porque implementan un controlador de estado y un controlador de eventos.

2. #### `¿Por qué usar Controlled Components?`

   Los Controlled Components en React son una técnica que permite a React manejar el estado de los elementos de un formulario. Esto significa que el valor de los elementos de formulario (como `input`, `select`, y `textarea`) es controlado por el estado de React. Cuando el usuario interactúa con un elemento del formulario, el estado de React se actualiza y eso a su vez actualiza el valor del elemento del formulario. Esto facilita la manipulación de los datos y la interacción con el formulario de manera predecible.

3. #### `Sintaxis y Uso Básico de Formularios Controlados`:

   Para crear un formulario controlado en React, es necesario vincular el valor de cada elemento de formulario (como `input`, `textarea`, `select`, `button`) a una propiedad del estado de React. Luego, se utiliza un controlador de eventos para actualizar el estado cuando el valor del elemento cambia.

   ```jsx
   import React, { useState } from "react";

   const ControlledForm = () => {
     // Creamos un objeto para poder pasarle más de una sola propiedad y así modificar más de una variable contemporaneamente sin escribir un nuevo controlador de estado.
     const [user, setUser] = useState({
       username: "",
       email: "",
     });

     const handleInputChange = (event) => {
       // Hacemos un destructuring de las propiedades de event.target (el nodo HTML) así podemos trabajarlas más facilmente
       const { name, value } = event.target;
       setUser({
         ...user,
         [name]: value,
       });
     };

     // El useRef y el useEffect unicamente se utilizan para crear un `focus` en el primer input del componente. Así el usuario puede empezar a escribir directamente sin ayuda de un mouse
     const inputRef = useRef<HTMLInputElement>(null);
     useEffect(() => {
       inputRef.current?.focus();
     }, []);

     const handleSubmit = (event) => {
       event.preventDefault();
       console.log("Formulario enviado:", user);
     };

     return (
       <form onSubmit={handleSubmit}>
         <input
           type="text"
           name="username"
           ref={inputRef}
           // Ahora el valor será el valor proporcionado al objeto
           value={user.username}
           onChange={handleInputChange}
         />
         <input
           type="email"
           name="email"
           value={user.email}
           onChange={handleInputChange}
         />
         <button type="submit">Enviar</button>
       </form>
     );
   };

   export default ControlledForm;
   ```

   En este ejemplo, `user` es un objeto en el estado que contiene las propiedades `username` y `email`. Los campos de entrada están vinculados a estas propiedades del estado, y cualquier cambio en los campos de entrada invoca la función `handleInputChange` que actualiza el estado a través del gestor de eventos `onChange`.

   Este formato de formulario renderiza demasiadas veces el componente porque con cada cambio que se ejecute volverá a actualizar el componente. Esto crea un uso excesivo de recursos.

4. #### `Evento onChange y Control de Estado`:

   El evento `onChange` es crucial para los formularios controlados. Se dispara cada vez que el valor de un elemento de formulario cambia. Al capturar este evento, puedes actualizar el estado de React con el nuevo valor del elemento.

5. #### `Evento onSubmit y Envío del Formulario`:

   El evento `onSubmit` se dispara cuando se envía el formulario. Al capturar este evento, puedes realizar cualquier acción necesaria antes o después de enviar los datos del formulario.

6. #### `Validación de Datos y Manejo de Errores`:

   Con formularios controlados, es relativamente fácil realizar validaciones de datos antes de enviar el formulario. Puedes agregar lógica de validación en el manejador de envío (`handleSubmit`) antes de realizar cualquier acción.

7. #### `Campos de Formulario de Varios Tipos`:

   Los formularios controlados no se limitan solo a campos de texto. Puedes aplicar el mismo principio a otros tipos de elementos de formulario, como `select`, `textarea`, `radio`, `checkbox`, etc.

8. #### `Beneficios de los Formularios Controlados`:

   - **Un único origen de verdad**:

     El estado de React es la fuente única de verdad para los valores de los elementos del formulario.

   - **Facilita la manipulación de datos**:

     Permite realizar acciones como validaciones de datos o transformaciones antes de enviar el formulario.

   - **Interfaz más predecible**:

     Los cambios en los elementos de formulario son controlados por React, lo que hace que el comportamiento sea más predecible.

9. #### `Consideraciones Finales`:

   - **React-Controlled Forms vs Uncontrolled Forms**:

     Los formularios controlados proporcionan un mayor control sobre los datos y el flujo del formulario en comparación con los formularios no controlados. Sin embargo, la elección entre ambos depende de los requisitos específicos del proyecto.

   - **Librerías de Gestión de Formularios en React**:

     Además de los formularios controlados, hay librerías populares como Formik y React Hook useForm que proporcionan herramientas adicionales y simplifican la gestión de formularios en React.

   - **Prueba y Práctica**:

     Es importante practicar y probar los formularios controlados para comprender completamente su uso y beneficios en el contexto de tu aplicación.

10. #### **`En resumen`**:

Los formularios controlados en React son una técnica poderosa para manejar la entrada de usuario y manipular datos de formularios de manera efectiva. Al comprender y aplicar correctamente esta técnica, puedes crear aplicaciones más interactivas y con una mejor gestión de datos de formulario.

## Forms - Uncontrolled Form y Funciones Relacionadas en React: Una Explicación Detallada

1. #### `Introducción a Uncontrolled Forms`:

   En React los formularios no controlados (uncontrolled forms) son aquellos en los que el valor de los elementos del formulario se maneja por el DOM en lugar de ser controlado por React a través del estado. Necesitan menos lógica y son más simples de utilizar porque no necesitan la implementación de lógica externa para mantener su estado a costa de una personalización menor.

2. #### `¿Cuándo usar Uncontrolled Components?`

   Los componentes no controlados son útiles en situaciones donde no necesitas realizar validaciones de datos o manipulaciones antes de enviar el formulario. Son especialmente útiles cuando se trabaja con bibliotecas o códigos legacy que no están diseñados para funcionar con formularios controlados.

3. #### `Sintaxis y Uso Básico de Formulario no controlado`:

   Para crear un formulario no controlado, simplemente se deja que el DOM maneje el valor del elemento de formulario y se accede a él utilizando referencias `Ref` de React.

    ```jsx
   import React, { useRef } from 'react';

   const ControlledForm = () => {
     // Utilizando useRef
     const usernameRef = useRef<HTMLInputElement>(null);
     const emailRef = useRef<HTMLInputElement>(null);
   
     const handleSubmit = (event: React.FormEvent<HTMLFormElement>) => {
       event.preventDefault();
   
       // Obtenemos los valores actuales de los inputs a través de las referencias
       const username = usernameRef.current?.value || '';
       const email = emailRef.current?.value || '';
   
       // Creamos un objeto para manejar los datos
       const user = {
         username,
         email,
       };
   
       console.log('Formulario enviado:', user);
     };
   
     return (
       <form onSubmit={handleSubmit}>
         <input
           type="text"
           name="username"
           ref={usernameRef}
           autoFocus // Aplicamos autofocus al primer input
           placeholder="Nombre de usuario"
         />
         <input
           type="email"
           name="email"
           ref={emailRef}
           placeholder="Correo electrónico"
         />
         <button type="submit">Enviar</button>
       </form>
     );
   };
   
   export default ControlledForm;
   ```

   En este ejemplo, el componente ControlledForm utiliza referencias `useRef` para manejar los campos del formulario. En lugar de utilizar el estado `useState` para almacenar y actualizar los valores de los campos, se usan referencias `usernameRef` y `emailRef` para acceder directamente a los nodos del DOM.

   Las referencias son especialmente útiles para evitar renderizados innecesarios. A diferencia de `useState`, donde cada cambio en el estado provoca una nueva renderización del componente, el uso de `useRef` permite que los cambios en los valores de los campos de entrada no desencadenen una re-renderización del componente. Esto puede ser beneficioso para el rendimiento en formularios donde no se necesita una actualización reactiva del estado.

   En este ejemplo, el elemento de entrada (`<input>`) no está vinculado a ninguna propiedad de estado. En su lugar, se utiliza una referencia para acceder al valor del elemento de formulario en el DOM. Además, para aplicar el focus al primer input, utilizamos la propiedad autofocus de HTML.

4. #### `Uso de Refs para Acceder a los Elementos del DOM`:

   Las refs (`useRef`) proporcionan una forma de acceder a los nodos del DOM directamente desde el código de React. En el ejemplo anterior, `inputRef.current` se utiliza para obtener el valor del elemento de entrada.

5. #### `Evento onSubmit y Envío del Formulario`:

   El evento `onSubmit` se dispara cuando se envía el formulario. Al capturar este evento, puedes realizar cualquier acción necesaria antes o después de enviar los datos del formulario.

6. #### `Ventajas de los Uncontrolled Forms`:

   - **Simplicidad de Implementación**:

     Los formularios no controlados son más simples de implementar, ya que no requieren el manejo de estado para los componentes del formulario.

   - **Integración con Códigos Legacy**:

     Pueden ser útiles cuando trabajas con códigos heredados o bibliotecas que no están diseñadas para trabajar con formularios controlados.

   - **Interacción con el DOM Externo**:

     Si necesitas interactuar con librerías o código que no está basado en React y que manipula el DOM directamente, los formularios no controlados pueden ser la mejor opción.

7. #### `Consideraciones Finales`:

   - **Limitaciones de los Uncontrolled Forms**:

     No son ideales para situaciones donde necesitas realizar validaciones de datos o manipulaciones antes de enviar el formulario. Tampoco proporcionan el mismo nivel de control que los formularios controlados.

   - **Elección entre Controlled y Uncontrolled Forms**:

     La elección entre formularios controlados y no controlados depende de los requisitos específicos de tu aplicación y del contexto en el que estés trabajando.

   - **Ref y Manipulación del DOM**:

     Al usar formularios no controlados, es importante entender cómo funcionan las refs en React y cómo se pueden usar para interactuar con el DOM.

   - **Prueba y Práctica**:

     Es importante practicar y probar los formularios no controlados para comprender completamente su uso y beneficios en el contexto de tu aplicación.

8. #### **`En resumen`**:

   Los uncontrolled forms en React son una técnica útil para manejar formularios en situaciones específicas. Proporcionan simplicidad y flexibilidad en comparación con los controlled forms, pero es importante entender sus limitaciones y elegir la técnica adecuada según los requisitos de tu proyecto.

## Forms - Como Acceder a los Datos de un Formulario y Funciones Relacionadas en React: Una Explicación Detallada

1. #### **`FormData`**:

   Es un constructor en JavaScript que se utiliza para crear un objeto de pares clave/valor que representa los datos de un formulario HTML. Permite construir fácilmente un conjunto de datos que luego se puede enviar a través de una solicitud HTTP. Por ejemplo, una petición de tipo POST, PUT, etc.

   Esta clase, trabaja con `XMLHttpRequest`.

   Aquí tienes unos pasos a seguir:

   - **Creación de un objeto FormData**:

     Puedes crear un nuevo objeto FormData pasando un formulario HTML como argumento:

     ```jsx
     // Accede al formulario a través del DOM
     const formulario = document.getElementById("miFormulario");

     // Crea el objeto FromData con los datos obtenidos del DOM
     const formData = new FormData(formulario);
     ```

     ```jsx
     // Gestor de eventos
     const handleFormSubmit = (event) => {
       // Previene el comportamiento por defecto de enviar el formulario
       event.preventDefault();

       // Crea un objeto FormData con los datos del formulario
       const formData = new FormData(event.target);

       // Accede a los datos del formulario a través de formData
       // Recuerda que utiliza los atributos HTML `name` para acceder a la información de los inputs
       const data = {
         user: formData.get("user"),
         pass: formData.get("pass"),
         session: formData.get("session") === "on" ? true : false,
       };
     };
     ```

   - **Funciones útiles de FormData**:

     `FormData` posee varias funciones que pueden ser de grande ayuda a la hora de trabajar con este constructor:

     - `.get(key)`:

       Se utiliza para obtener el valor asociado a una key específica en un objeto FormData. `Retorna el primer valor` encontrado asociado a esa clave.

     - `.getAll(key)`:

       Esto nos `retorna` en todos los casos `un Array` con todos los valores asociados a la key que hayamos puesto entre paréntesis, aunque sea solo uno.
       En los objetos podemos tener varios objetos anidados a su vez al interno de una misma key, la cual podría ser generica, como por ejemplo los "intereses" en un formulario de 100 personas.

     - `.append(key, value)`:

       `Agrega un nuevo par key/value` al objeto FormData. Es especialmente útil cuando estás construyendo y enviando formularios a través de solicitudes HTTP, ya que permite añadir nuevos campos de manera dinámica.

     - `.set(key, value)`:

       Es una función que te permite `añadir o modificar valores para un campo específico en el objeto` FormData. Si la key especificada ya existe en el objeto, entonces el value asociado a esa key se actualizará con el nuevo value proporcionado, si no, crea un nuevo key/value.

     - `.delete(key)`:

       `Elimina` la key del objeto y, por lo tanto, también su valor. Esto es útil si deseas quitar un campo específico antes de enviar el formulario, por ejemplo.

     - `.has(key)`:

       Verifica si el objeto FormData contiene una key específica. Funciona como filtrado. `Devuelve un valor Boolean` (true o false) que indica si el campo existe o no.

   - **Enviar FormData a través de una solicitud HTTP**:

     Puedes usar `FormData` para enviar datos a través de una solicitud HTTP, como en una petición `fetch`, en una petición `Ajax` o en una petición `Axios`.

     ```jsx
     const formulario = document.getElementById("miFormulario");
     const formData = new FormData(formulario);

     fetch("url_del_servidor", {
       method: "POST",
       body: formData,
     })
       .then((response) => response.json())
       .then((data) => {
         console.log("Respuesta del servidor:", data);
       })
       .catch((error) => console.error("Error:", error));
     ```

   En resumen, la class FormData, es uno de las formas más standard para conseguir datos de los formularios o trabajar con las peticiones HTTP. Necesita más código, pero es útil para formularios complejos o si necesitas enviar archivos adjuntos.

2. #### **`useRef`**:

   El acceso directo a los elementos HTML de un formulario se refiere a la posibilidad de interactuar con los campos de un formulario sin necesidad de utilizar el estado de React o cualquier otro método de manipulación del DOM.

   En React, esto puede hacerse a través de refs utilizando el hook `useRef`, que proporcionan una manera de acceder directamente a los elementos del DOM dentro de tus componentes. Esto es sumamente útil en los momentos en los cuales deseemos acceder a los elementos del DOM fuera de un gestor de eventos. A demás, hay librerías externas que nos piden una referencia directa a un elemento HTML para poder funcionar, como por ejemplo las librerías de mapas para su renderizado, o las librerías de animaciones que piden una referencia a un nodo DOM para poderlo animar.

   Es el caso de los formularios un ejemplo práctico en el cual podemos utilizar unas refs. Cuando cargamos la página web y tenemos un formulario login, a lo mejor deseamos que se haga un "focus" directo al primer campo del formulario donde el usuario introducirá el nombre/email y la password para poder efectuar el login. Esto lo podemos hacer con un `useRef`.

   Aquí tienes los pasos detallados para acceder directamente a los elementos HTML de un formulario en React:

   - **Crear una Ref**:

     En el componente de React donde se encuentra el formulario, primero debes crear una ref para el elemento que deseas acceder. Puedes hacer esto usando el hook `useRef`.

     ```jsx
     import { useRef } from "react";

     const MyComponent = () => {
       // Se inicializa useRef siempre en null porque no hace falta que tenga ningún valor inicial
       const inputRef = useRef(null);
       // ...
     };
     ```

   - **Asignar la Ref al Elemento**:

     Luego, debes asignar esta ref al elemento HTML dentro del JSX del formulario. Esto se hace utilizando el atributo `ref`.

     ```jsx
     <input ref={inputRef} name="username" type="text" />
     ```

     Ahora, `inputRef` apunta directamente al elemento `<input>` del formulario.

     Cuando estás utilizando `useRef` en un formulario de React, normalmente quieres asignarlo a elementos individuales dentro del formulario, como los elementos de entrada (`<input>`), para poder acceder a sus valores de manera más directa.

     Por ejemplo, si tienes un formulario con varios campos de entrada y deseas acceder a los valores de cada campo, puedes asignar un `useRef` a cada uno de los elementos de entrada. Esto te permitirá obtener y modificar los valores de manera más eficiente.

     ```jsx
     import React, { useRef } from "react";

     function MyForm() {
       const inputRef1 = useRef(null);
       const inputRef2 = useRef(null);

       const handleSubmit = (e) => {
         e.preventDefault();
         console.log(inputRef1.current.value); // Accediendo al valor del primer campo
         console.log(inputRef2.current.value); // Accediendo al valor del segundo campo
       };

       return (
         <form onSubmit={handleSubmit}>
           <input name="nombre" type="text" ref={inputRef1} />
           <input name="password" type="password" ref={inputRef2} />
           <button type="submit">Enviar</button>
         </form>
       );
     }

     export default MyForm;
     ```

   - **Acceder al Valor del Elemento**:

     Una vez que tienes la ref, puedes acceder al valor del elemento en cualquier parte de tu componente.

     ```jsx
     const handleButtonClick = () => {
       const valuePassword = inputRef2.current.value;
       console.log(valuePassword);
     };
     ```

     En este ejemplo, `inputRef2.current` te da acceso al elemento `<input>` del formulario, y `value` contiene el valor del campo de entrada.

   - **Actualizar el Valor del Elemento**:

     Puedes usar la ref para actualizar el valor del elemento si es necesario.

     ```jsx
     inputRef1.current.value = "Nuevo nombre";
     ```

   - **Crear un Focus con useEffect y useRef a un nodo HTML**:

     Como mencionábamos antes, si tuviésemos un formulario de login en nuestra página web y deseáramos que el usuario pudiese escribir directamente al interno del campo correspondiente al login, sin necesidad de tener que mover el cursor hasta estos campos, deberíamos "focalizar" ese elemento HTML a penas la página web cargase. Para hacer esto, deberíamos crear una refs con `useRef` para recibir el valor del nodo HTML de dicho campo y a su vez añadir un `focus` a través de un `useEffect` para que se monte a penas carga el `document`.

     ```jsx
     import React, { useRef, useEffect } from "react";

     function MyForm() {
       const inputRef = useRef(null);
       // Utilizamos el useEffect para que se active el inputRef cuando ocurra algo.
       useEffect(() => {
         // Utilizamos el operador Optional Chaining `?` para verificar si la propiedad precedente al método 'focus()' posee el valor `null` o `undefined`. Si `inputRef.current` está definido, se continuará el código llamando al método `focus()`. Esta forma previene errores.
         inputRef.current?.focus();
       }, []); // Dejamos el array vacío para que se active el efecto cuando se monte el componente. En este caso, al cargar la página.

       const handleSubmit = (e) => {
         e.preventDefault();

         console.log(inputRef.current.value);
       };

       return (
         <form onSubmit={handleSubmit}>
           <input ref={inputRef} name="nombre" type="text" />
           <input name="password" type="password" />
           <button type="submit">Enviar</button>
         </form>
       );
     }

     export default MyForm;
     ```

   En resumen, cuando necesitas interactuar directamente con el DOM, las refs proporcionan una solución útil, aunque es importante tener en cuenta que el uso de refs para acceder directamente a los elementos del DOM debe hacerse con precaución, ya que puede llevar a un código menos declarativo y más propenso a errores. Por lo general, es preferible utilizar formularios controlados y manejar los valores a través del estado de React.

3. #### **`Gestor de eventos`**:

   Acceder a los datos de un formulario a través del gestor de eventos implica utilizar los datos proporcionados por el evento (como `onSubmit` o `onChange`) para obtener y manipular los valores de los campos del formulario.

   A continuación, te proporciono una guía detallada paso a paso:

   - **Agregar el Gestor de Eventos**:

     Primero, asegúrate de tener un formulario en tu componente de React y añade un gestor de eventos, como `onSubmit` y `onChange`.

     Aquí te explico la funcionalidad de cada uno:

     - `onSubmit`:

       Nos envía la información al servidor o simplemente nos devuelve un console.log() de lo que el utente envíe a través del formulario.

       ```jsx
       const handleSubmit = (event) => {
         // `event.preventDefault()` evita el comportamiento predeterminado del formulario (enviar una solicitud) y la recarga de la página
         event.preventDefault();

         // Aquí es donde accederemos y trabajaremos con los datos del formulario
       };

       return (
         <form onSubmit={handleSubmit}>
           {/* ...campos de formulario... */}
           <button type="submit">Enviar</button>
         </form>
       );
       ```

     - `onChange`:

       Nos permite realizar acciones a medida que el usuario escribe en el formulario, de este modo manejaremos los cambios en tiempo real. Es comúnmente utilizado al interno de formularios controlados.

       ```jsx
       const handleInputChange = (event) => {
         const { name, value, type, checked } = event.target;
         // `name` corresponde cada nombre de los campos HTML a los cuales hace referencia el event.target. En este caso serían "username", "password" y "session". `value` es el valor que le introduce el usuario a cada campo, el cual se verá reflejado inmediatamente cuando el usuario escriba.

         // El siguiente trozo de código corresponde a un pedazo del código de un hook `useState` para que vean cómo manejar varios campos contemporáneamente y el porqué tenemos `type` y `checked` desestructurados arriba... Si el campo es de `type` checkbox, me devuelve el valor `checked`, si no, me devuelve el valor `value` correspondiente a cada campo. Esto se hace porque checkbox trabaja con el valor `checked` y no con el valor `value`, entonces accedemos a él a través del tipo de input que es con `type`.
         type === "checkbox"
           ? setUser({ ...user, [name]: checked })
           : setUser({ ...user, [name]: value });
       };

       return (
         <form onSubmit={handleSubmit}>
           <input
             type="text"
             name="username"
             value={user.username}
             onChange={handleInputChange}
           />
           <input
             type="password"
             name="password"
             value={user.password}
             onChange={handleInputChange}
           />
           <input
             type="checkbox"
             name="session"
             value={user.session}
             onChange={handleInputChange}
           />
           {/* Otros campos del formulario */}
           <button type="submit">Enviar</button>
         </form>
       );
       ```

       Aquí, handleChange se ejecutará cada vez que el usuario escriba en el campo.

   - **Obtener Datos del Evento**:

     Dentro del gestor de eventos, tendrás acceso al evento default `event`, el cual contiene información sobre la acción que se está llevando a cabo (por ejemplo, enviar el formulario). Usa `event.target` para acceder al formulario en sí.

     ```jsx
     const handleSubmit = (event) => {
       event.preventDefault();

       const formData = new FormData(event.target);
       // `formData` contiene todos los datos del formulario
     };
     ```

     Aquí estamos utilizando FormData para crear un objeto que contiene todos los campos del formulario y sus valores.

   - **Trabajar con los Datos**:

     Ahora que tienes los datos del formulario en formData, puedes manipularlos según tus necesidades. Por ejemplo, puedes acceder a un campo específico usando `formData.get('fieldName')`.

     ```jsx
     // Controlled Form
     const handleSubmit = (event) => {
       event.preventDefault();

       const formData = new FormData(event.target);

       const data = {
         username: formData.get("username"),
         password: formData.get("password"),
         session: formData.get("session") === "on" ? true : false,
       };

       // Ejecuta petición HTTP con data
       console.log(data);
     };
     ```

     ```jsx
     return (
       <form onSubmit={handleSubmit}>
         <input name="username" type="text"></input>
         <input name="password" type="password"></input>
         <input name="session" type="checkbox"></input>
         <button type="submit">Login</button>
         <button type="reset">Reset</button>
       </form>
     );
     ```

     ```jsx
     // Uncontrolled Form
     import React, { useRef } from "react";

     const UncontrolledForm = () => {
       const inputRef = useRef(null);

       const { detail, setDetail } = useState({
         detail: "",
       });

       const handleInputOnChangeText = (evt) => {
         /**
          ** 1. evt.target es el elemento que ejecuta el evento y obtiene los valores de los inputs (por eso lo desestructuramos)
          ** 2. Desestructuro el objeto `evt.target`
          ** 3. `name` identifica el atributo name del input, `value` describe el valor actual, `type` es el tipo de input y `checked` es el valor booleano que adquieren los checkbox
          */
         const { name, value, type, checked } = evt.target;

         /**
          ** 1. Actualiza el estado del objeto de los inputs
          ** 2. Reemplaza solo el valor del input que ejecutó el evento (`[name]: value` o `[name]: checked`)
          ** 3. Sincroniza el estado del nuevo valor usando `setUser`
          */
         type === "checkbox"
           ? setDetail({ ...detail, [name]: checked })
           : setDetail({ ...detail, [name]: value });
       };

       const handleSubmit = (event) => {
         event.preventDefault();
         const formData = new FormData();
         formData.append("detail", data.detail);

         // Ejecuta petición HTTP con formData
         console.log(formData);
       };

       return (
         <form onSubmit={handleSubmit}>
           <input
             type="text"
             name="detail"
             value={detail.detail}
             onChange={handleInputOnChangeText}
           />
           <button type="submit">Enviar</button>
         </form>
       );
     };

     export default UncontrolledForm;
     ```

     Esto te da acceso directo a los valores de los campos del formulario.

   En resumen, estos pasos te permitirán acceder y trabajar con los datos del formulario a través de los gestores de eventos en React. Recuerda que es una práctica común utilizar formularios controlados siempre que sea posible para mantener un flujo de datos más predecible.

4. #### **`DOM`**:

   Acceder directamente a los elementos HTML de un formulario utilizando la API DOM implica seleccionar y manipular los elementos HTML usando métodos y propiedades proporcionados por el DOM.

   Aquí te explico detalladamente cómo hacerlo:

   - **Obtener una Referencia al Formulario**:

     Primero, necesitas obtener una referencia al formulario en tu código JavaScript. Puedes hacerlo utilizando métodos como `document.getElementById()`, `document.querySelector()`, `document.getElementsByName()`, o cualquier otro selector de elementos.

     Por ejemplo, si tu formulario tiene un ID como "myForm", puedes obtener una referencia de la siguiente manera:

     ```jsx
     const form = document.getElementById("myForm");
     ```

   - **Acceder a los Elementos del Formulario**:

     Una vez que tienes la referencia al formulario, ya sea por ID o por Name, puedes acceder a los elementos individuales dentro de él con `querySelector()` o con `getElementById()` (este último sólo para elementos específicos).

     Por ejemplo, si tienes un campo de texto con un nombre como "username", podrías acceder a él así:

     ```jsx
     const usernameInput = form.querySelector('[name="username"]');
     ```

   - **Obtener o Modificar los Valores de los Elementos**:

     Una vez que has accedido a un elemento, puedes obtener o modificar su valor utilizando las propiedades value o checked para los campos de texto y casillas de verificación, respectivamente.

     Por ejemplo, para obtener el valor de un campo de texto:

     ```jsx
     const usernameValue = usernameInput.value;
     ```

     Y para modificar el valor de un campo de texto:

     ```jsx
     usernameInput.value = "NuevoValor";
     ```

   - **Manipulación Adicional**:

     Puedes realizar otras manipulaciones en los elementos, como añadir o quitar clases, cambiar estilos, agregar eventos, etc.

     Por ejemplo, para añadir una clase a un elemento:

     ```jsx
     usernameInput.classList.add("miClase");
     ```

   En resumen, trabajar con el DOM es una forma común y eficaz para interactuar con los formularios. Esta técnica es especialmente útil para formularios simples o cuando necesitas una solución rápida y directa.

5. #### **`Acceso a través de bibliotecas o frameworks`**:

   En React, puedes acceder a los datos de los formularios utilizando bibliotecas y frameworks específicos que proporcionan funcionalidades adicionales y herramientas para el manejo de formularios. Aquí te presento dos de las bibliotecas más populares para este propósito:

- **Formik**:

  Formik es una biblioteca popular de gestión de formularios en React que simplifica el proceso de creación y validación de formularios. Ofrece una forma sencilla de manejar el estado y las validaciones de los formularios. Facilita la gestión de errores y mensajes de validación. Integra la lógica de envío de formularios con facilidad.

  ```jsx
  import { useFormik } from "formik";

  const MyForm = () => {
    const formik = useFormik({
      initialValues: {
        username: "",
        password: "",
      },
      onSubmit: (values) => {
        console.log(values);
      },
    });

    return (
      <form onSubmit={formik.handleSubmit}>
        <input
          type="text"
          name="username"
          onChange={formik.handleChange}
          value={formik.values.username}
        />
        <input
          type="password"
          name="password"
          onChange={formik.handleChange}
          value={formik.values.password}
        />
        <button type="submit">Submit</button>
      </form>
    );
  };
  ```

- **React Hook useForm**:

  React Hook useForm es otra biblioteca popular que proporciona una forma eficiente de trabajar con formularios en React utilizando hooks. Utiliza hooks para un manejo eficiente de los formularios. Permite un control más granular sobre el estado y las validaciones de los formularios. Ofrece una fácil integración con React Native para el desarrollo de aplicaciones móviles.

  ```jsx
  import { useForm, Controller } from "react-hook-form";

  const MyForm = () => {
    const { handleSubmit, control } = useForm();

    const onSubmit = (data) => {
      console.log(data);
    };

    return (
      <form onSubmit={handleSubmit(onSubmit)}>
        <Controller
          name="username"
          control={control}
          defaultValue=""
          render={({ field }) => <input {...field} />}
        />
        <Controller
          name="password"
          control={control}
          defaultValue=""
          render={({ field }) => <input type="password" {...field} />}
        />
        <button type="submit">Submit</button>
      </form>
    );
  };
  ```

Ambas bibliotecas proporcionan herramientas poderosas para el manejo de formularios en React y permiten un desarrollo más eficiente y organizado. La elección entre Formik y React Hook useForm dependerá de las necesidades específicas de tu proyecto y de tu preferencia personal.

Puedes considerar el uso de `Ajax` también.

## Renderización de Listas (Arrays) y Funciones Relacionadas en React: Una Explicación Detallada

1. #### **`Introducción a la Renderización de Listas en React`**:

   En React, la renderización de listas es un proceso común que implica representar elementos de un arreglo como componentes individuales. Esto es esencial para crear interfaces dinámicas y escalables.

2. #### **`Importancia de la Renderización de Listas`**:

   Permite mostrar conjuntos de datos de manera dinámica sin tener que codificar cada elemento de forma estática. Esto es crucial cuando trabajamos con grandes conjuntos de datos o cuando los datos cambian con el tiempo.

3. #### **`Sintaxis y Ejemplo de Renderización de Listas`**:

   En React, podemos usar el método `map()` para recorrer un arreglo y devolver un nuevo arreglo con componentes React. Por ejemplo:

   ```jsx
   const ListaDeElementos = ({ elementos }) => {
     return (
       <ul>
         {elementos &&
           elementos.map((elemento, index) => {
             return <li key={index}>{elemento}</li>;
           })}
       </ul>
     );
   };
   ```

   En este ejemplo, `elementos` es un arreglo que se mapea para crear una lista de elementos `li`.

4. #### **`Importancia de las Keys`**:

   En la renderización de listas, es crucial proporcionar una `key` única al componente que renderizará cada elemento HTML a través de las iteraciones del array. Esta clave `no hace falta pasarla como props` al componente dado que React la maneja de forma automática, `pero sí hace falta pasarla como atributo`. Esto ayuda a React a identificar los elementos y actualizarlos de manera eficiente cuando cambian o en las renderizaciones. Normalmente se utiliza el `index` del array para asignarlo a la `key`.

   ```jsx
   const users = [
     {
       id: "01",
       name: "John",
     },
     {
       id: "02",
       name: "Mary",
     },
   ];

   const ArrComponent = ({ array }) => {
     return (
       <ul>
         {array &&
           array.map((element, index) => {
             return (
               <li id={element.id} key={index}>
                 {element.name}
               </li>
             );
           })}
       </ul>
     );
   };
   ```

5. #### **`Funciones Relacionadas en JavaScript`**:

   - **Función `map()`**:

     `map()` es un método de los arreglos en JavaScript que crea un nuevo arreglo a partir de aplicar una función a cada elemento del arreglo original. En el ejemplo anterior, `elementos.map(...)` crea un nuevo arreglo de elementos `<li>` a partir de `elementos`.

   - **Función `forEach()`**:

     `forEach()` es otro método de los arreglos que ejecuta una función en cada elemento del arreglo. A diferencia de `map()`, `forEach()` no crea un nuevo arreglo, sino que se utiliza para realizar operaciones en los elementos existentes.

   - **Función `filter()`**:

     `filter()` es un método que crea un nuevo arreglo con todos los elementos que pasan una condición dada. Es útil para obtener subconjuntos de datos basados en ciertos criterios.

   - **Función `reduce()`**:

     `reduce()` es un método que aplica una función a un acumulador y a cada elemento del arreglo (de izquierda a derecha) para reducirlo a un solo valor. Puede ser útil para realizar operaciones como sumas, promedios, etc.

   - **Función `sort()`**:

     `sort()` ordena los elementos de un arreglo y devuelve el arreglo. Por defecto, ordena los elementos como strings, pero se puede pasar una función de comparación para ordenarlos de otra manera.

   - **Función `find()` y `findIndex()`**:

     `find()` devuelve el primer elemento que cumple con una condición dada, mientras que `findIndex()` devuelve el índice del primer elemento que cumple con esa condición.

   - **Función `some()` y `every()`**:

     `some()` verifica si al menos un elemento cumple con una condición, mientras que `every()` verifica si todos los elementos cumplen con esa condición.

   - **Función `slice()`**:

     `slice()` crea una copia superficial de una porción de un arreglo y devuelve esa copia como un nuevo arreglo.

6. #### **`Consideraciones y Mejores Prácticas`**:

   Es importante optimizar la renderización de listas en React para mantener el rendimiento de la aplicación. Algunas buenas prácticas incluyen el uso de keys únicas, evitar operaciones costosas dentro de los callbacks de map y asegurarse de tener una lógica de actualización adecuada.

7. #### **`Conclusiones`**:

   La renderización de listas y las funciones relacionadas son conceptos fundamentales en React y JavaScript en general. Comprender cómo trabajar con arreglos y cómo aplicar funciones en ellos es esencial para construir aplicaciones eficientes y dinámicas. El uso adecuado de keys y la optimización de la lógica de renderizado son aspectos clave para lograr un rendimiento óptimo.

## Styling Components, CSS Modules y Funciones Relacionadas en React: Una Explicación Detallada

1. #### **`Introducción a Styling Components en React`**:

   Styling Components en React se refiere a las técnicas y enfoques utilizados para aplicar estilos visuales a los componentes de una aplicación React. Tradicionalmente, esto se hacía mediante CSS (Cascading Style Sheets), pero con la popularización de React, han surgido diferentes formas de manejar estilos.

2. #### **`CSS en React`**:

   **Estilos en línea (Inline Styles)**:

   Permite aplicar estilos directamente en el elemento usando un objeto de JavaScript.

   ```jsx
   <div style={{ color: "blue", fontSize: "16px" }}>Texto con estilo</div>
   ```

   **Usar clases CSS tradicionales**:

   Se puede usar CSS o SCSS de la misma manera que en una aplicación web tradicional, aplicando nombres de clase a los componentes y/o elementos JSX.

   El nombre del atributo `class` viene cambiado por `className` dado que el primero es una palabra reservada en JavaScript para la Programación Orientada a Objetos (POO), y no se puede utiliza en JSX para asignarle `styles` porque podría crear conflictos y confusiones.

   ```jsx
   <div className="mi-clase-css">Texto con estilo</div>
   ```

3. #### **`CSS Modules en React`**:

   Los CSS Modules son una forma de modularizar los estilos en React. Permiten encapsular los estilos de un componente para evitar conflictos con otros estilos en la aplicación.

   Sintaxis:

   Los archivos de estilos tienen una extensión específica, como `archivo.css` o `archivo.scss`.

   Los nombres de las clases en estos archivos estarán focalizados al componente o elemento de React directamente, esto puede evitar conflictos y confusiones con el otorgamiento de los nombres de las clases.

   **Importaciones y escritura**:

   Asegúrate de que el archivo de estilos `tenga el mismo nombre` que el archivo donde se renderizará.

   `Dentro del archivo de estilos` escribirás tus styles como siempre has hecho, pero el nombre que se le asigna a ese archivo deberá incluir la extensión `.module` después de su proprio nombre, y antes de la extensión del tipo de archivo `.scss` o `.css`.

   Por ejemplo: `MiComponente.module.scss`.

   ```jsx
   // Dentro del archivo MiComponente.module.scss
   .miEstilo {
     color: blue;
     font-size: 16px;
   }
   ```

   `Dentro del archivo donde se importan los estilos` tendrás que importar la palabra reservada `styles` desde el módulo que posee los estilos, y cuando le asignas la `class` o el `className` a tu elemento o componente, deberás escribir la palabra reservada antes del nombre que le quieras dar a esa clase bajo la forma JSX.

   Por ejemplo: `<div className={styles.miEstilo}`.

   ```jsx
   // Dentro del archivo MiComponente.jsx
   import styles from "./MiComponente.module.scss";

   const MiComponente = () => {
     return <p className={styles.miEstilo}>Texto con estilo</p>;
   };
   ```

4. #### **`En Resumen`**:

   - **Styling Components en React** se refiere a la aplicación de estilos hacia los componentes o elementos de React.

   - Se pueden usar **CSS en línea** directamente en los elementos JSX o **clases CSS tradicionales** mediante el uso de `className`.

   - **CSS Modules** son una forma de modularizar estilos en React para evitar conflictos y mantener la encapsulación.

   Estas técnicas y conceptos son esenciales para desarrollar aplicaciones web con React y JavaScript en general. La comprensión de cómo aplicar estilos y organizar funciones relacionadas es fundamental para escribir código efectivo y mantener una base de código bien estructurada y mantenible.

## Tailwind CSS y SCSS: Una Explicación Detallada

1. #### **`Introducción a Tailwind CSS`**:

   Tailwind CSS es un marco de diseño (framework) de utilidades de primera clase para la construcción rápida y eficiente de interfaces de usuario. A diferencia de otros marcos como Bootstrap, Tailwind se centra en proporcionar utilidades de bajo nivel que permiten construir diseños personalizados sin la necesidad de escribir CSS personalizado.

   Se puede utilizar con `CSS` y `SCSS`.

   En React:

   ```jsx
   function MiComponente() {
     return (
       <div className="bg-blue-500 text-white py-2 px-4 rounded">
         Mi Contenido
       </div>
     );
   }
   ```

   En HTML:

   ```html
   <button class="bg-blue-500 text-white py-2 px-4 rounded">Mi Botón</button>
   ```

   `bg-blue-500` establece el fondo azul.

   `text-white` establece el color del texto en blanco.

   `py-2` y `px-4` establecen el espaciado interno (padding) vertical y horizontal.

   `rounded` agrega bordes redondeados al botón.

   Esta es una forma simplificada de trabajar con estilos en comparación con escribir CSS personalizado. Para más especificaciones y detalles puedes consular su web oficial.

   Página oficial y video:

   - VIDEO EXPLICATIVO:

     **https://www.youtube.com/watch?v=booX21Ynopw**

   - GET STARTED (elegir el framework que se utiliza e iniciar):

     **https://tailwindcss.com/docs/installation/framework-guides**

   - EDITOR SET UP:

     **https://tailwindcss.com/docs/editor-setup**

   - USANDO PREPROCESADOR (como SASS, LESS, etc...):

     **https://tailwindcss.com/docs/using-with-preprocessors**

   - IMPORTACIÓN Y DIRECTIVAS DE USO:

     **https://tailwindcss.com/docs/functions-and-directives**

   - UTILIDADES:

     **https://tailwindcss.com/docs/utility-first**

   - UTILIDADES-HOVER:

     **https://tailwindcss.com/docs/hover-focus-and-other-states**

   - MEDIA QUERIES:

     **https://tailwindcss.com/docs/responsive-design**

   - TEMA OSCURO / CLARO:

     **https://tailwindcss.com/docs/dark-mode**

   - ESTILOS PERSONALIZADOS:

     **https://tailwindcss.com/docs/adding-custom-styles**

2. #### **`Filosofía de Tailwind CSS`**:

   La filosofía de Tailwind es promover la utilidad sobre la configuración. En lugar de escribir clases personalizadas en tu CSS, utilizas clases de utilidad directamente en tu marcado HTML para estilizar componentes y diseños.

3. #### **`Clases de Utilidad en Tailwind CSS`**:

   Tailwind proporciona una amplia gama de clases de utilidad que abarcan desde márgenes y rellenos hasta tipografías y colores. Por ejemplo, puedes agregar márgenes a un elemento utilizando clases como `m-4` para un margen de 1rem o `mx-auto` para centrar horizontalmente.

4. #### **`Configuración Personalizada`**:

   Aunque Tailwind ofrece una gran cantidad de utilidades listas para usar, también es altamente configurable. Puedes personalizar colores, fuentes, márgenes y otros aspectos de la apariencia de tu sitio a través de un archivo de configuración.

5. #### **`Integración con Proyectos`**:

   Puedes integrar Tailwind en tu proyecto de varias formas, incluyendo la instalación a través de npm o utilizando CDN en tu HTML. Luego, puedes importar Tailwind en tu CSS o JavaScript según sea necesario.

6. #### **`Tailwind Con Sass (SCSS)`**:

   `SCSS` es una extensión de sintaxis para `CSS` que agrega características como variables, anidamiento y funciones. Permite escribir estilos más limpios y organizados. Tailwind también permite su utilizo pero recuerda que deberás tener `SASS` descargado en tu proyecto, para que se pueda compilar en código válido que los navegadores puedan interpretar.

7. #### **`Instalar Paquete Tailwind y SASS`**:

   - **`Introducción de NPM`**:

     `NPM` fue el primer gestor de paquetes ampliamente utilizado en el ecosistema `Node.js`.
     Viene preinstalado con Node.js y no es necesario instalarlo por separado.

     Incluye un comando que permite a los desarrolladores revisar y solucionar problemas de seguridad en las dependencias:

     ```jsx
     npm audit
     ```

     También utiliza un archivo `package-lock.json` para mantener un registro preciso de las versiones exactas de las dependencias instaladas.

   - **`Introducción de Yarn`**:

     `Yarn` fue desarrollado por Facebook y luego se convirtió en un proyecto de código abierto mantenido por la comunidad.

     Instala las dependencias en paralelo, lo que significa mayor velocidad con respecto a `NPM`.

     Incluye un comando para revisar y solucionar problemas de seguridad:

     ```jsx
     yarn audit
     ```

     Utiliza un archivo `yarn.lock` para rastrear las versiones exactas de las dependencias instaladas.

     Al no estar integrado directamente en `Node.js` hay que instalarlo globalmente a través de este comando:

     ```jsx
     npm install --global yarn
     ```

     ```jsx
     npm i -g yarn
     ```

   - **`Inicia un nuevo proyecto` (si no lo has hecho ya)**:

     Si no tienes un proyecto existente, crea uno nuevo ejecutando el siguiente comando en tu terminal:

     ```jsx
     npm init -y
     ```

     ```jsx
     yarn init -y
     ```

     Esto creará un archivo `package.json` en tu directorio.

   - **`Instalar Tailwindcss` y sus dependencias**:

     Ejecuta el siguiente comando para instalar Tailwind CSS y sus dependencias:

     ```jsx
     npm install tailwindcss postcss autoprefixer
     ```

     ```jsx
     yarn add tailwindcss postcss autoprefixer
     ```

   - **`Configurar Tailwind`**:

     Después de instalar Tailwind, necesitas configurarlo. Puedes hacerlo ejecutando el siguiente comando:

     ```jsx
     npx tailwindcss init -p
     ```

     - `-p`:

       Es un argumento que se pasa al comando init. En este caso, `-p indica que Tailwind debe agregar una configuración de preprocesador a la configuración inicial`. Por lo tanto, si estás utilizando un preprocesador como `Sass` o `Less` en tu proyecto, este comando configurará Tailwind para trabajar con él.

     Esto creará un archivo `tailwind.config.js` y un archivo `postcss.config.js` en tu directorio.

   - **Configurar `tailwind.config.js `** :

     Una vez instalado Tailwind CSS tenemos que añadir los directorios de todos los tipos de archivos y sus extensiones para que Tailwind pueda configurarse correctamente.

     ```jsx
     // Dentro del archivo `tailwind.config.js` escribimos lo que esta dentro de `content`:
     /** @type {import('tailwindcss').Config} */
     export default {
       content: ["./index.html", "./src/**/*.{js,ts,jsx,tsx,scss}"],
       theme: {
         extend: {},
       },
       plugins: [],
     };
     ```

     Ahora le agregamos las directivas correspondientes al archivo `.src/index.css` o `index.scss` al inicio del archivo para que traiga todos los elementos de Tailwind.

     ```css
     @tailwind base;
     @tailwind components;
     @tailwind utilities;
     @tailwind variants;
     ```

     Ahora podrías empezar a ejecutar tu aplicación y trabajar con Tailwind sin ningún problema.

   - **Configurar plugin SASS para Webpack `webpack.config.js`**:

     Si también deseas utilizar SASS, instálalo y agrega el cargador de SASS para Webpack:

     ```jsx
     npm install --save-dev sass sass-loader
     ```

     ```jsx
     yarn add sass sass-loader --dev
     ```

     Luego, agrega el siguiente código en tu archivo `webpack.config.js` para configurar el cargador de SASS:

     ```jsx
     module.exports = {
       module: {
         rules: [
           {
             test: /\.s[ac]ss$/i,
             use: [
               // ...otros cargadores
               "sass-loader",
             ],
           },
         ],
       },
     };
     ```

     Asegúrate de que `sass-loader` esté incluido en la configuración de Webpack.

   - **Configurar plugin SASS para Vite `vite.config.js`**:

     Si deseas utilizar Vite como bundler en vez de webpack, instala los plugins con el siguiente comando:

     ```jsx
     npm install vite-plugin-sass-dts vite-plugin-sass --save-dev
     ```

     ```jsx
     npm i -D vite-plugin-sass-dts vite-plugin-sass
     ```

     **https://www.npmjs.com/package/vite-plugin-sass-dts**

     - `i` o `install`:

       Esto indica que se debe instalar el paquete.

     - `-D` o `--save-dev`:

       Esto indica que el paquete se instalará como una dependencia de desarrollo. Esto significa que el paquete no será necesario para la ejecución normal del proyecto, sino solo durante el desarrollo. No será incluido si alguien más instala o clona tu proyecto.

     ```jsx
     yarn add vite-plugin-sass-dts vite-plugin-sass --dev
     ```

     **https://classic.yarnpkg.com/en/package/vite-plugin-sass-dts**

     - `--dev`:

       Esto en `yarn` es equivalente al `-D` de `NPM`.

     Ahora configura Vite para que trabaje con SASS.
     Abre tu archivo `vite.config.js` en la raíz de tu proyecto y agrega el plugin de SASS:

     ```jsx
     // añadir plugins al archivo vite.config.js
     import { defineConfig } from "vite";
     import react from "@vitejs/plugin-react-swc";
     import sassDts from "vite-plugin-sass-dts";
     import sass from "vite-plugin-sass";

     // https://vitejs.dev/config/
     export default defineConfig({
       plugins: [react(), sassDts(), sass()],
     });
     ```

     Esto configura Vite para utilizar el plugin de SASS cuando procesa tus archivos.

     Ahora, puedes crear archivos `.scss` en tu proyecto y Vite debería procesarlos (compilarlos) automáticamente. Por ejemplo, puedes crear un archivo `styles.scss` en tu directorio `src` y ejecutar tu aplicación con el siguiente comando:

     ```jsx
     npm run dev
     ```

     ```jsx
     yarn dev
     ```

   - **Si no has configurado los plugins debes agregar comandos de construcción en `package.json`**:

     Abre tu archivo `package.json` y agrega los siguientes comandos en la sección de `scripts`:

     ```json
     "scripts": {
       "build": "tailwindcss build src/styles.css -o public/styles.css",
       "watch": "tailwindcss build src/styles.css -o public/styles.css --watch"
     }
     ```

     Esto creará dos comandos: uno para construir tu archivo CSS y otro para observar cambios y compilar automáticamente.

     Ahora puedes crear tus archivos de estilo en el directorio `src` (o cualquier otro directorio que prefieras). Por ejemplo, puedes tener `src/styles.scss`.

   - **Si no has configurado los plugins y deseas iniciar el `proceso de construcción`**:

     Puedes iniciar el proceso de construcción ejecutando el siguiente comando en tu terminal:

     ```jsx
     npm run build
     ```

     ```jsx
     yarn build
     ```

     O si deseas observar cambios y compilar automáticamente:

     ```jsx
     npm run watch
     ```

     ```jsx
     yarn watch
     ```

     Esto generará un archivo CSS optimizado en el directorio `public`.

   ¡Listo! Ahora has configurado Tailwind CSS y SASS en tu proyecto utilizando NPM o Yarn. Puedes comenzar a escribir tu código CSS en archivos SASS y utilizar las utilidades de Tailwind CSS.

8. #### **`Ventajas de Utilizar Tailwind CSS y SCSS Juntos`**:

   Tailwind y SCSS pueden combinarse en un proyecto para aprovechar al máximo las ventajas de ambos. Puedes utilizar las clases de utilidad de Tailwind para estilos rápidos y luego utilizar SCSS para personalizaciones más detalladas y organización de código.

9. #### **`En resumen`**:

   Tailwind CSS es un marco de diseño que se centra en utilidades de bajo nivel para la construcción de interfaces de usuario, mientras que SCSS es una extensión de sintaxis para CSS que agrega características como variables y reglas anidadas para escribir estilos más eficientes y organizados. Al utilizarlos juntos, puedes construir sitios web de manera eficiente y con un código bien organizado.

## Bootstrap React: Una Explicación Detallada

1. #### **`Introducción a Bootstrap`**:

   Bootstrap es un marco de diseño (framework) popular que facilita el proceso de creación de interfaces web atractivas y responsivas. Está basado en HTML, CSS y JavaScript, y proporciona una colección de estilos y componentes predefinidos que puedes utilizar en tu aplicación.

   Bootstrap está muy bien, sin embargo tiene unos estilos muy definidos, lo cual es perfecto para hacer prototipado.

   Página oficial y video:

   - VIDEO EXPLICATIVO:

     **https://www.youtube.com/watch?v=Y6giH81r1WI**

   - GETTING STARTED:

     **https://react-bootstrap.netlify.app/docs/getting-started/introduction**

2. #### **`Integración de Bootstrap en React`**:

   Para integrar Bootstrap en un proyecto de React, puedes instalar la biblioteca de Bootstrap y sus dependencias utilizando npm o yarn. Asegúrate de tener un proyecto React ya configurado antes de comenzar.

   ```jsx
   npm i bootstrap react-bootstrap
   ```

   ```jsx
   yarn add bootstrap react-bootstrap
   ```

   Luego, puedes importar los estilos y componentes de Bootstrap en tus archivos de React según sea necesario.

3. #### **`Uso de Componentes e Importación de Bootstrap en React`**:

   - **Importar Bootstrap usando CSS**:

     Bootstrap proporciona una amplia gama de componentes como botones, barras de navegación, tarjetas, formularios, entre otros. Puedes usar estos componentes directamente en tus archivos de JSX utilizando `CSS` normal.

     Recuerda que si deseas utilizar simplemente los componentes de Bootstrap, no hace falta que importes sus estilos.

     Para `importar el estilo BootStrap en tu CSS`, puedes hacer lo siguiente:

     ```jsx
     // Importar en tu archivo `index.jsx` el CSS de Bootstrap
     import "../node_modules/bootstrap/dist/css/bootstrap.min.css";
     import React from "react";
     import { createRoot } from "react-dom/client";
     import { App } from "./App.jsx";

     createRoot(document.getElementById("root")).render(<App />);
     ```

     Recuerda de comprobar correctamente los directorios de los archivos para ejecutar bien las importaciones.

   - **Importar Bootstrap utilizando SASS**:

     En caso de que esté utilizando `SASS` la forma más sencilla de incluir los archivos fuente de Bootstrap (que encontrarás en `node_modules`), es importarlo directamente en tus archivos `index.jsx`.

     Para `importar el estilo BootStrap en tu SCSS`, puedes hacer lo siguiente:

     ```jsx
     // Importar en tu archivo `index.jsx` el SCSS de Bootstrap
     import "../node_modules/bootstrap/scss/bootstrap.scss";
     import React from "react";
     import ReactDOM from "react-dom/client";
     import { App } from "./App.jsx";

     ReactDOM.createRoot(document.getElementById("root")).render(
       <React.StrictMode>
         <App />
       </React.StrictMode>
     );
     ```

     Recuerda de comprobar los directorios de los archivos.

4. #### **`Mode (Dark/Light)`**:

   Bootstrap ofrece dos estilos que puedes alternar entre ellos: el modo `dark` y el modo `light`. Por defecto, se utiliza el modo claro.

   Puedes aplicar estos estilos a tu página usando la propiedad `data-bs-theme` en el elemento HTML de tu preferencia.

   También se puede aplicar directamente al elemento `<html>` en el archivo `index.html` para modificar toda la página en un solo golpe, pero puedes utilizarlo indistintamente entre los elementos o componentes que desarrolles como prefieras.

   - **data-bs-theme="dark" / data-bs-theme="light"**

     ```html
     <!DOCTYPE html>
     <!-- data-bs-theme="dark" o data-bs-theme="light" -->
     <html lang="en" data-bs-theme="dark">
       <head>
         <meta charset="UTF-8" />
         <link rel="icon" type="image/svg+xml" href="/vite.svg" />
         <meta
           name="viewport"
           content="width=device-width, initial-scale=1.0"
         />
         <title>Vite + React</title>
       </head>
       <body>
         <div id="root"></div>
         <script type="module" src="./src/index.jsx"></script>
       </body>
     </html>
     ```

     En el ejemplo se muestra un archivo `HTML` básico.
     La propiedad `data-bs-theme` se utiliza para definir el tema que se aplicará. Puedes elegir entre `dark` y `light` dependiendo de tus preferencias o de los requisitos de tu aplicación.
     En este caso, se ha establecido `data-bs-theme="dark"`, lo que significa que se aplicará el tema oscuro a la página. Si prefieres el tema claro, simplemente cambia el valor a `light`.
     Esta configuración se aplica a toda la página, lo que significa que afectará a todos los elementos que utilicen los estilos de `Bootstrap`.

   - **`Personalización de Estilos en Bootstrap`**:

     Bootstrap permite la personalización de estilos a través de variables de Sass o CSS personalizado. Puedes modificar las variables de Bootstrap para adaptar el diseño a tus necesidades específicas.

     - **Crea un archivo de configuración**:

       Crea un archivo `bootstrap-custom.css` o `custom-bootstrap.scss` (o cualquier otro nombre que prefieras) en tu proyecto. Este archivo será usado para sobrescribir las variables de Bootstrap.

       Ten presente que si utilizas `SASS` o `CSS` normal, el procedimiento es distinto.

     - **Sobrescribe e Importa las variables en `SCSS`**:

       En el archivo `bootstrap-custom.scss`, puedes sobrescribir las variables que desees. Dentro de este archivo "custom", y unicamente después de haber hecho las modificaciones pertinentes, deberás importar el archivo principal de Bootstrap. Por ejemplo, si deseas cambiar el color primario, puedes hacer lo siguiente:

       ```scss
       // Sobrescribe las variables que necesites en tu archivo `bootstrap-custom.scss`
       $primary: #tuColorPersonalizado;
       $secondary: #tuColorSecundario;

       // Importa Bootstrap después de sobrescribir las variables
       @import "../node_modules/bootstrap/scss/bootstrap";
       ```

       En tu archivo de entrada (por lo general `index.js` o `index.jsx`), importa tu archivo personalizado:

       ```jsx
       import "../node_modules/bootstrap/scss/bootstrap.scss";
       ```

     - **Sobrescribe e Importa las variables en `CSS`**:

       En el archivo `custom-bootstrap.css`, puedes sobrescribir las variables de Bootstrap. Por ejemplo, si deseas cambiar el color primario, puedes hacer lo siguiente:

       ```css
       :root {
         /* Modifica las variables que quieras */
         --primary: #tuColorPersonalizado;
         --secondary: #tuColorSecundario;
       }
       ```

       En tu archivo de entrada (por lo general `index.js` o `App.js`), importa tu archivo personalizado:

       ```jsx
       import "./custom-bootstrap.css";
       ```

       Después de importar tu archivo "customizado", asegúrate de importar el archivo principal de Bootstrap después de tu archivo de estilos personalizado para que las modificaciones de tus variables tengan prioridad:

       ```jsx
       import "bootstrap/dist/css/bootstrap.min.css";
       ```

   Con estos pasos, habrás personalizado las variables preestablecidas de Bootstrap en tu proyecto de React.

5. #### **`Responsive & Grid System`**:

   Una de las características más poderosas de Bootstrap es su sistema de rejilla (Grid System). Te permite crear diseños responsivos que se adaptan a diferentes tamaños de pantalla y dispositivos. Puedes definir columnas y filas para organizar el contenido de tu página de manera eficiente. Esto te permite hacer el famoso `mobile-first`.

   ```jsx
   import React from "react";
   import "bootstrap/dist/css/bootstrap.min.css";

   const MiComponente = () => {
     return (
       <div className="container">
         <div className="row">
           <div className="col-md-6">Contenido de la columna 1</div>
           <div className="col-md-6">Contenido de la columna 2</div>
         </div>
       </div>
     );
   };

   export default MiComponente;
   ```

6. #### **`Eventos y Funciones en Bootstrap`**:

   Bootstrap proporciona eventos integrados para componentes como botones y modales. Puedes usar estos eventos junto con funciones de JavaScript para agregar interactividad a tu aplicación.

   ```jsx
   import React from "react";
   import "bootstrap/dist/css/bootstrap.min.css";
   import { Button } from "react-bootstrap";

   const MiComponente = () => {
     const handleClick = () => {
       alert("Botón clickeado");
     };

     return (
       <Button variant="primary" onClick={handleClick}>
         Clic aquí
       </Button>
     );
   };

   export default MiComponente;
   ```

7. #### **`Integración de JavaScript en Bootstrap`**:

   Bootstrap también incluye componentes interactivos que requieren JavaScript para funcionar correctamente, como modales y pestañas. Asegúrate de incluir la biblioteca de JavaScript de Bootstrap en tu proyecto.

   ```jsx
   import "bootstrap/dist/js/bootstrap.bundle.min.js";
   ```

8. #### **`Consideraciones Finales`**:

   - Bootstrap es una herramienta valiosa para acelerar el desarrollo de interfaces web en React.
   - Puedes personalizar Bootstrap según tus necesidades específicas.
   - Asegúrate de seguir las prácticas de diseño y accesibilidad al utilizar Bootstrap en tu aplicación.

   ¡Con Bootstrap, puedes crear interfaces atractivas y funcionales en tu aplicación de React de manera eficiente!

## Composition & Children en React: Una Explicación Detallada

1. #### **`Introducción a Composition y Children`**:

   Composition & "children" son conceptos fundamentales en React que permiten construir componentes reutilizables y flexibles, combinando y anidando componentes. La `composition` es el proceso de combinar componentes pequeños y reutilizables para crear otros más complejos. La propiedad `children` en los componentes de React te permite incluir y manipular componentes secundarios dentro de un componente padre.

2. #### **`Composition en React`**:

   La `composition` en React se trata de construir interfaces de usuario dividiéndolas en componentes más pequeños y reutilizables. Estos componentes más pequeños se pueden combinar para crear características y diseños más significativos, a demás que más complejos. Este enfoque promueve la reutilización, mantenibilidad y una clara separación de responsabilidades entre componentes.

3. #### **`Uso de Children en React`**:

   En React, la propiedad especial `children` permite que un componente contenga y renderice elementos o componentes secundarios dentro de sí mismo. Esto es especialmente útil cuando se quiere crear un componente que actúe como un contenedor o un envoltorio para otros elementos.

   ```jsx
   function Card({ children }) {
     return <div className="card">{children}</div>;
   }

   function App() {
     return (
       <Card>
         <h2>Título de la Card</h2>
         <p>Contenido de la Card</p>
         <Componente />
       </Card>
     );
   }
   ```

   En este ejemplo, el componente `Card` recibe una `prop` llamada `children` que representa cualquier elemento o componente que se coloque dentro de las etiquetas de apertura y cierre del este componente. En este caso, `children` es un `<h2>`, un `<p>` y un `<Componente />`.

4. #### **`Manipulación de Children`**:

   También puedes manipular e iterar a través de los componentes hijos en React. Las utilidades `React.Children` te permiten mapear, contar o manipular los componentes hijos. Por ejemplo, puedes iterar sobre los hijos y agregar una propiedad a cada uno.

   Este procedimiento tiene un propósito común en React llamado `clonación de elementos`. Permite que el componente padre manipule y pase propiedades adicionales a sus hijos de manera dinámica.

   Esto puede ser útil en situaciones en las que el componente padre necesita proporcionar ciertas configuraciones o información adicional a sus hijos, sin que los hijos necesiten conocer o depender directamente del componente padre.

   Un caso de uso común es cuando se crea un componente de diseño o contenedor que envuelve otros componentes. Este contenedor puede proporcionar estilos, manipular eventos o agregar funcionalidades adicionales a los componentes hijos sin que estos últimos necesiten saberlo.

   En resumen, este procedimiento te da un mayor control y flexibilidad sobre cómo los componentes hijos se comportan dentro del contexto del componente padre.

   Ejemplo:

   Propagando Estilos a los hijos del Contenedor:

   ```jsx
   import React from "react";

   export function Contenedor({ children }) {
     return (
       <div style={{ backgroundColor: "lightskyblue", color: "black" }}>
         {React.Children.map(children, (element) => {
           return React.cloneElement(element, {
             style: {
               color: "white",
               border: "none",
               borderRadius: "20px",
               padding: "10px",
             },
           });
         })}
       </div>
     );
   }
   ```

   ```jsx
   import { Contenedor } from "./components/Children/ChildrenExample.jsx";

   export function App() {
     return (
       <Contenedor>
         <button>Botón 1</button>
         <button>Botón 2</button>
       </Contenedor>
     );
   }
   ```

   Pasando Datos Adicionales:

   ```jsx
   import React from "react";

   export function Contenedor({ children }) {
     return (
       <div>
         {React.Children.map(children, (element, index) => {
           return React.cloneElement(element, {
             id: `elemento-${index}`,
           });
         })}
       </div>
     );
   }
   ```

   ```jsx
   import { Contenedor } from "./components/Children/ChildrenExample.jsx";

   function App() {
     return (
       <Contenedor>
         <div>Elemento 1</div>
         <div>Elemento 2</div>
       </Contenedor>
     );
   }
   ```

   Agregando funcionalidades adicionales:

   ```jsx
   import React from "react";

   export function Contenedor({ children }) {
     return (
       <div>
         {React.Children.map(children, (element) => {
           return React.cloneElement(element, {
             onClick: () => console.log("¡Enlace clickeado!"),
           });
         })}
       </div>
     );
   }
   ```

   ```jsx
   import { Contenedor } from "./components/Children/ChildrenExample.jsx";

   function App() {
     return (
       <Contenedor>
         <a href="#">Enlace 1</a>
         <a href="#">Enlace 2</a>
       </Contenedor>
     );
   }
   ```

5. #### **`Ventajas de Composition y Children`**:

   - **Reutilización de Componentes**:
     Al utilizar la `composition` y `children`, se pueden crear componentes que actúen como contenedores genéricos y reutilizables para diferentes tipos de contenido.

   - **Flexibilidad y Personalización**:
     Permite a los desarrolladores personalizar el contenido que se renderiza dentro de un componente, lo que brinda una gran flexibilidad en la construcción de interfaces.

   - **Abstracción de la Estructura**:
     Los componentes pueden encapsular la estructura y el estilo, lo que facilita el mantenimiento y la modificación de la apariencia de la interfaz.

   - **Mejora la Legibilidad**:
     La `composition` y el uso de `children` pueden hacer que el código sea más legible al separar la estructura de la lógica de presentación.

   - **Facilita la Construcción de Interfaces Complejas**:
     Permite la creación de componentes compuestos por múltiples subcomponentes, lo que facilita la construcción de interfaces complejas.

6. #### **`Consideraciones sobre Composition & Children`**:

   - **Prop Drilling**:
     En casos donde los componentes anidados necesitan acceder a propiedades del componente principal, puede ocurrir el fenómeno conocido como `prop drilling`. Esto se refiere a pasar propiedades a través de múltiples niveles de componentes, lo cual puede volverse incómodo y propenso a errores, sin contar la pérdida de reutilizo de los componentes involucrados. En estos casos, se pueden utilizar otras técnicas como `Context API` o bibliotecas de gestión de estado como Redux.

   - **Context API y Render Props**:
     En situaciones más avanzadas, donde la `Composition` y `Children` pueden volverse complicados, se pueden utilizar otras técnicas como `Context API` o el patrón `Render Props` para gestionar el estado y las propiedades de manera más eficiente.

7. #### **`Conclusiones sobre Composition y Children en React`**:

   La composición y el uso de "children" son conceptos esenciales en React que permiten construir componentes reutilizables y flexibles. Al comprender cómo estos conceptos funcionan, los desarrolladores pueden construir interfaces más dinámicas y complejas, manteniendo un código organizado y fácil de mantener.

   Estos conceptos son fundamentales para el desarrollo efectivo en React y son ampliamente utilizados en la construcción de aplicaciones web y móviles modernas. Al combinar la composición y "children" con otras técnicas avanzadas como Context API o Render Props, los desarrolladores pueden crear aplicaciones React escalables y de alta calidad.

## Contexto y Funciones Relacionadas en React: Una Explicación Detallada

1. #### **`Introducción a Context en React`**:

   El Contexto en React es una característica que facilita la propagación de datos en un árbol de componentes sin tener que pasar explícitamente las props a través de cada nivel del árbol.

2. #### **`createContext`**:

   `createContext` es una función que proporciona un contexto en React. Un contexto en React es esencialmente un mecanismo para compartir datos entre componentes sin tener que pasar props manualmente a través de cada nivel del árbol de componentes.

   Para crear un Contexto en React se utiliza la función `React.createContext()` o directamente `createContext()`, la cual posee un solo argumento dentro de paréntesis, correspondiente al `valor por defecto` con el que empieza el Contexto. `Este valor inicial es el valor que se utiliza cuando no hay un proveedor envolviendo los componentes que consumen el contexto`. Esto es importante porque si no se proporciona un valor por defecto, intentar consumir el contexto fuera del proveedor provocará un error.

   Si no tenemos ningún `.Provider`, se acciona el valor por defecto del `createContext()` porque no hay ningún componente proveedor de contextos.

   Esta función devuelve un objeto con dos componentes:

   - **Provider**:

     Es un componente que podemos usar para almacenar el valor que deseamos compartir con cualquier otro elemento o componente que sea parte de su subárbol. `Cualquier hijo del proveedor podrá acceder al valor del proveedor`.

   - **Consumer**:

     Es la función o componente que nos permite acceder al valor del proveedor con `useContext()` y/o `.Provider`.

     ```jsx
     import { createContext, useContext } from "react";
     import React from "react";

     const MiContexto = React.createContext("valor por defecto");
     ```

     ```jsx
     import { createContext } from "react";

     const MiContexto = createContext("valor por defecto");
     ```

3. #### **`Provider`**:

   El componente `.Provider` se utiliza para envolver al árbol de componentes hijos donde se desea compartir el contexto. Se proporciona un valor que será accesible a través del contexto.

   ```jsx
   <MiContexto.Provider value={valor}>
     {/* Componentes o Elementos hijos */}
   </MiContexto.Provider>
   ```

4. #### **`Consumer`**:

   Para acceder al valor proporcionado por el `.Provider`, se utiliza el componente `.Consumer`. Este componente debe englobar una función como hijo que recibirá el valor del contexto como argumento y devolverá algo relacionado con él.

   ```jsx
   <MiContexto.Consumer>
     {(valor) => {
       return; /* Renderizar algo basado en el contexto */
     }}
   </MiContexto.Consumer>
   ```

5. #### **`useContext`**:

   En un componente funcional, se puede utilizar el Hook `useContext()` para consumir el contexto.

   ```jsx
   import { useContext } from "react";

   const valor = useContext(MiContexto);
   ```

6. #### **`Propagación de Contexto`**:

   El contexto se propaga hacia abajo a través de los componentes hijos, lo que significa que cualquier componente descendiente del `.Provider` puede consumir el contexto.

   Ejemplo:

   Cambio de theme:

   ```jsx
   // Crear el Provider (aquí se crea el componente padre y los useState necesarios para hacer las modificaciones)
   import { createContext } from "react";

   // Creación del contexto (en este caso tiene un valor por defecto)
   export const ThemeContext = createContext("light");

   export const ThemeProvider = ({ children }) => {
     const [theme, setTheme] = useState("light");

     const changeTheme = (theme) => {
       setTheme(theme);
     };

     return (
       <ThemeContext.Provider value={{ theme, changeTheme }}>
         {children}
       </ThemeContext.Provider>
     );
   };
   ```

   ```jsx
   // Crear el Consumer (aquí se desarrolla la parte relevante del código)
   import { useContext } from "react";
   import { ThemeContext } from "./ThemeContext";

   export const ThemeConsumer = () => {
     const { theme, changeTheme } = useContext(ThemeContext);

     return (
       <>
         <button value={theme} onClick={() => changeTheme("dark")}>
           El tema actual es oscuro
         </button>
         <button value={theme} onClick={() => changeTheme("light")}>
           El tema actual es claro
         </button>
       </>
     );
   };
   ```

   ```jsx
   // Renderizado
   import { ThemeProvider } from "./ThemeProvider";
   import { ThemeConsumer } from "./ThemeConsumer";
   import { ComponentChildren } from "./ComponentChildren";

   function App() {
     return (
       <ThemeProvider>
         <ThemeConsumer />
         <ComponentChildren />
       </ThemeProvider>
     );
   }

   export default App;
   ```

   Idioma de la aplicación:

   ```jsx
   // Creación del Provider
   import { createContext, useState } from "react";

   export const LanguageContext = createContext();

   export const LanguageProvider = ({ children }) => {
     const [language, setLanguage] = useState("en-GB");

     const changeLanguage = (language) => {
       setLanguage(language);
     };

     return (
       <div
         style={{
           padding: "20px",
           display: "flex",
           flexFlow: "column wrap",
           alignItems: "flex-start",
           gap: "10px",
         }}
       >
         <LanguageContext.Provider value={{ language, changeLanguage }}>
           {children}
         </LanguageContext.Provider>
       </div>
     );
   };
   ```

   ```jsx
   // Creación del Consumer
   import { LanguageContext } from "./LanguageContext";

   export const LanguageConsumer = () => {
     const { language, changeLanguage } = useContext(LanguageContext);

     return (
       <>
         <select
           value={language}
           onChange={(e) => changeLanguage(e.target.value)}
         >
           <option value={"en-GB"}>English</option>
           <option value={"es-ES"}>Spanish</option>
         </select>
         {language === "en-GB" ? (
           <h4>The current time is: </h4>
         ) : (
           <h4>La hora actual es: </h4>
         )}
       </>
     );
   };
   ```

   ```jsx
   // Renderizado
   import { LanguageProvider } from "./LanguageProvider";
   import { LanguageConsumer } from "./LanguageConsumer";
   import { ComponentChildren } from "./ComponentChildren";

   export const App = () => {
     return (
       <LanguageProvider>
         <LanguageConsumer />
         <ComponentChildren />
       </LanguageProvider>
     );
   };
   ```

7. #### **`Uso de Contexto en Componentes de Clase`**:

   En clases de componentes, se utiliza `Context.Consumer` en el método `render()` para consumir el contexto.

   ```jsx
   class ConsumidorComponente extends React.Component {
     render() {
       return (
         <MiContexto.Consumer>
           {(valor) => <div>El valor de contexto es: {valor}</div>}
         </MiContexto.Consumer>
       );
     }
   }
   ```

   También se puede acceder al contexto utilizando `static contextType`.

   ```jsx
   class ConsumidorComponente extends React.Component {
     static contextType = MiContexto;

     render() {
       return <div>El valor de contexto es: {this.context}</div>;
     }
   }
   ```

8. #### **`Recomendaciones y Buenas Prácticas`**:

   - El Contexto es ideal para datos que son necesarios en muchos componentes anidados, pero su uso excesivo puede hacer que sea difícil rastrear de dónde proviene un valor.

   - Si un componente solo necesita consumir un valor de contexto, el uso de `useContext()` en componentes funcionales es una forma más concisa.

   - Si un componente necesita tanto consumir como proporcionar un valor de contexto, el uso de `useContext()` y `.Provider` en conjunto dentro de un componente funcional, es una buena opción.

9. #### **`Conclusiones`**:

   Context en React es una poderosa herramienta para la gestión de estado y la propagación de datos en una aplicación. Al entender cómo crear y consumir contextos, puedes simplificar la comunicación entre componentes y reducir la necesidad de pasar props a través de múltiples niveles de componentes. Sin embargo, es importante utilizar contextos de manera adecuada y no abusar de ellos para mantener un código limpio y fácil de mantener.

## Data fetching with useEffect y Funciones Relacionadas en React: Una Explicación Detallada

1. #### **`Introducción a Data Fetching con useEffect y Funciones Relacionadas en React`**:

   En React, `data fetching` se refiere a la obtención de datos de una fuente externa, como una API, y luego usar esos datos en un componente React. Esto es crucial para construir aplicaciones web dinámicas y en tiempo real.

2. #### **`useEffect en React`**:

   `useEffect()` es un gancho (hook) proporcionado por React que permite realizar efectos secundarios en componentes funcionales. Los efectos secundarios pueden ser, entre otras cosas, solicitudes de red, manipulación del DOM y subscripciones a eventos. Es una alternativa a los ciclos de vida de los componentes en las clases de React.

3. #### **`Importancia de useEffect`**:

   - **Asincronía y Cambios en el Ciclo de Vida**:

     Con `useEffect()`, puedes gestionar operaciones asíncronas sin tener que preocuparte por los problemas de sincronización y la complejidad del ciclo de vida de los componentes de clase.

   - **Prevención de Efectos Secundarios Inesperados**:

     `useEffect()` se asegura de que los efectos se ejecuten en el momento adecuado, evitando así problemas comunes que pueden surgir con las actualizaciones de estado asincrónicas.

   - **Ejecución Después del Renderizado**:

     Los efectos definidos en `useEffect()` se ejecutan después de que el componente se haya renderizado, lo que garantiza que los cambios en el DOM o en el estado del componente sean reflejados adecuadamente.

4. #### **`Sintaxis y Uso de useEffect`**:

   ```jsx
   import { useState, useEffect } from "react";

   const ExampleComponent = () => {
     const [isPending, setIsPending] = useState(true);
     const [data, setData] = useState([]);
     const [error, setError] = useState(null);

     useEffect(() => {
       setIsPending(true);
       fetch("https://api.example.com/data")
         .then((response) => response.json())
         .then((data) => setData(data))
         .catch((err) => {
           setError(err.message);
           console.error("Error:", err.message);
         })
         .finally(() => setIsPending(false));
     }, []); // El segundo argumento (arreglo de dependencias) determina cuándo se debe ejecutar el efecto. En este caso, solo al montar (Mount) el componente.

     return (
       <>
         {isPending && <h2>Is Loading...</h2>}
         {data &&
           data.map((element, index) => {
             return (
               <div key={index}>
                 <div>{element.name}</div>
                 <img
                   src={element.avatar_url}
                   alt={`Avatar of ${element.id}`}
                 />
                 <span>{element.login}</span>
               </div>
             );
           })}
         {error && <h2>{error}</h2>}
       </>
     );
   };
   ```

   - En este ejemplo, `useEffect()` es llamado dentro del componente `ExampleComponent`.

   - El efecto realiza una solicitud a una API y actualiza el estado `data` con la respuesta.

5. #### **`Manejo de Estado en React`**:

   `useState()` es otro gancho de React que permite añadir estado a componentes funcionales. Permite que los componentes funcionales gestionen el estado de manera similar a los componentes de clase.

   ```jsx
   import { useState } from "react";

   const ExampleComponent = () => {
     const [state, setState] = useState(initialState);
   };
   ```

   Recuerda que `state` es la variable que es renderizada y que contiene el estado guardado en la memoria. Mientras que `setState` es la función que permite actualizar ese estado.

6. #### **`Funciones Relacionadas en React`**:

   - **Axios**:

     `axios` es una librería popular para hacer solicitudes HTTP en JavaScript, ampliamente utilizada en aplicaciones de React para interactuar con APIs.

     ```jsx
     npm i axios
     ```

     ```jsx
     import axios from "axios";

     axios
       .get("https://api.example.com/data")
       .then((response) => console.log(response.data))
       .catch((err) => console.error("Error:", err.message));
     ```

   - **fetch**:

     `fetch` es una función de JavaScript para hacer solicitudes HTTP. Es parte del estándar de JavaScript y se puede usar sin instalar ninguna librería adicional.

     ```jsx
     fetch("https://api.example.com/data")
       .then((response) => response.json())
       .then((data) => console.log(data))
       .catch((error) => console.error("Error:", error.message));
     ```

   - **Async/Await**:

     `async/await` es una característica de JavaScript que permite escribir código asíncrono de manera más similar a código síncrono. Puede ser usado con `axios` o `fetch` para hacer solicitudes a APIs.

     ```jsx
     const fetchData = async () => {
       try {
         const response = await axios.get("https://api.example.com/data");
         const data = await response.data;
         console.log(data);
       } catch (err) {
         console.error("Error:", err.message);
       }
     };
     ```

7. #### **`Consideraciones y Buenas Prácticas`**:

   - **Manejo de Errores**:

     Siempre maneja errores adecuadamente al hacer solicitudes de red. Usa `try...catch` o `.catch` en las promesas.

     También recuerda que puedes crear tus proprios errores con `throw new Error` dentro de un `if...else`.

   - **Optimización**:

     Considera el rendimiento al hacer múltiples solicitudes. Podrías necesitar técnicas como el uso de `Promise.all` para manejar múltiples promesas de manera eficiente.

   - **Limpieza de Efectos**:

     Si `useEffect()` devuelve una función, esta se ejecutará cuando el componente se desmonte. Esto es útil para limpiar cualquier recurso o subscripción que se haya creado durante el efecto.

   - **Dependencias de useEffect**:

     El segundo argumento de `useEffect()` es un arreglo de dependencias. Este arreglo determina cuándo se debe ejecutar el efecto. Si está vacío, el efecto se ejecuta solo una vez al montar el componente. Si contiene variables, el efecto se ejecutará cuando esas variables cambien.

   - **Pruebas Unitarias**:

     Asegúrate de probar adecuadamente las funciones de data fetching en tus componentes. Puedes utilizar herramientas como `Jest` y `React Testing Library`.

8. #### **`Conclusión`**:

   Comprender cómo realizar data fetching en React es esencial para construir aplicaciones web interactivas y dinámicas. `useEffect()`, junto con otras funciones y librerías como `axios` y `fetch`, proporciona las herramientas necesarias para interactuar con APIs y manejar datos de manera eficiente. Además, es importante seguir las mejores prácticas para garantizar un código limpio y de alto rendimiento.

## Custom Hooks y Funciones Relacionadas en React: Una Explicación Detallada

1. **`Introducción a Custom Hooks`**:

   Los Custom Hooks en React son funciones que te permiten encapsular y reutilizar lógica de estado o efectos en tus componentes. Esto ayuda a mantener tu código más limpio y modular.

2. **`Importancia de Custom Hooks`**:

   Los Custom Hooks promueven la reutilización de lógica en componentes funcionales. Esto es especialmente útil cuando tienes lógica compleja que se repite en varios componentes. Además, ayuda a separar la lógica del componente de su representación, lo que facilita las pruebas unitarias.

3. **`Sintaxis de Custom Hooks`**:

   Un Custom Hook es simplemente una función de JavaScript que comienza con el prefijo `use`. Puedes usar hooks estándar dentro de un Custom Hook.

   ```jsx
   import { useState, useEffect } from "react";

   const useCustomHook = (initialValue) => {
     const [value, setValue] = useState(initialValue);

     useEffect(() => {
       // Efectos secundarios aquí
     }, [value]);

     return [value, setValue];
   };
   ```

   Acá `useCustomHook()` es un Custom Hook que utiliza el hook `useState()` y `useEffect()` para su creación.

   Ejemplo:

   Creación de `UseFetch()`:

   ```jsx
   // Creación del Hook
   import { useState, useEffect } from "react";

   export const useFetch = (url) => {
     const [data, setData] = useState([]);
     const [loading, setLoading] = useState(true);
     const [error, setError] = useState(null);

     useEffect(() => {
       setLoading(true);
       (async (url) => {
         try {
           let response = await fetch(url);
           console.log(`Response: ${response.status}`);
           const data = await response.json();
           console.log(data);
           setData(data);
         } catch (err) {
           setError(err.message);
           console.error("Error:", err.message);
         } finally {
           setLoading(false);
         }
       })(url);
     }, [url]);

     return [data, loading, error];
   };

   export default useFetch;
   ```

   ```jsx
   // Utilizo del Hook
   const MyComponent = () => {
     const [data, loading, error] = useFetch("https://api.example.com/data");

     if (loading) return <div>Loading...</div>;
     if (error) return <div>Error: {error}</div>;

     return <div>{JSON.stringify(data)}</div>;
   };
   ```

   Creación de `useLocalStorage()`:

   ```jsx
   // Creación del Hook
   import { useState } from "react";

   const useLocalStorage = (key, initialValue) => {
     const [value, setValue] = useState(() => {
       const storedValue = localStorage.getItem(key);
       return storedValue !== null ? JSON.parse(storedValue) : initialValue;
     });

     const setLocalStorageValue = (newValue) => {
       setValue(newValue);
       localStorage.setItem(key, JSON.stringify(newValue));
     };

     return [value, setLocalStorageValue];
   };

   export default useLocalStorage;
   ```

   ```jsx
   // Utilizo del Hook
   const MyComponent = () => {
     const [count, setCount] = useLocalStorage("count", 0);

     const increment = () => {
       setCount(count + 1);
     };

     return (
       <div>
         <p>Count: {count}</p>
         <button onClick={increment}>Increment</button>
       </div>
     );
   };
   ```

   Creación de `useMediaQuery()`:

   ```jsx
   // Creación del Hook
   import { useState, useEffect } from "react";

   const useMediaQuery = (query) => {
     const [matches, setMatches] = useState(window.matchMedia(query).matches);

     useEffect(() => {
       const mediaQuery = window.matchMedia(query);
       const updateMatches = () => setMatches(mediaQuery.matches);

       mediaQuery.addListener(updateMatches);

       return () => {
         mediaQuery.removeListener(updateMatches);
       };
     }, [query]);

     return matches;
   };

   export default useMediaQuery;
   ```

   ```jsx
   // Utilizo del Hook
   const MyComponent = () => {
     const isMobile = useMediaQuery("(max-width: 768px)");

     return (
       <div>
         <p>{isMobile ? "Mobile View" : "Desktop View"}</p>
       </div>
     );
   };
   ```

4. **`Recomendaciones al Crear Custom Hooks`**:

   - **Nombres con Prefijo "use"**:

     Los Custom Hooks deben comenzar con la palabra `use`. Esto es una convención en React para indicar que se trata de un hook.

   - **No Llames Hooks Condicionales**:

     Los Hooks deben llamarse en el nivel superior del componente, no en condicionales, bucles o funciones anidadas.

   - **Sigue las Reglas de los Hooks de React**:

     Esto incluye llamar a los hooks solo en componentes de función o en otros custom hooks.

5. **`Ejemplo de Custom Hook`**:

   Supongamos que queremos crear un Custom Hook para gestionar el estado de un input:

   ```jsx
   import { useState } from "react";

   const useInputState = (initialValue) => {
     const [value, setValue] = useState(initialValue);

     const handleChange = (e) => {
       setValue(e.target.value);
     };

     return [value, handleChange];
   };
   ```

   Luego, podemos usar este Custom Hook en un componente:

   ```jsx
   const MyComponent = () => {
     const [inputValue, setInputValue] = useInputState("");

     return <input type="text" value={inputValue} onChange={setInputValue} />;
   };
   ```

   Aquí, `useInputState()` es un Custom Hook que maneja el estado de un input y devuelve el valor actual y una función para actualizarlo.

6. **`Custom Hooks y Funciones Relacionadas`**:

   - **useState**:

     Puedes utilizar `useState()` dentro de un Custom Hook para gestionar el estado local de tu hook.

   - **useEffect**:

     Puedes usar `useEffect()` dentro de un Custom Hook para realizar efectos secundarios en tu lógica personalizada.

   - **useContext**:

     Si necesitas acceder a un contexto dentro de tu Custom Hook, puedes utilizar el hook `useContext()`.

   - **useRef**:

     `useRef()` te permite crear una referencia mutable que puede ser utilizada para acceder a un elemento del DOM o a un valor mutable.

   - **useReducer**:

     Puedes combinar `useReducer()` con `useState()` en un Custom Hook si necesitas una gestión de estado más compleja.

   - **useMemo y useCallback**:

     Puedes utilizar `useMemo()` y `useCallback()` para memoizar valores y funciones en tu Custom Hook.

7. **`Consideraciones Finales`**:

   Los Custom Hooks son una herramienta poderosa para la reutilización y organización de lógica en tus componentes de React. Al crear tus propios Custom Hooks, puedes mantener tu código más limpio y modular, lo que facilita su mantenimiento y escalabilidad.

   Recuerda seguir las convenciones de nomenclatura y las reglas de los Hooks de React para un uso efectivo y sin problemas de tus Custom Hooks en tu aplicación.

## React Router y Funciones Relacionadas en React: Una Explicación Detallada

1. #### **`Introducción a React Router`**:

   React Router es una librería popular para la navegación en aplicaciones web desarrolladas con React. Permite definir rutas en la aplicación y renderizar diferentes componentes en función de la URL actual. Esto crea una experiencia de usuario más interactiva y dinámica al cambiar entre diferentes vistas o páginas sin tener que recargar la página completa.

2. #### **`Instalación y Configuración de React Router`**:

   Para comenzar a utilizar React Router en tu proyecto, primero debes instalarlo a través de npm:

   ```jsx
   npm i -D react-router-dom
   ```

   ```jsx
   yarn add react-router-dom
   ```

   Al ejecutar este comando en la terminal, se instalará la librería `react-router-dom` como una dependencia de desarrollo en tu proyecto de React, lo que te permitirá utilizar sus funcionalidades para gestionar las rutas y la navegación en tu aplicación.

3. #### **`BrowserRouter`**:

   Una vez que tienes React Router instalado y configurado, puedes comenzar a definir tus rutas en la aplicación. Esto se hace dentro del componente `BrowserRouter`.

   ```jsx
   // Dentro del archivo `App.jsx`
   import { BrowserRouter, Routes, Route, Link } from "react-router-dom";
   import Home from "./Pages/Home";
   import Market from "./Pages/Market";
   import Wallet from "./Pages/Wallet";
   import Dev from "./Pages/Dev";

   export const App = () => {
     return (
       <BrowserRouter>
         <nav>
           <ul
             style={{
               display: "inline-flex",
               justifyContent: "space-evenly",
               width: "100%",
               padding: "20px",
             }}
           >
             <li>
               <Link to="/">Inicio</Link>
             </li>
             <li>
               <Link to="/wallet">Carrito</Link>
             </li>
           </ul>
         </nav>
         <Routes>
           <Route index path="/" element={<Home />} />
           <Route path="/marketplace" element={<Market />} />
           <Route path="/wallet" element={<Wallet />} />
           <Routes path="/dev" element={<Dev />} />
           <Route element={NotFound} />
         </Routes>
       </BrowserRouter>
     );
   };
   ```

4. #### **`Routes o Switch`**:

   En `react-router-dom`, tanto `Routes` como `Switch` son componentes que se utilizan para definir las rutas de una aplicación. Sin embargo, tienen diferencias fundamentales en cómo manejan las coincidencias de rutas:

   - **Routes**:

     `Routes` es un componente de enrutamiento de nivel superior que se utiliza para definir las rutas de la aplicación. Puede contener múltiples elementos `Route` o `React.Fragment` que representan las diferentes rutas de la aplicación.
     Cuando se utiliza `Routes`, todas las rutas se evalúan, y se renderizan todos los componentes cuyas rutas coinciden con la URL actual.
     Esto significa que si hay varias coincidencias de ruta, se renderizarán múltiples componentes. Esto puede ser útil en situaciones donde una URL puede coincidir con varias rutas, y deseas renderizar todos los componentes asociados.

     ```jsx
     <Routes>
       <Route path="/home" element={<Home />} />
       <Route path="/about" element={<About />} />
     </Routes>
     ```

   - **Switch**:

     `Switch` es otro componente de enrutamiento que envuelve a los elementos `Route`. Su propósito es renderizar el primer `Route` que coincide con la URL actual y luego detener el proceso de evaluación de rutas.
     Una vez que se encuentra una coincidencia, `Switch` deja de buscar otras coincidencias y renderiza el primer componente coincidente.
     Esto es útil cuando deseas asegurarte de que solo se renderice una ruta específica incluso si hay otras rutas que también coinciden.

     ```jsx
     <Switch>
       <Route path="/home" element={<Home />} />
       <Route path="/about" element={<About />} />
     </Switch>
     ```

5. #### **`Link`**:

   Para permitir a los usuarios navegar entre las diferentes rutas de tu aplicación, puedes usar el componente `Link` proporcionado por React Router. La utilidad que tiene es que en lugar de recargar la página completamente, cambia la URL de manera dinámica utilizando el historial del navegador. Es similar a un ancla `<a>`, pero mantiene la aplicación en un estado de una sola página sin recargarla por completo.
   Posee un atributo `to` que sirve para definir la dirección de navegación.

   ```jsx
   import { Link } from "react-router-dom";

   function Navigation() {
     return (
       <nav>
         <Link to="/">Inicio</Link>
         <Link to="/about">Acerca de</Link>
         <Link to="/contact" activeClassName="active">
           Contacto
         </Link>
       </nav>
     );
   }
   ```

   - **to**:

     El prop `to` especifica la URL a la que se debe navegar cuando se hace clic en el enlace.

   - **activeClassName**:

     Permite especificar una clase de estilo que se aplicará al enlace cuando la ruta asociada esté activa. Esto es útil para resaltar visualmente el enlace correspondiente a la ruta actualmente activa.
     En el ejemplo de arriba `active` es el nombre de la clase que se le asignará al enlace cuando esté activo.
     Puedes asignar directamente la clase utilizando la `prop` `className` en un componente `Link` en React. No hay ninguna restricción que impida hacerlo. Sin embargo, la `prop` `activeClassName` tiene un propósito específico: se utiliza para aplicar una clase cuando el enlace está activo, es decir, cuando corresponde a la ruta actual en la que se encuentra el usuario.

6. #### **`Route`**:

   En muchas aplicaciones, es útil pasar parámetros a las rutas para mostrar contenido dinámico. Esto se logra utilizando `Route` con un `path` que incluye un segmento dinámico.

   ```jsx
   import { Route } from 'react-router-dom';
   import { About } from './About';
   import { UserProfile } from './UserProfile';

   function App() {
     return (
       <Route index exact path="/" element={<Home />} />
       <Route exact path="/about" render={() => <About />} />
       <Route path="/user/:id" element={<UserProfile />}>
         /* sub-rutas */
         <Route index path="/user/:id/posts" element={<UserPosts>}>
         <Route path="/user/:id/setting" element={<UserSetting>}>
         <Route path="/user/:id/shopping-cart" element={<UserCart>}>
       </Route>
     );
   }
   ```

   - **index**:

     El atributo `index` se utiliza para especificar la ruta por defecto que se debe renderizar cuando el dominio o la ruta de una sección en específico se empareja. En otras palabras, es la ruta que se mostrará cuando no se añade ninguna subruta específica.

     Esto es especialmente útil para establecer la página de inicio de una sección específica de tu aplicación, o para proporcionar un contenido predeterminado cuando el usuario accede a una ruta sin especificar una subruta específica.

     Recuerda que solo se debe usar un `index` por cada nivel de jerarquía de rutas. Es decir, si tienes rutas anidadas, cada nivel debe tener su propio `index` para indicar la ruta por defecto.

   - **exact**:

     Al usar `exact` en una `Route`, aseguras que la ruta solo coincida cuando la URL es idéntica al `path` especificado, o sea que la coincidencia de ruta debe ser exacta. Por defecto es `false`.

   - **path**:

     El propósito del atributo `path` en `react-router-dom` es definir el patrón de la URL que debe coincidir con la ruta que se está configurando. En otras palabras, especifica la parte de la URL que se debe comparar con la ruta para determinar si hay una coincidencia.

   - **:id**:

     El segmento `:id` es un marcador de posición que indica un parámetro de ruta. Cualquier valor introducido en esa posición de la URL será capturado y se pasará como prop a `UserProfile`.

   - **element o render**:

     `element`:

     Especifica qué componente o elemento JSX debe renderizarse cuando la ruta coincide.

     ```jsx
     <Route path="/about" element={<About someProp="value" />} />
     ```

     `render`:

     Es otra forma de especificar qué componente renderizar cuando una ruta coincide. En lugar de proporcionar un nombre de componente, proporcionas una función que devuelve un componente de React. Esto es útil cuando necesitas pasar props adicionales al componente que se renderizará. Es utilizado en versiones anteriores a `react-router-dom` (5+1).

     ```jsx
     <Route path="/about" render={() => <About someProp="value" />} />
     ```

7. #### **`Redirect`**:

   Puedes redirigir a los usuarios a diferentes rutas utilizando el componente `Redirect`. Por ejemplo, si deseas redirigir a los usuarios desde una URL antigua a una nueva:

   ```jsx
   <Redirect from="/old" to="/new" />
   ```

   - **from & to**:

     `from` especifica la URL antigua.

     `to` especifica la nueva URL a la que se debe redirigir.

8. #### **`NavLink`**:

   `NavLink` es similar a `Link`, pero proporciona estilos de navegación condicionales cuando la ruta coincide. Puedes agregar una clase de estilo o estilo en línea basado en si la ruta está activa o no.

9. #### **`Outlet`**:

   El componente `Outlet` se utiliza en React Router v6 para renderizar `sub-rutas` anidadas dentro de una ruta principal. Es especialmente útil cuando se tienen rutas secundarias dentro de una ruta principal y se desea que se rendericen en un punto específico del componente padre.

   Supongamos que tienes una estructura de rutas como esta:

   ```jsx
   <Routes>
     <Route path="/" element={<Home />} />
     <Route path="/dashboard" element={<Dashboard />}>
       /* sub-rutas */
       <Route index element={<DashboardHome />} />
       <Route path="/settings" element={<Settings />} />
     </Route>
   </Routes>
   ```

   En este caso, el componente `Dashboard` es una ruta principal que tiene rutas secundarias `DashboardHome` y `Settings`. Para que estas rutas secundarias se rendericen dentro de Dashboard, necesitas colocar un componente `Outlet` dentro del código del componente `Dashboard` donde deseas que se rendericen. De esta forma:

   ```jsx
   function Dashboard() {
     return (
       <div>
         <h2>Dashboard</h2>
         <Outlet /> {/* Aquí se renderizarán las rutas secundarias */}
       </div>
     );
   }
   ```

10. #### **`Hooks de react-router-dom`**:

`useParams()` y `useNavigate()` son dos hooks proporcionados por React Router que facilitan la obtención de parámetros de la ruta y ayudan a crear una navegación programática en componentes funcionales.

- **useNavigate hook**:

  El hook `useNavigate()` (proporcionado por React Router) te proporciona una función para realizar navegación programática en tu aplicación. Esto te permite cambiar de ruta en respuesta a eventos o acciones del usuario, sin la necesidad de utilizar componentes `Link` (también proporcionado por React Router).

  La navegación programática es útil en situaciones donde necesitas cambiar de ruta en respuesta a acciones del usuario (por ejemplo, después de enviar un formulario) o en eventos específicos (como un clic en un botón).

  `useNavigate()` es especialmente útil en casos donde el componente no tiene acceso directo a las props de `history` (como en componentes funcionales no conectados al `router` o en `hooks personalizados`).

  Es importante mencionar que `useNavigate() cambia la ruta en el enrutador de React sin recargar la página completa`. Esto significa que tu aplicación permanece en un estado de una sola página (SPA), proporcionando una experiencia de usuario más fluida.

  Sintaxis:

  ```jsx
  import { useNavigate } from "react-router-dom";

  function MyComponent() {
    const navigate = useNavigate();

    function handleClickRoute() {
      // Usa la función `navigate()` para redirigir a otra página
      navigate("/route");
    }

    return <button onClick={handleClickRoute}>Ir a otra ruta</button>;
  }
  ```

  - `navigate()`:

    La variable `navigate()` que obtienes al utilizar useNavigate() `es una función que te permite navegar entre diferentes rutas en tu aplicación React cuando utilizas React Router`. Esta función proporciona una forma programática de cambiar la URL y renderizar el componente asociado a esa ruta.

    `Esta función toma un argumento`, que es la ruta a la que quieres navegar. Puedes proporcionar una `ruta relativa` (por ejemplo, `/about`) `o una ruta absoluta` (por ejemplo, `https://example.com/about`), dependiendo de tu configuración de enrutamiento.

    También puedes añadir lógica y crear una `navegación condicional` (por ejemplo en una verificación de usuario).

  Ejemplo:

  Navegación con Parámetros:

  ```jsx
  import { useNavigate } from "react-router-dom";

  function ProductPage() {
    const navigate = useNavigate();

    const handleProductClick = (productId) => {
      // Usa la función `navigate()` para redirigir a una página con parámetros
      navigate(`/products/${productId}`);
    };

    return (
      <div>
        <h1>Página de Productos</h1>
        <button onClick={() => handleProductClick(123)}>
          Ver Producto 123
        </button>
        <button onClick={() => handleProductClick(456)}>
          Ver Producto 456
        </button>
      </div>
    );
  }
  ```

  Navegación con Estado:

  ```jsx
  import { useNavigate } from "react-router-dom";

  function PrivatePage() {
    const navigate = useNavigate();

    const isLoggedIn = true; // Supongamos que esto depende del estado de autenticación de un usuario

    const handleButtonClick = () => {
      if (isLoggedIn) {
        // Usa la función `navigate()` para redirigir solo si está autenticado
        navigate("/dashboard");
      } else {
        alert("Debes iniciar sesión primero");
      }
    };

    return (
      <div>
        <h1>Página Privada</h1>
        <button onClick={handleButtonClick}>Ir al Tablero</button>
      </div>
    );
  }
  ```

- **useParams hook**:

  El hook `useParams()` te permite acceder a los parámetros de ruta definidos en tu aplicación. Esto es especialmente útil cuando necesitas utilizar valores dinámicos en tus componentes basados en la URL actual.

  Recuerda que puedes asignarle a este hook un valor por defecto a través de la desestructuración.

  Imaginemos que tienes una ruta definida como `/users/:username` y estás renderizando un componente llamado `UserProfile`. Al utilizar `useParams()`, puedes acceder al valor del `param` `:username` proporcionado en la URL y utilizarlo en tu componente para cargar y mostrar la información del usuario correspondiente. Entonces utilizas `UserProfile` para dar un mensaje de bienvenida personalizado para cada usuario, pero a demás, deseas saludar de la misma manera a una persona que no tiene una cuenta. La asignación por defecto que permite `useParams()`, asegura que si no hay un `:username` como `param` en la URL, se acciona el valor asignado por defecto, por ejemplo `'Invitado'`. Por lo tanto, si la URL no tiene un `param` específico y es más genérico, como `http://www.example.com/users`, el componente mostrará simplemente `Bienvenido: Invitado`. Esto brinda una forma elegante de manejar escenarios donde el `username` no está presente en la URL.

  Sintaxis:

  ```jsx
  import { useParams } from "react-router-dom";

  function UserProfile() {
    // Destructuring de los parámetros de la URL
    let { username } = useParams();

    return (
      <div>
        <h1>Perfil de Usuario</h1>
        <p>Nombre de Usuario: {username}</p>
      </div>
    );
  }
  ```

  - `Propiedades Definidas en la Ruta URL`:

    Por ejemplo, si tu ruta es `/users/:username`, al usar `useParams()` obtendrás a través de la desestructuración un `param` `:username` en forma de variable. Esto te permite acceder al valor que se proporciona en la URL. Si la URL es `/users/john`, entonces `:username` será `'john'`.

  - `Propiedades Adicionales de React Router`:

    Junto con las propiedades que definiste en tu ruta dinámica, el objeto devuelto por `useParams()` también puede contener propiedades adicionales proporcionadas por React Router. Esto puede incluir propiedades como `path`, `url`, `isExact`, y otras que son útiles para la navegación y el enrutamiento.

  Ejemplo:

  Ruta con valor predeterminado:

  ```jsx
  import { useParams } from "react-router-dom";

  function UserProfile() {
    // A los parámetros de la URL se le puede asignar un valor predeterminado
    let { username = "Invitado" } = useParams();

    return (
      <div>
        <h1>Perfil de Usuario</h1>
        <p>Nombre de Usuario: {username}</p>
      </div>
    );
  }
  ```

  Ruta con múltiples parámetros:

  ```jsx
  import { useParams } from "react-router-dom";

  function CommentDetails() {
    // Obtener los parámetros de la URL
    let { postId, commentId } = useParams();

    return (
      <div>
        <h1>Detalles del Comentario</h1>
        <p>Post ID: {postId}</p>
        <p>Comment ID: {commentId}</p>
      </div>
    );
  }
  ```

11. #### **`Resumen`**:

- React Router es una librería para la navegación en aplicaciones web de React, que permite definir rutas y renderizar componentes en función de la URL actual.

- Se instala y configura a través de npm y se importan los componentes necesarios.

- Las rutas se definen dentro del componente `BrowserRouter` utilizando `Route` y `Switch`.

- La navegación entre rutas se logra usando el componente `Link`.

- Los parámetros de ruta permiten mostrar contenido dinámico.

- Las redirecciones se hacen usando `Redirect`.

- En React, las funciones relacionadas se refieren a Hooks, que permiten usar características de React en componentes funcionales.

Esta explicación detallada debería proporcionarte una comprensión sólida de React Router y las funciones relacionadas en React. Si tienes preguntas adicionales o necesitas más detalles sobre algún punto en particular, no dudes en preguntar.

## **Redux Toolkit en React: Una Explicación Detallada**

1. #### **`Introducción a Redux Toolkit`**:

   Redux Toolkit es la herramienta oficial recomendada para trabajar con Redux en aplicaciones React. Simplifica muchas de las configuraciones tradicionales y las prácticas repetitivas al desarrollar con Redux, proporcionando una forma más intuitiva y fácil de usar para gestionar el estado global de las aplicaciones.

2. #### **`Importancia de Redux Toolkit`**:

   Redux, por sí solo, puede ser muy potente para manejar el estado de una aplicación, pero conlleva cierta complejidad debido a la necesidad de escribir mucho código repetitivo (boilerplate). Redux Toolkit aborda este problema al proporcionar APIs simplificadas para crear acciones, reducers, y gestionar la configuración del store, lo que permite a los desarrolladores enfocarse más en la lógica de la aplicación que en la infraestructura.

3. #### **`Configuración de Redux Toolkit en un Proyecto React`**:

   Para comenzar a usar Redux Toolkit en un proyecto React, primero debemos instalar las dependencias necesarias y configurar nuestro entorno de desarrollo.

   - **Instalación de Redux Toolkit**:

     Puedes instalar Redux Toolkit y React-Redux usando npm o yarn con los siguientes comandos:

     ```bash
     # Usando npm
     npm install @reduxjs/toolkit react-redux

     # Usando yarn
     yarn add @reduxjs/toolkit react-redux
     ```

   - **Creación de un Store con Redux Toolkit**:

     Redux Toolkit proporciona una función `configureStore` que facilita la creación de un store de Redux con las mejores prácticas ya integradas, como la configuración de middlewares y el uso de Redux DevTools.

     ```javascript
     import { configureStore } from '@reduxjs/toolkit';
     import rootReducer from './reducers';

     const store = configureStore({
       reducer: rootReducer,
     });

     export default store;
     ```

     La función `configureStore` simplifica la configuración del store al aceptar un objeto de opciones donde podemos especificar el reducer raíz, middlewares adicionales, y otras configuraciones.

4. #### **`Conceptos Clave de Redux Toolkit`**:

   Redux Toolkit introduce varias APIs y funciones que son esenciales para trabajar eficientemente con Redux. A continuación, se detallan algunas de las más importantes.

   - **`createSlice`**:

     Una de las características más destacadas de Redux Toolkit es la función `createSlice`, que permite definir un slice del estado, un conjunto de acciones y un reducer asociado de manera concisa y coherente.

     ```javascript
     import { createSlice } from '@reduxjs/toolkit';

     const contadorSlice = createSlice({
       name: 'contador',
       initialState: { valor: 0 },
       reducers: {
         incrementar: state => {
           state.valor += 1;
         },
         decrementar: state => {
           state.valor -= 1;
         },
         incrementarPorCantidad: (state, action) => {
           state.valor += action.payload;
         },
       },
     });

     export const { incrementar, decrementar, incrementarPorCantidad } = contadorSlice.actions;
     export default contadorSlice.reducer;
     ```

     - **`name`**: Define el nombre del slice, que se usa para diferenciarlo de otros slices en el store.
     - **`initialState`**: Establece el estado inicial del slice.
     - **`reducers`**: Un objeto donde se definen las funciones reductoras que modifican el estado. Redux Toolkit utiliza `immer` por defecto, lo que permite escribir código aparentemente mutable de manera segura.

   - **`createAction` y `createReducer`**:

     Aunque `createSlice` es la forma preferida para definir reducers y acciones en Redux Toolkit, también puedes utilizar `createAction` y `createReducer` para manejar situaciones más complejas o específicas.

     ```javascript
     import { createAction, createReducer } from '@reduxjs/toolkit';

     const incrementar = createAction('INCREMENTAR');
     const decrementar = createAction('DECREMENTAR');

     const contadorReducer = createReducer({ valor: 0 }, {
       [incrementar]: (state, action) => {
         state.valor += 1;
       },
       [decrementar]: (state, action) => {
         state.valor -= 1;
       },
     });

     export { incrementar, decrementar, contadorReducer };
     ```

     - **`createAction`**: Simplifica la creación de acciones al evitar la necesidad de definir manualmente tipos de acciones.
     - **`createReducer`**: Permite definir reducers utilizando una sintaxis basada en objetos en lugar de `switch` o `if-else`, lo que resulta en un código más limpio y mantenible.

   - **`createAsyncThunk`**:

     Para manejar la lógica asíncrona, Redux Toolkit proporciona `createAsyncThunk`, que simplifica la creación de flujos de trabajo asincrónicos y la gestión de estados de carga.

     ```javascript
     import { createAsyncThunk } from '@reduxjs/toolkit';
     import axios from 'axios';

     export const fetchUsuarios = createAsyncThunk(
       'usuarios/fetchUsuarios',
       async () => {
         const response = await axios.get('/api/usuarios');
         return response.data;
       }
     );
     ```

     `createAsyncThunk` genera automáticamente acciones para los estados de petición: pendiente, cumplida y rechazada, que pueden ser manejados dentro de un slice o reducer.

5. #### **`Integración de Redux Toolkit con React`**:

   Integrar Redux Toolkit con React es un proceso sencillo que implica conectar el store de Redux con los componentes de React utilizando el proveedor de React-Redux y hooks para interactuar con el estado.

   - **Configuración del Provider**:

     El componente `Provider` de React-Redux permite que el store de Redux esté disponible para todos los componentes de la aplicación.

     ```javascript
     import React from 'react';
     import ReactDOM from 'react-dom';
     import { Provider } from 'react-redux';
     import store from './store';
     import App from './App';

     ReactDOM.render(
       <Provider store={store}>
         <App />
       </Provider>,
       document.getElementById('root')
     );
     ```

   - **Uso de Hooks de React-Redux**:

     Redux Toolkit, junto con React-Redux, ofrece hooks como `useSelector` y `useDispatch` para interactuar con el estado y las acciones de manera más ergonómica en componentes funcionales.

     ```javascript
     import React from 'react';
     import { useSelector, useDispatch } from 'react-redux';
     import { incrementar, decrementar, incrementarPorCantidad } from './contadorSlice';

     const Contador = () => {
       const valor = useSelector(state => state.contador.valor);
       const dispatch = useDispatch();

       return (
         <div>
           <h1>Valor: {valor}</h1>
           <button onClick={() => dispatch(incrementar())}>Incrementar</button>
           <button onClick={() => dispatch(decrementar())}>Decrementar</button>
           <button onClick={() => dispatch(incrementarPorCantidad(5))}>Incrementar por 5</button>
         </div>
       );
     };

     export default Contador;
     ```

     - **`useSelector`**: Permite seleccionar partes del estado desde el store de Redux.
     - **`useDispatch`**: Proporciona acceso a la función `dispatch` para enviar acciones al store.

6. #### **`Gestión de Estado Asíncrono con createAsyncThunk`**:

   `createAsyncThunk` es una API poderosa que simplifica la gestión de operaciones asíncronas en Redux. Proporciona un flujo de trabajo estructurado para manejar las fases de una solicitud asíncrona: pendiente, cumplida y rechazada.

   - **Ejemplo de createAsyncThunk**:

     Supongamos que queremos realizar una solicitud para obtener una lista de usuarios desde un API. Podemos utilizar `createAsyncThunk` para manejar este proceso de manera eficiente.

     ```javascript
     import { createSlice, createAsyncThunk } from '@reduxjs/toolkit';
     import axios from 'axios';

     export const fetchUsuarios = createAsyncThunk(
       'usuarios/fetchUsuarios',
       async (_, { rejectWithValue }) => {
         try {
           const response = await axios.get('/api/usuarios');
           return response.data;
         } catch (error) {
           return rejectWithValue(error.response.data);
         }
       }
     );

     const usuariosSlice = createSlice({
       name: 'usuarios',
       initialState: {
         data: [],
         status: 'idle',
         error: null,
       },
       reducers: {},
       extraReducers: (builder) => {
         builder
           .addCase(fetchUsuarios.pending, (state) => {
             state.status = 'loading';
           })
           .addCase(fetchUsuarios.fulfilled, (state, action) => {
             state.status = 'succeeded';
             state.data = action.payload;
           })
           .addCase(fetchUsuarios.rejected, (state, action) => {
             state.status = 'failed';
             state.error = action.payload;
           });
       },
     });

     export default usuariosSlice.reducer;
     ```

     En este ejemplo, `fetchUsuarios` se define utilizando `createAsyncThunk` para manejar la lógica asíncrona de la solicitud de usuarios. Luego, en `extraReducers`, manejamos las diferentes fases de la solicitud utilizando `builder`, que ofrece una forma fluida de definir casos adicionales para el reducer.

7. #### **`Ventajas de Usar Redux Toolkit`**:

   - **Reducción de Boilerplate**: Con `createSlice`, `createAction`, y `createReducer`, se elimina la necesidad de escribir repetitivamente tipos de acción y funciones reductoras, lo que resulta en menos código y más claridad.
   - **Configuración Sencilla del Store**: `configureStore` hace que sea más fácil configurar el store de Redux con middlewares y herramientas de depuración preconfiguradas.
   - **Manejo de Asincronía Simplificado**: `createAsyncThunk` simplifica la lógica asíncrona y la gestión de estados de carga, error y éxito de manera clara y estructurada.
   - **Compatibilidad con TypeScript**: Redux Toolkit está diseñado para ser compatible con TypeScript, proporcionando tipos y generics que facilitan la escritura de aplicaciones tipadas.

8. #### **`Mejores Prácticas con Redux Toolkit`**:

   Al utilizar Redux Toolkit, es importante seguir ciertas prácticas para asegurar que tu aplicación sea escalable, mantenible y eficiente.

   - **Organización del Código**:
     - Divide el estado de tu aplicación en slices lógicos. Utiliza `createSlice` para definir cada slice con sus respectivos reducers y acciones.
     - Mantén la lógica asíncrona separada utilizando `createAsyncThunk` para cada operación de datos.

   - **Optimización del Rendimiento**:
     - Utiliza `useSelector` para seleccionar solo las partes del estado que necesita un componente, minimizando renderizaciones innecesarias.
     - Memoriza selectores con librerías como Reselect si necesitas calcular valores derivados complejos.

   - **Manejo de Estados Complejos**:
     - Para estados anidados o estructuras de datos complejas, considera usar herramientas de normalización de datos como `normalizr`.
     - Divide reducers grandes en múltiples funciones reductoras pequeñas y combínalas utilizando la capacidad de `createSlice` para manejar múltiples casos.

9. #### **`Ejemplo Completo: Aplicación de Tareas con Redux Toolkit`**:

   Ahora que hemos cubierto los conceptos clave, veamos un ejemplo completo de cómo implementar una aplicación simple de tareas utilizando Redux Toolkit y React.

   - **Estructura del Proyecto**:

     ```
     src/
     ├── app/
     │   └── store.js
     ├── features/
     │   ├── tareas/
     │   │   ├── tareasSlice.js
     │   │   └── Tareas.js
     ├── components/
     │   └── NuevaTarea.js
     ├── App.js
     └── index.js
     ```

   - **Implementación del Store**:

     En `src/app/store.js`, configuramos el store utilizando `configureStore` y registramos los reducers de las características.

     ```javascript
     import { configureStore } from '@reduxjs/toolkit';
     import tareasReducer from '../features/tareas/tareasSlice';

     const store = configureStore({
       reducer: {
         tareas: tareasReducer,
       },
     });

     export default store;
     ```

   - **Definición del Slice de Tareas**:

     En `src/features/tareas/tareasSlice.js`, definimos un slice para gestionar el estado de las tareas, incluyendo acciones para agregar, eliminar y marcar como completada una tarea.

     ```javascript
     import { createSlice } from '@reduxjs/toolkit';

     const tareasSlice = createSlice({
       name: 'tareas',
       initialState: [
         { id: 1, texto: 'Aprender Redux Toolkit', completada: false },
         { id: 2, texto: 'Construir una app', completada: false },
       ],
       reducers: {
         agregarTarea: (state, action) => {
           state.push(action.payload);
         },
         eliminarTarea: (state, action) => {
           return state.filter(tarea => tarea.id !== action.payload);
         },
         toggleCompletada: (state, action) => {
           const tarea = state.find(tarea => tarea.id === action.payload);
           if (tarea) {
             tarea.completada = !tarea.completada;
           }
         },
       },
     });

     export const { agregarTarea, eliminarTarea, toggleCompletada } = tareasSlice.actions;
     export default tareasSlice.reducer;
     ```

   - **Componente de Lista de Tareas**:

     En `src/features/tareas/Tareas.js`, creamos un componente que utiliza el estado de las tareas desde el store de Redux.

     ```javascript
     import React from 'react';
     import { useSelector, useDispatch } from 'react-redux';
     import { eliminarTarea, toggleCompletada } from './tareasSlice';

     const Tareas = () => {
       const tareas = useSelector(state => state.tareas);
       const dispatch = useDispatch();

       return (
         <ul>
           {tareas.map(tarea => (
             <li key={tarea.id}>
               <input
                 type="checkbox"
                 checked={tarea.completada}
                 onChange={() => dispatch(toggleCompletada(tarea.id))}
               />
               {tarea.texto}
               <button onClick={() => dispatch(eliminarTarea(tarea.id))}>Eliminar</button>
             </li>
           ))}
         </ul>
       );
     };

     export default Tareas;
     ```

   - **Componente para Añadir Nueva Tarea**:

     En `src/components/NuevaTarea.js`, definimos un componente que permite al usuario agregar nuevas tareas a la lista.

     ```javascript
     import React, { useState } from 'react';
     import { useDispatch } from 'react-redux';
     import { agregarTarea } from '../features/tareas/tareasSlice';

     const NuevaTarea = () => {
       const [texto, setTexto] = useState('');
       const dispatch = useDispatch();

       const handleSubmit = (e) => {
         e.preventDefault();
         if (texto) {
           dispatch(agregarTarea({ id: Date.now(), texto, completada: false }));
           setTexto('');
         }
       };

       return (
         <form onSubmit={handleSubmit}>
           <input
             type="text"
             value={texto}
             onChange={(e) => setTexto(e.target.value)}
             placeholder="Nueva tarea..."
           />
           <button type="submit">Añadir Tarea</button>
         </form>
       );
     };

     export default NuevaTarea;
     ```

   - **Combinación en App.js**:

     Finalmente, combinamos los componentes en `src/App.js` para crear la aplicación completa.

     ```javascript
     import React from 'react';
     import Tareas from './features/tareas/Tareas';
     import NuevaTarea from './components/NuevaTarea';

     const App = () => {
       return (
         <div>
           <h1>Aplicación de Tareas con Redux Toolkit</h1>
           <NuevaTarea />
           <Tareas />
         </div>
       );
     };

     export default App;
     ```

   - **Renderización de la Aplicación**:

     Renderizamos la aplicación completa en `src/index.js` utilizando el componente `Provider` para proporcionar acceso al store de Redux.

     ```javascript
     import React from 'react';
     import ReactDOM from 'react-dom';
     import { Provider } from 'react-redux';
     import store from './app/store';
     import App from './App';

     ReactDOM.render(
       <Provider store={store}>
         <App />
       </Provider>,
       document.getElementById('root')
     );
     ```

10. #### **`Conclusión`**:

    Redux Toolkit representa una evolución significativa en la forma de trabajar con Redux, al simplificar la gestión del estado global en aplicaciones React. Al eliminar gran parte del código repetitivo asociado con Redux, permite a los desarrolladores centrarse más en la lógica de su aplicación y menos en la infraestructura. Con sus APIs poderosas como `createSlice`, `configureStore`, y `createAsyncThunk`, Redux Toolkit hace que la creación de aplicaciones modernas y escalables sea más accesible y eficiente.

## SWR y Funciones Relacionadas en React: Una Explicación Detallada

1. #### **`Introducción a SWR e Instalación`**:

   `SWR` es una librería de React que proporciona una forma sencilla y efectiva de gestionar y actualizar el estado local y remoto de tu aplicación. Esta biblioteca proviene de las iniciales de `Stale-While-Revalidate` (caducidad mientras se vuelve a validar), que describe su enfoque principal: mantener los datos actualizados en tiempo real.

   Para instalar el framework de `SWR` escribe el siguiente comando en tu terminal favorito:

   ```jsx
   npm i -D swr
   ```

   ```jsx
   yarn add swr
   ```

   ¡Listo! Ahora estás listo para empezar a utilizar SWR en tu proyecto de React.

2. #### **`Importancia de SWR`**:

   En aplicaciones modernas, es común trabajar con datos que pueden cambiar con el tiempo, como actualizaciones en una base de datos o información de un API externo. `SWR` simplifica este proceso al ofrecer una solución sencilla para manejar las solicitudes de datos en el caché.

3. #### **`Sintaxis y Uso Básico de SWR`**:

   En React este framework se utiliza como un hook. Luego, puedes utilizar la función `useSWR()` para obtener y gestionar tus datos.

   Recuerda que como todos los hooks, `useSWR()` debe de estar en el nivel superior de tu componente.

   Recuerda que `useSWR() no ofrece un modo para realizar` métodos `get`, `post`, `put`, `patch`, `delete` o algún método de este tipo. Sólo está diseñado para la recuperación de datos y el manejo del caché. Para realizar estos métodos deberás utilizar `Fetch API` u otras librerías, como `Axios` por ejemplo.

   ```jsx
   import useSWR from "swr";

   // `fetch()` realiza el método get y después se guarda en el caché para ahorrar consumo
   const fetcher = (url) => fetch(url).then((res) => res.json());

   function Componente() {
     const { data, error } = useSWR("https://www.api.com/endpoint", fetcher);

     if (error) return <h2>{error.message}</h2>;
     if (!data) return <h2>Is Loading...</h2>;

     return <p>Data: {data}</p>;
   }
   ```

   - `useSWR()`:

     Es un hook que toma dos argumentos: la `API` y una `función fetcher` que maneja la solicitud y transformación de la respuesta en formato JSON.

   - `data`:

     Contiene los `datos obtenidos de la URL` especificada.

   - `error`:

     Contiene `cualquier error` que pueda ocurrir al cargar los datos.

   - `'https://www.api.com/endpoint'`:

     Es la `URL de la API` donde obtendrás tus datos.

   - `fetcher`:

     Es una `función que se utiliza para realizar la solicitud al caché`.

4. #### **`Fetchers y Uso de Funciones Personalizadas`**:

   Los `fetcher` son funciones que se utilizan para obtener los datos de una URL. Puedes crear tu propio `fetcher` personalizado para adaptarlo a tus necesidades específicas. Esto es especialmente útil cuando necesitas agregar encabezados de autenticación u otras personalizaciones a tus solicitudes.

   ```jsx
   import useSWR from "swr";
   import axios from "axios";

   const fetcher = (url) => fetch(url).then((res) => res.json());
   ```

   ```jsx
   import useSWR from "swr";

   const fetcher = (url) => axios.get(url).then((res) => res.data);
   ```

   Luego, esta función personalizada se pasa como segundo argumento a `useSWR()`.

5. #### **`Mantenimiento de Datos en Caché`**:

   `SWR` mantiene automáticamente una `caché local` de los datos recuperados, lo que significa que puedes acceder a los datos sin necesidad de realizar múltiples solicitudes al servidor. `Si la página se renderiza nuevamente o si otra parte de tu aplicación solicita los mismos datos, SWR los obtiene de la caché local`.

6. #### **`Actualización Automática y Reactividad`**:

   Una de las características más potentes de `SWR` es su `capacidad para mantener actualizados los datos en tiempo real`. Cuando se produce un cambio en los datos, `SWR` actualiza automáticamente el estado local y, en consecuencia, los componentes de tu aplicación que dependen de esos datos se renderizan de nuevo.

7. #### **`Gestión de Estados de Carga y Errores`**:

   `SWR` proporciona una forma de gestionar estados de carga y errores de manera eficiente.

   Puedes utilizar las propiedades `isLoading` e `isError` para controlar el estado de tus datos y mostrar indicadores de carga o mensajes de error según corresponda.

   ```jsx
   import useSWR from "swr";
   import axios from "axios";

   const fetcher = (url) => axios.get(url).then((res) => res.data);
   const { data, error } = useSWR("https://www.api.com/endpoint", fetcher);
   const isLoading = !data && !error;
   ```

8. #### **`Revalidación Manual`**:

   `SWR` tiene la capacidad de actualizar automáticamente los datos según el intervalo de revalidación configurado (por defecto es 0). Sin embargo, puedes forzar una revalidación manual utilizando la función `mutate`.

   ```jsx
   import useSWR from "swr";

   const { mutate } = useSWR("https://www.api.com/endpoint", fetcher);

   // Llamada para forzar una revalidación
   mutate();
   ```

9. #### **`Configuraciones adicionales`**:

   `SWR` ofrece una serie de configuraciones adicionales para adaptarse a diferentes necesidades y escenarios.

   A continuación, te proporciono una lista de algunas de las configuraciones más comunes que puedes utilizar con SWR:

   - **revalidateOnMount**:

     Determina si `SWR` debe volver a obtener los datos cuando un componente se monta por primera vez.

     ```jsx
     import useSWR from "swr";
     import axios from "axios";

     const fetcher = (url) => axios.get(url).then((res) => res.data);
     const { data } = useSWR("https://www.api.com/endpoint", fetcher, {
       revalidateOnMount: true,
     });
     ```

   - **revalidateOnFocus**:

     Indica si `SWR` debe volver a obtener los datos cuando el componente recibe foco.

     ```jsx
     import useSWR from "swr";
     import axios from "axios";

     const fetcher = (url) => axios.get(url).then((res) => res.data);
     const { data } = useSWR("https://www.api.com/endpoint", fetcher, {
       revalidateOnFocus: true,
     });
     ```

   - **revalidateOnReconnect**:

     Define si `SWR` debe volver a obtener los datos cuando se restablece la conexión a Internet.

     ```jsx
     import useSWR from "swr";
     import axios from "axios";

     const fetcher = (url) => axios.get(url).then((res) => res.data);
     const { data } = useSWR("https://www.api.com/endpoint", fetcher, {
       revalidateOnReconnect: true,
     });
     ```

   - **shouldRetryOnError**:

     Define si `SWR` debe intentar nuevamente obtener los datos en caso de un error en la solicitud.

     ```jsx
     import useSWR from "swr";
     import axios from "axios";

     const fetcher = (url) => axios.get(url).then((res) => res.data);
     const { data } = useSWR("https://www.api.com/endpoint", fetcher, {
       shouldRetryOnError: true,
     });
     ```

   - **dedupingInterval**:

     Controla el intervalo mínimo (en milisegundos) entre dos solicitudes de datos idénticas.

     ```jsx
     import useSWR from "swr";
     import axios from "axios";

     const fetcher = (url) => axios.get(url).then((res) => res.data);
     const { data } = useSWR("https://www.api.com/endpoint", fetcher, {
       dedupingInterval: 2000,
     });
     ```

   - **focusThrottleInterval**:

     Define el tiempo mínimo (en milisegundos) entre dos solicitudes cuando el componente obtiene foco.

     ```jsx
     import useSWR from "swr";
     import axios from "axios";

     const fetcher = (url) => axios.get(url).then((res) => res.data);
     const { data } = useSWR("https://www.api.com/endpoint", fetcher, {
       focusThrottleInterval: 3000,
     });
     ```

   - **loadingTimeout**:

     Establece el tiempo de espera (en milisegundos) antes de mostrar el estado de carga. Es uno de los más utilizados.

     ```jsx
     import useSWR from "swr";
     import axios from "axios";

     const fetcher = (url) => axios.get(url).then((res) => res.data);
     const { data } = useSWR("https://www.api.com/endpoint", fetcher, {
       loadingTimeout: 3000,
     });
     ```

   - **onLoadingSlow**:

     Una función de retorno de llamada que se ejecuta cuando una solicitud toma más tiempo del configurado en `loadingTimeout`.

     ```jsx
     import useSWR from "swr";
     import axios from "axios";

     const fetcher = (url) => axios.get(url).then((res) => res.data);
     const { data } = useSWR("https://www.api.com/endpoint", fetcher, {
       onLoadingSlow: (key) => {
         console.warn(`La solicitud ${key} está tomando demasiado tiempo.`);
       },
     });
     ```

   - **errorRetryInterval**:

     Define el intervalo (en milisegundos) entre los intentos de revalidación después de un error.

     ```jsx
     import useSWR from "swr";
     import axios from "axios";

     const fetcher = (url) => axios.get(url).then((res) => res.data);
     const { data } = useSWR("https://www.api.com/endpoint", fetcher, {
       errorRetryInterval: 5000,
     });
     ```

   Estas son solo algunas de las configuraciones que puedes utilizar con SWR. Puedes combinar estas opciones según las necesidades específicas de tu aplicación para optimizar la gestión de datos y la experiencia del usuario. Puedes encontrar más configuraciones y detalles en la [documentación oficial de SWR](https://swr.vercel.app/docs/options).

10. #### **`Funciones Relacionadas y Compatibilidad con Hooks de React`**:

`SWR` se integra fácilmente con otros hooks de React. Por ejemplo, puedes combinarlo con `useState` y `useEffect` para realizar tareas adicionales según sea necesario.

También se integra con librerías como `Axios` o `Fetch API`.

```jsx
import useSWR from "swr";
import { useState, useEffect } from "react";
import axios from "axios";

const fetcher = (url) => axios.get(url).then((res) => res.data);
const { data } = useSWR("https://www.api.com/endpoint", fetcher);
const [isActive, setIsActive] = useState(false);

useEffect(() => {
  if (data) {
    setIsActive(true);
  }
}, [data]);
```

11. #### **`SWRConfig`**:

`SWRConfig` es un componente proporcionado por la biblioteca `SWR` que te permite configurar opciones globales para todos los hooks `useSWR()` en tu aplicación. Esto es especialmente útil cuando deseas establecer un comportamiento predeterminado para todos tus llamados a API. Como por ejemplo pasarle un mismo `fetcher` (el proceso de llamada a la api) a todos tus `useSWR()`.

```jsx
// En tu archivo `App.jsx` o `App.js`
import { SWRConfig } from "swr";
import axios from "axios";

const fetcher = (url) => axios.get(url).then((res) => res.data);

function App() {
  return (
    // Le damos a todos los `useSWR()` el acceso al fetcher
    <SWRConfig value={{ fetcher }}>
      {/* Aquí va el resto de tu aplicación */}
    </SWRConfig>
  );
}
```

```jsx
// En el archivo de tu componente
import { useParams } from "react-router-dom";
import useSWR from "swr";

export const useGitHubUser = () => {
  const { username } = useParams();
  const { data, error, mutate } = useSWR(
    `https://api.github.com/users/${username}`
  );

  const reFetch = () => {
    mutate();
  };
  return {
    data,
    loading: !data && !error,
    error,
    reFetch,
  };
};
```

12. #### **`Consideraciones y Alternativas`**:

`SWR` es una poderosa herramienta y se puede utilizar también junto con `Fetch API` y `Axios`, pero es importante recordar que no es la única solución para la gestión de datos en React. Otras bibliotecas y patrones, como `Redux`, `Context API` y `Apollo Client`, también son populares y tienen sus propios casos de uso.

13. #### **`Conclusión`**:

`SWR` y las funciones relacionadas proporcionan una forma efectiva de gestionar y actualizar datos en aplicaciones React. Su capacidad para mantener los datos actualizados en tiempo real y su integración sencilla con otros hooks hacen de SWR una elección poderosa para proyectos modernos.

En resumen, `SWR` es una librería valiosa que puede simplificar en gran medida el manejo de datos asíncronos en aplicaciones React, lo que resulta en una experiencia de usuario más fluida y actualizada. Su facilidad de uso y su capacidad para mantener los datos actualizados en tiempo real lo convierten en una herramienta esencial para muchos desarrolladores de React.

## Using Environment en React y Funciones Relacionadas: Una Explicación Detallada

1. #### **`Introducción a process.env`**:

   `process.env` es una variable global proporcionada por `Node.js` que contiene información sobre el entorno en el que se está ejecutando la aplicación. Es especialmente útil para configurar variables de entorno y acceder a ellas en tu aplicación.

2. #### **`Uso de Variables de Entorno en React`**:

   En una aplicación de React, puedes acceder a las variables de entorno usando `process.env`. Esto te permite configurar valores que pueden variar según el entorno de ejecución (por ejemplo, desarrollo, pruebas, producción).

   ```jsx
   const apiKey = process.env.REACT_APP_API_KEY;
   ```

   - **`REACT_APP_`**:

     Es una convención para definir variables de entorno específicas de React. Por ejemplo, si tienes una variable `REACT_APP_API_KEY`, puedes acceder a ella usando `process.env.REACT_APP_API_KEY`.

3. #### **`Configuración de Variables de Entorno`**:

   En React, puedes definir variables de entorno en un archivo llamado `.env` en el directorio raíz de tu proyecto. Puedes tener diferentes archivos `.env` para diferentes entornos (`.env.development` para desarrollo, `.env.production` para producción, etc.).

   ```jsx
   REACT_APP_API_KEY = `tu_api_key_aquí`;
   ```

   Asegúrate de que las variables de entorno empiecen con `REACT_APP_` para que React las reconozca.

4. #### **`Uso de Variables de Entorno en Componentes`**:

   Puedes usar las variables de entorno en tus componentes de la siguiente manera:

   ```jsx
   import React from 'react';

   const Componente = () => {
     const apiKey = process.env.REACT_APP_API_KEY;

     return (
       // Usa apiKey en tu componente
       // ...
     );
   };

   export default Componente;
   ```

   - `apiKey` ahora contiene el valor de la variable de entorno `REACT_APP_API_KEY`.

5. #### **`Uso de Variables de Entorno en Archivos de Configuración`**:

   Puedes usar variables de entorno en archivos de configuración para mantener valores sensibles o específicos del entorno fuera del código fuente. Por ejemplo, configurar la URL de una API.

   ```jsx
   const API_URL = process.env.REACT_APP_API_URL;
   ```

6. #### **`Convención .local`**:

   La extensión `.local` para archivos de entorno es una convención utilizada en el desarrollo de software para evitar que ciertas configuraciones sensibles o específicas del entorno se carguen en el control de código fuente. Esta convención es especialmente útil en entornos colaborativos o cuando se trabaja en un proyecto con múltiples desarrolladores. Se utiliza para separar las configuraciones locales y específicas del entorno de desarrollo de las configuraciones que se comparten en el repositorio de código. Esto ayuda a mantener la seguridad y la flexibilidad en el desarrollo colaborativo de software.

   `La idea principal es que los archivos con la extensión .local contengan configuraciones específicas para el entorno local de cada desarrollador y no se compartan en el repositorio de código`. Esto es importante para mantener la seguridad de cierta información, como claves de API o contraseñas, y para permitir que cada desarrollador tenga su propia configuración sin afectar a los demás.

   Por ejemplo, si estás trabajando en un proyecto de React, puedes tener un archivo `.env.local` que contiene configuraciones específicas para tu entorno local. `Este archivo puede incluir cosas como tu clave de API personal para pruebas`, mientras que el archivo `.env` (el principal), `mantendría las configuraciones predeterminadas o las que se compartirían con el equipo`.

   Por lo tanto, al tener un archivo `.env.local`, puedes asegurarte de que tus configuraciones locales no se sobrescriban o afecten a las configuraciones del equipo y viceversa. A demás, al no cargar este archivo en el control de código fuente `source control`, se evita la posibilidad de exponer accidentalmente información confidencial.

   Ejemplo:

   ```bash
   ├── src/
   │   ├── components/
   │   │   ├── MiComponente.js
   │   └── App.js
   ├── .env.local
   ├── .gitignore
   └── package.json
   ```

   - **Contenido de `.env.local`**:

     Supongamos que estamos utilizando una `API` de prueba de un servicio de clima ficticio llamado `WeatherApp`. La API de `WeatherApp` requiere una clave de API para autenticar las solicitudes. En este caso, la `API key` podría ser algo como:

     ```bash
     REACT_APP_WEATHERAPP_API_KEY=1234567890abcdef
     ```

   - **Contenido de `MiComponente.js` o `.jsx`**:

     ```jsx
     // Importa la clave de API desde el archivo de entorno
     const apiKey = process.env.REACT_APP_API_KEY;

     // Usa la clave de API en tu componente
     function MiComponente() {
       return (
         <div>
           <div>Mi componente</div>
           <div>Clave de API: {apiKey}</div>
         </div>
       );
     }

     export default MiComponente;
     ```

   - **Contenido de `App.js` o `App.jsx`**:

     ```jsx
     import React from "react";
     import MiComponente from "./components/MiComponente";

     function App() {
       return (
         <div className="App">
           <MiComponente />
         </div>
       );
     }

     export default App;
     ```

   - **Contenido de `.gitignore`**:

     ```bash
     # Otros archivos y carpetas...
     .env.local
     ```

     Con esta estructura, el archivo `.env.local` no se incluirá en el control de código fuente gracias a la configuración en el archivo `.gitignore`. Esto asegura que tu clave de API permanezca segura y específica de tu entorno local.

7. #### **`Ventajas de Usar Variables de Entorno`**:

   - **Seguridad**:

     Permite mantener información sensible (como claves API) fuera del código fuente, lo que es fundamental para la seguridad.

   - **Portabilidad**:

     Facilita la configuración de diferentes entornos (desarrollo, pruebas, producción) sin necesidad de cambiar el código.

   - **Facilita la Colaboración**:

     Permite a varios desarrolladores trabajar en el mismo proyecto con configuraciones personalizadas.

   - **Simplifica la Implementación**:

     Facilita el despliegue de la aplicación en diferentes entornos sin necesidad de modificar manualmente las configuraciones.

8. #### **`Consideraciones sobre Variables de Entorno`**:

   - **Recarga Necesaria**:

     Si cambias una variable de entorno en tu archivo `.env`, es posible que necesites reiniciar tu servidor de desarrollo para que los cambios surtan efecto.

   - **Variables de Entorno en el Lado del Servidor**:

     Ten en cuenta que `process.env` solo está disponible en el lado del servidor (Node.js). En el lado del cliente (navegador), solo puedes acceder a las variables de entorno que comienzan con `REACT_APP_`.

   - **No Incluir Valores Sensibles**:

     Aunque las variables de entorno son útiles para configuraciones, no deben utilizarse para almacenar información confidencial como contraseñas o claves privadas.

9. #### **`Resumen`**:

   `process.env` en React proporciona una forma conveniente de configurar y acceder a variables de entorno en tu aplicación. Esto es esencial para mantener la seguridad de información sensible y simplificar la configuración en diferentes entornos de desarrollo. Al seguir las convenciones y buenas prácticas, puedes aprovechar al máximo el uso de variables de entorno en tu proyecto de React.
