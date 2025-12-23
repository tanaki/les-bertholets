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