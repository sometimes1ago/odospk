let controls = document.querySelectorAll('.add-control');

function Update(control) {
  let count = document.querySelectorAll('.add-control__active').length;
  if (count == 1) {
    if (control.classList.contains('add-control__active')) {
      control.classList.toggle('add-control__active');
    } else {
      return;
    }
  } else {
    control.classList.toggle('add-control__active');
  }
}

controls.forEach((control) => {
  control.addEventListener('click', () => {
    Update(control);
  });
});