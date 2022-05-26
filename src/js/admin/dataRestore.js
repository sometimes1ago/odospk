const restoreInitializer = document.querySelector('.dataRestore__init'),
  restoreForm = document.querySelector('.dataRestore__form'),
  restoreFilter = document.querySelector('.dataRestore__filter'),
  restoreCloser = document.querySelector('.dataRestore__closer');

restoreInitializer.addEventListener('click', () => {
  restoreFilter.classList.toggle('dataRestore__filter-active');
  restoreForm.classList.toggle('dataRestore__form-active');
});

restoreCloser.addEventListener('click', () => {
  restoreFilter.classList.toggle('dataRestore__filter-active');
  restoreForm.classList.toggle('dataRestore__form-active');
});