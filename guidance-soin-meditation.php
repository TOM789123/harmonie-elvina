<?php
/* Séances (entrée « Séances » du menu) : guidance, soin énergétique, méditation connectée — Wix : /guidance */
$page = ['cle' => 'seances', 'titre' => 'Séances – Guidance, soin énergétique, méditation connectée'];
require __DIR__ . '/includes/entete.php';
?>
<h1 class="titre-page">SEANCES</h1>

<div class="trio trio--details">
  <section class="trio__item" id="guidance">
    <div class="trio__visuel"><img src="<?= e(img('deco/couronne-feuillage.svg')) ?>" width="77" height="77" alt=""></div>
    <h2 class="trio__titre">GUIDANCE</h2>
    <div class="trio__texte trio__texte--serre">
      <p>Une question ? Besoin d'un éclairage concernant une situation ?</p>
      <p>Une séance de guidance où je reçois des informations sous différentes formes qui nous permettent d'explorer ensemble les multiples potentiels qui se présentent à vous.</p>
      <p class="saut"><b>Déroulement de la séance: Uniquement à distance via une visio WhatsApp.</b></p>
      <p><b>Durée de la séance : 30 minutes.</b></p>
      <p><b>Tarif :</b> 45 € (règlement par virement bancaire lors de la prise de rendez-vous).</p>
    </div>
  </section>

  <section class="trio__item" id="soin-energetique">
    <div class="trio__visuel"><img src="<?= e(img('icone-soin-energetique.png')) ?>" width="83" height="66" alt=""></div>
    <h2 class="trio__titre trio__titre--soin"><span>SOIN<br><span class="seul-bureau">ENERGETIQUE</span><span class="seul-mobile">ENERGÉTIQUE</span></span></h2>
    <div class="trio__texte trio__texte--soin">
      <p>Que ce soit un nettoyage énergétique, un accompagnement à laisser s'exprimer les émotions qui ont besoin de l'être ou encore des douleurs physiques, je fonctionne de la même manière: nous allons à la racine de ces maux car pour moi, il est essentiel d'aller à leur rencontre pour écouter ce qu'ils ont à nous dire.</p>
      <p class="saut"><b>Déroulement de la séance: A mon cabinet, à domicile ou à distance sur photo.</b></p>
      <p><b>Durée de la séance : 45 minutes.</b></p>
      <p><b>Tarif : 70</b>&nbsp;€ (règlement en espèces, en chèque ou virement bancaire, si rdv à distance, règlement par virement bancaire lors de la prise de rendez-vous).</p>
      <p>Pour tout déplacement à domicile, les frais kilométriques sont à ajouter au montant de la séance.</p>
    </div>
  </section>

  <section class="trio__item" id="meditation-connectee">
    <div class="trio__visuel"><img src="<?= e(img('icone-meditation.png')) ?>" width="85" height="62" alt=""></div>
    <h2 class="trio__titre">MEDITATION CONNECTEE</h2>
    <div class="trio__texte trio__texte--meditation">
      <p>Un temps pour de&nbsp;pause, de retour à toi, une méditation connectée que je canalise pour t'offrir ce que tu as besoin de recevoir.</p>
      <p class="saut"><b>Déroulement de la séance: </b>A mon cabinet, à domicile ou à distance (visio WhatsApp ou enregistrement).</p>
      <p>Pour une séance de méditation connectée enregistrée, et transmise via WhatsApp, merci de m'envoyer une photo récente de vous en amont.</p>
      <p class="saut"><b>Durée :</b> Variable entre 20 et 45 minutes.</p>
      <p><b>Tarif:</b></p>
      <p>60 € (pour une méditation connectée en cabinet ou à domicile avec un règlement en espèces, en chèque ou virement bancaire).</p>
      <p>70 €(pour une méditation connectée enregistrée), règlement par virement bancaire lors de la prise du rdv).</p>
      <p>Pour tout déplacement à domicile, les frais kilométriques sont à ajouter au montant de la séance.</p>
    </div>
  </section>
</div>

<p class="details__avertissement">L'accompagnement que je te propose ne se substitue pas à un avis médical.</p>
<?php require __DIR__ . '/includes/pied.php'; ?>
