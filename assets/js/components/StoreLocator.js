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
