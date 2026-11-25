<?php
/**
 * Début de page commun. Chaque page définit $page avant d'inclure ce fichier :
 *   cle          identifiant de la page (classe du body, entrée de menu active)
 *   titre        titre de l'onglet (suivi de « | Harmonie Elvina »)
 *   description  meta description
 *   menu         entrée du menu à mettre en évidence si différente de cle
 *   rdv          false pour masquer le bandeau « Prendre rendez-vous » en bas de page
 */
declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/donnees.php';
require_once __DIR__ . '/fonctions.php';

$page = array_merge([
    'cle'         => '',
    'titre'       => '',
    'description' => '',
    'menu'        => '',
    'rdv'         => true,
], $page ?? []);

$titreDocument = $page['titre'] !== '' ? $page['titre'] . ' | ' . SITE_NOM : SITE_NOM . ' – ' . SITE_METIER;
$menuActif = $page['menu'] !== '' ? $page['menu'] : $page['cle'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($titreDocument) ?></title>
<?php if ($page['description'] !== ''): ?>
<meta name="description" content="<?= e($page['description']) ?>">
<?php endif; ?>
<meta name="theme-color" content="#1C2A21">
<link rel="icon" href="assets/img/favicon.svg" type="image/svg+xml">
<link rel="preload" href="assets/fonts/alegreya-latin-wght-normal.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="assets/fonts/alegreya-sans-latin-500-normal.woff2" as="font" type="font/woff2" crossorigin>
<link rel="stylesheet" href="assets/css/style.css?v=<?= e((string) @filemtime(__DIR__ . '/../assets/css/style.css')) ?>">
<link rel="stylesheet" href="assets/css/cookies.css?v=<?= e((string) @filemtime(__DIR__ . '/../assets/css/cookies.css')) ?>">
<script src="assets/js/cookies.js?v=<?= e((string) @filemtime(__DIR__ . '/../assets/js/cookies.js')) ?>" defer></script>
<script src="assets/js/site.js?v=<?= e((string) @filemtime(__DIR__ . '/../assets/js/site.js')) ?>" defer></script>
</head>
<body class="page-<?= e($page['cle']) ?>">
<?php require __DIR__ . '/sprite.php'; ?>
<a class="lien-evitement" href="#contenu">Aller au contenu</a>

<header class="entete" data-entete>
  <div class="conteneur entete__barre">
    <a class="marque" href="index.php"<?= $page['cle'] === 'accueil' ? ' aria-current="page"' : '' ?>>
      <span class="marque__arbre" aria-hidden="true"></span>
      <span class="marque__texte">
        <span class="marque__nom"><?= e(SITE_NOM) ?></span>
        <span class="marque__metier"><?= e(SITE_METIER) ?></span>
      </span>
    </a>

    <nav class="nav" aria-label="Menu principal">
      <button class="nav__bouton" type="button" aria-expanded="false" aria-controls="nav-panneau">
        <span class="nav__burger" aria-hidden="true"></span><span class="nav__bouton-texte">Menu</span>
      </button>
      <div class="nav__panneau" id="nav-panneau">
        <ul class="nav__liste">
          <li class="nav__item nav__item--mobile"><a href="index.php"<?= $page['cle'] === 'accueil' ? ' aria-current="page"' : '' ?>>Accueil</a></li>
<?php foreach ($NAV as $item): ?>
          <li class="nav__item<?= $item['cle'] === $menuActif ? ' est-actif' : '' ?>"><a href="<?= e($item['url']) ?>"<?= $item['cle'] === $page['cle'] ? ' aria-current="page"' : '' ?>><?= e($item['label']) ?></a></li>
<?php endforeach; ?>
          <li class="nav__item nav__item--mobile"><a href="contact.php"<?= $page['cle'] === 'contact' ? ' aria-current="page"' : '' ?>>Contact</a></li>
        </ul>
        <a class="bouton bouton--lumiere nav__rdv" href="contact.php">Prendre rendez-vous</a>
        <p class="nav__coordonnees"><a href="tel:<?= e(TELEPHONE_LIEN) ?>"><?= e(TELEPHONE) ?></a><br><a href="mailto:<?= e(EMAIL) ?>"><?= e(EMAIL) ?></a></p>
      </div>
    </nav>
  </div>
</header>

<main id="contenu">
