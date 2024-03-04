class Header {
    constructor() {
        // this.header = document.querySelector('header');
    }

    makeHeaderSticky() {
        let scrollPrev = 0;
        let header = document.querySelector('header');
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            if (scrolled > 100 && scrolled > scrollPrev) {
                header.classList.add('out');
            } else {
                header.classList.remove('out');
            }
            scrollPrev = scrolled;
        });
    }

    init() {
        let hamburger = document.querySelector('.ic-menu'); 
        let mobMenuClose = document.querySelector('.mm-ocd__backdrop');
        // let mobMenu = document.querySelector('.header-mob-menu'); 
        let mobMenuFooter = document.querySelectorAll('.title-footer-menu');
        let menuMobItemHasChildren = document.querySelectorAll('ul.mob-nav-header .menu-item-has-children');
        let HTML = document.querySelector('html');

        //Mob menu
        mobMenuClose.addEventListener('click', function() {
            hamburger.classList.toggle('open-nav');
            document.querySelectorAll('ul.sub-menu').forEach(el => {
                if(el.classList.contains('mm-spn--open')) {
                    el.classList.remove('mm-spn--open');
                    document.querySelector('.mob-nav-header').classList.remove('mm-spn--parent');
                    document.querySelector('#mob-menu').dataset.mmSpnTitle = 'Menu'
                }
            });
            HTML.classList.toggle('no-scroll');
        });

        hamburger.addEventListener('click', function() {
            this.classList.toggle('open-nav');
            HTML.classList.toggle('no-scroll');
        });
        //End
        // hamburger.addEventListener('click', function() {
        //     this.classList.toggle('open-nav');
        //     mobMenu.classList.toggle('open-menu');
        //     HTML.classList.toggle('no-scroll');
        // });
        mobMenuFooter.forEach(elem => {
            elem.addEventListener('click', function() {
                this.closest('.footer-nav').classList.toggle('open-menu');
            });
        });
        menuMobItemHasChildren.forEach(elem => {
            elem.addEventListener('click', function() {
                this.classList.toggle('open-menu');
            });
        });

        this.makeHeaderSticky();
    }
}

export default new Header();
