<?php
/* Vos témoignages — Wix : /vos-témoignages (page non reliée au menu sur Wix) */
$page = ['cle' => 'temoignages', 'titre' => 'Vos témoignages'];
require __DIR__ . '/includes/entete.php';

$temoignages = [
    ['21/12/2024', 'Sandra', "Mille mercis pour la méditation! Aucun soucis pour le son, c'est très peu et le peut qu'on entend n'est pas gênant du tout pour l'expérience car cela m'a parlé au niveau corporel aussi ! J'ai senti des résistances à lâcher de mon côté et en même temps, je sens qu'un travail a commencé et je vais pouvoir le poursuivre en faisant régulièrement cette méditation. C'est pour moi un bel outil de guérison dont j'ai besoin en ce moment, et c'est ce qu'il me fallait. Merci et BRAVO à toi !"],
    ['10/12/2024', 'Aurore Della-Siega', "Merci beaucoup Harmonie pour toute la douceur, la bienveillance et le bien-être que tu m’apportes pendant ma grossesse. J’étais très fatiguée et tu as su me redonner de l’énergie et un mieux-être. Tu es toujours très à l’écoute et cela fait un bien fou. Encore merci."],
    ['23/10/2024', 'Anne Blobel', "J'ai pu faire une guidance avec {FACEBOOK} et ce fut un moment magnifique et très émouvant. Elle a pu me donner des informations très précises et utiles en lien avec mon développement professionnel. C'était concret et très juste. Merci infiniment pour cet échange Je vous recommande vivement de la contacter"],
    ['12/05/2024', 'Sébastien Chalon Dorison', "Harmonie a réussi à faire en sorte de me sentir apaisé et détendu comme jamais. Des douleurs au genou gauche et au talon droit avaient disparues à la fin de la séance. En milieu de séance, je me suis senti deux fois \"rempli\" d'une vague d'énergie et de bien être de la tête aux pieds puis des pieds à la tête, et tout au long de la séance, grâce aux mains chaudes et apaisantes d'Harmonie, la musique personnalisée, les vibrations des instruments choisis, j'étais dans une bulle de bien être que je n'avais pas ressenti depuis longtemps. Merci mille et une fois pour ce moment à moi."],
    ['11/05/2024', 'Adeline Chalon-Tarnaud', "J'ai de gros problèmes de santé avec des traitements médicaux depuis presque 10 ans. Harmonie à réussi à m'apaiser avec musique, encens, pierres, tambour et surtout \"elle\" avec ses mains chaudes qui parcouraient mes douleurs. Même Kaïna (la chatte) est venue travailler sur moi. Je suis reparti après 1h de bonheur. Merci encore"],
    ['20/04/2024', 'FanyFany Stéphanie', "J'ai eu la chance de bénéficier d'un soin énergétique avec harmonie c'était une séance au top avec douceur harmonie et très professionnelle est à l'écoute de la personne si vous souhaitez profiter de ses services alors allez y sans hésité merci beaucoup a toi vraiment."],
    ['06/10/2023', 'Axe Petitcollot', "Très bonne expérience dans la purification des lieux et communication défunt, même si ce n’est pas simple, Harmonie sait guider et expliquer simplement."],
    ['02/01/2023', 'Anne Sophie Renouard', "J'ai bénéficié d'une guidance de la part d'Harmonie. Celle ci a pris tout son sens les jours qui ont suivi."],
    ['20/11/2022', 'Sarah Guilloteaux', "Après un soin énergétique, je recommande les yeux fermés, Harmonie est une personne douce, disponible à qui on peut faire confiance."],
    ['08/11/2022', 'Guinguette Armance', "Très bon soin énergétique, je recommande vivement."],
    ['03/11/2022', 'Laeticia Peix', "J'ai pu bénéficier de nombreuses prestations (guidances, méditations etc) qui ont toujours répondu à mes besoins... Harmonie s'adapte à votre demande et vous propose un accompagnement personnalisé. Un accueil chaleureux qui permet de se sentir en confiance... Je recommande les yeux fermés."],
    ['30/10/2022', 'Michael Maîtrehenri', "Sorti de ma séance très détendu ! Très efficace ! Me sent bien je le recommande vivement. Merci Harmonie."],
    ['28/10/2022', "Fa'N'y", "Très agréable, j'y suis allez aujourd'hui pour un soin je reviendrai je recommande. Très professionnelle et à l'écoute. Merci à toi."],
    ['25/10/2022', 'Lou Lou', "Très bien, je recommande les yeux fermés."],
    ['23/10/2022', 'Laurianne Mths', "J’ai consulté Harmonie dans le courant de l’été. J’avais des insomnies et du mal à arrêter mes pensées. Après un soin et des conseils je dors mieux et j’arrive à mieux discipliner mes pensées pour me reconcentrer sur l’instant présent. Merci."],
    ['22/10/2022', 'Alexandra Derosin', "Je suis allée voir Harmonie pour différents soins (guidances, méditations...) et je peux vous affirmer que je me sentais bien mieux après, moins stressée, plus détendue et sereine. Vous pouvez y aller les yeux fermés. Harmonie est une professionnelle digne de confiance, très agréable et à l'écoute de vos besoins."],
    ['21/10/2022', 'Shereen Devulder', "J'ai pour ma part testé les soins énergétiques par apposition des mains et les méditations guidées. C'était vraiment super et j'ai ressenti un vrai bien-être me traverser le corps. Les méditations guidées sont aussi vraiment exceptionnelles, au point qu'émane d'Harmonie un son de voix venu d'ailleurs qui vous transporte ailleurs. Un grand merci pour ce séances Harmonie !!!!"],
];
$lienFacebook = '<a href="' . e(URL_FACEBOOK) . '" target="_blank" rel="noopener">Harmonie Elvina</a>';
?>
<h1 class="titre-page">VOS TEMOIGNAGES</h1>

<ul class="temoignages">
<?php foreach ($temoignages as [$date, $auteur, $texte]): ?>
  <li>
    <p><b><?= e($date) ?></b> - <?= e($auteur) ?></p>
    <p><?= str_replace('{FACEBOOK}', $lienFacebook, e($texte)) ?></p>
  </li>
<?php endforeach; ?>
</ul>

<img class="temoignages__deco" src="<?= e(img('deco/brin.svg')) ?>" width="82" height="97" alt="">

<div class="temoignages__fin">
  <p>~ Si vous aussi vous souhaitez partager votre expérience, rendez-vous à la page contact ~</p>
  <p>~ Davantage de témoignages sur ma page Facebook : <a class="u" href="https://www.facebook.com/HarmonieElvina" target="_blank" rel="noopener">https://www.facebook.com/HarmonieElvina</a> ~</p>
</div>

<img class="temoignages__merci" src="<?= e(img('deco/merci.svg')) ?>" width="100" height="75" alt="Merci">
<?php require __DIR__ . '/includes/pied.php'; ?>
