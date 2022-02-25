const searchContainer = document.querySelector('.query-control__search');
const searchOpener = document.querySelector('.query-control__search-btn');
const searchCloser = document.querySelector('.query-control__search-closer');

searchOpener.addEventListener('click', () => {
    searchOpener.classList.toggle('query-control__search-btn__active');
    searchContainer.classList.toggle('query-control__search__visible');
});

searchCloser.addEventListener('click', () => {
    searchOpener.classList.toggle('query-control__search-btn__active');
    searchContainer.classList.toggle('query-control__search__visible');
});