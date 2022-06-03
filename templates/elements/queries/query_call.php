<?php foreach ($calls as $call) : ?>
  <li class="mr-8 mb-8 p-12 bg-light-600 border border-light-900 rounded-8">
    <label class="cursor-pointer" for="call-<?=$call['id']?>">
      <ul class="flex items-center">
        <li>
          <input class="query__checkbox border-black-800 rounded-4 focus:outline-none focus:ring-2 focus:ring-brand-900" type="checkbox" value="call-<?=$call['id']?>" name="query__call" id="call-<?=$call['id']?>">
        </li>
        <li class="px-12 max-w-[192px] min-w-[192px] text-14 text-black-800">
          <?=$call['id']?>
        </li>
        <li class="px-12 max-w-[212px] min-w-[212px] text-14 text-black-800">
          <?=$call['client']?>
        </li>
        <li class="px-12 max-w-[218px] min-w-[218px] text-14 text-black-800">
          <?=$call['phone']?>
        </li>
        <li class="px-12 max-w-[216px] min-w-[216px] text-14 text-black-800">
          <?=$call['date']?>
        </li>
        <li class="query__status px-12 lg:max-w-[122px] lg:min-w-[122px] text-14 text-black-800">
          <?=$call['status']?>
        </li>
      </ul>
    </label>
  </li>
<?php endforeach; ?>