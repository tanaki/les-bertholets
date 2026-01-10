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
                        slidesPerGroup: 1,
                        breakpoints: {
                            768: {
                                spaceBetween: '40px',
                                slidesPerView: 3,
                                slidesPerGroup: 2,
                            },
                            1024: {
                                spaceBetween: '30px',
                                slidesPerView: 4,
                                slidesPerGroup: 3,
                            },
                            1280: {
                                spaceBetween: '40px',
                                slidesPerView: 6,
                                slidesPerGroup: 5,
                            },
                        },
                        navigation: {
                            nextEl: ".block-list-button-next",
                            prevEl: ".block-list-button-prev",
                        },
                    });
                }
            }
        }
    }
}
