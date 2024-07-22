import './bootstrap';
// import { Autoplay, Navigation, Pagination } from 'swiper';
import Swiper from 'swiper/bundle';
// Swiper.use([Autoplay, Navigation, Pagination]);

import 'swiper/css/bundle';
import 'bootstrap/dist/css/bootstrap.min.css';

document.addEventListener('DOMContentLoaded', function () {
    const swiper = new Swiper('.mySwiperClass', {
        spaceBetween: 15,
        slidesPerView: 3,
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        speed: 5000,
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        }
    });
});
