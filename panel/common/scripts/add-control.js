let controls = document.querySelectorAll('.todo-list__add-control');

function Update(control) {
  let count = document.querySelectorAll('.todo-list__add-control__active').length;
  if (count == 1) {
    if (control.classList.contains('todo-list__add-control__active')) {
      control.classList.toggle('todo-list__add-control__active');
    } else {
      return;
    }
  } else {
    control.classList.toggle('todo-list__add-control__active');
  }
}

controls.forEach((control) => {
  control.addEventListener('click', () => {
    Update(control);
  });
});