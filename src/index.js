import './scss/base.scss';
import Header from './js/Header';
import Sliders from './js/Sliders';
import ConvertImgToSvg from './js/ConvertImgToSvg';
import ScrollAnchor from './js/ScrollAnchor';
import FiltersPortfolio from './js/FiltersPortfolio';
import Form from './js/Form';
import Tabs from './js/Tabs';
import Accordion from './js/Accordion';

class App {
  init() {
    document.addEventListener("DOMContentLoaded", function() {
      Sliders.init();
      ConvertImgToSvg.init();
      Header.init();
      ScrollAnchor.init();
      FiltersPortfolio.init();
      Form.init();
      Tabs.init();
      Accordion.init();
    });
  }
}

const app = new App();
app.init();