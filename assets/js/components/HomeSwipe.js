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
                            640: {
                                spaceBetween: '20px',
                                slidesPerView: 2,
                            },
                            768: {
                                spaceBetween: '40px',
                                slidesPerView: 4,
                            },
                            1024: {
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
