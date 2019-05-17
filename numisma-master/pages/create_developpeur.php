<link href="../css/numisma.main.css" rel="stylesheet" type="text/css"/>
<?php
require_once '../includes/config-db.inc.php';
?>
<form action="exec/create_developpeur-exec.php" method="post">


  <label for="developpeur_nom" id="label-developpeur_nom"> Nom du dévéloppeur: </label>
  <input type="text" name="developpeur_nom" id="developpeur_nom">


  <input type="submit" id="confirmation" value="Créer le dévéloppeur" />

</form>
