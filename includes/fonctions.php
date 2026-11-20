<?php
declare(strict_types=1);

/** Échappe une valeur pour l'affichage HTML. */
function e($valeur): string
{
    return htmlspecialchars((string) $valeur, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/**
 * Chemin d'un média : le fichier local s'il a été récupéré (assets/img/...),
 * sinon la source sur le CDN Wix (repli tant que outils/recuperer-medias.php n'a pas tourné).
 */
function img(string $fichier): string
{
    global $MEDIAS;

    if (is_file(__DIR__ . '/../assets/img/' . $fichier)) {
        return 'assets/img/' . $fichier;
    }
    if (isset($MEDIAS[$fichier])) {
        return is_array($MEDIAS[$fichier]) ? $MEDIAS[$fichier]['url'] : $MEDIAS[$fichier];
    }
    return 'assets/img/' . $fichier;
}

/**
 * Les deux bandes latérales (photo d'arbre) placées de part et d'autre de la colonne.
 * Style en ligne sur l'élément : l'URL relative est résolue depuis la page, quel que soit le navigateur.
 */
function bandes(string $fichier): string
{
    $style = "background-image: url('" . e(img($fichier)) . "')";
    return '<div class="bande bande--g" aria-hidden="true" style="' . $style . '"></div>'
         . '<div class="bande bande--d" aria-hidden="true" style="' . $style . '"></div>';
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
