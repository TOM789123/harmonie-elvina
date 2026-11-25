# Harmonie Elvina — refonte « Sous la canopée » (branche `refonte`)

Nouvelle version du site : mêmes textes et même ADN (forêt, arbre de vie, lumière),
mise en page entièrement refaite. Le site actuel (branche `main`) n'est pas modifié.

- **Maquette à faire valider** : <http://harmonie.suwe0045.odns.fr/maquette/> (non indexée : en-tête `X-Robots-Tag` du `.htaccess`).
- Chaque push sur `refonte` publie la maquette dans le dossier `maquette/` du serveur
  (`.github/workflows/maquette.yml`, mêmes secrets FTP que le site principal).
- Mise en ligne après validation : fusionner `refonte` dans `main`, puis retirer le `noindex`
  du `.htaccess` (voir « Mise en ligne de la refonte » plus bas).

## Direction artistique

- **Idée** : la lumière qui traverse les arbres (« mettre en lumière », « aller à la racine » dans ses textes).
  Un faisceau doré et quelques poussières sur l'accueil (seule animation, désactivée si l'utilisateur réduit les animations),
  l'arbre de vie en filigrane dans le pied de page.
- **Couleurs** : sous-bois `#1C2A21`, mousse `#3D5743`, fougère `#9DB47F`, lichen `#DFE5D3`, brume `#F1F3EC`, lumière (beige / marron clair) `#D4B896`, écorce `#7A5C46`.
- **Polices** (OFL, auto-hébergées) : Alegreya (titres et textes), Alegreya Sans (menus, boutons, infos pratiques).
- **Motif** : coins « feuille » (deux coins opposés arrondis) sur les photos, cartes et boutons.
- **Cookies** : bouton « bonhomme cookie » repris du site La vie et ses trésors cachés (`assets/js/cookies.js`, `assets/css/cookies.css`), aux couleurs du site ; simple note d’information (un seul cookie technique, pas de consentement requis).
- **Pictogrammes** dessinés pour le site (lanterne, mains, lotus, spirale, chat, maison-feuille, plume),
  sprite généré dans `includes/sprite.php` ; les mains et l'arbre de vie sont vectorisés depuis les icônes d'origine.

## Structure

```
index.php                       Accueil
seances.php                     Guidance, soin énergétique, méditation connectée (+ accompagnement, « je propose aussi »)
accompagnement-energetique.php  Accompagnement énergétique personnalisé
animaux.php                     Communication & soins aux animaux
nettoyage-energetique-lieux.php Nettoyage énergétique de lieux (avec Flori'Âme)
temoignages.php                 17 témoignages
references-bibliographiques.php Références bibliographiques
contact.php                     Coordonnées + formulaire (jeton, champ piège, délai anti-robots)
mentions-legales.php, politique-de-confidentialite.php, conditions-generales-de-vente.php  (à compléter)
includes/  config.php (coordonnées, menu) · donnees.php (séances, témoignages) · fonctions.php
           entete.php · pied.php · bloc-aussi.php · sprite.php
assets/    css/style.css · js/site.js · fonts/ · img/ (WebP + JPEG de repli)
sources/   scripts et fichiers de travail (non publiés)
```

`guidance-soin-meditation.php` (ancienne page « Séances ») est remplacée par `seances.php` :
prévoir une redirection 301 à la mise en ligne.

## Textes

Textes repris du site actuel. Corrections de fautes de frappe évidentes (à signaler à la cliente) :

- Méditation connectée : « Un temps pour de pause » → « Un temps de pause ».
- Accompagnement : « je vous accompagne votre ce chemin » → « sur ce chemin » ; « état de lieux énergétique » → « état des lieux énergétique » ;
  « en fonction de se qui » → « de ce qui ».
- Nettoyage : « disfonctionnements » → « dysfonctionnements » ; « Qui sommes nous ? » → « Qui sommes-nous ? » ; « Qu'est -ce » → « Qu'est-ce ».
- Contact : « mes coordonnés » → « mes coordonnées ».
- Lectures : « (Toma 1 et 2) » → « (tomes 1 et 2) » ; « Le 5ème accord toltèques » → « Le cinquième accord toltèque » ; espaces parasites.
- Pied de page : « Conditions générales de ventes » → « Conditions générales de vente ».
- Témoignages : non modifiés (citations).

Nouveaux intitulés ajoutés pour structurer les pages (à faire valider) : « Qui suis-je ? », « Les séances »,
« Je propose aussi », « En pratique », « Durée et tarifs », « À distance, comment ça se passe ? », « Nous contacter »,
« Prendre rendez-vous ».
La présentation d'Harmonie sur l'accueil reprend sa biographie de la page Nettoyage.

## À valider avec la cliente

- **Coordonnées** : la refonte utilise partout celles de la page Contact (Espace du Moulin, 4 B Chemin du Moulin,
  harmonie.elvina@gmail.com). Le site actuel affiche aussi « 3 Chemin du Moulin » et harmonie.feval@gmail.com sur l'accueil.
- **Photos** : celles du site Wix sont en petite taille (1 400 px au plus). Des originaux ou de nouvelles photos de sa forêt
  rendraient l'accueil plus net sur grand écran (`sources/images.py` régénère toutes les tailles).
- **Extrait de « Demain les chats »** (page Lectures) : emplacement prévu, texte à reprendre du site actuel.
- **Pages légales** : rédigées (mentions légales, confidentialité + cookies, CGV) ; champs surlignés « à compléter » : identité, statut, SIRET, TVA, délai d’annulation, médiateur de la consommation, prestataire du site.

## Mise en ligne de la refonte (après validation)

1. Fusionner `refonte` dans `main` (le déploiement principal envoie alors la refonte à la racine du site).
2. Supprimer sur le serveur les fichiers de l'ancienne version devenus inutiles (`guidance-soin-meditation.php`,
   `includes/medias.php`, `includes/menu.php`, `assets/js/main.js`, anciennes polices et images, `assets/img/deco/`) :
   l'envoi automatique ne supprime rien.
3. Retirer le `noindex` du `.htaccess` une fois le domaine définitif branché ; ajouter la redirection
   `guidance-soin-meditation.php` → `seances.php`.
4. Supprimer le dossier `maquette/` du serveur.

## Déploiement (rappel)

- Site principal : push sur `main` → racine du sous-domaine (`.github/workflows/deploiement.yml`).
- Maquette : push sur `refonte` → `maquette/` (`.github/workflows/maquette.yml`).
- Compte FTP `deploiement@harmonie.suwe0045.odns.fr`, secrets GitHub `FTP_SERVEUR` (`barriere.o2switch.net`),
  `FTP_UTILISATEUR`, `FTP_MOT_DE_PASSE`.
