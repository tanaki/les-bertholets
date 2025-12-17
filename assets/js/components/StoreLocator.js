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
