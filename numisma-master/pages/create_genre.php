<link href="../css/numisma.main.css" rel="stylesheet" type="text/css"/>
<?php
require_once '../includes/config-db.inc.php';
?>
<form action="exec/create_genre-exec.php" method="post">


                        <label for="genre_nom_fr" id="label-genre_nom_fr"> Nom du genre (FR) : </label>
                        <input type="text" name="genre_nom_fr" id="genre_nom_fr"> <br/>
						<label for="genre_nom_en" id="label-genre_nom_en"> Nom du genre (EN) : </label>
                        <input type="text" name="genre_nom_en" id="genre_nom_en">


 <input type="submit" id="confirmation" value="Créer le genre" />

            </form>
