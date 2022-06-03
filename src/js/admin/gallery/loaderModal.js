const uploadInit = document.querySelector('.upload__init'),
  uploadModal = document.querySelector('.upload__modal'),
  uploadCloser = document.querySelector('.upload__closer'),
  filter = document.querySelector('.upload__filter');

uploadInit.addEventListener('click', () => {
  uploadModal.classList.toggle('upload__modal-active');
  filter.classList.toggle('upload__filter-active');
});

uploadCloser.addEventListener('click', () => {
  uploadModal.classList.toggle('upload__modal-active');
  filter.classList.toggle('upload__filter-active');
});