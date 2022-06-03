const notesActions = document.querySelector('.notes__actions'),
  notesActionsContainer = document.querySelector('.notes__actions-container'),
  notesEditContainer = document.querySelector('.notes__edit'),
  notesEditBtn = document.querySelector('.notes__edit-btn'),
  editCancel = document.querySelector('.notes__edit-cancel');
let notes = document.querySelectorAll('.note__item');

notes.forEach((note) => {
  note.addEventListener("change", (e) => {
    restrictSelection(note);
  });
});

function restrictSelection(item) {
  item.classList.toggle('note__item-checked');
  let activeItems = document.querySelectorAll('.note__item-checked');
  notesActions.classList.toggle('notes__actions-visible');
  
  if (activeItems.length > 1) {
    item.checked = false;
    notesActions.classList.toggle('notes__actions-visible');
    item.classList.remove('note__item-checked');
  }
}

notesEditBtn.addEventListener('click', () => {
  notesActionsContainer.classList.toggle('notes__actions-container__hidden');
  notesEditContainer.classList.toggle('notes__edit-visible');
});

editCancel.addEventListener('click', () => {
  notesActionsContainer.classList.toggle('notes__actions-container__hidden');
  notesEditContainer.classList.toggle('notes__edit-visible');
});

