const widgets = document.querySelector('.widgets');
const widgetsOpener = document.querySelector('.widgets-btn');

widgetsOpener.addEventListener('click', () => {
    widgets.classList.toggle('widgets-visible');
    widgetsOpener.classList.toggle('widgets-btn__active');
});
