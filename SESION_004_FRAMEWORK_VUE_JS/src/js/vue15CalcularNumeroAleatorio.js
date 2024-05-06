new Vue({
  el: "#vm",
  data: () => ({
    msg: "",
    /* `Math.random()` genera un número aleatorio entre 0 y 1. Por eso lo multiplicamos por 101 para obtener los números entre 0 y 100. Recuerda: multiplicamos por 101 porque teniendo en cuenta los decimales, es muy improbable obtener el número 100 exácto */
    /* `Math.floor()` elimina los decimales redondeando hacia abajo */
    /* `Math.ceil()` elimina los decimales redondeando hacia arriba */
    numeroSecreto: Math.floor(Math.random() * 101),
    numeroInput: "",
    finalizado: false,
    nIntentos: 0,
  }),
  methods: {
    comprobar: function () {
      if (Number(this.numeroInput) === this.numeroSecreto) {
        this.msg = ` Enhorabuena! has acertado el número! El número es
          ${this.numeroSecreto}`;
        console.log("Has acertado!");
      } else if (Number(this.numeroInput) < this.numeroSecreto) {
        this.msg = "";
        this.msg = "Demasiado bajo tu número";
        console.log(`${this.numeroInput} es demasiado bajo`);
      } else if (Number(this.numeroInput) > this.numeroSecreto) {
        this.msg = "";
        this.msg = "Demasiado alto nu número";
        console.log(`${this.numeroInput} es demasiado alto`);
      }
      this.nIntentos++;
    },
    resetJuego: function () {
      this.msg = "";
      this.numeroSecreto = Math.floor(Math.random() * 101);
      this.numeroInput = "";
      this.finalizado = false;
      this.nIntentos = 0;
    },
  },
});
