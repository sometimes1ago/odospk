const searchContainer = document.querySelector('.queries-controls__search');
const searchOpener = document.querySelector('.queries-controls__search-btn');
const searchCloser = document.querySelector('.queries-controls__search-closer');

searchOpener.addEventListener('click', () => {
    searchOpener.classList.toggle('queries-controls__search-btn__active');
    searchContainer.classList.toggle('queries-controls__search__visible');
});

searchCloser.addEventListener('click', () => {
    searchOpener.classList.toggle('queries-controls__search-btn__active');
    searchContainer.classList.toggle('queries-controls__search__visible');
});