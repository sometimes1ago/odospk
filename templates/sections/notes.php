<div class="notes">
  <div class="notes__btn md:hidden">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-18 h-18 md:w-24 md:h-24 mr-8" viewBox="0 0 18 18" fill="none">
      <path d="M13.5 11.25L9 6.75L4.5 11.25" stroke="#252525" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
    </svg>
    <p class="notes__btn-text">Показать заметки</p>
  </div>
  <div class="animate__animated animate__fadeIn animate__fast notes__content">
    <h3 class="notes__header">Рабочие заметки</h3>
    <p class="notes__subhead">Ваши личные записи всегда под рукой</p>
    <ul class="notes__list scrollbar">
      <?php includeTemplate('elements/notes/note_small.php', ['userNotes' => $userNotes]) ?>
    </ul>
    <form action="<? $_SERVER['PHP_SELF'] ?>" class="notes__add flex flex-col" method="post">
      <textarea class="notes__add-input w-full resize-none" placeholder="Текст заметки" name="addNoteValue" maxlength="100" rows="100" cols="50"></textarea>
      <button class="notes__add-btn notes__add-control hover:shadow-btn" name="addNote" type="submit">Добавить</button>
      <div class="notes__add-cancel notes__add-control hover:shadow-xl">Отмена</div>
    </form>
    <button class="notes__new hover:shadow-btn">Добавить заметку</button>
  </div>
</div>