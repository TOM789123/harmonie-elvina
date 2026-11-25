<?php /* Bloc « Je propose aussi » (animaux, nettoyage de lieux, communication défunt). $aussiTitre : titre facultatif. */ ?>
<section class="section aussi sombre grain" aria-labelledby="aussi-titre">
  <div class="conteneur">
    <div class="titre-section">
      <h2 id="aussi-titre"><?= e($aussiTitre ?? 'Je propose aussi') ?></h2>
    </div>
    <ul class="aussi__liste">
<?php foreach ($AUTRES as $a): ?>
      <li class="aussi__item">
        <?= icone($a['icone']) ?>
        <h3><?= e($a['titre']) ?></h3>
        <p><?= e($a['texte']) ?></p>
        <a class="lien" href="<?= e($a['url']) ?>"><?= e($a['lien']) ?></a>
      </li>
<?php endforeach; ?>
    </ul>
    <div class="aussi__notes">
      <p>Mes prestations sont à présent disponibles pour les entreprises, me contacter pour plus d’informations !</p>
      <p>Je peux également me déplacer, prévoir des frais supplémentaires (kilomètres + temps de trajet).</p>
    </div>
  </div>
</section>
