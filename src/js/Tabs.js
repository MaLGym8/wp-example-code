class Tabs {
    constructor() {}

    init() {
        let tabs = document.querySelectorAll('.header-tab');
        let content = document.querySelectorAll('.content-tab');
        let tabsHeadMob = document.querySelectorAll('.tab-heading-mob');

        if(tabs.length > 0) {
            document.querySelector('.header-tab').classList.add('active');
        }
        if(content.length > 0) {
            document.querySelector('.content-tab').classList.add('active');
        }
        if(document.querySelector('.tab-heading-mob')) {
            document.querySelector('.tab-heading-mob').classList.add('active');
        }

        for (let i = 0; i < tabs.length; i++) {            
            tabs[i].addEventListener('click', () => tabClick(tabs[i].parentNode.parentNode, i));
            if(tabsHeadMob[i]) {
                tabsHeadMob[i].addEventListener('click', () => tabClick(tabs[i].parentNode.parentNode, i));
            }
        }

        function tabClick(parentTab, currentTab) {
            removeActive(parentTab);
            tabs[currentTab].classList.add('active');
            content[currentTab].classList.add('active');
            if(tabsHeadMob[currentTab]) {
                tabsHeadMob[currentTab].classList.add('active');
            }
        }
    
        function removeActive(parentTab) {
            if(parentTab.querySelector('.header-tab')) {
                parentTab.querySelectorAll('.header-tab').forEach(tabHeader => {
                    tabHeader.classList.remove('active');
                });
            }
            parentTab.querySelectorAll('.content-tab').forEach(contentHeader => {
                contentHeader.classList.remove('active');
            });
            if(parentTab.querySelector('.tab-heading-mob')) {
                parentTab.querySelectorAll('.tab-heading-mob').forEach(tabHeaderMob => {
                    tabHeaderMob.classList.remove('active');
                });
            }
        }

        /*Scroll Filters*/
        const tabsHorizontalScroll = document.querySelector(".technologies-use-parent .item.tabs");
        const tabsHorizontalScrollTwo = document.querySelector(".custom-enterprise-solutions.type_2 .item.tabs");

        if(tabsHorizontalScroll) {
            let isDown = false;
            let scrollX;
            let scrollLeft;
            // Mouse Up Function
            tabsHorizontalScroll.addEventListener("mouseup", () => {
                isDown = false;
            });
            // Mouse Leave Function
            tabsHorizontalScroll.addEventListener("mouseleave", () => {
                isDown = false;
            });
            // Mouse Down Function
            tabsHorizontalScroll.addEventListener("mousedown", (e) => {
                e.preventDefault();
                isDown = true;
                scrollX = e.pageX - tabsHorizontalScroll.offsetLeft;
                scrollLeft = tabsHorizontalScroll.scrollLeft;
            });
            // Mouse Move Function
            tabsHorizontalScroll.addEventListener("mousemove", (e) => {
                if (!isDown) return;
                e.preventDefault();
                let element = e.pageX - tabsHorizontalScroll.offsetLeft;
                let scrolling = (element - scrollX) * 2;
                tabsHorizontalScroll.scrollLeft = scrollLeft - scrolling;
            });
        }

        if(tabsHorizontalScrollTwo) {
            let isDown = false;
            let scrollX;
            let scrollLeft;
            // Mouse Up Function
            tabsHorizontalScrollTwo.addEventListener("mouseup", () => {
                isDown = false;
            });
            // Mouse Leave Function
            tabsHorizontalScrollTwo.addEventListener("mouseleave", () => {
                isDown = false;
            });
            // Mouse Down Function
            tabsHorizontalScrollTwo.addEventListener("mousedown", (e) => {
                e.preventDefault();
                isDown = true;
                scrollX = e.pageX - tabsHorizontalScrollTwo.offsetLeft;
                scrollLeft = tabsHorizontalScrollTwo.scrollLeft;
            });
            // Mouse Move Function
            tabsHorizontalScrollTwo.addEventListener("mousemove", (e) => {
                if (!isDown) return;
                e.preventDefault();
                let element = e.pageX - tabsHorizontalScrollTwo.offsetLeft;
                let scrolling = (element - scrollX) * 2;
                tabsHorizontalScrollTwo.scrollLeft = scrollLeft - scrolling;
            });
        }
    }
}

export default new Tabs();