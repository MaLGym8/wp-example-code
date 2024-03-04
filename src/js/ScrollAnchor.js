class ScrollAnchor {

    constructor() {}

    init() {
        const anchors = document.querySelectorAll('a[href^="#"]');
        let readMoreLeadership = document.querySelectorAll('.read-more-leadership');

        readMoreLeadership.forEach(el => {
          el.addEventListener('click', function(e) {
            this.closest('.item-leadership').classList.toggle('active');
          });
        });

        for (let anchor of anchors) {
            anchor.addEventListener('click', function(e) {
              e.preventDefault();
              const blockID = anchor.getAttribute('href').substr(1);
              
              document.getElementById(blockID).scrollIntoView({
                behavior: 'smooth',
                block: 'start'
              });
            });
        }
    }
}

export default new ScrollAnchor();