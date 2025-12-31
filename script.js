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
let Contact = {

    popin: null,
    closeBtn: null,

    init: () => {
        Contact.popin = document.getElementById('contactPopin');
        Contact.closeBtn = Contact.popin.querySelector('.contact-popin-close');

        if ( !Contact.popin || !Contact.closeBtn ) return;

        // Exemple : bouton d’ouverture
        console.log("document.querySelectorAll('.open-contact-popin a')", document.querySelectorAll('.open-contact-popin a'))
        document.querySelectorAll('.open-contact-popin a').forEach(btn => {
            btn.addEventListener('click', Contact.openPopin);
        });

        // Fermer via la croix
        Contact.closeBtn.addEventListener('click', (e) => Contact.closePopin(e));

        // Fermer en cliquant sur l’overlay
        Contact.popin.addEventListener('click', (e) => {
            if (e.target === Contact.popin) {
                Contact.closePopin(e);
            }
        });

        // Fermer avec ESC
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                Contact.closePopin(e);
            }
        });
    },


    openPopin : function (e) {
        e.preventDefault();
        Contact.popin.classList.add('is-open');
        Contact.popin.setAttribute('aria-hidden', 'false');
    },

    closePopin: function (e) {
        e.preventDefault();
        Contact.popin.classList.remove('is-open');
        Contact.popin.setAttribute('aria-hidden', 'true');
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
                        spaceBetween: '20px',
                        slidesPerView: 2,
                        breakpoints: {
                            768: {
                                spaceBetween: '40px',
                                slidesPerView: 3,
                            },
                            1024: {
                                spaceBetween: '30px',
                                slidesPerView: 4,
                            },
                            1280: {
                                spaceBetween: '40px',
                                slidesPerView: 6,
                            },
                        },
                    });
                }
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

window.StoreLocator = {

    map: null,
    markers: [],
    markerCluster: null,

    storeListEl: null,
    searchInput: null,
    clearSearchEl: null,
    emptyList: null,
    activeStoreId: null,

    // Initialisation
    init: () => {
        const mapElement = document.getElementById("map");
        if (!mapElement) return;

        StoreLocator.storeListEl = document.getElementById('stores');
        StoreLocator.searchInput = document.getElementById('search');
        StoreLocator.clearSearchEl = document.getElementById('clear-search');
        StoreLocator.emptyList = document.getElementById('empty-list');

        StoreLocator.map = new google.maps.Map(mapElement, {
            center: { lat: 48.8566, lng: 2.3522 },
            zoom: 5,
            zoomControl: true,
            mapTypeControl: true,
            streetViewControl: false,
            fullscreenControl: false,
            clickableIcons: true,
            tilt: 0,
        });

        if (!window.STORES_TO_LOCATE || window.STORES_TO_LOCATE.length === 0) return;

        // Création des markers
        const bounds = new google.maps.LatLngBounds();
        window.STORES_TO_LOCATE.forEach(store => {
            StoreLocator.addMarker(store);
            bounds.extend({ lat: store.lat, lng: store.lng });
        });
        StoreLocator.map.fitBounds(bounds);

        // Création du cluster natif
        StoreLocator.markerCluster = new markerClusterer.MarkerClusterer({
            map: StoreLocator.map,
            markers: StoreLocator.markers.map(obj => obj.marker),
        });

        // Affiche la liste initiale
        StoreLocator.displayStores(window.STORES_TO_LOCATE);

        // Recherche en direct
        StoreLocator.searchInput.addEventListener('input', StoreLocator.filterStores);

        // Événement pour effacer la recherche
        if (StoreLocator.clearSearchEl) {
            StoreLocator.clearSearchEl.addEventListener('click', (e) => {
                e.preventDefault();
                StoreLocator.searchInput.value = '';
                StoreLocator.filterStores();
            });
        }

        // Filtre selon la vue carte
        StoreLocator.map.addListener('bounds_changed', StoreLocator.filterStores);
    },

    addMarker: (store) => {
        const marker = new google.maps.Marker({
            position: { lat: store.lat, lng: store.lng },
            title: store.name,
            icon: {
                url: "/wp-content/themes/les-bertholets/assets/img/marker.png",
                scaledSize: new google.maps.Size(40, 40),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(20, 40)
            },
            optimized: true,
        });

        // Click sur marker → smooth pan/zoom + highlight + scroll
        marker.addListener('click', () => {
            StoreLocator.smoothPanZoom(marker.getPosition(), 15);
            StoreLocator.highlightStoreListItem(store.id, true); // scroll = true
        });

        StoreLocator.markers.push({ marker, store });
    },

    createStoreListItem: (store) => {
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

        // Click sur la liste → smooth pan/zoom + highlight + scroll
        li.addEventListener('click', () => {
            const obj = StoreLocator.markers.find(m => m.store.id === store.id);
            if (obj) {
                StoreLocator.smoothPanZoom(obj.marker.getPosition(), 15);
                StoreLocator.highlightStoreListItem(store.id, true); // scroll = true
            }
        });

        return li;
    },

    // Smooth pan + zoom
    smoothPanZoom: (position, targetZoom) => {
        StoreLocator.map.panTo(position);
        const currentZoom = StoreLocator.map.getZoom();
        let i = currentZoom;
        const step = currentZoom < targetZoom ? 1 : -1;

        const zoomInterval = setInterval(() => {
            if (i === targetZoom) {
                clearInterval(zoomInterval);
            } else {
                i += step;
                StoreLocator.map.setZoom(i);
            }
        }, 50);
    },

    // Highlight + scroll (scroll uniquement si scroll = true)
    highlightStoreListItem: (storeId, scroll = false) => {
        StoreLocator.activeStoreId = storeId;
        StoreLocator.storeListEl.querySelectorAll('.store-item').forEach(li => {
            li.classList.remove('active');
        });

        const li = StoreLocator.storeListEl.querySelector(`.store-item[data-store-id='${storeId}']`);
        if (li) {
            li.classList.add('active');
            if (scroll) {
                li.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        }
    },

    displayStores: (list) => {
        StoreLocator.storeListEl.innerHTML = '';
        list.forEach(store => {
            const li = StoreLocator.createStoreListItem(store);
            StoreLocator.storeListEl.appendChild(li);

            // Réapplique le highlight si c’est le store actif
            if (store.id === StoreLocator.activeStoreId) {
                li.classList.add('active');
                // scroll = false ici pour éviter de scroller au filtrage
            }
        });
    },

    filterStores: () => {
        StoreLocator.emptyList.style.display = 'none';
        StoreLocator.storeListEl.innerHTML = '';

        const query = StoreLocator.searchInput.value.toLowerCase();
        const visibleMarkers = [];

        StoreLocator.clearSearchEl.style.display = query.length === 0 ? 'none' : 'block';

        StoreLocator.markers.forEach(obj => {
            const { marker, store } = obj;
            const matchesSearch =
                store.name.toLowerCase().includes(query) ||
                store.address.toLowerCase().includes(query);

            if (matchesSearch) {
                marker.setMap(StoreLocator.map);
                visibleMarkers.push(marker);
            } else {
                marker.setMap(null);
            }
        });

        // Affiche uniquement les stores visibles
        const visibleStores = window.STORES_TO_LOCATE.filter(store =>
            store.name.toLowerCase().includes(query) ||
            store.address.toLowerCase().includes(query)
        );
        StoreLocator.displayStores(visibleStores);

        if (StoreLocator.storeListEl.children.length === 0) {
            StoreLocator.emptyList.style.display = 'block';
        }

        if (StoreLocator.markerCluster) {
            StoreLocator.markerCluster.clearMarkers();
            StoreLocator.markerCluster.addMarkers(visibleMarkers);
        }
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
