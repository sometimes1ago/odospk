<?php foreach ($photos as $photo) : ?>
  <li class="relative w-fit h-fit mr-16 mb-16 last:mr-0 last:mb-0">
    <input class="gallery__checkbox block absolute top-8 left-8 rounded-4 p-8 md:p-12 bg-light-400" type="checkbox" value="photo-<?=$photo['id']?>" name="photo-id" id="photo-<?=$photo['id']?>">
    <label for="photo-<?=$photo['id']?>" class="block">
      <img class="block object-fit w-[196px] md:w-[303px] h-[142px] md:h-[232px] rounded-8 md:rounded-12 cursor-pointer" src="/src/img/gallery/<?=$photo['name']?>" loading="lazy" alt="<?=$photo['name']?>">
    </label>
  </li>
<?php endforeach; ?>