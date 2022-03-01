const searchOpener = document.querySelector(".search-btn");
const searchContainer = document.querySelector(".search-control");
const searchCloser = document.querySelector(".search-closer");

searchOpener.addEventListener("click", () => {
  searchOpener.classList.toggle("search-btn__active");
  searchContainer.classList.toggle("search-control__visible");
});

searchCloser.addEventListener("click", () => {
  searchOpener.classList.toggle("search-btn__active");
  searchContainer.classList.toggle("search-control__visible");
});
