<?php
/* Vos témoignages */
$page = [
    'cle'         => 'temoignages',
    'titre'       => 'Vos témoignages',
    'description' => 'Témoignages de personnes accompagnées par Harmonie Elvina : guidances, soins énergétiques, méditations connectées.',
];
require __DIR__ . '/includes/entete.php';

$liste = $TEMOIGNAGES;
usort($liste, static fn ($a, $b) => strcmp($b['date'], $a['date']));
$annees = array_map(static fn ($t) => (int) substr($t['date'], 0, 4), $liste);
?>
<?= hero_page('Vos témoignages', count($liste) . ' témoignages partagés entre ' . min($annees) . ' et ' . max($annees) . '.') ?>

<section class="section">
  <div class="conteneur">
    <div class="temoignages-mur">
<?php foreach ($liste as $t): ?>
      <figure class="temoignage">
        <blockquote><p><?= e($t['texte']) ?></p></blockquote>
        <figcaption><b><?= e($t['auteur']) ?></b>, <?= e(mois_annee($t['date'])) ?></figcaption>
      </figure>
<?php endforeach; ?>
    </div>
    <div class="temoignages-fin">
      <p>Si vous aussi vous souhaitez partager votre expérience, rendez-vous à la <a href="contact.php#formulaire">page contact</a>.</p>
      <p>Davantage de témoignages sur ma <a href="<?= e(URL_FACEBOOK) ?>" target="_blank" rel="noopener">page Facebook</a>.</p>
    </div>
  </div>
</section>
<?php require __DIR__ . '/includes/pied.php'; ?>
