let Content = {
    init : () => {

        console.log( "content::init" );

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
let Footer = {
    init : () => {

        console.log( "footer::init" );

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

/* Headroom */
var headerEl = document.querySelector("header");
var headroom  = new Headroom(headerEl);

/* Nav Mobile */
var 
  toggleNav = document.querySelector('.toggle-nav'),
  headerNav = document.querySelector('header'),
  headerNavItems = headerNav.querySelectorAll('nav ul li a');

if ( toggleNav ) {
  toggleNav.addEventListener('click', (e) => {
    e.preventDefault();
    headerNav.classList.toggle('nav-open');
    document.body.classList.toggle('has-nav-open');
  });
}

if ( headerNavItems ) {
  headerNavItems.forEach( item => {
    item.addEventListener('click', e => {
      headerNav.classList.remove('nav-open');
      document.body.classList.remove('has-nav-open');
    });
  });
}

/* Init on domloaded */
if ( document ) {
  document.addEventListener("DOMContentLoaded", function(event){

    if (headroom) headroom.init();
    gsap.registerPlugin(ScrollTrigger);

    // wait until images, links, fonts, stylesheets, and js is loaded
    window.addEventListener("load", function(e){

      // if ( Title ) Title.init();
      // if ( Content ) Content.init();
      if ( Footer ) Footer.init();

      document.body.classList.add('loaded');
    });
  });
}
