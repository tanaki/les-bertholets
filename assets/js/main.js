
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

/* Extra side */
var
  openButton = document.querySelector('.extra-side--btn-open'),
  closeButton = document.querySelector('.extra-side--btn-close'),
  closePanel = document.querySelector('.extra-side-cover');

if ( openButton ) {
  openButton.addEventListener('click', (e) => {
    e.preventDefault();
    document.body.classList.add('extra-side--opened');
  });
}
if ( closeButton ) {
  closeButton.addEventListener('click', (e) => {
    e.preventDefault();
    document.body.classList.remove('extra-side--opened');
  });
}
if ( closePanel ) {
  closePanel.addEventListener('click', (e) => {
    e.preventDefault();
    document.body.classList.remove('extra-side--opened');
  });
}

/* Init on domloaded */
document.addEventListener("DOMContentLoaded", () => {

  document.documentElement.classList.add('no-transition');

  const btn = document.getElementById('back-to-top');

  window.addEventListener('scroll', function () {
    if (window.scrollY > 300) {
      btn.classList.add('show');
    } else {
      btn.classList.remove('show');
    }
  });

  btn.addEventListener('click', function () {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });

  if (headroom) headroom.init();
  /*
  if (typeof gsap !== "undefined" && typeof ScrollTrigger !== "undefined") {
    gsap.registerPlugin(ScrollTrigger);
  }
  */

  // Attendre que tout soit chargé
  window.addEventListener("load", () => {

    let tempEl = document.querySelector('#temporary');
    if ( tempEl ) {
      if (window.location.search.includes('preview')) {
        sessionStorage.setItem('preview', 'true');
        tempEl.style.display = 'none';
      }

      if ( sessionStorage.getItem('preview') === 'true' ) {
        tempEl.style.display = 'none';
      }
    }

    setTimeout(() => {
			document.documentElement.classList.remove('no-transition');
		}, 50);

    if ( AgeGate ) AgeGate.init();
    if ( HeroSwiper ) HeroSwiper.init();
    if ( ListSwipe ) ListSwipe.init();
    if ( DetailGallery ) DetailGallery.init();
    if ( Contact ) Contact.init();

    // if (Client) Client.init();
    // if (Grid) Grid.init();
    // if (Title) Title.init();
    // if (Lists) Lists.init();
    // if (Content) Content.init();
    // if (Footer) Footer.init();

    // Forcer un refresh de ScrollTrigger après que le layout soit stabilisé
    /*
    setTimeout(() => {
      if (typeof ScrollTrigger !== "undefined") {
        ScrollTrigger.refresh();
      }
    }, 300);
    */

    document.body.classList.add('loaded');
  });
});
