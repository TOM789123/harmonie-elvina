<?php
/* Séances : guidance, soin énergétique, méditation connectée (+ accompagnement personnalisé) */
$page = [
    'cle'         => 'seances',
    'titre'       => 'Séances',
    'description' => 'Guidance, soin énergétique et méditation connectée avec Harmonie Elvina, médium énergéticienne : déroulement, durée et tarifs.',
];
require __DIR__ . '/includes/entete.php';

$detail = ['guidance', 'soin', 'meditation'];
$sommaire = '<ul class="sommaire">';
foreach ($SEANCES as $cle => $s) {
    $sommaire .= '<li><a href="' . e($s['url'] ?? '#' . $cle) . '">' . icone($s['icone']) . e($cle === 'accompagnement' ? 'Accompagnement personnalisé' : $s['titre']) . '</a></li>';
}
$sommaire .= '</ul>';
?>
<?= hero_page('Les séances', 'Je propose de t’accompagner grâce à des séances de guidance, de soins énergétiques et de méditations.', '', [], $sommaire) ?>

<section class="section">
  <div class="conteneur">
<?php foreach ($detail as $cle): $s = $SEANCES[$cle]; ?>
    <article class="bloc-seance" id="<?= e($cle) ?>" aria-labelledby="titre-<?= e($cle) ?>">
      <div class="bloc-seance__texte">
        <div class="bloc-seance__titre"><?= icone($s['icone']) ?><h2 id="titre-<?= e($cle) ?>"><?= e($s['titre']) ?></h2></div>
<?php if ($cle === 'guidance'): ?>
        <p><?= e($s['accroche']) ?></p>
<?php endif; ?>
<?php foreach ($s['texte'] as $para): ?>
        <p><?= e($para) ?></p>
<?php endforeach; ?>
      </div>
      <?= fiche_pratique($s['pratique'], $s['notes']) ?>
    </article>
<?php endforeach; ?>
    <p class="mention">Toutes les prestations que je propose ne se substituent pas à un avis ou à un traitement médical.</p>
  </div>
</section>

<section class="section section--lichen" aria-labelledby="accompagnement-titre">
  <div class="conteneur ouverture">
    <div class="ouverture__visuel"><?= photo('sentier', 'Un sentier étroit qui s’enfonce dans la forêt', '20rem') ?></div>
    <div>
      <h2 id="accompagnement-titre"><?= e($SEANCES['accompagnement']['titre']) ?></h2>
      <p><?= e($SEANCES['accompagnement']['accroche']) ?></p>
      <?= infos_seance($SEANCES['accompagnement']['resume']) ?>
      <p><a class="bouton bouton--mousse" href="accompagnement-energetique.php">Découvrir l’accompagnement</a></p>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/bloc-aussi.php'; ?>
<?php require __DIR__ . '/includes/pied.php'; ?>
