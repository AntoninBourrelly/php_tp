<?php

/*
* Fonctions de listage des champs pour les formulaires de créations de master/version
* + Listage de la bdd en général
*/


function listerSupport() {
  $bdd = connexionBD();
  $requete = $bdd->query("SELECT support_diminutif,id_support FROM `jv_support` ORDER BY support_constructeur AND support_annee; ");

  while ($ligne = $requete->fetch()) {
    echo "<option value=" . $ligne['id_support'] . " >" . $ligne['support_diminutif']."</option>";
  }
  $requete->closeCursor();
}

function listerGenre() {
  $bdd = connexionBD();
  $requete = $bdd->query("SELECT genre_nom_fr,id_genre FROM `jv_genres` ORDER BY id_genre; ");

  while ($ligne = $requete->fetch()) {
    echo "<option value=" . $ligne['id_genre'] . " >" . $ligne['genre_nom_fr']."</option>";
  }
  $requete->closeCursor();
}

function listerRegion() {
  $bdd = connexionBD();
  $requete = $bdd->query("SELECT id_region,region_nom FROM `jv_region`; ");

  while ($ligne = $requete->fetch()) {
    echo "<option value=" . $ligne['id_region'] . " >" . $ligne['region_nom']."</option>";
  }
  $requete->closeCursor();
}

function listerPays() {
  $bdd = connexionBD();
  $requete = $bdd->query("SELECT id_pays,pays_nom_fr FROM `jv_pays`; ");


  while ($ligne = $requete->fetch()) {
    echo "<option value=" . $ligne['id_pays'] . " >" . $ligne['pays_nom_fr']."</option>";
  }
  $requete->closeCursor();
}

function listerMasterGlobal(){
  $bdd = connexionBD();
  $requete = $bdd->query("SELECT id_master,m_nom_eu,m_nom_us,m_nom_jap,developpeur_nom,genre_nom_fr,m_dateini FROM `jv_master`, `jv_developpeurs`,`jv_genres`
    WHERE id_developpeur = m_developpeur AND id_genre = m_genre;");


  echo"<table id='table'><tr> "

  ."<th class='titre'>ID</th> "
  ."<th class='titre'>Nom EU</th> "
  ."<th class='titre'>Nom US</th> "
  ."<th class='titre'>Nom JAP</th>"
  ."<th class='titre'>Developpeur</th>"
  ."<th class='titre'>Genre</th>"
  ."<th class='titre'>Date de sortie</th></tr>";
  while ($ligne = $requete->fetch()) {
// fonctions/afficheMaster.php?master=3
    echo"<tr> <td> <a href=afficheMaster.php?master=". $ligne['id_master']."> " . $ligne['id_master'] . "</a>" . "</td>"
  ." <td> <a href=afficheMaster.php?master=". $ligne['id_master']."> " . $ligne['m_nom_eu'] . "</a>" . "</td>"
    ." <td> <a href=afficheMaster.php?master=". $ligne['id_master']."> " . $ligne['m_nom_us'] . "</a>" . "</td>"
    ." <td> <a href=afficheMaster.php?master=". $ligne['id_master']."> " . $ligne['m_nom_jap'] . "</a>" . "</td>"
    . "<td>" . $ligne['developpeur_nom'] . "</td>"
    . "<td>" . $ligne['genre_nom_fr'] . "</td>"
    . "<td>" . $ligne['m_dateini'] . "</td>";
  }
  echo "</tr></table>";



  $requete->closeCursor();

}
