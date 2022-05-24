const modalInitBtn = document.querySelector('.menu__help-modal-start'),
  modal = document.querySelector('.modal'),
  modalCloser = document.querySelector('.modal__closer');

modalInitBtn.addEventListener('click', () => {
  modal.classList.toggle('modal__active');
});

modalCloser.addEventListener('click', () => {
  modal.classList.toggle('modal__active');
});