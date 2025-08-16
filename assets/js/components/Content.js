let Content = {
    init : () => {

        let intro = document.querySelector('.page-content > p:first-child');
        
        // TITLE
        if ( intro !== null ) {
            let introTL = gsap.timeline({
                scrollTrigger: {
                    trigger: intro,
                    start: '100% 50%',
                    end: '100% 0',
                    scrub: 1
                }
            });

            introTL.fromTo(intro, {
                yPercent: 0,
                opacity: 1
            },{
                yPercent: -25,
                opacity: 0
            });
        }

        let blocksContent = document.querySelectorAll('.page-content > *');

        if ( blocksContent !== null ) {

            blocksContent.forEach( blockContent => {
                let blockTL = gsap.timeline({
                    scrollTrigger: {
                        trigger: blockContent,
                        start: 'top 90%',
                        end: '90% 90%',
                        scrub: 0.5
                    }
                });
    
                blockTL.fromTo(blockContent, {
                    yPercent: 20,
                    opacity: 0
                },{
                    yPercent: 0,
                    opacity: 1
                });
            });
        }

    }
}