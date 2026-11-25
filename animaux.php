<?php
/* Animaux : communication & soins */
$page = [
    'cle'         => 'animaux',
    'titre'       => 'Communication & soins aux animaux',
    'description' => 'Communication animale et soins énergétiques pour les animaux, à distance ou à domicile, avec Harmonie Elvina.',
];
require __DIR__ . '/includes/entete.php';

$visuel = '<figure class="dessin">' . photo('dessin-animaux', 'Dessin au crayon : une famille assise de dos, avec ses trois chats', '(max-width: 56em) 90vw, 26rem', ['loading' => 'eager'])
        . '<figcaption>La famille au complet, septembre 2023</figcaption></figure>';
?>
<?= hero_page('Animaux', 'Communication & soins aux animaux', $visuel) ?>

<section class="section">
  <div class="conteneur bloc-seance">
    <div class="bloc-seance__texte">
      <div class="bloc-seance__titre"><?= icone('animaux') ?><h2>La séance</h2></div>
      <p>Je te propose d’entrer en communication avec ton animal si tu souhaites discuter avec lui ou si tu as des questions à lui poser.</p>
      <p>Je propose également des séances de soins énergétiques pour contribuer à leur mieux-être.</p>
    </div>
    <?= fiche_pratique([
        'Déroulement' => ['À distance ou à domicile.'],
        'Durée'       => ['45 minutes.'],
        'Tarif'       => ['70 €, réglés en espèces ou par chèque. Si le rendez-vous a lieu à distance : règlement par virement bancaire lors de la prise de rendez-vous.'],
    ], [$FRAIS_KM]) ?>
  </div>
</section>

<section class="section section--lichen" aria-labelledby="distance-titre">
  <div class="conteneur">
    <div class="titre-section">
      <h2 id="distance-titre">À distance, comment ça se passe ?</h2>
    </div>
    <ol class="etapes etapes--compactes">
      <li><h3>Vous m’envoyez la photo et le prénom de votre animal, accompagnés de votre message et/ou de vos questions.</h3></li>
      <li><h3>Je vous téléphone pour vous partager les informations reçues.</h3></li>
    </ol>
  </div>
</section>
<?php require __DIR__ . '/includes/pied.php'; ?>
