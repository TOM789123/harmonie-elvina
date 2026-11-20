<?php
/* Contact — Wix : /contact */
declare(strict_types=1);

session_start();
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/fonctions.php';

$champs  = ['prenom' => '', 'nom' => '', 'telephone' => '', 'email' => '', 'message' => ''];
$limites = ['prenom' => 100, 'nom' => 100, 'telephone' => 30, 'email' => 200, 'message' => 5000];
$erreurs = [];
$envoye  = isset($_GET['envoye']);

if (empty($_SESSION['contact_jeton'])) {
    $_SESSION['contact_jeton'] = bin2hex(random_bytes(16));
}

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    foreach ($champs as $cle => $vide) {
        $champs[$cle] = trim((string) ($_POST[$cle] ?? ''));
    }

    // Anti-robots : champ piège caché rempli, ou formulaire envoyé en moins de 3 secondes
    $estRobot = trim((string) ($_POST['site_web'] ?? '')) !== ''
        || (time() - (int) ($_SESSION['contact_affiche'] ?? 0)) < 3;

    if (!hash_equals($_SESSION['contact_jeton'], (string) ($_POST['jeton'] ?? ''))) {
        $erreurs[] = 'Votre session a expiré : merci de renvoyer le formulaire.';
    }
    if (!filter_var($champs['email'], FILTER_VALIDATE_EMAIL)) {
        $erreurs[] = 'Merci d’indiquer une adresse e-mail valide.';
    }
    if ($champs['message'] === '') {
        $erreurs[] = 'Merci d’écrire votre message.';
    }
    foreach ($limites as $cle => $max) {
        $longueur = function_exists('mb_strlen') ? mb_strlen($champs[$cle], 'UTF-8') : strlen($champs[$cle]);
        if ($longueur > $max) {
            $erreurs[] = 'Un des champs est trop long.';
            break;
        }
    }

    if (!$erreurs) {
        // On ne signale rien aux robots : ils voient le même message de confirmation
        if ($estRobot || envoyer_message_contact($champs)) {
            $_SESSION['contact_jeton'] = bin2hex(random_bytes(16));
            header('Location: contact.php?envoye=1#formulaire', true, 303);
            exit;
        }
        $erreurs[] = "Le message n'a pas pu être envoyé. Vous pouvez m'écrire directement à " . CONTACT_DESTINATAIRE . '.';
    }
}
$_SESSION['contact_affiche'] = time();

$page = ['cle' => 'contact', 'titre' => 'Contact'];
require __DIR__ . '/includes/entete.php';
?>
<h1 class="titre-page">CONTACT</h1>

<ul class="reseaux reseaux--contact">
  <li><a href="<?= e(URL_FACEBOOK) ?>" target="_blank" rel="noopener"><img src="<?= e(img('icone-facebook.png')) ?>" width="61" height="61" alt="Facebook"></a></li>
  <li><a href="<?= e(URL_INSTAGRAM) ?>" target="_blank" rel="noopener"><img src="<?= e(img('icone-instagram.png')) ?>" width="61" height="61" alt="Instagram"></a></li>
</ul>

<img class="contact__icone" src="<?= e(img('icone-arbre.png')) ?>" width="93" height="91" alt="">

<p class="contact__intro">~ Vous pouvez me contacter via mes coordonnés ou encore remplir le formulaire de contact, à vous de choisir ~</p>

<h2 class="contact__sous-titre">~ Coordonnées ~</h2>

<div class="coordonnees">
  <div>
    <p><a href="mailto:harmonie.elvina@gmail.com">harmonie.elvina@gmail.com</a></p>
    <p class="coordonnees__tel"><a href="tel:+33659412294">06 59 41 22 94</a></p>
    <p><a class="u" href="https://www.facebook.com/HarmonieElvina" target="_blank" rel="noopener">https://www.facebook.com/HarmonieElvina</a></p>
  </div>
  <address>
    Espace du Moulin<br>
    4 B Chemin du Moulin<br>
    89 000 Saint Georges sur Baulche<br>
    <i>Uniquement sur rendez-vous</i><br>
    <i>les Mercredis et Samedis matin</i>
  </address>
</div>

<img class="contact__separateur" src="<?= e(img('deco/separateur-brin.svg')) ?>" width="101" height="34" alt="">

<h2 class="contact__titre-form" id="formulaire">Formulaire de contact</h2>

<form class="formulaire" method="post" action="contact.php#formulaire">
<?php if ($envoye): ?>
  <p class="alerte alerte--ok" role="status">Merci, votre message a bien été envoyé.</p>
<?php elseif ($erreurs): ?>
  <div class="alerte alerte--erreur" role="alert">
    <p>Le message n'a pas été envoyé :</p>
    <ul>
<?php foreach ($erreurs as $erreur): ?>
      <li><?= e($erreur) ?></li>
<?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>
  <input type="hidden" name="jeton" value="<?= e($_SESSION['contact_jeton']) ?>">
  <div class="champ-piege" aria-hidden="true">
    <label for="site_web">Ne pas remplir ce champ</label>
    <input type="text" id="site_web" name="site_web" tabindex="-1" autocomplete="off">
  </div>

  <div class="champ">
    <label for="prenom">Prénom</label>
    <input type="text" id="prenom" name="prenom" autocomplete="given-name" maxlength="100" value="<?= e($champs['prenom']) ?>">
  </div>
  <div class="champ">
    <label for="nom">Nom de famille</label>
    <input type="text" id="nom" name="nom" autocomplete="family-name" maxlength="100" value="<?= e($champs['nom']) ?>">
  </div>
  <div class="champ">
    <label for="telephone">Téléphone</label>
    <input type="tel" id="telephone" name="telephone" autocomplete="tel" maxlength="30" value="<?= e($champs['telephone']) ?>">
  </div>
  <div class="champ">
    <label for="email">E-mail</label>
    <input type="email" id="email" name="email" autocomplete="email" maxlength="200" required value="<?= e($champs['email']) ?>">
  </div>
  <div class="champ">
    <label for="message">Message</label>
    <textarea id="message" name="message" maxlength="5000" required><?= e($champs['message']) ?></textarea>
  </div>

  <button class="formulaire__envoyer" type="submit">Envoyer</button>
</form>

<img class="contact__separateur-bas" src="<?= e(img('deco/separateur.svg')) ?>" width="120" height="29" alt="">

<p class="contact__fin">Si vous souhaitez avoir davantage d’informations, ou si vous avez une question, n’hésitez pas à me contacter !</p>

<img class="contact__banniere" src="<?= e(img('foret-contact.jpg')) ?>" width="915" height="150" alt="">
<?php require __DIR__ . '/includes/pied.php'; ?>
