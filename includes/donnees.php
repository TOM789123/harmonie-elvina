<?php
/**
 * Contenus partagés entre les pages : séances, autres accompagnements, témoignages.
 * Les textes sont ceux du site actuel (quelques fautes de frappe évidentes corrigées, voir LISEZMOI).
 */
declare(strict_types=1);

$FRAIS_KM = 'Pour tout déplacement à domicile, les frais kilométriques sont à ajouter au montant de la séance.';

$SEANCES = [
    'guidance' => [
        'titre'    => 'Guidance',
        'icone'    => 'guidance',
        'accroche' => "Une question ? Besoin d'un éclairage concernant une situation ?",
        'texte'    => [
            "Une séance de guidance où je reçois des informations sous différentes formes qui nous permettent d'explorer ensemble les multiples potentiels qui se présentent à vous.",
        ],
        'resume'   => ['Durée' => '30 minutes', 'Lieu' => 'À distance', 'Tarif' => '45 €'],
        'pratique' => [
            'Déroulement' => ['Uniquement à distance, via une visio WhatsApp.'],
            'Durée'       => ['30 minutes.'],
            'Tarif'       => ['45 €, réglés par virement bancaire lors de la prise de rendez-vous.'],
        ],
        'notes'    => [],
    ],
    'soin' => [
        'titre'    => 'Soin énergétique',
        'icone'    => 'soin',
        'accroche' => "Nous allons à la racine de ces maux car pour moi, il est essentiel d'aller à leur rencontre pour écouter ce qu'ils ont à nous dire.",
        'texte'    => [
            "Que ce soit un nettoyage énergétique, un accompagnement à laisser s'exprimer les émotions qui ont besoin de l'être ou encore des douleurs physiques, je fonctionne de la même manière : nous allons à la racine de ces maux car pour moi, il est essentiel d'aller à leur rencontre pour écouter ce qu'ils ont à nous dire.",
        ],
        'resume'   => ['Durée' => '45 minutes', 'Lieu' => 'Cabinet, domicile ou à distance', 'Tarif' => '70 €'],
        'pratique' => [
            'Déroulement' => ['À mon cabinet, à domicile ou à distance sur photo.'],
            'Durée'       => ['45 minutes.'],
            'Tarif'       => ['70 €, réglés en espèces, en chèque ou par virement bancaire. Si le rendez-vous a lieu à distance : règlement par virement bancaire lors de la prise de rendez-vous.'],
        ],
        'notes'    => [$FRAIS_KM],
    ],
    'meditation' => [
        'titre'    => 'Méditation connectée',
        'icone'    => 'meditation',
        'accroche' => "Un temps de pause, de retour à toi, une méditation connectée que je canalise pour t'offrir ce que tu as besoin de recevoir.",
        'texte'    => [
            "Un temps de pause, de retour à toi, une méditation connectée que je canalise pour t'offrir ce que tu as besoin de recevoir.",
        ],
        'resume'   => ['Durée' => '20 à 45 minutes', 'Lieu' => 'Cabinet, domicile ou à distance', 'Tarif' => '60 € ou 70 € (enregistrée)'],
        'pratique' => [
            'Déroulement' => [
                'À mon cabinet, à domicile ou à distance (visio WhatsApp ou enregistrement).',
                "Pour une méditation connectée enregistrée et transmise via WhatsApp, merci de m'envoyer une photo récente de vous en amont.",
            ],
            'Durée'       => ['Variable, entre 20 et 45 minutes.'],
            'Tarif'       => [
                '60 € pour une méditation connectée en cabinet ou à domicile, réglés en espèces, en chèque ou par virement bancaire.',
                '70 € pour une méditation connectée enregistrée, réglés par virement bancaire lors de la prise de rendez-vous.',
            ],
        ],
        'notes'    => [$FRAIS_KM],
    ],
    'accompagnement' => [
        'titre'    => 'Accompagnement énergétique personnalisé',
        'icone'    => 'accompagnement',
        'accroche' => "Ensemble, nous pouvons aller chercher en profondeur ce qui fait barrage, ce qui a besoin d'être dénoué, mis en lumière.",
        'resume'   => ['Rythme' => 'Plusieurs séances, espacées d’au moins 15 jours', 'Première séance' => '1 h 15', 'Tarif' => '115 €, puis 90 € et 80 €'],
        'url'      => 'accompagnement-energetique.php',
    ],
];

$AUTRES = [
    'animaux' => [
        'titre' => 'Communication & soins aux animaux',
        'icone' => 'animaux',
        'texte' => "Je te propose d'entrer en communication avec ton animal si tu souhaites discuter avec lui ou si tu as des questions à lui poser.",
        'url'   => 'animaux.php',
        'lien'  => 'Les séances pour les animaux',
    ],
    'nettoyage' => [
        'titre' => 'Nettoyage énergétique de lieux',
        'icone' => 'lieux',
        'texte' => 'Pour cette prestation, nous intervenons à deux afin de nettoyer énergétiquement ton lieu de vie mais aussi ton espace de travail.',
        'url'   => 'nettoyage-energetique-lieux.php',
        'lien'  => 'Le nettoyage de lieux',
    ],
];

/* Témoignages (page « Vos témoignages » du site actuel, textes non modifiés). « vedette » : affichés sur l'accueil. */
$TEMOIGNAGES = [
    ['date' => '2024-12-21', 'auteur' => 'Sandra', 'texte' => "Mille mercis pour la méditation! Aucun soucis pour le son, c'est très peu et le peut qu'on entend n'est pas gênant du tout pour l'expérience car cela m'a parlé au niveau corporel aussi ! J'ai senti des résistances à lâcher de mon côté et en même temps, je sens qu'un travail a commencé et je vais pouvoir le poursuivre en faisant régulièrement cette méditation. C'est pour moi un bel outil de guérison dont j'ai besoin en ce moment, et c'est ce qu'il me fallait. Merci et BRAVO à toi !"],
    ['date' => '2024-12-10', 'auteur' => 'Aurore Della-Siega', 'vedette' => true, 'texte' => "Merci beaucoup Harmonie pour toute la douceur, la bienveillance et le bien-être que tu m’apportes pendant ma grossesse. J’étais très fatiguée et tu as su me redonner de l’énergie et un mieux-être. Tu es toujours très à l’écoute et cela fait un bien fou. Encore merci."],
    ['date' => '2024-10-23', 'auteur' => 'Anne Blobel', 'vedette' => true, 'texte' => "J'ai pu faire une guidance avec Harmonie Elvina et ce fut un moment magnifique et très émouvant. Elle a pu me donner des informations très précises et utiles en lien avec mon développement professionnel. C'était concret et très juste. Merci infiniment pour cet échange Je vous recommande vivement de la contacter"],
    ['date' => '2024-05-12', 'auteur' => 'Sébastien Chalon Dorison', 'texte' => "Harmonie a réussi à faire en sorte de me sentir apaisé et détendu comme jamais. Des douleurs au genou gauche et au talon droit avaient disparues à la fin de la séance. En milieu de séance, je me suis senti deux fois \"rempli\" d'une vague d'énergie et de bien être de la tête aux pieds puis des pieds à la tête, et tout au long de la séance, grâce aux mains chaudes et apaisantes d'Harmonie, la musique personnalisée, les vibrations des instruments choisis, j'étais dans une bulle de bien être que je n'avais pas ressenti depuis longtemps. Merci mille et une fois pour ce moment à moi."],
    ['date' => '2024-05-11', 'auteur' => 'Adeline Chalon-Tarnaud', 'texte' => "J'ai de gros problèmes de santé avec des traitements médicaux depuis presque 10 ans. Harmonie à réussi à m'apaiser avec musique, encens, pierres, tambour et surtout \"elle\" avec ses mains chaudes qui parcouraient mes douleurs. Même Kaïna (la chatte) est venue travailler sur moi. Je suis reparti après 1h de bonheur. Merci encore"],
    ['date' => '2024-04-20', 'auteur' => 'FanyFany Stéphanie', 'texte' => "J'ai eu la chance de bénéficier d'un soin énergétique avec harmonie c'était une séance au top avec douceur harmonie et très professionnelle est à l'écoute de la personne si vous souhaitez profiter de ses services alors allez y sans hésité merci beaucoup a toi vraiment."],
    ['date' => '2023-10-06', 'auteur' => 'Axe Petitcollot', 'texte' => "Très bonne expérience dans la purification des lieux et communication défunt, même si ce n’est pas simple, Harmonie sait guider et expliquer simplement."],
    ['date' => '2023-01-02', 'auteur' => 'Anne Sophie Renouard', 'texte' => "J'ai bénéficié d'une guidance de la part d'Harmonie. Celle ci a pris tout son sens les jours qui ont suivi."],
    ['date' => '2022-11-20', 'auteur' => 'Sarah Guilloteaux', 'texte' => "Après un soin énergétique, je recommande les yeux fermés, Harmonie est une personne douce, disponible à qui on peut faire confiance."],
    ['date' => '2022-11-08', 'auteur' => 'Guinguette Armance', 'texte' => "Très bon soin énergétique, je recommande vivement."],
    ['date' => '2022-11-03', 'auteur' => 'Laeticia Peix', 'texte' => "J'ai pu bénéficier de nombreuses prestations (guidances, méditations etc) qui ont toujours répondu à mes besoins... Harmonie s'adapte à votre demande et vous propose un accompagnement personnalisé. Un accueil chaleureux qui permet de se sentir en confiance... Je recommande les yeux fermés."],
    ['date' => '2022-10-30', 'auteur' => 'Michael Maîtrehenri', 'texte' => "Sorti de ma séance très détendu ! Très efficace ! Me sent bien je le recommande vivement. Merci Harmonie."],
    ['date' => '2022-10-28', 'auteur' => "Fa'N'y", 'texte' => "Très agréable, j'y suis allez aujourd'hui pour un soin je reviendrai je recommande. Très professionnelle et à l'écoute. Merci à toi."],
    ['date' => '2022-10-25', 'auteur' => 'Lou Lou', 'texte' => "Très bien, je recommande les yeux fermés."],
    ['date' => '2022-10-23', 'auteur' => 'Laurianne Mths', 'vedette' => true, 'texte' => "J’ai consulté Harmonie dans le courant de l’été. J’avais des insomnies et du mal à arrêter mes pensées. Après un soin et des conseils je dors mieux et j’arrive à mieux discipliner mes pensées pour me reconcentrer sur l’instant présent. Merci."],
    ['date' => '2022-10-22', 'auteur' => 'Alexandra Derosin', 'texte' => "Je suis allée voir Harmonie pour différents soins (guidances, méditations...) et je peux vous affirmer que je me sentais bien mieux après, moins stressée, plus détendue et sereine. Vous pouvez y aller les yeux fermés. Harmonie est une professionnelle digne de confiance, très agréable et à l'écoute de vos besoins."],
    ['date' => '2022-10-21', 'auteur' => 'Shereen Devulder', 'texte' => "J'ai pour ma part testé les soins énergétiques par apposition des mains et les méditations guidées. C'était vraiment super et j'ai ressenti un vrai bien-être me traverser le corps. Les méditations guidées sont aussi vraiment exceptionnelles, au point qu'émane d'Harmonie un son de voix venu d'ailleurs qui vous transporte ailleurs. Un grand merci pour ce séances Harmonie !!!!"],
];
