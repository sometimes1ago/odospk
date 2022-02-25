const dateContainer = document.querySelector('.date-control');
const dateOpener = document.querySelector('.date-control__opener');
const dateCloser = document.querySelector('.date-control__closer');

dateOpener.addEventListener('click', () => {
    dateOpener.classList.toggle('date-btn__active');
    dateContainer.classList.toggle('date-control__visible');
});

dateCloser.addEventListener('click', () => {
    dateOpener.classList.toggle('date-btn__active');
    dateContainer.classList.toggle('date-control__visible');
});
