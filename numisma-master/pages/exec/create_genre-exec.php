<?php
require_once '../../includes/config-db.inc.php';
require_once '../../includes/fonctions.inc.php';


$genre_nom_fr = $_POST['genre_nom_fr'];
$genre_nom_en = $_POST['genre_nom_en'];

creerGenre($genre_nom_fr,$genre_nom_en);


header('Location: ../create_genre.php');
?>
