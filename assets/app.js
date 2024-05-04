import Swiper from 'swiper';
import { Navigation } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';

import './styles/app.css';

// init Swiper:
const swiper = new Swiper('.swiper', {
    modules: [Navigation],
    autoHeight: true,
    loop: true,
    spaceBetween: 16,
    breakpoints: {
        // when window width is >= xs
        480: {
            slidesPerView: 2,
        },
        // when window width is >= md
        768: {
            slidesPerView: 3,
        },
        // when window width is >= lg
        1024: {
            slidesPerView: 4,
        },
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    a11y: {
        itemRoleDescriptionMessage: 'carousel',
        slideLabelMessage: 'Carrousel de livres',
        prevSlideMessage: 'Livre précédent',
        nextSlideMessage: 'Livre suivant',
    },
});

// handle toogle nav:
const $ = require('jquery');

$( ".navToggle" ).on( "click", function() {
    $(this).toggleClass('active');
    $( ".navContent" ).slideToggle( "slow", function() {
    });
});


