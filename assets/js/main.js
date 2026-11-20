/* Harmonie Elvina — ouverture / fermeture du menu sur mobile */
(function () {
  'use strict';

  var boutons = document.querySelectorAll('.menu__bouton');

  Array.prototype.forEach.call(boutons, function (bouton) {
    var liste = document.getElementById(bouton.getAttribute('aria-controls'));
    if (!liste) {
      return;
    }
    bouton.addEventListener('click', function () {
      var ouvert = bouton.getAttribute('aria-expanded') === 'true';
      bouton.setAttribute('aria-expanded', ouvert ? 'false' : 'true');
      liste.classList.toggle('est-ouvert', !ouvert);
    });
  });
})();
