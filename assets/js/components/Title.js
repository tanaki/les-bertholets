let Title = {
    init : () => {
        
        if ( document.querySelector('h1') === null ) return;
        
        let title = document.querySelector('h1');

        // TITLE
        if ( title !== null ) {
            let titleTL = gsap.timeline({
                scrollTrigger: {
                    trigger: title,
                    start: '100% 30%',
                    end: '100% 0',
                    scrub: 1
                }
            });

            titleTL.fromTo(title, {
                yPercent: 0,
                opacity: 1
            },{
                yPercent: -25,
                opacity: 0
            });
        }
    }
}