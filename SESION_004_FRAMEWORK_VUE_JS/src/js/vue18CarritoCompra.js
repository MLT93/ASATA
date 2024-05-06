new Vue({
  el: "#vm",
  data: () => ({
    products: [
      {
        id: 1,
        name: "Product 1",
        price: 9.99,
        currency: "€",
        image: "https://via.placeholder.com/150x200/112233",
      },
      {
        id: 3,
        name: "Product 2",
        price: 3.99,
        currency: "€",
        image: "https://via.placeholder.com/150x200/8528ffce",
      },
      {
        id: 4,
        name: "Product 3",
        price: 19.99,
        currency: "€",
        image: "https://via.placeholder.com/150x200/c92bceda",
      },
      {
        id: 5,
        name: "Product 4",
        price: 29.99,
        currency: "€",
        image: "https://via.placeholder.com/150x200/ff4208d7",
      },
      {
        id: 6,
        name: "Product 5",
        price: 7.99,
        currency: "€",
        image: "https://via.placeholder.com/150x200/28ffffce",
      },
      {
        id: 7,
        name: "Product 6",
        price: 99.95,
        currency: "€",
        image: "https://via.placeholder.com/150x200/ff7f08e7",
      },
    ],
    shoppingCart: [],
  }),
  methods: {
    addProduct: function (params) {
      this.shoppingCart.push(params);
      console.log(this.shoppingCart);
    },
  },
  computed: {
    totalShoppingCart() {
      var initialValue = 0;
      var total = this.shoppingCart.reduce(
        (acumulator, currentValue) => acumulator + currentValue.price,
        initialValue
      );
      return total.toFixed(2);
    },
  },
});
