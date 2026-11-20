<?php
/* Animaux : communication & soins — Wix : /soin-énergétique (page renommée « Animaux » sur Wix) */
$page = ['cle' => 'animaux', 'titre' => 'Animaux'];
require __DIR__ . '/includes/entete.php';
?>
<h1 class="titre-page">ANIMAUX</h1>
<p class="animaux__sous-titre">Communication &amp; Soins aux animaux</p>

<img class="animaux__photo" src="<?= e(img('animaux.jpg')) ?>" width="219" height="146" alt="La famille au complet, septembre 2023">

<div class="animaux__texte">
  <p>Je te propose d'entrer en communication avec ton animal si tu souhaites discuter avec lui ou si tu as des questions à lui poser.</p>
  <p>Je propose également des séances de soins énergétiques pour contribuer à leur mieux-être.</p>
  <p class="saut"><b>Déroulement de la séance: </b>A distance ou à domicile.</p>
  <p>A distance, vous m'envoyez la photo et le prénom de votre animal accompagné de votre message et/ou questions puis je vous téléphone pour vous partager les informations reçues.</p>
  <p><b>Durée: </b>45 minutes</p>
  <p><b>Tarif:</b> 70&nbsp;€ (règlement en espèces ou par chèque, si rdv à distance, règlement par virement bancaire lors de la prise de rendez-vous).</p>
  <p class="dernier">Pour tout déplacement à domicile, les frais kilométriques sont à ajouter au montant de la séance.</p>
</div>
<?php require __DIR__ . '/includes/pied.php'; ?>
