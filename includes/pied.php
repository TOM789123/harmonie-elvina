<?php
/** Fin de page commune : bandeau « Prendre rendez-vous » (optionnel) et pied de page. */
?>
<?php if ($page['rdv']): ?>
<section class="rdv sombre grain" aria-labelledby="rdv-titre">
  <div class="rdv__fond" aria-hidden="true"><?= photo('canopee', '', '100vw') ?></div>
  <div class="conteneur rdv__grille">
    <div class="rdv__texte">
      <h2 id="rdv-titre">Prendre rendez-vous</h2>
      <p><?= e(HORAIRES) ?>, à l’<?= e(ADRESSE_LIEU) ?> de Saint-Georges-sur-Baulche. Les séances à distance se font par visio WhatsApp, sur photo ou par enregistrement.</p>
    </div>
    <ul class="rdv__coordonnees">
      <li><?= icone('telephone') ?><a href="tel:<?= e(TELEPHONE_LIEN) ?>"><?= e(TELEPHONE) ?></a></li>
      <li><?= icone('email') ?><a href="mailto:<?= e(EMAIL) ?>"><?= e(EMAIL) ?></a></li>
      <li><?= icone('lieu') ?><span><?= e(ADRESSE_LIEU) ?>, <?= e(ADRESSE_RUE) ?>, <?= e(ADRESSE_VILLE) ?></span></li>
    </ul>
    <p class="rdv__action"><a class="bouton bouton--lumiere" href="contact.php#formulaire">Écrire un message</a></p>
  </div>
</section>
<?php endif; ?>
</main>

<footer class="pied sombre">
  <div class="pied__arbre" aria-hidden="true"></div>
  <div class="conteneur pied__grille">
    <div class="pied__marque">
      <a class="marque" href="index.php">
        <span class="marque__arbre" aria-hidden="true"></span>
        <span class="marque__texte">
          <span class="marque__nom"><?= e(SITE_NOM) ?></span>
          <span class="marque__metier"><?= e(SITE_METIER) ?></span>
        </span>
      </a>
      <p class="pied__devise">Aller à la découverte de soi est le plus beau voyage que l’on puisse entreprendre.</p>
      <ul class="reseaux">
        <li><a href="<?= e(URL_FACEBOOK) ?>" target="_blank" rel="noopener"><?= icone('facebook') ?><span class="visuellement-cache">Facebook</span></a></li>
        <li><a href="<?= e(URL_INSTAGRAM) ?>" target="_blank" rel="noopener"><?= icone('instagram') ?><span class="visuellement-cache">Instagram</span></a></li>
      </ul>
    </div>

    <nav class="pied__colonne" aria-labelledby="pied-seances">
      <h2 class="pied__titre" id="pied-seances">Séances</h2>
      <ul>
        <li><a href="seances.php#guidance">Guidance</a></li>
        <li><a href="seances.php#soin">Soin énergétique</a></li>
        <li><a href="seances.php#meditation">Méditation connectée</a></li>
        <li><a href="accompagnement-energetique.php">Accompagnement personnalisé</a></li>
        <li><a href="animaux.php">Animaux</a></li>
        <li><a href="nettoyage-energetique-lieux.php">Nettoyage de lieux</a></li>
      </ul>
    </nav>

    <nav class="pied__colonne" aria-labelledby="pied-site">
      <h2 class="pied__titre" id="pied-site">À découvrir</h2>
      <ul>
        <li><a href="temoignages.php">Témoignages</a></li>
        <li><a href="references-bibliographiques.php">Lectures</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
    </nav>

    <div class="pied__colonne">
      <h2 class="pied__titre">Me trouver</h2>
      <address>
        <?= e(ADRESSE_LIEU) ?><br><?= e(ADRESSE_RUE) ?><br><?= e(ADRESSE_VILLE) ?><br>
        <a href="tel:<?= e(TELEPHONE_LIEN) ?>"><?= e(TELEPHONE) ?></a><br>
        <a href="mailto:<?= e(EMAIL) ?>"><?= e(EMAIL) ?></a>
      </address>
    </div>
  </div>

  <div class="conteneur pied__bas">
    <p>Toutes les prestations que je propose ne se substituent pas à un avis ou à un traitement médical.</p>
    <ul>
      <li><a href="mentions-legales.php">Mentions légales</a></li>
      <li><a href="politique-de-confidentialite.php">Politique de confidentialité</a></li>
      <li><a href="conditions-generales-de-vente.php">Conditions générales de vente</a></li>
    </ul>
  </div>
</footer>
</body>
</html>
