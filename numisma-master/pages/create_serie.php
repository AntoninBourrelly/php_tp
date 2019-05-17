<link href="../css/numisma.main.css" rel="stylesheet" type="text/css"/>
<?php
require_once '../includes/config-db.inc.php';
?>
<form action="exec/create_serie-exec.php" method="post">


  <label for="s_nom_eu" id="label-s_nom_eu"> Nom EU: </label>
  <input type="text" name="s_nom_eu" id="s_nom_eu"> <br/>
  <label for="s_nom_us" id="label-s_nom_us"> Nom US: </label>
  <input type="text" name="s_nom_us" id="s_nom_us"> <br/>
  <label for="s_nom_jap" id="label-s_nom_jap"> Nom JAP: </label>
  <input type="text" name="s_nom_jap" id="s_nom_jap"> <br/>


  <input type="submit" id="confirmation" value="Créer la série" />

</form>
