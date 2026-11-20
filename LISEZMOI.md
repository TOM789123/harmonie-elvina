# Harmonie Elvina — copie du site Wix

Copie en HTML/PHP du site Wix <https://harmoniefeval.wixsite.com/harmonie-elvina-2> :
mêmes textes, mêmes images, même mise en page sur ordinateur, avec en plus une version mobile.

- Premier scan : 07/11/2026
- Mise à jour : 15/11/2026 (version Wix publiée le 11/11/2026, voir « Historique » en bas)

## Lancer le site en local (Laragon)

- <http://localhost/harmonie/> fonctionne tout de suite.
- <http://harmonie.test/> après un « Recharger » d'Apache dans Laragon.

Tous les liens sont relatifs : le site marche dans les deux cas, et à la racine d'un domaine.

## Médias

Les images sont listées dans `includes/medias.php` (fichier local → source Wix).
Pour les rapatrier dans `assets/img/`, ouvrir une fois :
<http://localhost/harmonie/outils/recuperer-medias.php> (`?forcer=1` pour tout retélécharger).
Tant qu'un fichier manque en local, la fonction `img()` affiche l'image depuis le CDN Wix.

Les images sont déjà redimensionnées par le service d'images Wix (les originaux font jusqu'à 4,4 Mo).

**Ornements** : les couronnes, feuillages, séparateurs, livres et la bulle « Merci » sont des SVG
originaux dessinés pour ce site (`assets/img/deco/`, générés par script, palette du site).
Ils remplacent les médias de la bibliothèque gratuite de Wix, réservés aux sites Wix.
Les photos et visuels restants ont été importés par la cliente sur Wix.

## Pages

| Fichier | Page Wix d'origine | Menu |
|---|---|---|
| `index.php` | `/` (Accueil) | Accueil |
| `guidance-soin-meditation.php` | `/guidance` (guidance, soin, méditation) | Séances |
| `animaux.php` | `/soin-énergétique` (page renommée « Animaux » sur Wix) | Animaux |
| `nettoyage-energetique-lieux.php` | `/copie-de-accompagnement-énergétique-p` | Nettoyage énergétique de lieux |
| `references-bibliographiques.php` | `/références-bibliographiques` | Références bibliographiques |
| `contact.php` | `/contact` | Contact |
| `seances.php` | `/mes-prestations` (vue d'ensemble des séances) | — (plus dans le menu Wix) |
| `accompagnement-energetique.php` | `/copie-de-séance-intuitive` | — (lien depuis `seances.php`) |
| `temoignages.php` | `/vos-témoignages` | — (relié à aucune page sur Wix) |
| `conditions-generales-de-vente.php` | `/copie-de-politique-de-confidentialité-1` (vide) | pied de page |
| `politique-de-confidentialite.php` | `/méditation-connectée` (vide) | pied de page |
| `mentions-legales.php` | `/copie-de-politique-de-confidentialité` (vide) | pied de page |

Non reprises : `/book-online` (réservation Wix sans aucune prestation) et `/mon-univers` (page vide).

## Écarts volontaires avec le site Wix

- **Menu sur toutes les pages** : sur Wix, il est sur l'accueil et les 5 pages du menu,
  pas sur la vue d'ensemble des séances, l'accompagnement, les témoignages ni les pages légales.
  **Pied de page sur toutes les pages** : sur Wix, il n'est affiché que sur l'accueil.
- **Liens corrigés** : sur Wix, « SOIN ENERGETIQUE » de la vue d'ensemble (`/mes-prestations`) mène
  à la page Animaux, et les liens « Conditions générales de ventes » / « Politique de confidentialité »
  mènent à la même page. Dans la page Séances détaillée, les titres GUIDANCE / SOIN ENERGETIQUE
  pointent sur la page elle-même et MEDITATION CONNECTEE sur une page vide : ce sont de simples titres ici.
- **Formulaire de contact en PHP** (`mail()`), avec jeton, champ piège et délai anti-robots.
  E-mail et message obligatoires (aucun champ ne l'était sur Wix).
- **Polices** : Didot et Futura sont des polices sous licence Wix, remplacées par Bodoni Moda et Jost.
  Toutes les polices sont auto-hébergées (`assets/fonts/`, licence OFL) : aucun appel à Google Fonts.
- Numéros de téléphone cliquables (`tel:`).
- Le widget « Nous suivre sur Instagram @your_instagram_id » (mal configuré sur Wix) n'est pas repris.
- Extrait de « Demain les chats » (B. Werber) sur la page Références : non recopié (texte protégé),
  un encadré « À compléter » le remplace.

## À valider avec la cliente

- **Deux e-mails** : harmonie.feval@gmail.com (accueil) et harmonie.elvina@gmail.com (contact, nettoyage).
  Le formulaire écrit à `CONTACT_DESTINATAIRE` dans `includes/config.php`.
- **Deux adresses** : « 3 Chemin du Moulin » (accueil) et « Espace du Moulin, 4 B Chemin du Moulin » (contact).
- **Pages légales vides** sur Wix : mentions légales obligatoires pour un site professionnel,
  politique de confidentialité nécessaire avec le formulaire de contact.
- **Pages qui ne sont plus accessibles depuis le menu** : la vue d'ensemble des séances
  (`/mes-prestations`) et, par ricochet, « Accompagnement énergétique personnalisé », qui n'est
  reliée que depuis elle. Idem pour les témoignages. Volontaire ?

## Avant la mise en ligne

1. Supprimer le dossier `outils/` (absent de l'archive `harmonie-o2switch.zip`).
2. `CONTACT_EXPEDITEUR` se calcule tout seul (ne-pas-repondre@domaine-du-site) : rien à modifier.
3. Si un ancien dossier `assets/img/wix/` traîne sur le serveur ou en local, le supprimer (plus utilisé).
4. Tester l'envoi du formulaire sur l'hébergement (en local, l'envoi dépend de la configuration mail de Laragon).
5. Adresse provisoire : le `.htaccess` demande aux moteurs de ne pas indexer le site.
   **Supprimer ces lignes** au passage sur le nom de domaine définitif.

## Déploiement (GitHub → O2switch)

Chaque push sur `main` envoie le site par FTPS (`.github/workflows/deploiement.yml`, action
SamKirkland/FTP-Deploy-Action). Seuls les fichiers modifiés partent ; `outils/`, `.github/` et
ce fichier ne sont pas envoyés. Lancement manuel possible : onglet Actions → « Run workflow ».

- Compte FTP dédié dans cPanel, limité au dossier du sous-domaine (le chemin distant est donc `./`).
- Secrets GitHub : `FTP_SERVEUR`, `FTP_UTILISATEUR`, `FTP_MOT_DE_PASSE`.
- L'action tient un fichier `.ftp-deploy-sync-state.json` sur le serveur : ne pas le supprimer
  (sinon le déploiement suivant renvoie tout).

## Structure

```
includes/   config.php (contacts, menu) · medias.php · fonctions.php · entete.php · menu.php · pied.php
assets/     css/style.css · js/main.js (menu mobile) · fonts/ · img/
outils/     recuperer-medias.php (local uniquement)
```

## Historique

**20/11/2026 (soir)** — les 11 médias de la bibliothèque Wix sont remplacés par des ornements SVG
originaux (`assets/img/deco/`) ; mise en ligne provisoire sur http://harmonie.suwe0045.odns.fr/.

**20/11/2026** — page Séances (`guidance-soin-meditation.php`), version mobile reprise du Wix mobile :
une colonne, icônes de 90 px, tailles de texte propres à chaque séance (18 / 17 / 20 px),
titre « SOIN ENERGÉTIQUE » accentué **uniquement en mobile** (le Wix bureau affiche toujours « ENERGETIQUE »).

**15/11/2026** — reprise des modifications publiées sur Wix le 11/11/2026 :
- menu à 6 entrées : « Séances » mène à la page détaillée (guidance / soin / méditation),
  ajout de « Animaux », « Nettoyage énergétique de lieux » mène à la page interne (et non plus à flori-ame.com) ;
- barre de menu sur fond #b9b2a8 en haut des pages intérieures ;
- page Contact : icônes Facebook et Instagram à hauteur du titre ;
- page Nettoyage : nouveau bloc de contact en deux colonnes (Harmonie / Floriane), avec les icônes
  Facebook et Instagram de chacune ; les lignes « réseaux sociaux » ont disparu ;
- lien « COMMUNICATION & SOINS ANIMALIERS » retiré de la vue d'ensemble : la page Animaux est maintenant dans le menu.

**07/11/2026** — première copie.
