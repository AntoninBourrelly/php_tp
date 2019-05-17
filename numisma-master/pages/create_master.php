<link href="../css/numisma.main.css" rel="stylesheet" type="text/css"/>
<?php
require_once '../includes/config-db.inc.php';
require_once '../includes/listage.inc.php';
?>
<form action="exec/create_master-exec.php" method="post">


  <label for="m_nom_eu" id="label-m_nom_eu"> Nom du jeu en Europe:</label>
  <input type="text" name="m_nom_eu" id="m_nom_eu">
  <br/>
  <label for="m_nom_us" id="label-m_nom_us"> Nom du jeu en Amerique:</label>
  <input type="text" name="m_nom_us" id="m_nom_us">
  <br/>
  <label for="m_nom_jap" id="label-m_nom_jap"> Nom du jeu au Japon:</label>
  <input type="text" name="m_nom_jap" id="m_nom_jap">
  <br/>
  <label for="m_nom_alt" id="label-m_nom_alt">Autre nom du jeu:</label>
  <input type="text" name="m_nom_alt" id="m_nom_alt">
  <br/>
  <label for="m_genre" id="label-m_genre"> Genre: </label>
  <select name="m_genre" id="m_genre">
    <?php
    listerGenre();
    ?>
  </select></br>
  <label for="m_dateini" id="label-m_dateini">Date de sortie initiale:</label>
  <input type="date" name="m_dateini" id="m_dateini">
</br>
<label for="m_developpeur" id="label-m_developpeur">Developpeur:</label>
<input type="text" name="m_developpeur" id="m_developpeur">
</br>
<label for="m_serie" id="label-m_serie">Serie:</label>
<input type="text" name="m_serie" id="m_serie">
</br>
<label for="m_notes" id="label-m_notes">Notes:</label>
<input type="text" name="m_notes" id="m_notes">
</br>

<input type="submit" id="inscription" value="Créer le master" />

</form>
