const sortOpener = document.querySelector('.query-control__sort-btn');
const sortContainer = document.querySelector('.query-control__sort');
const sortCloser = document.querySelector('.query-control__sort-closer');

sortOpener.addEventListener('click', () => {
    sortOpener.classList.toggle('query-control__sort-btn__active');
    sortContainer.classList.toggle('query-control__sort-visible');
});

sortCloser.addEventListener('click', () => {
    sortOpener.classList.toggle('query-control__sort-btn__active');
    sortContainer.classList.toggle('query-control__sort-visible');
});