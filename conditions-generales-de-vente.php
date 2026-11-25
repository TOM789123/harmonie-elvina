<?php
/* Conditions générales de vente des prestations */
$page = ['cle' => 'cgv', 'titre' => 'Conditions générales de vente', 'rdv' => false];
require __DIR__ . '/includes/entete.php';
require __DIR__ . '/includes/legal.php';
?>
<?= hero_page('Conditions générales de vente', 'Applicables aux séances réservées à partir du ' . LEGAL_MAJ . '.') ?>

<section class="section">
  <div class="conteneur"><div class="prose legale">
    <h2>1. Objet</h2>
    <p>Les présentes conditions s’appliquent aux prestations proposées par <?= e(SITE_NOM) ?> (<?= a_remplir('nom, prénom, statut et SIRET') ?>) : guidance, soin énergétique, méditation connectée, accompagnement énergétique personnalisé, communication et soins aux animaux, et nettoyage énergétique de lieux réalisé avec Flori’Âme. Prendre rendez-vous implique l’acceptation de ces conditions.</p>

    <h2>2. Nature des prestations</h2>
    <p>Les prestations relèvent du bien-être et du développement personnel. Elles reposent sur les perceptions de la praticienne et ne comportent aucune obligation de résultat. Elles ne constituent ni un acte médical, ni un diagnostic, ni un traitement, et ne se substituent pas à un avis ou à un traitement médical, psychologique ou vétérinaire. Le client reste seul responsable de ses décisions.</p>
    <p>Les séances concernant un mineur se font avec l’accord et en présence (ou par l’intermédiaire) de son représentant légal.</p>

    <h2>3. Prise de rendez-vous</h2>
    <p>Les rendez-vous se prennent par téléphone, par e-mail ou via le formulaire de contact. Les séances au cabinet ont lieu à l’<?= e(ADRESSE_LIEU) ?>, <?= e(ADRESSE_RUE) ?>, <?= e(ADRESSE_VILLE) ?>, uniquement sur rendez-vous. Les séances à distance se déroulent par visio WhatsApp, par téléphone, sur photo ou par enregistrement, selon la prestation.</p>

    <h2>4. Tarifs</h2>
    <p>Les tarifs en vigueur sont ceux indiqués sur le site au jour de la prise de rendez-vous (pages <a href="seances.php">Séances</a>, <a href="accompagnement-energetique.php">Accompagnement</a>, <a href="animaux.php">Animaux</a> et <a href="nettoyage-energetique-lieux.php">Nettoyage énergétique de lieux</a>). <?= a_remplir('« TVA non applicable, art. 293 B du CGI » si franchise en base') ?>.</p>
    <p>Pour tout déplacement à domicile, les frais kilométriques (et, le cas échéant, le temps de trajet) s’ajoutent au montant de la séance. Le nettoyage énergétique de lieux fait l’objet d’un devis préalable.</p>

    <h2>5. Paiement</h2>
    <p>Séances au cabinet ou à domicile : règlement en espèces, par chèque ou par virement bancaire. Séances à distance : règlement par virement bancaire lors de la prise de rendez-vous ; la séance est confirmée à réception du paiement.</p>

    <h2>6. Annulation et report</h2>
    <p><?= a_remplir('délai d’annulation choisi, par exemple : toute séance peut être annulée ou reportée sans frais jusqu’à 48 h avant le rendez-vous ; au-delà, ou en cas d’absence, la séance est due') ?>.</p>
    <p>En cas d’empêchement de la praticienne, la séance est reportée à une date convenue ensemble ou remboursée.</p>

    <h2>7. Droit de rétractation</h2>
    <p>Pour une séance réservée à distance (téléphone, e-mail, formulaire), le client dispose d’un délai de rétractation de 14 jours à compter de la réservation (article L221-18 du Code de la consommation). Si le client demande expressément que la séance ait lieu avant la fin de ce délai, il reconnaît qu’il perd son droit de rétractation une fois la prestation entièrement exécutée (article L221-28) ; s’il se rétracte après le début de la prestation, il reste redevable de la part déjà réalisée.</p>

    <h2>8. Confidentialité</h2>
    <p>Tout ce qui est partagé pendant une séance reste strictement confidentiel. Les méditations enregistrées sont destinées au seul usage personnel du client. Le traitement des données personnelles est décrit dans la <a href="politique-de-confidentialite.php">politique de confidentialité</a>.</p>

    <h2>9. Responsabilité</h2>
    <p>La praticienne s’engage à mettre en œuvre tout son savoir-faire avec bienveillance (obligation de moyens). Sa responsabilité ne saurait être engagée en cas d’utilisation des séances en remplacement d’un suivi médical, ni pour les décisions prises par le client à la suite d’une séance.</p>

    <h2>10. Réclamations et médiation</h2>
    <p>Toute réclamation peut être adressée à <a href="mailto:<?= e(EMAIL) ?>"><?= e(EMAIL) ?></a>. En cas de litige non résolu, le client peut recourir gratuitement au médiateur de la consommation : <?= a_remplir('nom et site du médiateur auquel l’entreprise adhère (obligatoire)') ?>.</p>
    <p>Les présentes conditions sont soumises au droit français.</p>
  </div></div>
</section>
<?php require __DIR__ . '/includes/pied.php'; ?>
