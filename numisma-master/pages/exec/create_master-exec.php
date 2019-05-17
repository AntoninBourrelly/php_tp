<?php
require_once '../../includes/config-db.inc.php';
require_once '../../includes/fonctions.inc.php';
require_once '../../includes/textToId_functions.inc.php';

$m_nom_eu = $_POST['m_nom_eu'];
$m_nom_us = $_POST['m_nom_us'];
$m_nom_jap = $_POST['m_nom_jap'];
$m_nom_alt = $_POST['m_nom_alt'];
$m_genre = $_POST['m_genre'];
$m_dateini = $_POST['m_dateini'];
$m_notes = $_POST['m_notes'];

$developpeur = $_POST['m_developpeur'];
$serie = $_POST['m_serie'];

$m_developpeur = trouverIdDeveloppeurAvecNomDev($developpeur);
$m_serie = trouverIdSerieAvecNomSerie($serie);


creerMaster($m_nom_eu,$m_nom_us,$m_nom_jap,$m_nom_alt,$m_genre,$m_dateini,$m_notes,$m_developpeur,$m_serie);
$master= trouverMasterAvecNomJeu($m_nom_eu);

header('Location: ../../debug/fonctions/afficheMaster.php?master='.$master);
