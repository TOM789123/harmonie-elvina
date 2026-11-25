<?php
/* Politique de confidentialité (RGPD) et cookies */
$page = ['cle' => 'confidentialite', 'titre' => 'Politique de confidentialité', 'rdv' => false];
require __DIR__ . '/includes/entete.php';
require __DIR__ . '/includes/legal.php';
?>
<?= hero_page('Politique de confidentialité', 'Quelles données sont collectées, pourquoi, et comment exercer vos droits. Dernière mise à jour : ' . LEGAL_MAJ . '.') ?>

<section class="section">
  <div class="conteneur"><div class="prose legale">
    <h2>Responsable du traitement</h2>
    <p><?= e(SITE_NOM) ?> (<?= a_remplir('nom et prénom') ?>), <?= e(ADRESSE_LIEU) ?>, <?= e(ADRESSE_RUE) ?>, <?= e(ADRESSE_VILLE) ?> — <a href="mailto:<?= e(EMAIL) ?>"><?= e(EMAIL) ?></a>.</p>

    <h2>Les données collectées</h2>
    <h3>Formulaire de contact</h3>
    <p>Lorsque vous utilisez le formulaire, sont collectés : votre prénom, votre nom, votre téléphone (facultatifs), votre adresse e-mail et votre message. Ces informations sont envoyées par e-mail à <?= e(EMAIL) ?> ; elles ne sont pas enregistrées dans une base de données sur le site.</p>
    <ul class="liste-feuille">
      <li>Finalité : répondre à votre demande et, le cas échéant, organiser une séance.</li>
      <li>Base légale : votre demande (mesures précontractuelles) et l’intérêt légitime à vous répondre.</li>
      <li>Durée de conservation : 3 ans à compter de notre dernier échange, puis suppression.</li>
    </ul>

    <h3>Rendez-vous et séances</h3>
    <p>Pour organiser et réaliser une séance, peuvent être traités : vos coordonnées, la date des séances, les règlements (factures conservées 10 ans, obligation comptable) et, pour les séances à distance, la photo que vous transmettez (de vous ou de votre animal, ou de votre lieu pour un nettoyage énergétique).</p>
    <p>Les informations personnelles que vous choisissez de confier pendant une séance, y compris sur votre santé ou vos émotions, restent strictement confidentielles. Elles ne sont ni publiées ni transmises à des tiers, et ne sont conservées que le temps utile à votre accompagnement.</p>
    <p>Pour un nettoyage énergétique de lieux, les informations nécessaires sont partagées avec Flori’Âme, co-intervenante de la prestation.</p>

    <h2>Destinataires et sous-traitants</h2>
    <ul class="liste-feuille">
      <li>Hébergement du site : <?= e(HEBERGEUR) ?> (serveurs en France).</li>
      <li>Messagerie : Gmail (Google), qui peut traiter des données en dehors de l’Union européenne dans le cadre de garanties appropriées.</li>
      <li>Visios et envoi des méditations enregistrées : WhatsApp (Meta), lorsque vous choisissez une séance à distance.</li>
    </ul>
    <p>Vos données ne sont jamais vendues ni utilisées à des fins publicitaires.</p>

    <h2 id="cookies">Cookies</h2>
    <p>Le site n’utilise aucun cookie publicitaire ni outil de mesure d’audience, et n’intègre aucun contenu tiers (vidéo, carte, bouton de partage). Les polices de caractères sont hébergées sur le site lui-même.</p>
    <p>Un seul cookie technique est déposé sur la page Contact : <code>PHPSESSID</code>, qui sécurise le formulaire contre les envois automatisés. Il est strictement nécessaire au fonctionnement du formulaire, ne permet pas de vous suivre et s’efface à la fermeture du navigateur. Il est donc dispensé de consentement.</p>
    <p>Les liens vers Facebook et Instagram sont de simples liens : aucun cookie de ces réseaux n’est déposé tant que vous ne cliquez pas dessus.</p>

    <h2>Vos droits</h2>
    <p>Vous disposez d’un droit d’accès, de rectification, d’effacement, de limitation, d’opposition et de portabilité de vos données. Pour les exercer, écrivez à <a href="mailto:<?= e(EMAIL) ?>"><?= e(EMAIL) ?></a> ; une réponse vous sera apportée dans un délai d’un mois.</p>
    <p>Si vous estimez que vos droits ne sont pas respectés, vous pouvez adresser une réclamation à la CNIL (<a href="https://www.cnil.fr" target="_blank" rel="noopener">www.cnil.fr</a>).</p>
  </div></div>
</section>
<?php require __DIR__ . '/includes/pied.php'; ?>
