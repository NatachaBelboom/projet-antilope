const burgerBtn = document.querySelector('.burgerMenu');
const menu = document.querySelector('.nav__container');

let menuOpen = false;

burgerBtn.addEventListener('click', () => {
    burgerBtn.classList.toggle('open');
    menu.classList.toggle('menu__responsive');
    document.body.classList.toggle('overflow-hidden');

});

const polluants = {
    modulesBtn: null,
    container: null,
    defaultBtn: null,
    class: 'selected',

    init() {
        this.modulesBtn = document.querySelectorAll('.polluant-event');
        this.container = document.querySelector('#polluants');
        this.defaultBtn = document.querySelector('.polluant-event.' + this.class);

        this.setHeightOfDefaultElement();

        this.event();
    },

    event() {
        this.modulesBtn.forEach(btn => {
            btn.addEventListener('click', (e) => {
                this.modulesBtn.forEach(btn => {
                    btn.classList.remove(this.class);
                    btn.nextElementSibling.classList.remove(this.class);
                });
                this.container.style.height = this.getHeightWithPaddingOfAnElement(btn) + this.getHeightWithPaddingOfAnElement(btn.nextElementSibling) + 'px';
                btn.classList.add(this.class);
                btn.nextElementSibling.classList.add(this.class);
            });
        })
    },

    setHeightOfDefaultElement() {
        this.container.style.height = this.getHeightWithPaddingOfAnElement(this.defaultBtn) + this.getHeightWithPaddingOfAnElement(this.defaultBtn.nextElementSibling) + 'px';
    },


    getHeightWithPaddingOfAnElement(element) {
        return element.getBoundingClientRect().bottom - element.getBoundingClientRect().top;
    },
};

polluants.init();
