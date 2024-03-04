class FiltersPortfolio {
    constructor() {}

    init() {
        let filtersList = document.querySelector('.filter-portfolio');
        let portfolioItems = document.querySelector('.all-portfolio-parent');
        let activeFilters = [];
        
        if(filtersList) {
            filtersList.addEventListener('click', function(e) {
                if(e.target.nodeName == 'LI' && e.target.innerText !== 'All') {
                    if(filtersList.querySelector('li').classList.contains('active-filters')) {
                        filtersList.querySelector('li').classList.remove('active-filters');
                    }
                    e.target.classList.toggle('active-filters');
                    let currentFilter = e.target.dataset.filters;
                    
                    if(activeFilters.indexOf(currentFilter) == -1) {
                        activeFilters.push(currentFilter);
                    } else {
                        let positionElem = activeFilters.indexOf(currentFilter);
                        activeFilters.splice(positionElem, 1);
                    }
                    if(activeFilters.length > 0) {
                        portfolioItems.querySelectorAll('.item-portfolio').forEach(elem => {
                            elem.classList.add('hidden');
                        });
                        activeFilters.forEach(item => {
                            portfolioItems.querySelectorAll(`.item-portfolio[data-filter-tag="${item}"]`).forEach(elem => {
                                elem.classList.remove('hidden');
                            });
                        });
                    } else {
                        portfolioItems.querySelectorAll('.item-portfolio').forEach(elem => {
                            elem.classList.remove('hidden');
                        });
                        filtersList.querySelector('li').classList.add('active-filters');
                    }
                } else if(e.target.innerText === 'All') {
                    activeFilters = [];
                    filtersList.querySelectorAll('li').forEach(filtersTab => {
                        filtersTab.classList.remove('active-filters');
                    });
                    if(!filtersList.querySelector('li').classList.contains('active-filters')) {
                        filtersList.querySelector('li').classList.add('active-filters');
                    }
                    portfolioItems.querySelectorAll('.item-portfolio').forEach(elem => {
                        elem.classList.remove('hidden');
                    });
                }  
            });
        }
    }
}

export default new FiltersPortfolio();