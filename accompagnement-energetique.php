<?php
/* Accompagnement énergétique personnalisé */
$page = [
    'cle'         => 'accompagnement',
    'menu'        => 'seances',
    'titre'       => 'Accompagnement énergétique personnalisé',
    'description' => 'Accompagnement énergétique personnalisé sur plusieurs séances avec Harmonie Elvina : déroulement, rythme et tarifs.',
];
require __DIR__ . '/includes/entete.php';

$visuel = '<div class="hero-page__photo">' . photo('sentier', 'Un sentier étroit qui s’enfonce dans la forêt', '(max-width: 56em) 90vw, 22rem', ['loading' => 'eager']) . '</div>';
?>
<?= hero_page('Accompagnement énergétique personnalisé', 'Cette séance contribue à votre évolution et vous guide sur le chemin de la libération.', $visuel, ['url' => 'seances.php', 'label' => 'Les séances']) ?>

<section class="section">
  <div class="conteneur deux-colonnes">
    <div class="prose">
      <h2>Pourquoi prendre rendez-vous avec moi pour un accompagnement énergétique personnalisé ?</h2>
      <p class="chapeau">Durant cette séance, je vous accompagne à la découverte de l’origine de vos maux afin de leur permettre de s’exprimer : ensemble, nous pouvons aller chercher en profondeur ce qui fait barrage, ce qui a besoin d’être dénoué, mis en lumière.</p>
      <p>Cette séance contribue à votre évolution et vous guide sur le chemin de la libération. Vous êtes davantage acteur lors de ce type de séance car vous choisissez d’aller plus loin, d’ôter les barrières, de lever les freins et de faire face à ce qui a besoin d’être mis en lumière.</p>
    </div>
    <div class="prose">
      <h2>Comment se déroule une séance ?</h2>
      <p>Cet accompagnement personnalisé se déroule sur plusieurs séances que nous définirons ensemble en fonction de vos besoins et de votre rythme.</p>
      <p>Par un soin énergétique, une guidance ou encore une méditation connectée, je vous accompagne sur ce chemin.</p>
      <p>Pour cela, j’ai recours à mes expériences, je fais appel à mes capacités et je peux être amenée à utiliser des outils qui me sont propres.</p>
    </div>
  </div>
</section>

<section class="section section--lichen" aria-labelledby="tarifs-titre">
  <div class="conteneur">
    <div class="titre-section">
      <h2 id="tarifs-titre">Durée et tarifs</h2>
      <p>Paiement en espèces, chèque ou virement.</p>
    </div>
    <ol class="etapes">
      <li>
        <h3>La première séance</h3>
        <p>La première séance est en quelque sorte un « état des lieux énergétique ». Elle permet d’identifier ce qui est prêt à se présenter, à être exprimé, libéré, ce pour quoi il est temps d’œuvrer en profondeur.</p>
        <?= infos_seance(['Durée' => '1 h 15', 'Tarif' => '115 €']) ?>
      </li>
      <li>
        <h3>Les séances suivantes</h3>
        <p>Les séances suivantes, nous passons à l’action et nous allons œuvrer ensemble, pour vous, et en fonction de ce qui se sera présenté lors de la première séance.</p>
        <p>Un temps de repos et d’intégration est nécessaire entre chaque séance. En général, je conseille de laisser au moins 15 jours.</p>
        <?= infos_seance(['Durée' => '1 h', 'Tarif' => '90 € pour la seconde séance, puis 80 €']) ?>
      </li>
    </ol>
  </div>
</section>
<?php require __DIR__ . '/includes/pied.php'; ?>
