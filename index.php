<?php
/* Accueil */
$page = [
    'cle'         => 'accueil',
    'description' => 'Harmonie Elvina, médium énergéticienne à Saint-Georges-sur-Baulche (Yonne) : guidance, soins énergétiques, méditations connectées, accompagnement personnalisé, au cabinet, à domicile ou à distance.',
];
require __DIR__ . '/includes/entete.php';

$vedettes = array_values(array_filter($TEMOIGNAGES, static fn ($t) => !empty($t['vedette'])));
usort($vedettes, static fn ($a, $b) => strcmp($a['auteur'] === 'Laurianne Mths' ? '0' : '1', $b['auteur'] === 'Laurianne Mths' ? '0' : '1'));
?>
<section class="hero sombre grain">
  <div class="hero__photo">
    <?= photo('chemin', 'Un chemin forestier baigné de soleil, entre les arbres', '(max-width: 56em) 100vw, 47vw', ['loading' => 'eager', 'fetchpriority' => 'high']) ?>
  </div>
  <?= lumiere(11) ?>
  <div class="conteneur hero__contenu">
    <div class="hero__texte">
      <p class="hero__salut">Je vous souhaite la bienvenue</p>
      <h1 class="hero__titre">Aller à la découverte de soi est le plus beau voyage que l’on puisse entreprendre.</h1>
      <p class="hero__intro">Je propose de t’accompagner grâce à des séances de guidance, de soins énergétiques et de méditations.</p>
      <div class="hero__actions">
        <a class="bouton bouton--lumiere" href="contact.php">Prendre rendez-vous</a>
        <a class="bouton bouton--contour" href="seances.php">Découvrir les séances</a>
      </div>
      <p class="hero__lieu"><?= icone('lieu') ?>Saint-Georges-sur-Baulche, dans l’Yonne, et à distance</p>
    </div>
  </div>
</section>

<section class="section presentation" aria-labelledby="presentation-titre">
  <div class="conteneur presentation__grille">
    <div class="presentation__visuels">
      <div class="presentation__tronc"><?= photo('tronc', 'Le tronc d’un grand arbre couvert de lierre', '(max-width: 56em) 80vw, 22rem') ?></div>
      <div class="presentation__portrait"><?= photo('portrait', 'Harmonie Elvina', '11rem') ?></div>
    </div>
    <div class="presentation__texte">
      <h2 id="presentation-titre">Qui suis-je ?</h2>
      <p class="chapeau">Médium énergéticienne, mes capacités me permettent de voir, de ressentir, d’entendre et de communiquer avec les mondes subtils : âmes, guides, défunts, animaux, énergies des lieux et objets.</p>
      <p>Suite à ma rencontre avec Fabienne Casabianca et Sorine Andrée en 2021, j’ai choisi d’approfondir ce chemin qui m’appelait depuis l’enfance.</p>
      <p>Je n’ai pas de baguette magique et je tiens à ce que tu sois l’acteur principal de ce que tu souhaites dans ta vie. Pour moi, lorsque l’on désire un changement quel qu’il soit, il est nécessaire de mettre en place des actions concrètes pour y contribuer.</p>
      <?= photo('logo-harmonie-elvina', 'Logo Harmonie Elvina, médium énergéticienne', '9.5rem', ['class' => 'presentation__signature']) ?>
    </div>
  </div>
</section>

<section class="section section--lichen" id="seances" aria-labelledby="seances-titre">
  <div class="conteneur">
    <div class="titre-section">
      <h2 id="seances-titre">Les séances</h2>
      <p>À mon cabinet de Saint-Georges-sur-Baulche, à domicile ou à distance.</p>
    </div>
    <ul class="seances-liste">
<?php foreach ($SEANCES as $cle => $s): ?>
      <li class="seance">
        <?= icone($s['icone']) ?>
        <h3><a href="<?= e($s['url'] ?? 'seances.php#' . $cle) ?>"><?= e($s['titre']) ?></a></h3>
        <p><?= e($s['accroche']) ?></p>
        <?= infos_seance($s['resume']) ?>
      </li>
<?php endforeach; ?>
    </ul>
    <p class="mention">L’accompagnement que je te propose ne se substitue pas à un avis médical.</p>
  </div>
</section>

<?php require __DIR__ . '/includes/bloc-aussi.php'; ?>

<section class="section" aria-labelledby="temoignages-titre">
  <div class="conteneur">
    <div class="titre-section">
      <h2 id="temoignages-titre">Témoignages</h2>
    </div>
    <div class="temoignages-grille">
<?php foreach ($vedettes as $i => $t): ?>
      <figure class="temoignage<?= $i === 0 ? ' temoignage--grand' : '' ?>">
        <blockquote><p><?= e($t['texte']) ?></p></blockquote>
        <figcaption><b><?= e($t['auteur']) ?></b>, <?= e(mois_annee($t['date'])) ?></figcaption>
      </figure>
<?php endforeach; ?>
    </div>
    <p class="temoignages-suite"><a class="lien" href="temoignages.php">Lire les <?= count($TEMOIGNAGES) ?> témoignages</a></p>
  </div>
</section>
<?php require __DIR__ . '/includes/pied.php'; ?>
