<?php foreach ($queriesTabs as $queriesTab) : ?>
  <li class="tab <?= str_contains($_SERVER['REQUEST_URI'], $queriesTab['address']) ? 'tab__active': ''?>">
    <a class="tab__link" href="<?=$queriesTab['address']?>">
      <?=$queriesTab['icon']?>
      <p class="tab__text"><?=$queriesTab['name']?></p>
    </a>
  </li>
<?php endforeach; ?>