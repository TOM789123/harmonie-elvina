<?php
declare(strict_types=1);

/** Échappe une valeur pour l'affichage HTML. */
function e($valeur): string
{
    return htmlspecialchars((string) $valeur, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/** Attributs HTML à partir d'un tableau ['class' => '...', 'loading' => 'lazy', ...]. */
function attributs(array $attrs): string
{
    $html = '';
    foreach ($attrs as $nom => $valeur) {
        if ($valeur === false || $valeur === null) {
            continue;
        }
        $html .= $valeur === true ? ' ' . e($nom) : ' ' . e($nom) . '="' . e($valeur) . '"';
    }
    return $html;
}

/**
 * Image responsive : <picture> avec les variantes WebP (assets/img/{nom}-{largeur}.webp)
 * et un JPEG (ou PNG) de repli. Pour une image sans variantes : assets/img/{nom}.webp + .png.
 */
function photo(string $nom, string $alt, string $sizes = '100vw', array $attrs = []): string
{
    $dossier = __DIR__ . '/../assets/img/';
    $webp = glob($dossier . $nom . '-[0-9]*.webp') ?: [];
    usort($webp, static fn ($a, $b) => (int) preg_replace('/\D/', '', basename($a)) <=> (int) preg_replace('/\D/', '', basename($b)));
    $repli = (glob($dossier . $nom . '-[0-9]*.jpg') ?: [])[0] ?? null;

    if ($webp && $repli) {
        $srcset = implode(', ', array_map(static function ($f) use ($nom) {
            preg_match('/-(\d+)\.webp$/', $f, $m);
            return 'assets/img/' . basename($f) . ' ' . $m[1] . 'w';
        }, $webp));
        $src = 'assets/img/' . basename($repli);
    } else {
        $srcset = 'assets/img/' . $nom . '.webp';
        $repli = $dossier . $nom . '.png';
        $src = 'assets/img/' . $nom . '.png';
    }
    [$largeur, $hauteur] = @getimagesize($repli) ?: [null, null];

    $img = array_merge([
        'src'      => $src,
        'alt'      => $alt,
        'width'    => $largeur,
        'height'   => $hauteur,
        'loading'  => 'lazy',
        'decoding' => 'async',
    ], $attrs);

    return '<picture><source type="image/webp" srcset="' . e($srcset) . '" sizes="' . e($sizes) . '">'
         . '<img' . attributs($img) . '></picture>';
}

/** Pictogramme du sprite (includes/sprite.php). */
function icone(string $nom, string $classe = ''): string
{
    return '<svg class="icone icone--' . e($nom) . ($classe !== '' ? ' ' . e($classe) : '') . '" aria-hidden="true" focusable="false"><use href="#i-' . e($nom) . '"></use></svg>';
}

/** Date ISO (2024-12-21) en toutes lettres : « décembre 2024 ». */
function mois_annee(string $iso): string
{
    $mois = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
    [$a, $m] = array_map('intval', explode('-', $iso));
    return $mois[$m - 1] . ' ' . $a;
}

/** Bloc « en pratique » d'une séance : liste de définitions. */
function infos_seance(array $infos, string $classe = 'infos'): string
{
    $html = '<dl class="' . e($classe) . '">';
    foreach ($infos as $terme => $valeur) {
        $html .= '<div><dt>' . e($terme) . '</dt><dd>' . e($valeur) . '</dd></div>';
    }
    return $html . '</dl>';
}

/**
 * Faisceaux de lumière et poussières en suspension (en-têtes sombres).
 * $poussieres : nombre de particules (0 pour un faisceau fixe).
 */
function lumiere(int $poussieres = 0): string
{
    $html = '<div class="lumiere" aria-hidden="true"><span class="rayon rayon--large"></span><span class="rayon rayon--fin"></span>';
    if ($poussieres > 0) {
        $html .= '<span class="poussieres">';
        $graine = 7;
        $alea = static function () use (&$graine): float {
            $graine = ($graine * 16807) % 2147483647;
            return $graine / 2147483647;
        };
        for ($i = 0; $i < $poussieres; $i++) {
            $style = sprintf(
                '--x:%.1f%%;--y:%.1f%%;--t:%.1fpx;--d:%.1fs;--r:-%.1fs;--dx:%.0fpx',
                30 + $alea() * 68,
                8 + $alea() * 88,
                3 + $alea() * 6,
                13 + $alea() * 14,
                $alea() * 20,
                -30 + $alea() * 60
            );
            $html .= '<i style="' . $style . '"></i>';
        }
        $html .= '</span>';
    }
    return $html . '</div>';
}

/** Fiche « En pratique » d'une séance : rubriques (chacune une liste de phrases) + notes. */
function fiche_pratique(array $rubriques, array $notes = [], string $titre = 'En pratique'): string
{
    $html = '<aside class="fiche" aria-label="' . e($titre) . '"><p class="fiche__titre">' . e($titre) . '</p><dl>';
    foreach ($rubriques as $terme => $phrases) {
        $html .= '<div><dt>' . e($terme) . '</dt><dd>';
        foreach ((array) $phrases as $phrase) {
            $html .= '<p>' . e($phrase) . '</p>';
        }
        $html .= '</dd></div>';
    }
    $html .= '</dl>';
    if ($notes) {
        $html .= '<div class="fiche__notes">';
        foreach ($notes as $note) {
            $html .= '<p>' . e($note) . '</p>';
        }
        $html .= '</div>';
    }
    return $html . '</aside>';
}

/**
 * En-tête sombre des pages intérieures.
 * $visuel : HTML d'une image (photo(), logo…) affichée à droite, facultatif.
 * $parent : ['url' => ..., 'label' => ...] pour un lien de retour vers la page parente, facultatif.
 * $apres  : HTML ajouté sous l'introduction (sommaire…), facultatif.
 */
function hero_page(string $titre, string $intro = '', string $visuel = '', array $parent = [], string $apres = ''): string
{
    $html = '<section class="hero-page sombre grain' . ($visuel !== '' ? ' hero-page--visuel' : '') . '">' . lumiere(0)
          . '<div class="conteneur hero-page__grille"><div class="hero-page__texte">';
    if ($parent) {
        $html .= '<p class="hero-page__parent"><a href="' . e($parent['url']) . '">' . e($parent['label']) . '</a></p>';
    }
    $html .= '<h1>' . e($titre) . '</h1>';
    if ($intro !== '') {
        $html .= '<p class="hero-page__intro">' . e($intro) . '</p>';
    }
    $html .= $apres . '</div>';
    if ($visuel !== '') {
        $html .= '<div class="hero-page__visuel">' . $visuel . '</div>';
    }
    return $html . '</div></section>';
}

/** Encode un en-tête d'e-mail en UTF-8 (sujet, nom d'expéditeur). */
function encoder_entete(string $texte): string
{
    return '=?UTF-8?B?' . base64_encode($texte) . '?=';
}

/**
 * Envoie le message du formulaire de contact à CONTACT_DESTINATAIRE.
 * Les champs doivent déjà être validés (e-mail valide, message non vide).
 */
function envoyer_message_contact(array $c): bool
{
    $surUneLigne = static function (string $v): string {
        return trim(preg_replace('/[\r\n]+/', ' ', $v));
    };

    $nom   = $surUneLigne($c['prenom'] . ' ' . $c['nom']);
    $sujet = 'Message du site ' . SITE_NOM . ($nom !== '' ? ' – ' . $nom : '');

    $corps = "Nouveau message envoyé depuis le formulaire de contact du site.\n\n"
        . 'Prénom : ' . $surUneLigne($c['prenom']) . "\n"
        . 'Nom : ' . $surUneLigne($c['nom']) . "\n"
        . 'Téléphone : ' . $surUneLigne($c['telephone']) . "\n"
        . 'E-mail : ' . $c['email'] . "\n\n"
        . "Message :\n" . $c['message'] . "\n";

    $entetes = implode("\r\n", [
        'From: ' . encoder_entete(SITE_NOM) . ' <' . CONTACT_EXPEDITEUR . '>',
        'Reply-To: ' . $c['email'], // validé par FILTER_VALIDATE_EMAIL : pas de retour à la ligne possible
        'MIME-Version: 1.0',
        'Content-Type: text/plain; charset=UTF-8',
        'Content-Transfer-Encoding: base64',
    ]);

    return mail(CONTACT_DESTINATAIRE, encoder_entete($sujet), chunk_split(base64_encode($corps)), $entetes);
}
