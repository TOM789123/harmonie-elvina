<?php
/**
 * Harmonie Elvina — configuration du site (refonte).
 * Coordonnées, réseaux, navigation. Les contenus des séances et les témoignages sont dans donnees.php.
 */
declare(strict_types=1);

const SITE_NOM    = 'Harmonie Elvina';
const SITE_METIER = 'Médium énergéticienne';

/* Coordonnées (page Contact du site actuel) */
const TELEPHONE      = '06 59 41 22 94';
const TELEPHONE_LIEN = '+33659412294';
const EMAIL          = 'harmonie.elvina@gmail.com';
const ADRESSE_LIEU   = 'Espace du Moulin';
const ADRESSE_RUE    = '4 B Chemin du Moulin';
const ADRESSE_VILLE  = '89000 Saint-Georges-sur-Baulche';
const HORAIRES       = 'Uniquement sur rendez-vous, les mercredis et samedis matin';

const URL_FACEBOOK  = 'https://www.facebook.com/HarmonieElvina/';
const URL_INSTAGRAM = 'https://www.instagram.com/harmonie_elvina/';

/* Flori'Âme (binôme du nettoyage énergétique de lieux) */
const FLORIAME_EMAIL          = 'floriame.medium@gmail.com';
const FLORIAME_TELEPHONE      = '06 37 89 10 52';
const FLORIAME_TELEPHONE_LIEN = '+33637891052';
const URL_FLORIAME            = 'https://www.flori-ame.com/';
const URL_FLORIAME_FACEBOOK   = 'https://www.facebook.com/FloriameAccompagnementIntuitif';
const URL_FLORIAME_INSTAGRAM  = 'https://www.instagram.com/flori_ame_/';

/*
 * Formulaire de contact : destinataire et adresse d'expédition technique
 * (ne-pas-repondre@domaine du site, aucune boîte mail nécessaire).
 */
const CONTACT_DESTINATAIRE = EMAIL;
$hoteSite = strtolower(preg_replace('/:\d+$/', '', (string) ($_SERVER['HTTP_HOST'] ?? '')));
$hoteSite = preg_replace('/^www\./', '', preg_replace('/[^a-z0-9.-]/', '', $hoteSite));
define('CONTACT_EXPEDITEUR', 'ne-pas-repondre@' . ($hoteSite !== '' ? $hoteSite : 'localhost'));

/* Navigation principale (le logo mène à l'accueil, le bouton « Prendre rendez-vous » au contact) */
$NAV = [
    ['cle' => 'seances',     'label' => 'Séances',            'url' => 'seances.php'],
    ['cle' => 'animaux',     'label' => 'Animaux',            'url' => 'animaux.php'],
    ['cle' => 'nettoyage',   'label' => 'Nettoyage de lieux', 'url' => 'nettoyage-energetique-lieux.php'],
    ['cle' => 'temoignages', 'label' => 'Témoignages',        'url' => 'temoignages.php'],
    ['cle' => 'lectures',    'label' => 'Lectures',           'url' => 'references-bibliographiques.php'],
];
