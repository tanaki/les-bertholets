let AgeGate = {
  // Initialisation
  init: () => {
    const yesBtn = document.querySelector('[data-answer="yes"]');
    const noBtn = document.querySelector('[data-answer="no"]');

    // Vérifie le cookie
    if (AgeGate.getCookie('ageVerified') === 'true') {
        document.body.classList.add('age-verified');
    } else {
        document.body.classList.remove('age-verified');
    }

    // Bouton Oui
    yesBtn.addEventListener('click', () => {
        AgeGate.setCookie('ageVerified', 'true', 30);
        document.body.classList.add('age-verified');
        document.body.classList.remove('age-error');
    });

    // Bouton Non
    noBtn.addEventListener('click', () => {
        AgeGate.setCookie('ageVerified', 'false', 30);
        document.body.classList.remove('age-verified');
        document.body.classList.add('age-error');
    });
  },

  // --- Utilitaires cookies ---
  setCookie: (name, value, days) => {
    const d = new Date();
    d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000));
    document.cookie = `${name}=${value};expires=${d.toUTCString()};path=/;SameSite=Lax`;
  },

  getCookie: (name) => {
    const m = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
    return m ? m[2] : null;
  }
};

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

let DetailGallery = {
  
  init: () => {

    const mainImg = document.getElementById("mainImg");
    const thumbs = document.querySelectorAll(".thumb-img");

    if ( !mainImg ) return;

    thumbs.forEach(thumb => {
        thumb.addEventListener("click", () => {
            mainImg.srcset = thumb.srcset;
            mainImg.src = thumb.src;
        });
    });

  },
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
let ListSwipe = {

    swiperInstance : null,

    init: () => {
        ListSwipe.initSwiper();
    },

    initSwiper: () => {

        if ( !Client.swiperInstance) {
        // if (window.innerWidth < 1023 && !Client.swiperInstance) {

            const swiperEl = document.querySelector('.block-list-swiper');
            if (swiperEl && typeof Swiper !== "undefined") {
                if (!swiperEl.swiper) {
                    ListSwipe.swiperInstance = new Swiper(swiperEl, {
                        spaceBetween: '40px',
                        breakpoints: {
                            640: {
                                slidesPerView: 2,
                            },
                            768: {
                                slidesPerView: 4,
                            },
                            1024: {
                                slidesPerView: 6,
                            },
                        },
                    });
                }
            } else {
                console.warn("Swiper: .home-swipe-container not found or Swiper is undefined");
            }
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

// Données des magasins avec coordonnées pré-calculées
const stores = [
    { id: 1, name: "Magasin A", address: "10 rue de Rivoli, 75001 Paris", lat: 48.855, lng: 2.357, hours: "9h-18h", email: "", phone: ""},
    { id: 2, name: "Magasin B", address: "5 avenue Montaigne, 75008 Paris", lat: 48.866, lng: 2.304, hours: "10h-19h", email: "", phone: ""},
    { id: 3, name: "Magasin C", address: "20 boulevard Saint-Germain, 75001 Paris", lat: 48.853, lng: 2.348, hours: "8h-17h", email: "", phone: ""},
    { id: 4, name: "Magasin D", address: "15 rue du Faubourg Saint-Honoré, 75008 Paris", lat: 48.870, lng: 2.316, hours: "11h-20h", email: "", phone: ""},
    { id: 5, name: "Magasin E", address: "30 avenue des Champs-Élysées, 75008 Paris", lat: 48.869, lng: 2.307, hours: "10h-22h", email: "", phone: ""},
    { id: 6, name: "Magasin F", address: "50 rue de la Paix, 75002 Paris", lat: 48.868, lng: 2.330, hours: "9h-19h", email: "", phone: ""},
    { id: 7, name: "Magasin G", address: "100 boulevard Haussmann, 75009 Paris", lat: 48.875, lng: 2.325, hours: "10h-20h", email: "", phone: ""},
    { id: 8, name: "Magasin H", address: "200 rue Saint-Denis, 75004 Paris", lat: 48.864, lng: 2.350, hours: "9h-18h", email: "", phone: ""},
    { id: 9, name: "Magasin I", address: "75 avenue de la République, 75011 Paris", lat: 48.863, lng: 2.381, hours: "8h-17h", email: "", phone: ""},
    { id: 10, name: "Magasin J", address: "120 rue de la Convention, 75015 Paris", lat: 48.841, lng: 2.292, hours: "10h-19h", email: "", phone: ""}
];

window.StoreLocator = {

    map: null,
    markers : [],

    storeListEl : null,
    searchInput : null,

    // Initialisation
    init: () => {

        const mapElement = document.getElementById("map")

        if (!mapElement) return;

        StoreLocator.storeListEl = document.getElementById('stores');
        StoreLocator.searchInput = document.getElementById('search');

        StoreLocator.map = new google.maps.Map(mapElement, {
            center: { lat: 48.8566, lng: 2.3522 },
            zoom: 5,
        });

        // Bounds pour auto-zoom
        const bounds = new google.maps.LatLngBounds();

        // Ajout des markers
        stores.forEach(store => {
            StoreLocator.addMarker(store);
            bounds.extend({ lat: store.lat, lng: store.lng });
        });

        StoreLocator.map.fitBounds(bounds);
        
        // Affiche tous les magasins
        StoreLocator.displayStores(stores);

        // Recherche en direct
        StoreLocator.searchInput.addEventListener('input', StoreLocator.filterStores);

        // Filtre selon la vue carte
        StoreLocator.map.addListener('bounds_changed', StoreLocator.filterStores);
    },

    addMarker : (store) => {
        const marker = new google.maps.Marker({
            map: StoreLocator.map,
            position: { lat: store.lat, lng: store.lng },
            title: store.name,
            icon: {
                url: "/wp-content/themes/les-bertholets/assets/img/marker.png",
                scaledSize: new google.maps.Size(40, 40),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(20, 40)
            }
        });
        StoreLocator.markers.push({ marker, store });
    },

    createStoreListItem : (store) => {

        const li = document.createElement('li');
        li.classList.add('store-item');

        li.innerHTML = `
            <span class="store-item-name">${store.name}</span>
            <span class="store-item-address">${store.address}</span>
            ${store.hours ? `<span class="store-item-hours">${store.hours}</span>` : ``}
            ${store.email ? `<span class="store-item-email">${store.email}</span>` : ``}
            ${store.phone ? `<span class="store-item-phone">${store.phone}</span>` : ``}
        `;

        li.dataset.storeId = store.id;
        li.dataset.lat = store.lat;
        li.dataset.lng = store.lng;

        li.addEventListener('click', () => {
            const obj = StoreLocator.markers.find(m => m.store.id === store.id);
            if (obj) {
                StoreLocator.map.panTo(obj.marker.getPosition());
                StoreLocator.map.setZoom(15);
            }
        });

        return li;
    },

    /**
     * Affiche une liste de stores
     */
    displayStores : (list) => {
        StoreLocator.storeListEl.innerHTML = '';
        list.forEach(store => {
            StoreLocator.storeListEl.appendChild(
                StoreLocator.createStoreListItem(store)
            );
        });
    },

    /**
     * Recherche + filtrage carte en utilisant le même template
     */
    filterStores : () => {

        const query = StoreLocator.searchInput.value.toLowerCase();

        StoreLocator.storeListEl.innerHTML = '';

        StoreLocator.markers.forEach(obj => {
            const { marker, store } = obj;

            const matchesSearch =
                store.name.toLowerCase().includes(query) ||
                store.address.toLowerCase().includes(query);

            if (matchesSearch) {
                marker.setMap(StoreLocator.map);
                StoreLocator.storeListEl.appendChild(
                    StoreLocator.createStoreListItem(store)
                );
            } else {
                marker.setMap(null);
            }
        });
    }
};

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

  /*
  if (headroom) headroom.init();

  if (typeof gsap !== "undefined" && typeof ScrollTrigger !== "undefined") {
    gsap.registerPlugin(ScrollTrigger);
  }
  */

  // Attendre que tout soit chargé
  window.addEventListener("load", () => {

    setTimeout(() => {
			document.documentElement.classList.remove('no-transition');
		}, 50);

    if ( AgeGate ) AgeGate.init();
    if ( ListSwipe ) ListSwipe.init();
    if ( DetailGallery ) DetailGallery.init();

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
