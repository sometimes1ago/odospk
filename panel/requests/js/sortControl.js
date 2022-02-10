const sortOpener = document.querySelector('.queries-controls__sort-btn');
const sortContainer = document.querySelector('.queries-controls__sort');
const sortCloser = document.querySelector('.queries-controls__sort-closer');

sortOpener.addEventListener('click', () => {
    sortOpener.classList.toggle('queries-controls__sort-btn__active');
    sortContainer.classList.toggle('queries-controls__sort__visible');
});

sortCloser.addEventListener('click', () => {
    sortOpener.classList.toggle('queries-controls__sort-btn__active');
    sortContainer.classList.toggle('queries-controls__sort__visible');
});