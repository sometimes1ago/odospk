const modal = document.querySelector('.modal');
const modalOpener = document.querySelector('.auth-form__data-recover-link')
const modalCloser = document.querySelector('.modal-closer');

modalOpener.addEventListener('click', () => {
    modal.style.display = "flex";
});

modalCloser.addEventListener('click', () => {
    modal.style.display = "none";
});