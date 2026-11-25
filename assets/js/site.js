/* Harmonie Elvina — en-tête opaque au défilement, menu mobile. */
(function () {
  'use strict';

  var racine = document.documentElement;

  document.addEventListener('DOMContentLoaded', function () {
    var entete = document.querySelector('[data-entete]');
    if (entete) {
      var majEntete = function () {
        entete.classList.toggle('entete--plein', window.scrollY > 24);
      };
      majEntete();
      window.addEventListener('scroll', majEntete, { passive: true });
    }

    var nav = document.querySelector('.nav');
    var bouton = nav && nav.querySelector('.nav__bouton');
    if (!nav || !bouton) {
      return;
    }
    var texte = bouton.querySelector('.nav__bouton-texte');

    var fermer = function () {
      nav.classList.remove('nav--ouverte');
      bouton.setAttribute('aria-expanded', 'false');
      if (texte) { texte.textContent = 'Menu'; }
      racine.classList.remove('menu-ouvert');
    };
    var ouvrir = function () {
      nav.classList.add('nav--ouverte');
      bouton.setAttribute('aria-expanded', 'true');
      if (texte) { texte.textContent = 'Fermer'; }
      racine.classList.add('menu-ouvert');
    };

    bouton.addEventListener('click', function () {
      if (bouton.getAttribute('aria-expanded') === 'true') { fermer(); } else { ouvrir(); }
    });
    document.addEventListener('keydown', function (ev) {
      if (ev.key === 'Escape' && nav.classList.contains('nav--ouverte')) {
        fermer();
        bouton.focus();
      }
    });
    Array.prototype.forEach.call(nav.querySelectorAll('.nav__panneau a'), function (lien) {
      lien.addEventListener('click', fermer);
    });
    if (window.matchMedia) {
      var large = window.matchMedia('(min-width: 72em)');
      var surChangement = function (e) { if (e.matches) { fermer(); } };
      if (large.addEventListener) { large.addEventListener('change', surChangement); } else if (large.addListener) { large.addListener(surChangement); }
    }
  });
})();
