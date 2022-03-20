let widget = document.querySelector('.widget-control');
let widgetOpener = document.querySelector('.widget-btn');
let widgetCloser = document.querySelector('.widget-closer');

widgetOpener.addEventListener('click', () => {
  widgetOpener.classList.toggle('widget-btn__active');
  widget.classList.toggle('widget-control__visible');
});

widgetCloser.addEventListener('click', () => {
  widgetOpener.classList.toggle('widget-btn__active');
  widget.classList.toggle('widget-control__visible');
});