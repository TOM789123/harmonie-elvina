<?php
/* Conditions générales de vente — contenu à fournir par la cliente (page vide sur le site actuel) */
$page = ['cle' => 'cgv', 'titre' => 'Conditions générales de vente', 'rdv' => false];
require __DIR__ . '/includes/entete.php';
?>
<?= hero_page('Conditions générales de vente') ?>

<section class="section">
  <div class="conteneur legale">
    <p class="a-completer">Contenu à compléter : cette page est vide sur le site actuel.</p>
  </div>
</section>
<?php require __DIR__ . '/includes/pied.php'; ?>
