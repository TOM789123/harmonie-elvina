<?php
/* Mentions légales (loi pour la confiance dans l'économie numérique, art. 6) */
$page = ['cle' => 'mentions', 'titre' => 'Mentions légales', 'rdv' => false];
require __DIR__ . '/includes/entete.php';
require __DIR__ . '/includes/legal.php';
?>
<?= hero_page('Mentions légales', 'Dernière mise à jour : ' . LEGAL_MAJ . '.') ?>

<section class="section">
  <div class="conteneur"><div class="prose legale">
    <h2>Éditeur du site</h2>
    <p>Le site <?= e($_SERVER['HTTP_HOST'] ?? 'harmonie-elvina.fr') ?> est édité par :</p>
    <ul class="liste-feuille">
      <li><?= e(SITE_NOM) ?> (nom commercial), <?= e(SITE_METIER) ?></li>
      <li>Nom et prénom de l’entrepreneur : <?= a_remplir('nom et prénom') ?></li>
      <li>Statut : <?= a_remplir('ex. entrepreneur individuel (micro-entreprise)') ?></li>
      <li>SIRET : <?= a_remplir('numéro SIRET') ?></li>
      <li>TVA : <?= a_remplir('« TVA non applicable, art. 293 B du CGI » si franchise en base, sinon numéro de TVA') ?></li>
      <li>Adresse : <?= e(ADRESSE_LIEU) ?>, <?= e(ADRESSE_RUE) ?>, <?= e(ADRESSE_VILLE) ?></li>
      <li>Téléphone : <a href="tel:<?= e(TELEPHONE_LIEN) ?>"><?= e(TELEPHONE) ?></a></li>
      <li>E-mail : <a href="mailto:<?= e(EMAIL) ?>"><?= e(EMAIL) ?></a></li>
    </ul>
    <p>Directrice de la publication : <?= a_remplir('nom et prénom') ?>.</p>

    <h2>Hébergement</h2>
    <p><?= e(HEBERGEUR) ?>.</p>

    <h2>Conception du site</h2>
    <p>Site conçu et réalisé par <?= a_remplir('nom du prestataire') ?>.</p>

    <h2>Propriété intellectuelle</h2>
    <p>L’ensemble des contenus de ce site (textes, photographies, logos, illustrations, mise en page) est la propriété de <?= e(SITE_NOM) ?> ou de leurs auteurs respectifs. Toute reproduction, représentation ou diffusion, totale ou partielle, sans autorisation écrite préalable est interdite.</p>
    <p>Les témoignages sont publiés avec l’accord de leurs auteurs. Les polices de caractères Alegreya et Alegreya Sans sont distribuées sous licence libre SIL Open Font License.</p>

    <h2>Nature des prestations</h2>
    <p>Les séances proposées (guidance, soin énergétique, méditation connectée, accompagnement énergétique, communication et soins aux animaux, nettoyage énergétique de lieux) relèvent du bien-être et du développement personnel. Elles ne constituent ni un acte médical, ni un diagnostic, ni un traitement, et ne se substituent en aucun cas à un avis ou à un traitement médical, psychologique ou vétérinaire. Aucun traitement en cours ne doit être interrompu ou modifié sans l’avis du professionnel de santé qui le suit.</p>

    <h2>Liens externes</h2>
    <p>Le site contient des liens vers d’autres sites (Facebook, Instagram, Flori’Âme). <?= e(SITE_NOM) ?> n’est pas responsable de leur contenu ni de leurs pratiques en matière de données personnelles.</p>

    <h2>Données personnelles et cookies</h2>
    <p>Voir la <a href="politique-de-confidentialite.php">politique de confidentialité</a>.</p>

    <h2>Droit applicable</h2>
    <p>Les présentes mentions légales sont soumises au droit français.</p>
  </div></div>
</section>
<?php require __DIR__ . '/includes/pied.php'; ?>
