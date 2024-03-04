import Swiper, { Navigation, Pagination, Autoplay } from 'swiper';
Swiper.use([Navigation, Pagination, Autoplay]);
import 'swiper/swiper.scss';

class Sliders {
    constructor() {}

    init() {
        let sliderTechnologyStack = document.querySelector('.gp-technology-stack');
        let sliderCustomersAboutUs = document.querySelector('.customers-about-us-slider');
        let testimonialsClutchSlider = document.querySelector('.testimonials-clutch-slider');
        let contactClutchSlider = document.querySelector('.contact-clutch-slider');
        let sliderFeedbackForServicesSingle = document.querySelector('.slider-services-feedback-parent');

        if(sliderTechnologyStack) {
            const swiperTech = new Swiper(sliderTechnologyStack, {
                slidesPerView: 6,
                slidesPerGroup: 3,
                loop: true,
                speed: 1000,
                autoplay: {
                    delay: 1500,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".nav-gp-technology-stack",
                    clickable: true,
                },
                breakpoints: {
                    890: {
                        slidesPerView: 6,
                    },
                    815: {
                        slidesPerView: 5,
                    },
                    580: {
                        slidesPerView: 4,
                        slidesPerGroup: 3,
                    },
                    400: {
                        slidesPerView: 3,
                        slidesPerGroup: 3,
                    },
                    240: {
                        slidesPerView: 2,
                        slidesPerGroup: 2,
                    }
                }
            });
        }
        if(sliderCustomersAboutUs) {
            const swiper = new Swiper(sliderCustomersAboutUs, {
                slidesPerView: 1,
                pagination: {
                    el: ".customers-about-us-nav",
                    clickable: true,
                },
                navigation: {
                    nextEl: '.customers-about-us-next',
                    prevEl: '.customers-about-us-prev',
                },
            });
        }
        if(testimonialsClutchSlider) {
            const swiper = new Swiper(testimonialsClutchSlider, {
                slidesPerView: 1,
                pagination: {
                    el: ".nav-testimonials-clutch-slider",
                    clickable: true,
                },
                navigation: {
                    nextEl: '.nav-testimonials-clutch-next',
                    prevEl: '.nav-testimonials-clutch-prev',
                },
            });
        }
        if(contactClutchSlider) {
            const swiper = new Swiper(contactClutchSlider, {
                slidesPerView: 1,
                pagination: {
                    el: ".nav-testimonials-clutch-slider",
                    clickable: true,
                },
                navigation: {
                    nextEl: '.nav-testimonials-clutch-next',
                    prevEl: '.nav-testimonials-clutch-prev',
                },
            });
        }
        if(sliderFeedbackForServicesSingle) {
            const swiper = new Swiper(sliderFeedbackForServicesSingle, {
                slidesPerView: 1,
                pagination: {
                    el: ".feedback-type-slider-nav",
                    clickable: true,
                },
                navigation: {
                    nextEl: '.feedback-type-slider-next',
                    prevEl: '.feedback-type-slider-prev',
                },
            });
        }
    }

}

export default new Sliders();