let Client = {

    swiperInstance : null,
    resizeTimer: null,

    init: () => {
        console.log("client::init");
        Client.initSwiper();

        window.addEventListener('resize', () => {
            clearTimeout(Client.resizeTimer);
            Client.resizeTimer = setTimeout(() => {
                Client.initSwiper();
            }, 200);
        });
    },

    initSwiper: () => {

        if (window.innerWidth < 1023 && !Client.swiperInstance) {
            const swiperEl = document.querySelector('.block-clients-swiper');
            if (swiperEl && typeof Swiper !== "undefined") {
                if (!swiperEl.swiper) {
                    Client.swiperInstance = new Swiper(swiperEl, {
                        slidesPerView: 1,
                        slidesPerGroup: 1,
                        grid: {
                            rows: 4,
                            fill: 'row',
                        },
                        pagination: {
                            el: '.swiper-pagination',
                            clickable: true,
                        },
                    });
                }
            } else {
                console.warn("Swiper: .block-clients-swiper not found or Swiper is undefined");
            }
        } else if (window.innerWidth >= 1023 && Client.swiperInstance) {
            Client.swiperInstance.destroy(true, true);
            Client.swiperInstance = null;
        }
    }
}