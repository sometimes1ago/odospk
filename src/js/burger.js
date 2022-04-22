let burgerOpener = document.querySelector(".burger-opener");
let burgerControl = document.querySelector(".burger-control");
let burgerContent = document.querySelector(".burger");
let burgerLinks = document.querySelectorAll(".burger-item");
let burgerFilter = document.querySelector('.burger-filter');
let body = document.getElementsByTagName('body')[0];

burgerOpener.addEventListener("click", () => {
  burgerControl.classList.toggle("burger-control__active");
  burgerContent.classList.toggle("burger__active");
  burgerFilter.classList.toggle('burger-filter__active');
  body.classList.toggle('locked');
});

burgerLinks.forEach((link) => {
  link.addEventListener("click", () => {
    burgerControl.classList.toggle("burger-control__active");
    burgerContent.classList.toggle("burger__active");
    burgerFilter.classList.toggle('burger-filter__active');
    body.classList.toggle('locked');
  });
});
