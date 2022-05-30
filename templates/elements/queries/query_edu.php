<?php foreach ($queries as $query) : ?>
  <li class="mr-8 mb-8 last:mb-0 p-12 bg-light-600 border border-light-900 rounded-8">
    <label class="cursor-pointer" for="item-<?= $query['id'] ?>">
      <ul class="flex items-center">
        <li>
          <input class="query__checkbox border-black-800 rounded-4 focus:outline-none focus:ring-2 focus:ring-brand-900" type="checkbox" value="item-<?= $query['id'] ?>" name="query__id" id="item-<?= $query['id'] ?>">
        </li>
        <li class="px-12 lg:max-w-[125px] lg:min-w-[125px] text-14 text-black-800">
          <?= $query['id'] ?>
        </li>
        <li class="px-12 lg:max-w-[260px] lg:min-w-[260px] text-14 text-black-800">
          <?= $query['course'] ?>
        </li>
        <li class="px-12 lg:max-w-[215px] lg:min-w-[215px] text-14 text-black-800">
          <?= $query['client'] ?>
        </li>
        <li class="px-12 lg:max-w-[170px] lg:min-w-[170px] text-14 text-black-800">
          <?= $query['phone'] ?>
        </li>
        <li class="px-12 lg:max-w-[134px] lg:min-w-[134px] text-14 text-black-800">
          <?= $query['date'] ?>
        </li>
        <li class="query__status px-12 lg:max-w-[122px] lg:min-w-[122px] text-14 text-black-800">
          <?= $query['status'] ?>
        </li>
      </ul>
    </label>
  </li>
<?php endforeach; ?>