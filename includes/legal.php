<?php
/** Données communes aux pages légales. Les champs « à compléter » sont signalés visuellement. */
const HEBERGEUR = 'o2switch, Chemin des Pardiaux, 63000 Clermont-Ferrand, France — 04 44 44 60 40 — www.o2switch.fr';
const LEGAL_MAJ = '25 novembre 2026';

/** Champ à compléter par la cliente (visible sur la maquette). */
function a_remplir(string $quoi): string
{
    return '<mark class="a-remplir">[à compléter : ' . e($quoi) . ']</mark>';
}
