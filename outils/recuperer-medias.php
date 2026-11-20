<?php
/**
 * Récupère en local les médias du site Wix (images + formes vectorielles)
 * listés dans includes/medias.php, et les enregistre dans assets/img/.
 *
 * Utilisation (une seule fois, en local) :
 *   - navigateur : http://harmonie.test/outils/recuperer-medias.php
 *                  ou http://localhost/harmonie/outils/recuperer-medias.php
 *   - terminal   : php outils/recuperer-medias.php
 * Ajouter ?forcer=1 (ou --forcer en terminal) pour retélécharger les fichiers déjà présents.
 *
 * Accès limité à la machine locale. Supprimer le dossier "outils" avant la mise en ligne.
 */
declare(strict_types=1);

$enTerminal = PHP_SAPI === 'cli';
if (!$enTerminal && !in_array($_SERVER['REMOTE_ADDR'] ?? '', ['127.0.0.1', '::1'], true)) {
    http_response_code(403);
    exit('Accès réservé à la machine locale.');
}

require __DIR__ . '/../includes/medias.php';

/** Télécharge une URL. Retourne [contenu, erreur]. */
function telecharger(string $url): array
{
    if (function_exists('curl_init')) {
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_CONNECTTIMEOUT => 15,
            CURLOPT_TIMEOUT        => 90,
            CURLOPT_USERAGENT      => 'Mozilla/5.0 (migration site Harmonie Elvina)',
        ]);
        $contenu = curl_exec($ch);
        $code    = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $erreur  = curl_error($ch);
        curl_close($ch);
        if ($contenu === false) {
            return [null, 'cURL : ' . $erreur];
        }
        return $code === 200 ? [$contenu, ''] : [null, 'HTTP ' . $code];
    }

    $contexte = stream_context_create(['http' => [
        'timeout'       => 90,
        'user_agent'    => 'Mozilla/5.0 (migration site Harmonie Elvina)',
        'ignore_errors' => true,
    ]]);
    $contenu = @file_get_contents($url, false, $contexte);
    if ($contenu === false) {
        return [null, 'Téléchargement impossible (activer l’extension curl ou openssl de PHP)'];
    }
    $code = 0;
    foreach ($http_response_header ?? [] as $ligne) {
        if (preg_match('#^HTTP/\S+\s+(\d{3})#', $ligne, $m)) {
            $code = (int) $m[1];
        }
    }
    return $code === 200 ? [$contenu, ''] : [null, 'HTTP ' . $code];
}

/** Recadre une forme SVG Wix comme sur le site (viewBox, étirement, couleur). */
function ajuster_svg(string $svg, array $options): string
{
    $svg = preg_replace('/<\?xml[^>]*\?>\s*/', '', $svg);
    return preg_replace_callback('/<svg\b[^>]*>/i', static function (array $m) use ($options): string {
        $balise = preg_replace('/\s(?:width|height|viewBox|preserveAspectRatio|role|aria-[a-z]+|data-[a-z-]+)="[^"]*"/i', '', $m[0]);
        $ajout  = ' viewBox="' . $options['viewBox'] . '"'
                . ' preserveAspectRatio="' . ($options['preserveAspectRatio'] ?? 'xMidYMid meet') . '"'
                . (isset($options['fill']) ? ' fill="' . $options['fill'] . '"' : '');
        return preg_replace('/^<svg\b/i', '<svg' . $ajout, $balise);
    }, $svg, 1);
}

$dossier   = dirname(__DIR__) . '/assets/img/';
$forcer    = isset($_GET['forcer']) || in_array('--forcer', $argv ?? [], true);
$resultats = [];

foreach ($MEDIAS as $fichier => $source) {
    $url   = is_array($source) ? $source['url'] : $source;
    $cible = $dossier . $fichier;

    if (is_file($cible) && !$forcer) {
        $resultats[] = [$fichier, 'déjà présent', filesize($cible)];
        continue;
    }
    if (!is_dir(dirname($cible)) && !mkdir(dirname($cible), 0775, true)) {
        $resultats[] = [$fichier, 'erreur', 'dossier impossible à créer'];
        continue;
    }

    [$contenu, $erreur] = telecharger($url);
    if ($contenu === null) {
        $resultats[] = [$fichier, 'erreur', $erreur];
        continue;
    }
    if (is_array($source) && isset($source['viewBox'])) {
        $contenu = ajuster_svg($contenu, $source);
    }
    if (file_put_contents($cible, $contenu) === false) {
        $resultats[] = [$fichier, 'erreur', 'écriture impossible'];
        continue;
    }
    $resultats[] = [$fichier, 'ok', strlen($contenu)];
}

$nbErreurs = count(array_filter($resultats, static function (array $r): bool {
    return $r[1] === 'erreur';
}));
$taille = static function ($octets): string {
    return is_int($octets) ? number_format($octets / 1024, 0, ',', ' ') . ' Ko' : (string) $octets;
};

if ($enTerminal) {
    foreach ($resultats as [$fichier, $etat, $detail]) {
        printf("%-34s %-13s %s\n", $fichier, $etat, $taille($detail));
    }
    echo $nbErreurs ? "\n$nbErreurs erreur(s).\n" : "\nTous les médias sont en local.\n";
    exit($nbErreurs ? 1 : 0);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<title>Récupération des médias – Harmonie Elvina</title>
<style>
  body { font: 15px/1.5 system-ui, sans-serif; margin: 2rem auto; max-width: 760px; padding: 0 1rem; color: #222; }
  table { border-collapse: collapse; width: 100%; }
  td, th { padding: 4px 8px; border-bottom: 1px solid #ddd; text-align: left; }
  .ok { color: #1a7f37; } .erreur { color: #b42318; font-weight: 600; }
</style>
</head>
<body>
<h1>Récupération des médias Wix</h1>
<p><?= $nbErreurs ? '<strong class="erreur">' . $nbErreurs . ' erreur(s)</strong> — relancer la page pour réessayer.' : '<strong class="ok">Tous les médias sont en local.</strong>' ?></p>
<table>
  <tr><th>Fichier (assets/img/)</th><th>État</th><th>Détail</th></tr>
<?php foreach ($resultats as [$fichier, $etat, $detail]): ?>
  <tr>
    <td><?= htmlspecialchars($fichier) ?></td>
    <td class="<?= $etat === 'erreur' ? 'erreur' : 'ok' ?>"><?= htmlspecialchars($etat) ?></td>
    <td><?= htmlspecialchars($taille($detail)) ?></td>
  </tr>
<?php endforeach; ?>
</table>
<p><a href="../index.php">← Retour au site</a></p>
<p><small>Supprimer le dossier « outils » avant la mise en ligne.</small></p>
</body>
</html>
