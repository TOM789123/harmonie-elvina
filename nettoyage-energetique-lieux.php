<?php
/* Nettoyage énergétique de lieux (en binôme avec Flori'Âme) */
$page = [
    'cle'         => 'nettoyage',
    'titre'       => 'Nettoyage énergétique de lieux',
    'description' => 'Nettoyage énergétique de lieux de vie et de travail par Harmonie & Flori’Âme, deux médiums : méthode, signes, tarif.',
    'rdv'         => false,
];
require __DIR__ . '/includes/entete.php';

$visuel = '<div class="medaillon">' . photo('logo-nettoyage', 'Logo Nettoyage énergétique de lieux', '17rem', ['loading' => 'eager']) . '</div>';
$sommaire = '<ul class="sommaire">'
    . '<li><a href="#qui">Qui sommes-nous ?</a></li>'
    . '<li><a href="#methode">Notre méthode</a></li>'
    . '<li><a href="#tarif">Tarif</a></li>'
    . '<li><a href="#contact">Nous contacter</a></li>'
    . '</ul>';
?>
<?= hero_page('Nettoyage énergétique de lieux', 'Pour cette prestation, nous intervenons à deux afin de nettoyer énergétiquement ton lieu de vie mais aussi ton espace de travail.', $visuel, [], $sommaire) ?>

<section class="section section--serree">
  <div class="conteneur">
    <div class="prose">
      <p class="chapeau">Grâce à notre complémentarité, nous nous connectons à ton lieu afin de repérer les possibles dysfonctionnements énergétiques et de procéder ensuite au nettoyage énergétique complet qui comprend aussi une harmonisation et un rééquilibrage des énergies.</p>
      <p>Pour en savoir davantage, je t’invite à prendre connaissance de la suite…</p>
    </div>
  </div>
</section>

<section class="section section--lichen" id="qui" aria-labelledby="qui-titre">
  <div class="conteneur">
    <div class="titre-section">
      <h2 id="qui-titre">Qui sommes-nous ?</h2>
      <p>Nous sommes Harmonie &amp; Flori’Âme, deux médiums réunies par une même vision : accompagner les personnes vers plus d’harmonie au sein de leur lieu de vie.</p>
    </div>
    <div class="prose prose--avant-bloc">
      <p>Notre collaboration est née naturellement, portée par la complémentarité de nos perceptions et la volonté commune d’offrir des nettoyages énergétiques de lieux profonds et sécurisés.</p>
    </div>
    <div class="deux-colonnes">
      <article class="profil">
        <h3>Harmonie</h3>
        <p class="profil__role">Médium énergéticienne</p>
        <p>Médium énergéticienne, mes capacités me permettent de voir, de ressentir, d’entendre et de communiquer avec les mondes subtils : âmes, guides, défunts, animaux, énergies des lieux et objets.</p>
        <p>Suite à ma rencontre avec Fabienne Casabianca et Sorine Andrée en 2021, j’ai choisi d’approfondir ce chemin qui m’appelait depuis l’enfance.</p>
        <p>En 2025, j’ai rencontré Flori’Âme et de cette rencontre est née l’envie de proposer ensemble des nettoyages énergétiques de lieux.</p>
      </article>
      <article class="profil">
        <h3>Flori’Âme</h3>
        <p class="profil__role">Médium</p>
        <p>Médium, je me connecte aux mondes subtils grâce à la clairvoyance, la clairaudience et la clairsentience.</p>
        <p>En 2022, j’ai entrepris un chemin de développement de mes capacités auprès de Fabienne Casabianca et Sorine Andrée, guidée par l’intuition que ces perceptions faisaient déjà partie de moi.</p>
        <p>Depuis, j’ai participé à plusieurs stages de développement ainsi qu’à une formation dédiée à la purification énergétique des lieux. Ce parcours me permet aujourd’hui d’accompagner avec sensibilité les lieux et leurs habitants.</p>
      </article>
    </div>
  </div>
</section>

<section class="section">
  <div class="conteneur deux-colonnes">
    <div class="prose">
      <h2>Pourquoi travailler en binôme ?</h2>
      <p>Intervenir à deux nous permet :</p>
      <ul class="liste-feuille">
        <li>de regrouper nos capacités</li>
        <li>d’élargir notre champ d’action</li>
        <li>d’effectuer un nettoyage plus approfondi</li>
        <li>d’assurer une meilleure sécurité énergétique</li>
      </ul>
      <p class="apres-liste">Nous intervenons principalement à distance, une méthode que nos expériences ont confirmée comme tout aussi efficace qu’en présentiel.</p>
    </div>
    <div class="prose">
      <h2>Qu’est-ce qu’un nettoyage énergétique de lieu ?</h2>
      <p>Le nettoyage énergétique consiste à purifier, harmoniser et rééquilibrer les énergies d’un lieu. Nous nous connectons à l’âme du lieu et aux différentes présences afin de libérer ce qui doit l’être et restaurer une ambiance plus sereine. Ce travail permet aux habitants de se réapproprier pleinement leur espace de vie.</p>
      <p>Le nettoyage peut inclure :</p>
      <ul class="liste-feuille">
        <li>libération des énergies lourdes</li>
        <li>nettoyage émotionnel du lieu</li>
        <li>harmonisation globale des énergies</li>
        <li>neutralisation d’influences négatives</li>
      </ul>
    </div>
  </div>
</section>

<section class="section sombre grain" aria-labelledby="signes-titre">
  <div class="conteneur">
    <div class="titre-section">
      <h2 id="signes-titre">Comment savoir si votre lieu a besoin d’un nettoyage énergétique ?</h2>
      <p>Quelques signes possibles :</p>
    </div>
    <ul class="liste-feuille liste-feuille--colonnes liste-feuille--grande">
      <li>sentiment de malaise ou d’oppression</li>
      <li>fatigue inhabituelle ou irritabilité</li>
      <li>conflits récurrents</li>
      <li>impression de présence</li>
      <li>bruits inexpliqués</li>
      <li>pannes ou incidents inhabituels</li>
    </ul>
  </div>
</section>

<section class="section section--lichen" id="methode" aria-labelledby="methode-titre">
  <div class="conteneur methode">
    <div>
      <div class="titre-section"><h2 id="methode-titre">Notre méthode</h2></div>
      <ol class="etapes etapes--compactes">
        <li><h3>Échange préalable</h3></li>
        <li><h3>Analyse via photos</h3></li>
        <li><h3>Retour sur nos perceptions</h3></li>
        <li><h3>Devis</h3></li>
        <li><h3>Nettoyage énergétique</h3></li>
        <li><h3>Suivi après intervention</h3></li>
      </ol>
    </div>
    <aside class="encadre" id="tarif" aria-labelledby="tarif-titre">
      <h2 id="tarif-titre" class="encadre__titre">Tarif de notre prestation</h2>
      <p class="tarif-grand">75 € de l’heure par intervenante</p>
      <p>Nous facturons 75 € de l’heure par intervenante.</p>
      <p><em>À titre d’exemple, un nettoyage de 2 h représente une facture totale de 300 €.</em></p>
    </aside>
  </div>
</section>

<section class="section" id="contact" aria-labelledby="contact-titre">
  <div class="conteneur">
    <div class="titre-section">
      <h2 id="contact-titre">Nous contacter</h2>
      <p>Pour plus d’informations, n’hésitez pas à nous contacter :</p>
    </div>
    <div class="duo-contact">
      <article class="duo-contact__carte">
        <h3>Harmonie</h3>
        <ul>
          <li><?= icone('email') ?><a href="mailto:<?= e(EMAIL) ?>"><?= e(EMAIL) ?></a></li>
          <li><?= icone('telephone') ?><a href="tel:<?= e(TELEPHONE_LIEN) ?>"><?= e(TELEPHONE) ?></a></li>
          <li><?= icone('facebook') ?><a href="<?= e(URL_FACEBOOK) ?>" target="_blank" rel="noopener">Facebook</a></li>
          <li><?= icone('instagram') ?><a href="<?= e(URL_INSTAGRAM) ?>" target="_blank" rel="noopener">Instagram</a></li>
        </ul>
      </article>
      <article class="duo-contact__carte">
        <h3>Floriane (Flori’Âme)</h3>
        <ul>
          <li><?= icone('email') ?><a href="mailto:<?= e(FLORIAME_EMAIL) ?>"><?= e(FLORIAME_EMAIL) ?></a></li>
          <li><?= icone('telephone') ?><a href="tel:<?= e(FLORIAME_TELEPHONE_LIEN) ?>"><?= e(FLORIAME_TELEPHONE) ?></a></li>
          <li><?= icone('web') ?><a href="<?= e(URL_FLORIAME) ?>" target="_blank" rel="noopener">www.flori-ame.com</a></li>
          <li><?= icone('facebook') ?><a href="<?= e(URL_FLORIAME_FACEBOOK) ?>" target="_blank" rel="noopener">Facebook</a></li>
          <li><?= icone('instagram') ?><a href="<?= e(URL_FLORIAME_INSTAGRAM) ?>" target="_blank" rel="noopener">Instagram</a></li>
        </ul>
      </article>
    </div>
  </div>
</section>
<?php require __DIR__ . '/includes/pied.php'; ?>
