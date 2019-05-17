<link href="../../css/style.css" rel="stylesheet" type="text/css"/>
<?php
require_once '../../includes/config-db.inc.php';
require_once '../../includes/fonctions.inc.php';
require_once '../../includes/textToId_functions.inc.php';

$nomJeu= $_GET["master"];

$master= trouverMasterAvecNomJeu($nomJeu);

afficheMaster($master);
