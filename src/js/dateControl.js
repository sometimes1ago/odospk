const dateOpener = document.querySelector(".date-btn");
const dateContainer = document.querySelector(".date-control");
const dateCloser = document.querySelector(".date-closer");

dateOpener.addEventListener("click", () => {
  dateOpener.classList.toggle("date-btn__active");
  dateContainer.classList.toggle("date-control__visible");
});

dateCloser.addEventListener("click", () => {
  dateOpener.classList.toggle("date-btn__active");
  dateContainer.classList.toggle("date-control__visible");
});
