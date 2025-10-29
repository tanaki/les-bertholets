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
