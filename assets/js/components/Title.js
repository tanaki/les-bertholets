let Title = {
    init : () => {

        if ( document.querySelector('h1') !== null ) {
            
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
        
        if ( document.querySelector('h4') !== null ) {
            
            let titles = document.querySelectorAll('h4');

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