$(document).ready(function(){
    $(".owl-carousel").owlCarousel({
      items: 1,
      loop: true,
      nav: false,
      dots: true,
      animateOut: 'fadeOut',
      autoplay: true,
      autoplayTimeout: 7000,
      autoplayHoverPause: true
    });
  });