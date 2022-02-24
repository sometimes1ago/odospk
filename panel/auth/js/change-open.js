let changeOpener = document.querySelector('.settings');
let change = document.querySelector('.change');
let filter = document.querySelector('.filter');
let closer = document.querySelector('.change-closer');

changeOpener.addEventListener('click', () => {
    change.classList.add('change__block');   
    setTimeout(() => {
        filter.classList.add('filter__visible');
        change.classList.add('change__visible');
     
    }, 10);
    change.classList.remove('change__out');  
});

closer.addEventListener('click', () => {
    change.classList.remove('change__visible');
    change.classList.add('change__out');
    filter.classList.remove('filter__visible');
});