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
