const isVisual = () => {
  var header = document.querySelector("#is-visual");
  console.log(header);

  
  if (header) {
    window.onscroll = function scrollFunction() {
      if (document.documentElement.scrollTop > 700) {
        header.style.display = "none";
        $(header).slideUp(400);
      } else {
        $(header).slideDown(800);
      }
    };
  }
  document.addEventListener("DOMContentLoaded", isVisual());
};
