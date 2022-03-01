const sortOpener = document.querySelector(".sort-btn");
const sortContainer = document.querySelector(".sort-control");
const sortCloser = document.querySelector(".sort-closer");

sortOpener.addEventListener("click", () => {
  sortOpener.classList.toggle("sort-btn__active");
  sortContainer.classList.toggle("sort-control__visible");
});

sortCloser.addEventListener("click", () => {
  sortOpener.classList.toggle("sort-btn__active");
  sortContainer.classList.toggle("sort-control__visible");
});
