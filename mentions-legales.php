<?php
/* Mentions légales — contenu à fournir par la cliente (page vide sur le site actuel) */
$page = ['cle' => 'mentions', 'titre' => 'Mentions légales', 'rdv' => false];
require __DIR__ . '/includes/entete.php';
?>
<?= hero_page('Mentions légales') ?>

<section class="section">
  <div class="conteneur legale">
    <p class="a-completer">Contenu à compléter : cette page est vide sur le site actuel.</p>
  </div>
</section>
<?php require __DIR__ . '/includes/pied.php'; ?>
