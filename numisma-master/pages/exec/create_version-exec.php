<?php
require_once '../../includes/config-db.inc.php';
require_once '../../includes/fonctions.inc.php';
require_once '../../includes/textToId_functions.inc.php';

$v_id_master = $_POST['v_id_master'];
$v_nom = $_POST['v_nom'];
$v_support = $_POST['v_support'];
$v_annee = $_POST['v_annee'];
$v_date = $_POST['v_date'];
$v_region = $_POST['v_region'];
$v_pays = $_POST['v_pays'];
$v_serialcode = $_POST['v_serialcode'];
$v_codebarre = $_POST['v_codebarre'];
$v_langues = $_POST['v_langues'];
$v_tags = $_POST['v_tags'];
$v_notes = $_POST['v_notes'];


$nomEditeur = $_POST['v_editeur'];
$v_editeur = trouverIdEditeurAvecNomEditeur($nomEditeur);



creerVersion($v_id_master,$v_nom,$v_support,$v_annee,$v_date,$v_region,$v_pays,$v_serialcode,$v_codebarre,$v_langues,$v_tags,$v_notes,$v_editeur);

/*
$version= trouverIdVersionAvecTout($v_id_master,$v_nom,$v_support,$v_annee,$v_date,$v_region,$v_pays,$v_serialcode,$v_codebarre,$v_langues,$v_tags,$v_notes,$v_editeur);
echo $version;
header('Location: ../../debug/fonctions/afficheVersion.php?version='.$version);
*/
