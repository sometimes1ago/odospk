<?php if (!empty($userNotes)) : ?>
  <?php foreach ($userNotes as $note) : ?>
    <li class="animate__animated animate__fadeInUp animate__faster notes__item break-words"><?= $note['value'] ?></li>
  <?php endforeach; ?>
<?php else : ?>
  <div class="flex flex-col h-full justify-center">
    <img class="w-[240px] md:w-[360px] h-[240px] md:h-[360px]" src="/src/img/landing/illustrations/order-error.svg" alt="error-image">
    <h3 class="text-22 md:text-24 font-bold">Ой, кажется здесь ничего нет :(</h3>
    <p class="mt-8 text-16 text-black-800">Вы еще не добавили ни одной заметки</p>
  </div>
<?php endif; ?>