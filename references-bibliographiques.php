<?php
/* Références bibliographiques */
$page = [
    'cle'         => 'lectures',
    'titre'       => 'Références bibliographiques',
    'description' => 'Les lectures qui accompagnent le cheminement d’Harmonie Elvina : cristaux, langage du corps, émotions, méditation, voie toltèque…',
];
require __DIR__ . '/includes/entete.php';

$LIVRES = [
    ['Mily Robin', ['Des pierres et des cristaux']],
    ['Kareen Frazier', ['Les cristaux pour débutant']],
    ['Martin Brofman', ['Voir de mieux en mieux', 'Tout peut être guéri']],
    ['Roger Flammetti', ['Les cartes du langage émotionnel du corps']],
    ['Jacques Martel', ['Le grand dictionnaire des malaises et des maladies']],
    ['Bernard Werber', ['Demain les chats', 'Sa majesté des chats', 'La planète des chats']],
    ['Art-Mela', ['Émotions : enquête et mode d’emploi (tomes 1 à 3)', 'Friandises philosophiques (tomes 1 et 2)', 'Allô moi-m’aime ?']],
    ['Luc Bigé', ['Petit dictionnaire en langue des oiseaux']],
    ['Inna Segal', ['Le langage secret de votre corps']],
    ['Claire Thomas & Filali', ['L’âme et le karma (tomes 1 et 2)', 'À la découverte de soi']],
    ['Fabienne Goddyn', ['La nature sacrée de la femme']],
    ['Michel Odoul', ['Dis-moi où tu as mal']],
    ['Pierre-Jean Thomas-Lamotte', ['Et si la maladie n’était pas un hasard']],
    ['Dr Wayne W. Dyer', ['Vos zones erronées']],
    ['Lise Bourbeau', ['Les 5 blessures qui empêchent d’être soi-même', 'La guérison des 5 blessures', 'La puissance de l’acceptation']],
    ['Louise Hay', ['Transformez votre vie']],
    ['Sonia Lyubomirsky', ['Qu’est-ce qui nous rend vraiment heureux ?']],
    ['Don Miguel Ruiz', ['Les quatre accords toltèques', 'Le cinquième accord toltèque', 'Pratique de la voie toltèque', 'La maîtrise de l’amour', 'L’art de vivre des toltèques']],
    ['Thich Nhat Hanh', ['Commencer à méditer', 'La sérénité de l’instant', 'Prendre soin de l’enfant intérieur']],
    ['Rebekka Gabriela Specht', ['Dialoguer avec l’âme du bébé']],
    ['Irène Grosjean', ['La vie en abondance']],
    ['Caroline Michel & Patrick Papazian', ['Chouchoutez votre vagin']],
    ['Heidi Beroud-Poyet & Laura Beltran', ['Les femmes et leur sexe']],
];

/** « A », « A et B », « A, B et C » */
function titres(array $titres): string
{
    $cites = array_map(static fn ($t) => '<cite>' . e($t) . '</cite>', $titres);
    $dernier = array_pop($cites);
    return $cites ? implode(', ', $cites) . ' et ' . $dernier : $dernier;
}
?>
<?= hero_page('Références bibliographiques', 'Parce qu’il me tient à cœur de vous partager les lectures qui accompagnent mon cheminement.') ?>

<section class="section">
  <div class="conteneur">
    <ul class="lectures">
<?php foreach ($LIVRES as [$auteur, $liste]): ?>
      <li><span class="lectures__auteur"><?= e($auteur) ?></span><span class="lectures__titres"><?= titres($liste) ?></span></li>
<?php endforeach; ?>
    </ul>
  </div>
</section>

<section class="section section--lichen" aria-labelledby="extrait-titre">
  <div class="conteneur"><div class="prose">
    <h2 id="extrait-titre">Un texte que je trouve magnifique, puissant et juste</h2>
    <p>Voici un texte issu du chapitre 31 du livre de Bernard Werber <cite>Demain les chats</cite>.</p>
    <!-- Extrait non recopié (texte protégé par le droit d'auteur) : à reprendre depuis le site actuel si la cliente souhaite le conserver. -->
    <p class="a-completer">Emplacement de l’extrait de <cite>Demain les chats</cite> (chapitre 31), à reprendre du site actuel.</p>
  </div></div>
</section>
<?php require __DIR__ . '/includes/pied.php'; ?>
