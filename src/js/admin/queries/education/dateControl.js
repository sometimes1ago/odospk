const dateControl = document.querySelector('.date'),
  dateBtn = document.querySelector('.date__btn');

dateBtn.addEventListener('click', () => {
  dateControl.classList.toggle('date__active');
})