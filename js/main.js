courseModal();
currentCourse();
setInterval(stickyNav, 600);
burgerMenu();
programsListEnd();
function programsListEnd() {
    let list = document.querySelector('.programs-list');
    list.addEventListener('scroll',(ev)=> {
        if (Math.ceil(list.scrollTop + list.clientHeight) >= list.scrollHeight ) {
            list.classList.remove('programs-list__end')
        }
        else {
            list.classList.add('programs-list__end')
        }
    })
}
/*Липкое меню*/
function stickyNav() {
    let header = document.querySelector('.header');
    let burgerBtn = document.querySelector('.header-burger');
    document.addEventListener('scroll', () => {
        if (window.matchMedia("(min-width:1201px)").matches) {
            if (pageYOffset >= 400) {
                header.style.cssText = `
                position:fixed;
                background:white;
                box-shadow:0 -5px 10px 0 black;
                width:100%;
                z-index:3; 
                padding-bottom:20px;
                animation-duration: 0.7s;
                animation-name: menu;`;
                
            }
            else if (pageYOffset == 0) {
                header.style.cssText = `
                position:static;
                background:white;
                box-shadow:none;
                width:inherit;
                z-index:0; 
                padding-bottom:0px;`;
            }
        }
        else if (window.matchMedia("(min-width: 992px)").matches) {
            if (pageYOffset >= 1100) {
                burgerBtn.style.cssText = `
                position:fixed;
                animation-duration: 0.3s;
                animation-name: burger;
            `;
                burgerBtn.classList.add('sticky');
            }
            else if (pageYOffset == 0) {
                burgerBtn.style.cssText = `
                position:relative;
           `;
                burgerBtn.classList.remove('sticky')
            }
        }
        else if (window.matchMedia("(min-width: 768px)").matches) {
            if (pageYOffset >= 1200) {
                burgerBtn.style.cssText = `
                position:fixed;
                animation-duration: 0.3s;
                animation-name: burger;
            `;
                burgerBtn.classList.add('sticky');
            }
            else if (pageYOffset == 0) {
                burgerBtn.style.cssText = `
                position:relative;
           `;
                burgerBtn.classList.remove('sticky')
            }
        }
        else if (window.matchMedia("(min-width: 576px)").matches) {
            if (pageYOffset >= 800) {
                burgerBtn.style.cssText = `
                position:fixed;
                animation-duration: 0.3s;
                animation-name: burger;
            `;
                burgerBtn.classList.add('sticky');
            }
            else if (pageYOffset == 0) {
                burgerBtn.style.cssText = `
                position:relative;
           `;
                burgerBtn.classList.remove('sticky')
            }
        }
        else if (window.matchMedia("(min-width: 320px)").matches) {
            if (pageYOffset >= 398) {
                burgerBtn.style.cssText = `
                position:fixed;
                animation-duration: 0.3s;
                animation-name: burger;
            `;
                burgerBtn.classList.add('sticky');
            }
            else if (pageYOffset == 0) {
                burgerBtn.style.cssText = `
                position:relative;
           `;
                burgerBtn.classList.remove('sticky')
            }
        }

    })
}
/*Модальное окно - запись на курс*/
function courseModal() {
    let modalCourse = document.querySelector('.modal-course');
    let modalWrapper = document.querySelector('.modal-course__wrapper');
    let closeBtn = document.querySelector('.modal-course__btn');
    let subBtn = document.querySelector('.programs-about__sign');

    subBtn.addEventListener('click', openCourseModal);

    function openCourseModal() {
        modalCourse.style.display = 'flex';
        closeBtn.addEventListener('click', () => {
            modalCourse.style.display = 'none';
        })
        modalCourse.addEventListener('click', closeModal);
        document.addEventListener('keyup', closeModal);
    }
    function closeModal(e) {
        if (e.target == modalCourse) {
            modalCourse.style.display = 'none';
        }
        else if (e.keyCode == 27) {
            modalCourse.style.display = 'none';
        }
    }
}
 
/*Активный курс*/
function currentCourse() {
    let courseItem = document.querySelectorAll('.programs-list__name');
    courseItem[0].classList.add('programs-list__name-active');
    courseItem.forEach((item) => {
        item.addEventListener('click', () => {
            removeDots();
            item.classList.add('programs-list__name-active');
        });
    });
    function removeDots() {
        for (let i = 0; i < courseItem.length; i++) {
            courseItem[i].classList.remove('programs-list__name-active');
        }
    }
};
/*Burger*/
function burgerMenu() {
    let burgerBtn = document.querySelector('.header-burger');
    let burgerMenu = document.querySelector('.header-menu');
    let burgerItems = document.querySelectorAll('.header-burger__link');
    burgerBtn.addEventListener('click', () => {
        burgerBtn.classList.toggle('active');
        burgerMenu.classList.toggle('active');
        document.body.classList.toggle('y-hidden');
    });
    burgerItems.forEach( (item)=>{
        item.addEventListener('click',()=>{
            burgerMenu.classList.toggle('active');
        });
    });

};
/*Modal*/
function getName() {
    let name = document.querySelectorAll(".programs-list__name");
    let modal = document.querySelector(".modal-course__title span");
    
    let text;
    name.forEach((item) => {
        item.addEventListener('click', () => {
            item.dataset.name = item.textContent;
            text = item.dataset.name;
            modal.textContent = text.trim();
        });
    });
}
getName();
