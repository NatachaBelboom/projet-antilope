const burgerBtn = document.querySelector('.burgerMenu');
const menu = document.querySelector('.nav__container');

let menuOpen = false;

burgerBtn.addEventListener('click', () => {
    burgerBtn.classList.toggle('open');
    menu.classList.toggle('menu__responsive');
    document.body.classList.toggle('overflow-hidden');

});