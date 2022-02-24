let modalOpener = document.querySelector('.todo-menu__lists-btn');
let modalCloser = document.querySelector('.form-closer');
let modal = document.querySelector('.modal');
let listForm = document.querySelector('.form');

modalOpener.addEventListener('click', () => {
  modal.classList.toggle('modal__visible');
  listForm.classList.toggle('form__visible');
});

modalCloser.addEventListener('click', () => {
  modal.classList.toggle('modal__visible');
  listForm.classList.toggle('form__visible');
});