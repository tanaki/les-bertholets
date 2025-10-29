let Lists = {
    init : () => {

        let lists = document.querySelectorAll('.animate-list');

        if ( lists !== null ) {

            lists.forEach( list => {

                let listItems = list.querySelectorAll(':scope > div, :scope > a');
                let isSwiper = list.classList.contains("swiper-wrapper");
                let hasLongDuration = list.classList.contains("duration-long");

                let scrub = hasLongDuration ? 1 : 0.5;
                let stagger = 0.1;

                let itemTL = gsap.timeline({
                    scrollTrigger: {
                        trigger: isSwiper ? list.parentElement : list,
                        start: 'top 90%',
                        end: '90% 90%',
                        scrub: scrub
                    }
                });

                itemTL.fromTo(listItems, {
                    yPercent: 25,
                    opacity: 0
                },{
                    yPercent: 0,
                    opacity: 1,
                    stagger : stagger
                });
            } );
        }
    }
}
