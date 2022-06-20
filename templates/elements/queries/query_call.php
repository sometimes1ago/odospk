<?php if (!empty($calls)) : ?>
  <?php foreach ($calls as $call) : ?>
    <li class="animate__animated animate__fadeInUp animate__fast mr-8 xl:mr-12 mb-8 xl:mb-12 p-12 xl:p-16 bg-light-600 border border-light-900 rounded-8 xl:rounded-12">
      <label class="cursor-pointer" for="call-<?= $call['id'] ?>">
        <ul class="flex items-center">
          <li>
            <input class="query__checkbox border-black-800 rounded-4 focus:outline-none focus:ring-2 focus:ring-brand-900" type="checkbox" value="call-<?= $call['id'] ?>" name="query__call" id="call-<?= $call['id'] ?>">
          </li>
          <li class="px-12 max-w-[192px] xl:max-w-[228px] min-w-[192px] md:min-w-[170px] md:max-w-[170px] xl:min-w-[228px] text-14 xl:text-16 text-black-800">
            <?= $call['id'] ?>
          </li>
          <li class="px-12 max-w-[212px] xl:max-w-[256px] min-w-[212px] md:min-w-[200px] md:max-w-[200px] xl:min-w-[256px] text-14 xl:text-16 text-black-800">
            <?= $call['client'] ?>
          </li>
          <li class="px-12 max-w-[218px] xl:max-w-[256px] min-w-[218px] md:min-w-[197px] md:max-w-[197px] xl:min-w-[256px] text-14 xl:text-16 text-black-800">
            <?= $call['phone'] ?>
          </li>
          <li class="px-12 max-w-[216px] xl:max-w-[256px] min-w-[216px] md:min-w-[197px] md:max-w-[197px] xl:min-w-[256px] text-14 xl:text-16 text-black-800">
            <?= $call['date'] ?>
          </li>
          <li class="px-12 lg:max-w-[200px] lg:min-w-[200px] md:min-w-[150px] md:max-w-[150px] text-14 xl:text-16 text-black-800">
            <?= $call['status'] ?>
          </li>
        </ul>
      </label>
    </li>
  <?php endforeach; ?>
<?php else : ?>
  <div class="flex items-center justify-center animate__animated animate__fadeIn h-full">
    <div class="flex flex-col items-center self-center">
      <img class="w-[360px] h-[360px]" src="/src/img/landing/illustrations/order-error.svg" alt="error-image">
      <h3 class="text-24 font-bold">Ой, кажется здесь ничего нет :(</h3>
      <p class="mt-8 text-16 text-black-800">Попробуйте перезагрузить страницу или повторить поиск</p>
    </div>
  </div>
<?php endif; ?>