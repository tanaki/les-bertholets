let Grid = {

    swiperInstance : null,
    resizeTimer: null,

    init: () => {
        console.log("grid::init");
        Grid.initSwiper();

        window.addEventListener('resize', () => {
            clearTimeout(Grid.resizeTimer);
            Grid.resizeTimer = setTimeout(() => {
                Grid.initSwiper();
            }, 200);
        });
    },

    initSwiper: () => {

        if (window.innerWidth < 1023 && !Grid.swiperInstance) {
            const swiperEl = document.querySelector('.block-grid-swiper');
            if (swiperEl && typeof Swiper !== "undefined") {
                if (!swiperEl.swiper) {
                    Grid.swiperInstance = new Swiper(swiperEl, {
                        slidesPerView: 1,
                        slidesPerGroup: 1,
                        grid: {
                            rows: 3,
                            fill: 'row',
                        },
                        pagination: {
                            el: '.swiper-pagination',
                            clickable: true,
                        },
                    });
                }
            } else {
                console.warn("Swiper: .block-grid-swiper not found or Swiper is undefined");
            }
        } else if (window.innerWidth >= 1023 && Grid.swiperInstance) {
            Grid.swiperInstance.destroy(true, true);
            Grid.swiperInstance = null;
        }
    }
}