<?php
/*
 * Séances (vue d'ensemble) — Wix : /mes-prestations
 * Depuis la mise à jour Wix du 11/11/2026, cette page n'est plus reliée au menu
 * (« Séances » mène à guidance-soin-meditation.php). Elle reste la seule page qui mène
 * à « Accompagnement énergétique personnalisé ».
 */
$page = ['cle' => 'prestations', 'titre' => 'Séances', 'menu' => 'seances', 'fond' => 'clair', 'bande' => 'arbre-cote-seances.jpg'];
require __DIR__ . '/includes/entete.php';
?>
<h1 class="titre-page">Séances</h1>

<div class="trio trio--hub">
  <div class="trio__item">
    <div class="trio__visuel"><img src="<?= e(img('deco/couronne-feuillage.svg')) ?>" width="108" height="107" alt=""></div>
    <h2 class="trio__titre"><a href="guidance-soin-meditation.php#guidance">GUIDANCE</a></h2>
  </div>
  <div class="trio__item">
    <div class="trio__visuel"><img src="<?= e(img('icone-soin-energetique.png')) ?>" width="141" height="107" alt=""></div>
    <h2 class="trio__titre"><a href="guidance-soin-meditation.php#soin-energetique">SOIN<br>ENERGETIQUE</a></h2>
  </div>
  <div class="trio__item">
    <div class="trio__visuel"><img class="trio__photo" src="<?= e(img('accompagnement.jpg')) ?>" width="85" height="120" alt=""></div>
    <h2 class="trio__titre"><a href="accompagnement-energetique.php">ACCOMPAGNEMENT<br>ENERGETIQUE<br>PERSONNALISE</a></h2>
  </div>
</div>

<a class="seances__nettoyage" href="nettoyage-energetique-lieux.php">
  <img src="<?= e(img('logo-nettoyage-energetique.png')) ?>" width="256" height="256" alt="Nettoyage énergétique de lieux">
</a>

<div class="autres">
  <img class="autres__icone" src="<?= e(img('deco/couronne-doree.svg')) ?>" width="57" height="57" alt="">
  <img class="deco deco--ornement deco--g1" src="<?= e(img('deco/ornement.svg')) ?>" alt="">
  <img class="deco deco--ornement deco--d1" src="<?= e(img('deco/ornement.svg')) ?>" alt="">
  <img class="deco deco--feuilles deco--g2" src="<?= e(img('deco/branche.svg')) ?>" alt="">
  <img class="deco deco--feuilles deco--d2" src="<?= e(img('deco/branche.svg')) ?>" alt="">
  <div class="autres__texte">
    <p>Je propose aussi d'autres séances:</p>
    <p class="autres__seance">COMMUNICATION DEFUNT</p>
    <p class="autres__seance">COMMUNICATION &amp; SOINS ANIMALIERS</p>
    <p>Me contacter pour plus de renseignements.</p>
  </div>
</div>

<p class="seances__entreprises">Mes prestations sont à présent disponibles pour les entreprises, me contacter pour plus d'informations&nbsp;!</p>
<p class="seances__deplacement">Je peux également me déplacer, prévoir des frais supplémentaires (kilomètres + temps de trajet).</p>
<p class="seances__avertissement">~ <span>Toutes les prestations que je propose ne se substituent pas à un avis ou à un traitement médical</span> ~</p>
<?php require __DIR__ . '/includes/pied.php'; ?>
