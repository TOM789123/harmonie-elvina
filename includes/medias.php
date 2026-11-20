<?php
/**
 * Médias du site : fichier local (dans assets/img/) => source sur le CDN Wix.
 *
 * - img() sert le fichier local s'il existe, sinon la source Wix (repli temporaire).
 * - outils/recuperer-medias.php télécharge tous ces fichiers en local.
 *
 * Les tailles sont déjà réduites par le service d'images Wix (les originaux
 * font jusqu'à 4,4 Mo) : 2x la taille d'affichage environ.
 *
 * Les ornements (couronnes, feuillages, séparateurs, livres, « Merci ») sont des SVG
 * originaux dans assets/img/deco/ : ils ne viennent pas de Wix et ne sont pas listés ici.
 */
declare(strict_types=1);

const WIX_MEDIA  = 'https://static.wixstatic.com/media/';

$MEDIAS = [
    /* --- Photos et visuels importés par la cliente --- */
    'arbre-cote.jpg'                 => WIX_MEDIA . 'fd3a71_875d98185a8f4de195587b2d3c29349b~mv2.jpg/v1/fill/w_445,h_2900,al_c,q_75/arbre-cote.jpg',
    'arbre-cote-seances.jpg'         => WIX_MEDIA . 'fd3a71_b7a8f237ad1347e28d44db226002bdae~mv2.jpg/v1/fill/w_445,h_2900,al_c,q_75/arbre-cote-seances.jpg',
    'logo-harmonie-elvina.png'       => WIX_MEDIA . 'fd3a71_1b8c27a19e2d435088dc37208743e9ff~mv2.png/v1/fit/w_560,h_560/logo-harmonie-elvina.png',
    'chemin-foret.jpg'               => WIX_MEDIA . 'fd3a71_6ffebc263c134430a6a85370f655795f~mv2.jpg/v1/fill/w_1400,h_878,al_c,q_75/chemin-foret.jpg',
    'portrait-harmonie.jpg'          => WIX_MEDIA . 'fd3a71_60a7495533244e6793dea12b8a53c0cb~mv2.jpg/v1/fill/w_360,h_427,al_c,q_85/portrait-harmonie.jpg',
    'icone-facebook.png'             => WIX_MEDIA . 'fd3a71_0c229a7e5a164feab3e24b13708b1b5e~mv2.png/v1/fit/w_150,h_150/icone-facebook.png',
    'icone-instagram.png'            => WIX_MEDIA . 'fd3a71_0aa4b7c34b0b494d8ef83f07dc305c7e~mv2.png/v1/fit/w_150,h_150/icone-instagram.png',
    'icone-soin-energetique.png'     => WIX_MEDIA . 'fd3a71_f5b12946700845c397f834fa6fd5b590~mv2.png',
    'icone-meditation.png'           => WIX_MEDIA . 'fd3a71_2d89ea967e384cf49f300182842300a2~mv2.png',
    'accompagnement.jpg'             => WIX_MEDIA . 'fd3a71_2c7643ae96fd45429e595e44879a7c66~mv2.jpg/v1/fill/w_420,h_572,al_c,q_85/accompagnement.jpg',
    'logo-nettoyage-energetique.png' => WIX_MEDIA . 'fd3a71_628d169a93dc4f4e9a96430530748ddd~mv2.png/v1/fit/w_520,h_520/logo-nettoyage-energetique.png',
    'animaux.jpg'                    => WIX_MEDIA . 'fd3a71_1eada063350048bd8b74a589cad0eea6~mv2.jpg/v1/fill/w_660,h_440,al_c,q_85/animaux.jpg',
    'photo-bas-de-page.jpg'          => WIX_MEDIA . 'fd3a71_49a3ac2433c7496db52f6aadbe10daf7~mv2.jpg/v1/fill/w_460,h_262,al_c,q_85/photo-bas-de-page.jpg',
    'icone-arbre.png'                => WIX_MEDIA . 'fd3a71_22d6fb7746eb4141a4b687f0433141b2~mv2.png/v1/fit/w_280,h_280/icone-arbre.png',
    'foret-contact.jpg'              => WIX_MEDIA . 'fd3a71_a398d166c5074558b2398d96b906aad0~mv2.jpg/v1/fill/w_1830,h_458,al_c,q_75/foret-contact.jpg',

];
