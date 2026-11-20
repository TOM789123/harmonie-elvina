<?php
/**
 * Début de page commun.
 * Chaque page définit $page avant d'inclure ce fichier :
 *   cle      identifiant de la page (classe CSS, menu actif)
 *   titre    titre de l'onglet (suivi de « | Harmonie Elvina »)
 *   menu     entrée du menu à mettre en évidence si différente de cle
 *   fond     'clair' (#b9b2a8) ou 'fonce' (#a79a90), comme sur Wix
 *   bande    image des bandes latérales (photo d'arbre)
 *   gabarit  'interieur' (menu + bandes, par défaut) ou 'accueil'
 */
declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/medias.php';
require_once __DIR__ . '/fonctions.php';

$page = array_merge([
    'cle'         => '',
    'titre'       => '',
    'description' => '',
    'menu'        => '',
    'fond'        => 'fonce',
    'bande'       => 'arbre-cote.jpg',
    'gabarit'     => 'interieur',
], $page ?? []);

$titreDocument = $page['titre'] !== '' ? $page['titre'] . ' | ' . SITE_NOM : SITE_NOM;
?>
<!DOCTYPE html>
<html lang="fr" class="no-js">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($titreDocument) ?></title>
<?php if ($page['description'] !== ''): ?>
<meta name="description" content="<?= e($page['description']) ?>">
<?php endif; ?>
<link rel="icon" type="image/png" href="<?= e(img('logo-harmonie-elvina.png')) ?>">
<link rel="preload" href="assets/fonts/cookie-latin-400-normal.woff2" as="font" type="font/woff2" crossorigin>
<link rel="stylesheet" href="assets/css/style.css">
<script>document.documentElement.classList.remove('no-js');</script>
</head>
<body class="fond-<?= e($page['fond']) ?> page-<?= e($page['cle']) ?>">
<a class="lien-evitement" href="#contenu">Aller au contenu</a>
<?php if ($page['gabarit'] === 'interieur'): ?>
<div class="zone">
  <div class="zone__inner">
    <?= bandes($page['bande']) ?>
<?php require __DIR__ . '/menu.php'; ?>
    <main id="contenu" class="page">
<?php endif; ?>
