let Client = {

    swiperInstance : null,
    resizeTimer: null,

    init: () => {
        console.log("client::init");
        Client.initSwiper();

        window.addEventListener('resize', () => {
            clearTimeout(Client.resizeTimer);
            Client.resizeTimer = setTimeout(() => {
                Client.initSwiper();
            }, 200);
        });
    },

    initSwiper: () => {

        if (window.innerWidth < 1023 && !Client.swiperInstance) {
            const swiperEl = document.querySelector('.block-clients-swiper');
            if (swiperEl && typeof Swiper !== "undefined") {
                if (!swiperEl.swiper) {
                    Client.swiperInstance = new Swiper(swiperEl, {
                        slidesPerView: 1,
                        slidesPerGroup: 1,
                        grid: {
                            rows: 4,
                            fill: 'row',
                        },
                        pagination: {
                            el: '.swiper-pagination',
                            clickable: true,
                        },
                    });
                }
            } else {
                console.warn("Swiper: .block-clients-swiper not found or Swiper is undefined");
            }
        } else if (window.innerWidth >= 1023 && Client.swiperInstance) {
            Client.swiperInstance.destroy(true, true);
            Client.swiperInstance = null;
        }
    }
}
let Content = {
  init: () => {

    console.log("content::init");

    const animateScroll = (element, options = {}, parent = null) => {
      if (!element) return;

      const {
        start = 'top bottom',
        end = 'bottom 80%',
        scrub = 1,
        fromY = 30,
        toY = 0,
        fromOpacity = 0,
        toOpacity = 1,
        markers = false
      } = options;

      gsap.fromTo(element,
        { yPercent: fromY, opacity: fromOpacity },
        {
          yPercent: toY,
          opacity: toOpacity,
          scrollTrigger: {
            trigger: parent || element,
            start: start,
            end: end,
            scrub: scrub,
            markers: markers
          }
        }
      );
    };

    // Sélectionner tous les éléments
    const chapos = document.querySelectorAll('.block:not(.block-hero) .chapo');
    const blocksContent = document.querySelectorAll('.block-content-content > *');
    const blocksPostContent = document.querySelectorAll('.block-post-content .block-inside > *, .block-split-detail > *');
    const texts = document.querySelectorAll('.animate-text');
    const buttons = document.querySelectorAll('.animate-button');
    const blocks = document.querySelectorAll('.animate-block');

    // Appliquer l’animation
    chapos.forEach(el => animateScroll(el, { fromY: 30, toY: 0, scrub: 1 }));
    blocksContent.forEach(el => animateScroll(el, { fromY: 20, toY: 0, scrub: 0.5, start: 'top 90%', end: '90% 90%' }));
    blocksPostContent.forEach(el => animateScroll(el, { fromY: 20, toY: 0, scrub: 0.2, start: 'top 90%', end: '90% 90%' }));
    texts.forEach(el => animateScroll(el, { fromY: 30, toY: 0, scrub: 1 }));
    buttons.forEach(el => animateScroll(el, { fromY: 30, toY: 0, scrub: 1 }));
    blocks.forEach(el => animateScroll(el, { start: 'top bottom', end: 'bottom 90%', fromY: 30, toY: 0, scrub: 0.2, parent: document.querySelector('.block-form-contact') }));

  }
};

let Footer = {
    init : () => {

        console.log( "footer::init" );

        let container = "footer";
        let lists = document.querySelectorAll("footer .block-inside > div:not(.logo), footer .block-inside .logo");

        // Formules
        let footerTL = gsap.timeline({
            scrollTrigger: {
                trigger: container,
                start: 'top 90%',
                end: '90% 90%',
                scrub: 0.5
            }
        });

        footerTL.fromTo(lists, {
            yPercent: 30,
            opacity: 0
        },{
            yPercent: 0,
            opacity: 1,
            stagger : 0.1
        });
    }
}
let Grid = {

    swiperInstance : null,
    resizeTimer: null,

    init: () => {
        console.log("grid::init");
        Grid.initSwiper();

        window.addEventListener('resize', () => {
            clearTimeout(Grid.resizeTimer);
            Grid.resizeTimer = setTimeout(() => {
                Grid.initSwiper();
            }, 200);
        });
    },

    initSwiper: () => {

        if (window.innerWidth < 1023 && !Grid.swiperInstance) {
            const swiperEl = document.querySelector('.block-grid-swiper');
            if (swiperEl && typeof Swiper !== "undefined") {
                if (!swiperEl.swiper) {
                    Grid.swiperInstance = new Swiper(swiperEl, {
                        slidesPerView: 1,
                        slidesPerGroup: 1,
                        grid: {
                            rows: 3,
                            fill: 'row',
                        },
                        pagination: {
                            el: '.swiper-pagination',
                            clickable: true,
                        },
                    });
                }
            } else {
                console.warn("Swiper: .block-grid-swiper not found or Swiper is undefined");
            }
        } else if (window.innerWidth >= 1023 && Grid.swiperInstance) {
            Grid.swiperInstance.destroy(true, true);
            Grid.swiperInstance = null;
        }
    }
}
let Lists = {
    init : () => {

        let lists = document.querySelectorAll('.animate-list');

        if ( lists !== null ) {

            lists.forEach( list => {

                let listItems = list.querySelectorAll(':scope > div, :scope > a');
                let isSwiper = list.classList.contains("swiper-wrapper");
                let hasLongDuration = list.classList.contains("duration-long");

                let scrub = hasLongDuration ? 1 : 0.5;
                let stagger = 0.1;

                let itemTL = gsap.timeline({
                    scrollTrigger: {
                        trigger: isSwiper ? list.parentElement : list,
                        start: 'top 90%',
                        end: '90% 90%',
                        scrub: scrub
                    }
                });

                itemTL.fromTo(listItems, {
                    yPercent: 25,
                    opacity: 0
                },{
                    yPercent: 0,
                    opacity: 1,
                    stagger : stagger
                });
            } );
        }
    }
}

let Title = {
    init : () => {

        let title = document.querySelector('h1');
        let titles = document.querySelectorAll('h3');
        let chapos = document.querySelectorAll('.block-hero .chapo');

        if ( title !== null ) {
            let titleTL = gsap.timeline({
                scrollTrigger: {
                    trigger: title,
                    start: '100% 30%',
                    end: '100% 0',
                    scrub: 1
                }
            });

            titleTL.fromTo(title, {
                yPercent: 0,
                opacity: 1
            },{
                yPercent: -25,
                opacity: 0
            });
        }
        
        if ( titles !== null ) {

            titles.forEach( title => {
                let titleTL = gsap.timeline({
                    scrollTrigger: {
                        trigger: title,
                        start: 'top bottom',
                        end: 'bottom 80%',
                        scrub: 1
                    }
                });

                titleTL.fromTo(title, {
                    yPercent: 30,
                    opacity: 0
                },{
                    yPercent: 0,
                    opacity: 1
                });
            } );
        }
        
        if ( chapos !== null ) {

            chapos.forEach( chapo => {
                let chapoTL = gsap.timeline({
                    scrollTrigger: {
                        trigger: chapo,
                        start: '100% 30%',
                        end: '100% 0',
                        scrub: 1
                    }
                });

                chapoTL.fromTo(chapo, {
                    yPercent: 0,
                    opacity: 1
                },{
                    yPercent: -25,
                    opacity: 0
                });
            } );
        }
        
    }
}

/* Headroom */
// var headerEl = document.querySelector("header");
// var headroom  = new Headroom(headerEl);

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
  /*
  if (headroom) headroom.init();

  if (typeof gsap !== "undefined" && typeof ScrollTrigger !== "undefined") {
    gsap.registerPlugin(ScrollTrigger);
  }
  */

  // Attendre que tout soit chargé
  window.addEventListener("load", () => {
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
