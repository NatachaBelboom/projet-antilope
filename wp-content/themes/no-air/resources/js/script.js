const burgerBtn = document.querySelector('.burgerMenu');
const menu = document.querySelector('.nav__container');

let menuOpen = false;
if(burgerBtn){
    burgerBtn.addEventListener('click', () => {
        burgerBtn.classList.toggle('open');
        menu.classList.toggle('menu__responsive');
        document.body.classList.toggle('overflow-hidden');

    });
}

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
if(document.querySelector('#polluants')){
    polluants.init();
}

const animations = {
    sections: document.querySelectorAll('.slide-in'),

    init()
    {
        this.obServeSection();
    },
    obServeSection() {
        const observer = new IntersectionObserver(this.animateSection);
        for (const section of this.sections) {
            observer.observe(section);
        }
    },
    animateSection(entries, observer) {
        for (const entry of entries) {
            if (entry.isIntersecting) {
                entry.target.classList.add('active-section');
            } else {
                entry.target.classList.remove('active-section');
            }
        }
    },
}
if(document.querySelectorAll('.slide-in')){
    animations.init();
}

const facebookLinks = {
    button: null,
    linksContainer: null,
    overlay: null,
    class: 'show',

    init: function () {
        this.button = document.querySelector('.facebook-btn');
        this.linksContainer = document.querySelector('.facebook-container');
        this.overlay = document.querySelector('.overlay');

        this.event();
    },

    event: function () {
        const self = this;

        self.button.addEventListener('click', function () {
            self.linksContainer.classList.toggle(self.class);
            self.showOverlay();
        });

        self.overlay.addEventListener('click', function () {
            self.linksContainer.classList.remove(self.class);
            self.hideOverlay();
        });
    },

    showOverlay: function () {
        this.overlay.classList.add(this.class);
    },

    hideOverlay: function () {
        this.overlay.classList.remove(this.class);
    }
};

window.addEventListener('DOMContentLoaded', function () {
    facebookLinks.init();
})

