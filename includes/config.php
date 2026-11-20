<?php
/**
 * Configuration du site Harmonie Elvina.
 * Copie du site Wix : https://harmoniefeval.wixsite.com/harmonie-elvina-2
 */
declare(strict_types=1);

const SITE_NOM = 'Harmonie Elvina';

/*
 * Formulaire de contact.
 * À CONFIRMER avec la cliente : le site Wix affiche deux adresses e-mail différentes
 *   - harmonie.feval@gmail.com  (pied de la page d'accueil)
 *   - harmonie.elvina@gmail.com (page Contact et page Nettoyage énergétique de lieux)
 */
const CONTACT_DESTINATAIRE = 'harmonie.elvina@gmail.com';

/*
 * Adresse d'expédition technique des e-mails du formulaire : construite à partir du domaine
 * qui sert le site (ne-pas-repondre@domaine), pour rester valable sur l'adresse provisoire
 * puis sur le nom de domaine définitif. Aucune boîte mail n'est nécessaire : les messages
 * partent vers CONTACT_DESTINATAIRE, et « Répondre » vise l'e-mail du visiteur.
 */
$hoteSite = strtolower(preg_replace('/:\d+$/', '', (string) ($_SERVER['HTTP_HOST'] ?? '')));
$hoteSite = preg_replace('/^www\./', '', preg_replace('/[^a-z0-9.-]/', '', $hoteSite));
define('CONTACT_EXPEDITEUR', 'ne-pas-repondre@' . ($hoteSite !== '' ? $hoteSite : 'localhost'));

const URL_FACEBOOK  = 'https://www.facebook.com/HarmonieElvina/';
const URL_INSTAGRAM = 'https://www.instagram.com/harmonie_elvina/';

/* Flori'Âme (binôme du nettoyage énergétique de lieux) */
const URL_FLORIAME           = 'https://www.flori-ame.com/';
const URL_FLORIAME_FACEBOOK  = 'https://www.facebook.com/FloriameAccompagnementIntuitif';
const URL_FLORIAME_INSTAGRAM = 'https://www.instagram.com/flori_ame_/';

/*
 * Menu principal : mêmes entrées, même ordre et mêmes libellés que le menu Wix
 * (mis à jour le 15/11/2026 : « Séances » mène à la page détaillée, ajout de « Animaux »,
 * « Nettoyage énergétique de lieux » mène à la page interne).
 */
$MENU = [
    ['cle' => 'accueil',    'label' => 'Accueil',                        'url' => 'index.php'],
    ['cle' => 'seances',    'label' => 'Séances',                        'url' => 'guidance-soin-meditation.php'],
    ['cle' => 'animaux',    'label' => 'Animaux',                        'url' => 'animaux.php'],
    ['cle' => 'nettoyage',  'label' => 'Nettoyage énergétique de lieux', 'url' => 'nettoyage-energetique-lieux.php'],
    ['cle' => 'references', 'label' => 'Références bibliographiques',    'url' => 'references-bibliographiques.php'],
    ['cle' => 'contact',    'label' => 'Contact',                        'url' => 'contact.php'],
];
