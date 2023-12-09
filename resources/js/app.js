import Swiper, { Navigation, Pagination } from 'swiper';
import './bootstrap';

import Prism from 'prismjs';
import 'prismjs/themes/prism-okaidia.css';
import 'prismjs/components/prism-markup-templating';
import 'prismjs/components/prism-javascript';
import 'prismjs/components/prism-php';
import 'prismjs/components/prism-bash';
import 'prismjs/plugins/toolbar/prism-toolbar.css'
import 'prismjs/plugins/toolbar/prism-toolbar.js'
import 'prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard'

Prism.highlightAll();

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
