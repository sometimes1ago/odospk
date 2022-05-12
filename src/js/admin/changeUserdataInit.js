const showDataBtn = document.querySelector('.aside__btn-show'),
  userData = document.querySelector('.aside__user-data'),
  changeUserDataBtn = document.querySelector('.aside__change');

showDataBtn.addEventListener('click', () => {
  showDataBtn.classList.toggle('aside__btn-show__active');
  userData.classList.toggle('aside__user-data__visible');
});