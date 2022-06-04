<?php foreach ($users as $user) : ?>
  <li class="flex flex-col w-[186px] mr-16 mb-16 last:mr-0 items-center p-12 bg-light-600 border border-light-900 rounded-12">
    <?php if ($user['photo']): ?>
      <img class="w-[120px] h-[120px]" src="/src/img/avatars/<?= $user['photo'] ?>" alt="<?= $user['photo'] ?>">
    <?php else : ?>
      <div class="w-[120px] h-[120px] bg-light-400 rounded-full border border-light-900 flex items-center justify-center">
        <p class="text-32 text-black-800 font-bold"><?= mb_substr($user['name'], 0, 1)?></p>
      </div>
    <?php endif; ?>
    <ul class="w-full mt-24">
      <li class="mb-16 last:mb-0">
        <h3 class="text-18 font-bold">Имя сотрудника</h3>
        <p class="mt-4 text-16 text-black-800 break-words"><?= $user['name'] ?></p>
      </li>
      <li class="mb-16 last:mb-0">
        <h3 class="text-18 font-bold">Эл. почта</h3>
        <p class="mt-4 text-16 text-black-800 break-words"><?= $user['email'] ?></p>
      </li>
      <li class="mb-16 last:mb-0">
        <h3 class="text-18 font-bold">Уровень доступа</h3>
        <p class="mt-4 text-16 text-black-800 break-words"><?= $user['access'] ?></p>
      </li>
    </ul>
  </li>
<?php endforeach; ?>