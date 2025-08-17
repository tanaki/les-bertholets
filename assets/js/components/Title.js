let Title = {
    init : () => {

        let title = document.querySelector('h1');
        let titles = document.querySelectorAll('h3');

        if ( title !== null ) {
            
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
        
        if ( titles !== null ) {
            
            // TITLE
            if ( titles !== null ) {

                titles.forEach( title => {
                    let titleTL = gsap.timeline({
                        scrollTrigger: {
                            trigger: title,
                            start: 'top bottom',
                            end: 'bottom 80%',
                            scrub: 1
                        }
                    });

                    titleTL.fromTo(title, {
                        yPercent: 30,
                        opacity: 0
                    },{
                        yPercent: 0,
                        opacity: 1
                    });
                } );
            }
        }
        
    }
}