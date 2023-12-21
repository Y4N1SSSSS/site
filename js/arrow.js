// Ajoutez le script JavaScript pour afficher/cacher la flèche en fonction du défilement
document.addEventListener("DOMContentLoaded", function() {
  var backToTopButton = document.getElementById("back-to-top");

  window.addEventListener("scroll", function() {
      if (window.scrollY > 300) {
          backToTopButton.style.display = "block";
      } else {
          backToTopButton.style.display = "none";
      }
  });

  backToTopButton.addEventListener("click", function() {
      window.scrollTo({
          top: 0,
          behavior: "smooth"
      });
  });
});