let HeroSwiper = {
    swiperInstance : null,
    
    init: () => {
        HeroSwiper.initSwiper();
    },
    initSwiper: () => {
        const swiperEl = document.querySelector('.block-hero-swiper .swiper');
        if (swiperEl && typeof Swiper !== "undefined") {
            if (!swiperEl.swiper) {
                HeroSwiper.swiperInstance = new Swiper(swiperEl, {
                    loop: true,
                    autoplay: {
                        delay: 4000,
                        disableOnInteraction: false,
                    },
                    effect: 'fade',
                    fadeEffect: {
                        crossFade: true
                    },
                    speed: 1000,
                });
            }
        } else {
            console.warn("Swiper: .block-hero-swiper not found or Swiper is undefined");
        }
    }
}