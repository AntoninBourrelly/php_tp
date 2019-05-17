<link href="../css/numisma.main.css" rel="stylesheet" type="text/css"/>
<?php
require_once '../includes/config-db.inc.php';
require_once '../includes/listage.inc.php';
?>
<form action="exec/create_version-exec.php" method="post">

  <label for="v_id_master" id="label-v_id_master"> Id du master:</label>
  <input type="number" name="v_id_master" id="v_id_master"> (Le master n'existe pas ? <a href="create_master.php">Créez le !</a>)
  <br/>
  <label for="v_nom" id="label-v_nom"> Nom du jeu:</label>
  <input type="text" name="v_nom" id="v_nom">
  <br/>

  <label for="v_support" id="label-v_support"> Support </label>
  <select name="v_support" id="v_support">
    <?php

    listerSupport(); ?> </select></br>

    <label for="v_annee"id="label-v_annee"> Annee:</label>
    <input type="number" name="v_annee" id="v_annee"> <br/>

    <label for="v_date"id="label-v_date"> Date complète:</label>
    <input type="date" name="v_date" id="v_date"> <br/>

    <label for="v_region" id="label-v_region"> Region </label>
    <select name="v_region" id="v_region">
      <?php
      listerRegion();
      ?>
    </select>

        <label for="v_editeur"id="label-v_editeur"> Editeur:</label>
        <input type="text" name="v_editeur" id="v_editeur"> <br/>

    <label for="v_pays" id="label-v_pays"> Pays </label>
    <select name="v_pays" id="v_pays">
      <?php
      listerPays();
      ?>
    </select>
    <br/>
    <label for="v_serialcode" id="label-v_serialcode"> Numéro de série:</label>
    <input type="text" name="v_serialcode" id="v_serialcode">
    <br/>
    <label for="v_codebarre" id="label-v_codebarre"> Code barre:</label>
    <input type="number" name="v_codebarre" id="v_codebarre">
    <br/>

    <label for="v_langues" id="label-v_langues"> Langues disponibles dans le jeu:</label>
    <input type="text" name="v_langues" id="v_langues">
    <br/>

    <label for="v_tags" id="label-v_tags"> Tags:</label> <!-- à améliorer -->
    <input type="text" name="v_tags" id="v_tags">
    <br/>
    <label for="v_notes" id="label-v_notes"> Notes:</label> <br/>
    <textarea name="v_notes" id="v_notes" style="width:250px;height:150px;resize: none;"></textarea>
    <br/>

    <input type="submit" id="inscription" value="Créer la version du jeu" />

  </form>
