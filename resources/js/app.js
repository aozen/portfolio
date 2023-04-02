import Swiper, { Navigation, Pagination } from 'swiper';

Swiper.use([Navigation, Pagination]);

let portfolio_swiper = document.querySelectorAll('.swiper');

if (portfolio_swiper.length) {
    portfolio_swiper.forEach(function (swiper) {
        let swiperId = swiper.getAttribute('id');
        new Swiper('#' + swiperId, {
            slidesPerView: 1,
            spaceBetween: 10,
            allowTouchMove: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    });
}

import './bootstrap';
