new Vue({
  el: "#vm",
  data: () => ({
    form: {
      punctuation: 0,
      comments: "",
    },
    msgSubmit: "",
  }),
  computed: {
    validForm() {
      return this.form.punctuation > 0 && this.form.comments.length >= 10;
    },
  },
  methods: {
    submitForm: function () {
      this.msgSubmit = `Gracias por tu comentario. 
      Puntuación: ${this.form.punctuation}. 
      Comentario: ${this.form.comments}.`;
    },
  },
});
