
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
document.addEventListener("DOMContentLoaded", () => {
  if (headroom) headroom.init();

  if (typeof gsap !== "undefined" && typeof ScrollTrigger !== "undefined") {
    gsap.registerPlugin(ScrollTrigger);
  }

  // Attendre que tout soit chargé (images, CSS, etc.)
  window.addEventListener("load", () => {
    if (Client) Client.init();
    if (Grid) Grid.init();
    if (Footer) Footer.init();

    document.body.classList.add('loaded');
  });
});