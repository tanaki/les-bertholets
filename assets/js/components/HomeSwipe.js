let ListSwipe = {

    swiperInstance : null,

    init: () => {
        console.log("ListSwipe::init");
        ListSwipe.initSwiper();
    },

    initSwiper: () => {

        if ( !Client.swiperInstance) {
        // if (window.innerWidth < 1023 && !Client.swiperInstance) {

            const swiperEl = document.querySelector('.block-list-swiper');
            if (swiperEl && typeof Swiper !== "undefined") {
                if (!swiperEl.swiper) {
                    ListSwipe.swiperInstance = new Swiper(swiperEl, {
                        spaceBetween: '40px',
                        breakpoints: {
                            640: {
                                slidesPerView: 2,
                            },
                            768: {
                                slidesPerView: 4,
                            },
                            1024: {
                                slidesPerView: 6,
                            },
                        },
                    });
                }
            } else {
                console.warn("Swiper: .home-swipe-container not found or Swiper is undefined");
            }
        }
    }
}
