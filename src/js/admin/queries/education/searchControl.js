const searchControl = document.querySelector('.search'),
  searchBtn = document.querySelector('.search__btn');

searchBtn.addEventListener('click', () => {
  searchControl.classList.toggle('search__active');
});