<?php foreach ($userNotes as $note) : ?>
  <li class="animate__animated animate__fadeInUp animate__faster notes__item break-words"><?= $note['value'] ?></li>
<?php endforeach; ?>