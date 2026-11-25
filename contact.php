<?php
/* Contact : coordonnées + formulaire (jeton, champ piège, délai anti-robots, redirection après envoi) */
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
        $erreurs[] = 'Indiquez une adresse e-mail valide, pour que je puisse vous répondre.';
    }
    if ($champs['message'] === '') {
        $erreurs[] = 'Écrivez votre message.';
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
        $erreurs[] = "Le message n'a pas pu partir. Vous pouvez m'écrire directement à " . CONTACT_DESTINATAIRE . ' ou m’appeler au ' . TELEPHONE . '.';
    }
}
$_SESSION['contact_affiche'] = time();

$page = [
    'cle'         => 'contact',
    'titre'       => 'Contact',
    'description' => 'Contacter Harmonie Elvina, médium énergéticienne à Saint-Georges-sur-Baulche : téléphone, e-mail, adresse et formulaire.',
    'rdv'         => false,
];
require __DIR__ . '/includes/entete.php';
?>
<?= hero_page('Contact', 'Vous pouvez me contacter via mes coordonnées ou encore remplir le formulaire de contact, à vous de choisir.') ?>

<section class="section">
  <div class="conteneur contact-grille">
    <div class="coordonnees">
      <h2>Coordonnées</h2>
      <ul>
        <li><?= icone('telephone') ?><a href="tel:<?= e(TELEPHONE_LIEN) ?>"><?= e(TELEPHONE) ?></a></li>
        <li><?= icone('email') ?><a href="mailto:<?= e(EMAIL) ?>"><?= e(EMAIL) ?></a></li>
        <li><?= icone('lieu') ?><address><?= e(ADRESSE_LIEU) ?><br><?= e(ADRESSE_RUE) ?><br><?= e(ADRESSE_VILLE) ?></address></li>
        <li><?= icone('horloge') ?><span>Uniquement sur rendez-vous<br>les mercredis et samedis matin</span></li>
      </ul>
      <ul class="reseaux">
        <li><a class="reseau reseau--facebook" href="<?= e(URL_FACEBOOK) ?>" target="_blank" rel="noopener"><?= icone('facebook') ?><span class="visuellement-cache">Facebook</span></a></li>
        <li><a class="reseau reseau--instagram" href="<?= e(URL_INSTAGRAM) ?>" target="_blank" rel="noopener"><?= icone('instagram') ?><span class="visuellement-cache">Instagram</span></a></li>
      </ul>
      <p class="coordonnees__fin">Si vous souhaitez avoir davantage d’informations, ou si vous avez une question, n’hésitez pas à me contacter !</p>
    </div>

    <form class="formulaire" id="formulaire" method="post" action="contact.php#formulaire" novalidate>
      <h2>Formulaire de contact</h2>
<?php if ($envoye): ?>
      <p class="alerte alerte--ok" role="status">Merci, votre message a bien été envoyé. Je vous réponds dès que possible.</p>
<?php elseif ($erreurs): ?>
      <div class="alerte alerte--erreur" role="alert">
        <p>Le message n’a pas été envoyé :</p>
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

      <div class="formulaire__ligne">
        <div class="champ">
          <label for="prenom">Prénom</label>
          <input type="text" id="prenom" name="prenom" autocomplete="given-name" maxlength="100" value="<?= e($champs['prenom']) ?>">
        </div>
        <div class="champ">
          <label for="nom">Nom de famille</label>
          <input type="text" id="nom" name="nom" autocomplete="family-name" maxlength="100" value="<?= e($champs['nom']) ?>">
        </div>
      </div>
      <div class="formulaire__ligne">
        <div class="champ">
          <label for="email">E-mail <span>(obligatoire)</span></label>
          <input type="email" id="email" name="email" autocomplete="email" maxlength="200" required value="<?= e($champs['email']) ?>">
        </div>
        <div class="champ">
          <label for="telephone">Téléphone</label>
          <input type="tel" id="telephone" name="telephone" autocomplete="tel" maxlength="30" value="<?= e($champs['telephone']) ?>">
        </div>
      </div>
      <div class="champ">
        <label for="message">Message <span>(obligatoire)</span></label>
        <textarea id="message" name="message" maxlength="5000" required><?= e($champs['message']) ?></textarea>
      </div>

      <div class="formulaire__bas">
        <button class="bouton bouton--mousse" type="submit">Envoyer le message</button>
      </div>
    </form>
  </div>
</section>
<?php require __DIR__ . '/includes/pied.php'; ?>
