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
            styles: [
                { featureType: "poi", stylers: [{ visibility: "off" }] },
                { featureType: "transit", stylers: [{ visibility: "off" }] },

                { featureType: "administrative", stylers: [{ visibility: "off" }] },
                {
                    featureType: "administrative.country",
                    elementType: "labels",
                    stylers: [{ visibility: "on" }]
                },
                { featureType: "administrative.province", stylers: [{ visibility: "off" }] },
                { 
                    featureType: "administrative.locality", 
                    elementType: "labels",
                    stylers: [{ visibility: "on" }]
                },
                { featureType: "administrative.neighborhood", stylers: [{ visibility: "off" }] },

                { featureType: "road", elementType: "labels", stylers: [{ visibility: "off" }] },
                {
                    featureType: "road",
                    elementType: "geometry",
                    stylers: [{ saturation: -90 }, { lightness: 40 }]
                },
                {
                    featureType: "landscape",
                    stylers: [{ color: "#f4f5f6" }]
                },
                {
                    featureType: "water",
                    stylers: [{ color: "#e1eaf0" }]
                },
                {
                    featureType: "poi.park",
                    stylers: [{ visibility: "off" }]
                }
            ]
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

            algorithm: new markerClusterer.SuperClusterAlgorithm({
                radius: 140,
                maxZoom: 15
            }),

            renderer: {
                render({ count, position }) {
                    const size = 40;
                    const stroke = 2;
                    const color = "#bc6e44"; // orange

                    const svg = `
                        <svg width="${size}" height="${size}" viewBox="0 0 ${size} ${size}" xmlns="http://www.w3.org/2000/svg">
                            <circle 
                                cx="${size / 2}" 
                                cy="${size / 2}" 
                                r="${size / 2 - stroke}" 
                                fill="white"
                                stroke="${color}"
                                stroke-width="${stroke}"
                            />
                            <text
                                x="50%"
                                y="50%"
                                text-anchor="middle"
                                dominant-baseline="central"
                                font-family="Arial, sans-serif"
                                font-size="14"
                                font-weight="600"
                                fill="${color}"
                            >
                                ${count}
                            </text>
                        </svg>
                    `;

                    return new google.maps.Marker({
                        position,
                        icon: {
                            url: "data:image/svg+xml;charset=UTF-8," + encodeURIComponent(svg),
                            scaledSize: new google.maps.Size(size, size),
                            anchor: new google.maps.Point(size / 2, size / 2),
                        },
                        zIndex: google.maps.Marker.MAX_ZINDEX + count,
                    });
                }
            }
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
                url: "/wp-content/themes/les-bertholets/assets/img/icons/icon-marker.png",
                scaledSize: new google.maps.Size(40, 60),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(20, 60)
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
