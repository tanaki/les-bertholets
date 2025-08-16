
/* Headroom */
var headerEl = document.querySelector("header");
var headroom  = new Headroom(headerEl);

/* Nav Mobile */
var 
  toggleNav = document.querySelector('.toggle-nav'),
  headerNav = document.querySelector('header'),
  headerNavItems = headerNav.querySelectorAll('nav ul li a');

if ( toggleNav ) {
  toggleNav.addEventListener('click', (e) => {
    e.preventDefault();
    headerNav.classList.toggle('nav-open');
    document.body.classList.toggle('has-nav-open');
  });
}

if ( headerNavItems ) {
  headerNavItems.forEach( item => {
    item.addEventListener('click', e => {
      headerNav.classList.remove('nav-open');
      document.body.classList.remove('has-nav-open');
    });
  });
}

/* Init on domloaded */
if ( document ) {
  document.addEventListener("DOMContentLoaded", function(event){

    if (headroom) headroom.init();
    gsap.registerPlugin(ScrollTrigger);

    // wait until images, links, fonts, stylesheets, and js is loaded
    window.addEventListener("load", function(e){

      if ( Title ) Title.init();
      if ( Content ) Content.init();
      if ( Footer ) Footer.init();

      document.body.classList.add('loaded');
    });
  });
}
