let Footer = {
    init : () => {

        let container = "footer";
        let lists = document.querySelectorAll("footer .block-inside > div:not(.logo)");

        // Formules
        let footerTL = gsap.timeline({
            scrollTrigger: {
                trigger: container,
                start: 'top 90%',
                end: '90% 90%',
                scrub: 0.5
            }
        });

        footerTL.fromTo(lists, {
            yPercent: 30,
            opacity: 0
        },{
            yPercent: 0,
            opacity: 1,
            stagger : 0.3
        });
    }
}