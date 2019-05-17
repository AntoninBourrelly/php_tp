<link href="../css/numisma.main.css" rel="stylesheet" type="text/css"/>
<?php
require_once '../includes/config-db.inc.php';
?>
<form action="exec/create_editeur-exec.php" method="post">


  <label for="editeur_nom" id="label-editeur_nom"> Nom de l'éditeur: </label>
  <input type="text" name="editeur_nom" id="editeur_nom">


  <input type="submit" id="confirmation" value="Créer l'éditeur" />

</form>
