<?php foreach ($notes as $note) : ?>
  <li class="mb-8 md:mb-12 last:mb-0 mr-8 md:mr-12">
    <label for="note-<?=$note['id']?>" class="flex items-center p-12 md:p-16 bg-light-600 border border-light-900 rounded-8 md:rounded-12 cursor-pointer">
      <input class="note__item rounded-4 border-2" type="checkbox" name="note__id" value="note-<?=$note['id']?>" id="note-<?=$note['id']?>">
      <div class="w-full flex items-center justify-between">
        <p class="w-10/12 ml-8 mr-32 text-14"><?=$note['value']?></p>
        <p class="text-14 text-black-800"><?=$note['created_at']?></p>
      </div>
    </label>
  </li>
<?php endforeach; ?>