<?php foreach ($calls as $call) : ?>
  <li class="mr-8 md:mr-12 mb-8 md:mb-12 p-12 md:p-16 bg-light-600 border border-light-900 rounded-8 md:rounded-12">
    <label class="cursor-pointer" for="call-<?=$call['id']?>">
      <ul class="flex items-center">
        <li>
          <input class="query__checkbox border-black-800 rounded-4 focus:outline-none focus:ring-2 focus:ring-brand-900" type="checkbox" value="call-<?=$call['id']?>" name="query__call" id="call-<?=$call['id']?>">
        </li>
        <li class="px-12 max-w-[192px] md:max-w-[228px] min-w-[192px] md:min-w-[228px] text-14 md:text-16 text-black-800">
          <?=$call['id']?>
        </li>
        <li class="px-12 max-w-[212px] md:max-w-[256px] min-w-[212px] md:min-w-[256px] text-14 md:text-16 text-black-800">
          <?=$call['client']?>
        </li>
        <li class="px-12 max-w-[218px] md:max-w-[256px] min-w-[218px] md:min-w-[256px] text-14 md:text-16 text-black-800">
          <?=$call['phone']?>
        </li>
        <li class="px-12 max-w-[216px] md:max-w-[256px] min-w-[216px] md:min-w-[256px] text-14 md:text-16 text-black-800">
          <?=$call['date']?>
        </li>
        <li class="px-12 lg:max-w-[200px] lg:min-w-[200px] text-14 md:text-16 text-black-800">
          <?=$call['status']?>
        </li>
      </ul>
    </label>
  </li>
<?php endforeach; ?>