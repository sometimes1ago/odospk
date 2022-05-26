const notes = document.querySelector('.notes'),
  notesBtn = document.querySelector('.notes__btn'),
  notesList = document.querySelector('.notes__list'),
  addNoteBtn = document.querySelector('.notes__new'),
  addNoteForm = document.querySelector('.notes__add'),
  addNoteCancel = document.querySelector('.notes__add-cancel');

notesBtn.addEventListener('click', () => {
  notes.classList.toggle('notes__active');
});

addNoteBtn.addEventListener('click', () => {
  addNoteBtn.classList.toggle('notes__new-hidden');
  notesList.classList.toggle('notes__list-hidden');
  addNoteForm.classList.toggle('notes__add-visible');
});

addNoteCancel.addEventListener('click', () => {
  addNoteBtn.classList.toggle('notes__new-hidden');
  notesList.classList.toggle('notes__list-hidden');
  addNoteForm.classList.toggle('notes__add-visible');
});