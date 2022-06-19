<?php foreach ($queries as $query) : ?>
  <li class="animate__animated animate__fadeInUp animate__fast mr-8 md:mr-12 mb-8 md:mb-12 last:mb-0 p-12 md:p-16 bg-light-600 border border-light-900 rounded-8 md:rounded-12">
    <label class="cursor-pointer" for="item-<?= $query['id'] ?>">
      <ul class="flex items-center">
        <li>
          <input class="query__checkbox border-black-800 rounded-4 focus:outline-none focus:ring-2 focus:ring-brand-900" type="checkbox" value="item-<?= $query['id'] ?>" name="query__id" id="item-<?= $query['id'] ?>">
        </li>
        <li class="px-12 lg:max-w-[125px] xl:max-w-[132px] lg:min-w-[125px] xl:min-w-[132px] text-14 md:text-16 text-black-800">
          <?= $query['id'] ?>
        </li>
        <li class="px-12 lg:max-w-[260px] xl:max-w-[332px] lg:min-w-[260px] xl:min-w-[332px] text-14 md:text-16 text-black-800">
          <?= $query['course'] ?>
        </li>
        <li class="px-12 lg:max-w-[215px] xl:max-w-[242px] lg:min-w-[215px] xl:min-w-[242px] text-14 md:text-16 text-black-800">
          <?= $query['client'] ?>
        </li>
        <li class="px-12 lg:max-w-[170px] xl:max-w-[192px] lg:min-w-[170px] xl:min-w-[192px] text-14 md:text-16 text-black-800">
          <?= $query['phone'] ?>
        </li>
        <li class="px-12 lg:max-w-[134px] xl:max-w-[168px] lg:min-w-[134px] xl:min-w-[168px] text-14 md:text-16 text-black-800">
          <?= $query['date'] ?>
        </li>
        <li class="px-12 lg:max-w-[122px] xl:max-w-[156px] lg:min-w-[122px] xl:min-w-[156px] text-14 md:text-16 text-black-800">
          <?= $query['status'] ?>
        </li>
      </ul>
    </label>
  </li>
<?php endforeach; ?>