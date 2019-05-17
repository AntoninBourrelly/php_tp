<?php
require_once '../../includes/config-db.inc.php';
require_once '../../includes/fonctions.inc.php';

$developpeur_nom = $_POST['developpeur_nom'];
creerDeveloppeur($developpeur_nom);