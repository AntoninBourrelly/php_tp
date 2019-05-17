<?php
require_once '../../includes/config-db.inc.php';
require_once '../../includes/fonctions.inc.php';

$editeur_nom = $_POST['editeur_nom'];
creerEditeur($editeur_nom);
