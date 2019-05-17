<?php
require_once '../../includes/config-db.inc.php';
require_once '../../includes/fonctions.inc.php';

$s_nom_eu = $_POST['s_nom_eu'];
$s_nom_us = $_POST['s_nom_us'];
$s_nom_jap = $_POST['s_nom_jap'];
creerSerie($s_nom_eu,$s_nom_us,$s_nom_jap);
