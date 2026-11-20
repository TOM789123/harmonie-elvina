<?php
/* Accueil — Wix : /harmonie-elvina-2 */
$page = ['cle' => 'accueil', 'titre' => 'Accueil', 'fond' => 'clair', 'gabarit' => 'accueil'];
require __DIR__ . '/includes/entete.php';
?>
<header class="entete zone">
  <div class="zone__inner">
    <?= bandes('arbre-cote.jpg') ?>
    <img class="entete__logo" src="<?= e(img('logo-harmonie-elvina.png')) ?>" width="268" height="268" alt="Harmonie Elvina – Médium énergéticienne">
    <h1 class="entete__statut">Site en cours de transformation</h1>
    <p class="entete__bienvenue">Je vous souhaite la Bienvenue&nbsp;!</p>
  </div>
</header>

<div class="zone">
  <div class="zone__inner">
    <img class="accueil__banniere" src="<?= e(img('chemin-foret.jpg')) ?>" width="980" height="259" alt="">
<?php require __DIR__ . '/includes/menu.php'; ?>
    <main id="contenu" class="accueil">
      <img class="accueil__portrait" src="<?= e(img('portrait-harmonie.jpg')) ?>" width="119" height="141" alt="Portrait d’Harmonie Elvina">

      <div class="accueil__intro">
        <p>Je propose de t'accompagner grâce à des séances de guidance, de soins énergétiques et de méditations.</p>
        <p>Je n'ai pas de baguette magique et je tiens à ce que tu sois l'acteur principal de ce que tu souhaites dans ta vie.</p>
        <p>Pour moi, lorsque l'on désire un changement quel qu'il soit, il est nécessaire de mettre en place des actions concrètes pour y contribuer.</p>
      </div>

      <img class="accueil__ornement" src="<?= e(img('deco/laurier.svg')) ?>" width="68" height="43" alt="">

      <p class="accueil__devise">ALLER A LA DECOUVERTE DE SOI EST LE PLUS BEAU VOYAGE QUE L'ON PUISSE ENTREPRENDRE</p>

      <div class="accueil__coordonnees">
        <address class="accueil__adresse">
          Harmonie Elvina<br>
          3 Chemin du Moulin<br>
          89 000 Saint Georges Sur Baulche<br>
          <a href="tel:+33659412294">06.59.41.22.94</a><br>
          <a href="mailto:harmonie.feval@gmail.com">harmonie.feval@gmail.com</a>
        </address>
        <ul class="reseaux">
          <li><a href="<?= e(URL_FACEBOOK) ?>" target="_blank" rel="noopener"><img src="<?= e(img('icone-facebook.png')) ?>" width="61" height="61" alt="Facebook"></a></li>
          <li><a href="<?= e(URL_INSTAGRAM) ?>" target="_blank" rel="noopener"><img src="<?= e(img('icone-instagram.png')) ?>" width="61" height="61" alt="Instagram"></a></li>
        </ul>
      </div>
    </main>
  </div>
</div>
<?php require __DIR__ . '/includes/pied.php'; ?>
