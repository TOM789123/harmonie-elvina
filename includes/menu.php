<?php
/** Menu principal (repris du menu Wix). */
$menuActif = $page['menu'] !== '' ? $page['menu'] : $page['cle'];
?>
<nav class="menu menu--<?= e($page['gabarit']) ?>" aria-label="Menu principal">
  <button class="menu__bouton" type="button" aria-expanded="false" aria-controls="menu-principal">
    <span class="menu__burger" aria-hidden="true"></span>Menu
  </button>
  <ul class="menu__liste" id="menu-principal">
<?php foreach ($MENU as $item):
    $actif   = $item['cle'] === $menuActif;
    $courant = $item['cle'] === $page['cle'];
    $externe = !empty($item['externe']);
?>
    <li class="menu__item<?= $actif ? ' est-actif' : '' ?>"><a href="<?= e($item['url']) ?>"<?= $courant ? ' aria-current="page"' : '' ?><?= $externe ? ' target="_blank" rel="noopener"' : '' ?>><?= e($item['label']) ?></a></li>
<?php endforeach; ?>
  </ul>
</nav>
