/*
 * Bouton « Cookies » (bonhomme cookie) : ouvre une courte note d'information.
 * Repris du site La vie et ses trésors cachés. Le site ne dépose qu'un cookie strictement nécessaire (formulaire de contact) : pas de consentement à demander,
 * rien n'est enregistré par ce script.
 */
(function () {
  'use strict';

  function bonhomme(id) {
    return '<svg viewBox="0 0 64 64" aria-hidden="true" focusable="false">' +
    '<defs><mask id="' + id + '"><rect width="64" height="64" fill="#fff"/>' +
    '<circle cx="51" cy="17" r="7.5" fill="#000"/><circle cx="45" cy="12" r="5" fill="#000"/></mask></defs>' +
    // bras qui fait coucou + bras posé
    '<path class="cookie-bras" d="M13 37 Q5 31 7 23" fill="none" stroke="#9A5B24" stroke-width="3.2" stroke-linecap="round"/>' +
    '<path d="M51 42 Q58 46 57 52" fill="none" stroke="#9A5B24" stroke-width="3.2" stroke-linecap="round"/>' +
    // biscuit croqué
    '<g mask="url(#' + id + ')">' +
    '<circle cx="32" cy="35" r="22" fill="#E8B062" stroke="#B9772F" stroke-width="2"/>' +
    '<circle cx="32" cy="35" r="18.5" fill="none" stroke="#F2C987" stroke-width="2" stroke-dasharray="3 5" opacity=".7"/>' +
    '<ellipse cx="19" cy="27" rx="2.6" ry="2" fill="#5B3418"/><ellipse cx="44" cy="45" rx="2.4" ry="1.9" fill="#5B3418"/>' +
    '<ellipse cx="23" cy="48" rx="2.2" ry="1.7" fill="#5B3418"/><ellipse cx="41" cy="25" rx="1.8" ry="1.4" fill="#5B3418"/>' +
    '<ellipse cx="15" cy="39" rx="1.6" ry="1.3" fill="#5B3418"/><ellipse cx="34" cy="52" rx="1.7" ry="1.3" fill="#5B3418"/>' +
    '</g>' +
    // miettes
    '<circle cx="56" cy="26" r="1.2" fill="#E8B062"/><circle cx="59" cy="31" r=".9" fill="#E8B062"/><circle cx="54" cy="30" r=".7" fill="#B9772F"/>' +
    // yeux rieurs
    '<ellipse cx="25" cy="33" rx="4.2" ry="4.8" fill="#fff"/><ellipse cx="38" cy="33" rx="4.2" ry="4.8" fill="#fff"/>' +
    '<circle cx="26.2" cy="32" r="2.3" fill="#2A1A0E"/><circle cx="39.2" cy="32" r="2.3" fill="#2A1A0E"/>' +
    '<circle cx="27" cy="31" r=".8" fill="#fff"/><circle cx="40" cy="31" r=".8" fill="#fff"/>' +
    // joues roses + grand sourire
    '<ellipse cx="19.5" cy="41" rx="3" ry="2" fill="#FF6FAE" opacity=".75"/><ellipse cx="44" cy="41" rx="3" ry="2" fill="#FF6FAE" opacity=".75"/>' +
    '<path d="M25 41 Q31.5 49 38 41 Z" fill="#7A2E1A"/><path d="M28.5 44.6 Q31.5 47.4 34.5 44.6 Q31.5 43.6 28.5 44.6 Z" fill="#FF7BA9"/>' +
    '</svg>';
  }

  var bouton = document.createElement('button');
  bouton.type = 'button';
  bouton.className = 'cookie-info-btn';
  bouton.setAttribute('aria-expanded', 'false');
  bouton.setAttribute('aria-controls', 'cookie-info');
  bouton.innerHTML = bonhomme('cookie-croque-1') + '<span>Cookies</span>';

  var panneau = document.createElement('div');
  panneau.id = 'cookie-info';
  panneau.className = 'cookie-info-panneau';
  panneau.setAttribute('role', 'dialog');
  panneau.setAttribute('aria-labelledby', 'cookie-info-titre');
  panneau.hidden = true;
  panneau.innerHTML =
    '<div class="cookie-info-carte">' +
    '<div class="cookie-info-titre" id="cookie-info-titre">' + bonhomme('cookie-croque-2') + '<div>Cookies</div></div>' +
    '<div class="cookie-info-texte"><strong>Aucun cookie de suivi !</strong> ' +
    'Pas de publicité, pas de mesure d\'audience, aucun pistage, aucune vidéo ni carte intégrée.</div>' +
    '<div class="cookie-info-texte"><strong>Formulaire de contact :</strong> un seul cookie technique, qui protège le formulaire ' +
    'contre les envois automatisés. Il s\'efface à la fermeture du navigateur et ne demande pas d\'accord.</div>' +
    '<div class="cookie-info-texte">Vos prénom, nom, téléphone, e-mail et message sont envoyés par e-mail, uniquement pour vous répondre. ' +
    'Ils ne sont pas enregistrés sur le site. Comme pour tout site, l\'hébergeur (o2switch, en France) conserve des journaux techniques de connexion.</div>' +
    '<div class="cookie-info-texte">Une question, ou envie que l\'on supprime votre message ? ' +
    '<a href="mailto:harmonie.elvina@gmail.com">harmonie.elvina@gmail.com</a></div>' +
    '<div class="cookie-info-texte"><a href="politique-de-confidentialite.php#cookies">Tout savoir : confidentialité et cookies</a></div>' +
    '<button type="button" class="cookie-info-fermer">Fermer</button>' +
    '</div>';

  function ouvrir() {
    panneau.hidden = false;
    bouton.setAttribute('aria-expanded', 'true');
    panneau.querySelector('.cookie-info-fermer').focus();
  }
  function fermer(rendreFocus) {
    panneau.hidden = true;
    bouton.setAttribute('aria-expanded', 'false');
    if (rendreFocus) bouton.focus();
  }

  bouton.addEventListener('click', function () {
    if (panneau.hidden) ouvrir(); else fermer(false);
  });
  panneau.querySelector('.cookie-info-fermer').addEventListener('click', function () { fermer(true); });
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && !panneau.hidden) fermer(true);
  });
  document.addEventListener('click', function (e) {
    if (!panneau.hidden && !panneau.contains(e.target) && !bouton.contains(e.target)) fermer(false);
  });

  document.body.appendChild(panneau);
  document.body.appendChild(bouton);
})();
