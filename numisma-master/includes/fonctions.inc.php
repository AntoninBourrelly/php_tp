<?php

/*
* Fonctions d'affichage et de creations de la base de donnée
*/

function afficheVersion($id_version) {

  $bdd = connexionBD();
  $requete = $bdd->prepare("SELECT v_nom, support_nom_complet, region_nom, pays_nom_fr, v_langues, v_annee ,v_date,developpeur_nom, editeur_nom, v_serialcode,
    v_codebarre, v_tags, v_notes FROM `jv_version`, `jv_region`,`jv_pays`, `jv_developpeurs`,`jv_editeurs` , `jv_master`,`jv_support`
    WHERE v_region = id_region AND v_pays = id_pays AND v_editeur = id_editeur AND id_support = v_support AND id_developpeur = m_developpeur
    AND id_master = v_id_master AND id_version = :idVersion");
    // remplacement des variables de la requete par les valeurs effectives
    $requete->bindParam(":idVersion", $id_version);

    $requete->execute() or die(print_r($requete->errorInfo()));
    $version = $requete->fetch();

    echo "Nom: ". $version['v_nom'] . "<br/>";
    echo "Support: " . $version['support_nom_complet'] . "<br/>";
    echo "Date de sortie:  ". $version['v_date'] . "<br/>";
    echo "Region: ". $version['region_nom'] . "<br/>";
    echo "Pays: ". $version['pays_nom_fr'] . "<br/>";
    echo "Langues: ". $version['v_langues'] . "<br/>";
    echo "Developpeur: ". $version['developpeur_nom'] . "<br/>";
    echo "Editeur: ". $version['editeur_nom'] . "<br/>";
    echo "Numéro de Série: ". $version['v_serialcode'] . "<br/>";
    echo "Code Barre: " . $version['v_codebarre'] . "<br/>";
    echo "Tags: ". $version['v_tags'] . "<br/>";
    echo "Notes: ". $version['v_notes'] . "<br/>";
    $requete->closeCursor();
  }



  function creerVersion($v_id_master,$v_nom,$v_support,$v_annee,$v_date,$v_region,$v_pays,$v_serialcode,$v_codebarre,$v_langues,$v_tags,$v_notes,$v_editeur){
    $bdd = connexionBD();
    $requete = $bdd->prepare("INSERT INTO `jv_version` (`id_version`, `v_id_master`, `v_region`, `v_pays`, `v_nom`, `v_annee`, `v_date`, `v_editeur`,`v_support`, `v_serialcode`, `v_codebarre`, `v_img_front`, `v_img_boxart`, `v_img_game`, `v_notes`, `v_langues`, `v_tags`, `v_nb_disques`, `v_nb_cartouches`)
    VALUES (NULL, '$v_id_master', '$v_region', '$v_pays', '$v_nom', '$v_annee', '$v_date', '$v_editeur', '$v_support', '$v_serialcode', '$v_codebarre', NULL, NULL, NULL, '$v_notes','$v_langues','$v_tags', '1', NULL);");
    $requete->execute() or die(print_r($requete->errorInfo()));

    echo "DONE";
  }

  function afficheMaster($master) {
    // Affiche les infos du master + la liste des versions
    $bdd = connexionBD();

    $requete = $bdd->prepare("SELECT s_nom_eu, m_nom_eu FROM `jv_master`,`jv_series` WHERE id_master = :master AND id_serie = m_serie");
    $requete->bindParam(":master", $master);
    $requete->execute() or die(print_r($requete->errorInfo()));

    while ($ligne = $requete->fetch()) {
      echo "<h2>".$ligne['m_nom_eu'] . "</h2>";
      echo "Ce jeu appartient à la série: ".$ligne['s_nom_eu']."<br/>";
    }

    $requete->closeCursor();
    // Affichage de la liste des versions
    $requete = $bdd->prepare("SELECT id_version,v_nom,v_support,support_diminutif,developpeur_nom,editeur_nom,region_nom,pays_nom_fr,v_serialcode,v_region,v_annee,v_tags,v_notes FROM `jv_version` ,`jv_editeurs`, `jv_developpeurs`,`jv_support`, `jv_pays`,`jv_region`,`jv_master` WHERE id_master = v_id_master AND id_editeur = v_editeur AND id_developpeur = m_developpeur AND id_support = v_support AND v_region = id_region  AND v_pays = id_pays AND v_id_master = :master  ORDER BY v_date");
    // remplacement des variables de la requete par les valeurs effectives
    $requete->bindParam(":master", $master);

    $requete->execute() or die(print_r($requete->errorInfo()));
    echo"<table id='table'><tr> "

    ."<th class='titre'>Nom</th> "
    ."<th class='titre'>Editeur</th> "
    ."<th class='titre'>Pays</th> "
    ."<th class='titre'>Region</th>"
    ."<th class='titre'>Serial Code</th>"
    ."<th class='titre'>Année</th></tr>";
    while ($version = $requete->fetch()) {

      echo"<tr> <td>" . "<a href=afficheVersion.php?version=". $version['id_version']."> " . $version['v_nom']." (".$version['support_diminutif']. " ".$version['v_tags'].")" . "</a> </td>"
      ." <td>" . $version['editeur_nom'] . "</td>"
      ." <td>" . $version['pays_nom_fr'] . "</td>"
      . "<td>" . $version['region_nom'] . "</td>"
      . "<td>" . $version['v_serialcode'] . "</td>"
      . "<td>" . $version['v_annee'] . "</td></tr>";
    }

echo" <td colspan='6'> (Votre version n'est pas présente ? <a href=../../pages/create_version.php>Ajoutez le !</a>) </td>";
// Faire que lorsque qu'on clique depuis un master, l'id_master soit envoyé à la page et automatiquement ajouté dans la zone où il faut remplir l'id du master
    echo "</tr> </table>";

    $requete->closeCursor();
  }


  function creerMaster($m_nom_eu,$m_nom_us,$m_nom_jap,$m_nom_alt,$m_genre,$m_dateini,$m_notes,$m_developpeur,$m_serie){
    $bdd = connexionBD();
    $requete = $bdd->prepare("INSERT INTO `jv_master` (`id_master`, `m_nom_jap`, `m_nom_kor`, `m_nom_us`, `m_nom_eu`, `m_nom_alt`, `m_genre`, `m_versions`, `m_dateini`, `m_developpeur`, `m_serie`, `m_notes`, `m_boxart`) VALUES (NULL, '$m_nom_jap', NULL, '$m_nom_us', '$m_nom_eu', '$m_nom_alt', '$m_genre', NULL, '$m_dateini', '$m_developpeur', '$m_serie', '$m_notes', NULL);");
    // remplacement des variables de la requete par les valeurs effectives
    /* $requete->bindParam(":m_nom_eu", $m_nom_eu);
    $requete->bindParam(":m_nom_us", $m_nom_us);
    $requete->bindParam(":m_nom_jap", $m_nom_jap);
    $requete->bindParam(":m_nom_alt", $m_nom_alt);
    $requete->bindParam(":m_genre", $m_genre);
    $requete->bindParam(":m_dateini", $m_dateini);
    $requete->bindParam(":m_notes", $m_notes);
    $requete->bindParam(":m_developpeur", $m_developpeur);
    $requete->bindParam(":m_serie", $m_serie); */

    $requete->execute() or die(print_r($requete->errorInfo()));
    echo "Master crée";
  }

  function creerDeveloppeur($developpeur_nom){

    $bdd = connexionBD();
    $requete = $bdd->prepare("INSERT INTO `jv_developpeurs` (`id_developpeur`, `developpeur_nom`) VALUES (NULL, :developpeur_nom);");
    $requete->bindParam(":developpeur_nom", $developpeur_nom);
    $requete->execute() or die(print_r($requete->errorInfo()));

    echo "Dévéloppeur crée";
  }
  function creerEditeur($editeur_nom){

    $bdd = connexionBD();
    $requete = $bdd->prepare("INSERT INTO `jv_editeurs` (`id_editeur`, `editeur_nom`) VALUES (NULL, :editeur_nom);");
    $requete->bindParam(":editeur_nom", $editeur_nom);
    $requete->execute() or die(print_r($requete->errorInfo()));

    echo "Editeur crée";
  }
  function creerGenre($genre_nom_fr,$genre_nom_en){

    $bdd = connexionBD();
    $requete = $bdd->prepare("INSERT INTO `jv_genres` (`id_genre`, `genre_nom_fr`,`genre_nom_en`) VALUES (NULL, :genre_nom_fr, :genre_nom_en);");
    $requete->bindParam(":genre_nom_fr", $genre_nom_fr);
    $requete->bindParam(":genre_nom_en", $genre_nom_en);
    $requete->execute() or die(print_r($requete->errorInfo()));

    echo "Genre crée";
  }
  function creerSerie($s_nom_eu,$s_nom_us,$s_nom_jap){

    $bdd = connexionBD();
    $requete = $bdd->prepare("INSERT INTO `jv_series` (`id_serie`, `s_nom_eu`, `s_nom_us`, `s_nom_jap`) VALUES (NULL, :s_nom_eu, :s_nom_us, :s_nom_jap);");
    $requete->bindParam(":s_nom_eu", $s_nom_eu);
    $requete->bindParam(":s_nom_us", $s_nom_us);
    $requete->bindParam(":s_nom_jap", $s_nom_jap);
    $requete->execute() or die(print_r($requete->errorInfo()));

    echo "Série crée";
  }
































  /* OBSOLETE? */
  function afficheVersions($master) {

    $bdd = connexionBD();
    $requete = $bdd->prepare("SELECT id_version,v_nom,v_support,support_diminutif,developpeur_nom,editeur_nom,region_nom,pays_nom_fr,v_serialcode,v_region,v_annee,v_tags,v_notes FROM `jv_version` ,`jv_editeurs`, `jv_developpeurs`,`jv_support`, `jv_pays`,`jv_region`,`jv_master` WHERE id_master = v_id_master AND id_editeur = v_editeur AND id_developpeur = m_developpeur AND id_support = v_support AND v_region = id_region  AND v_pays = id_pays AND v_id_master = :master  ORDER BY v_date");
    // remplacement des variables de la requete par les valeurs effectives
    $requete->bindParam(":master", $master);

    $requete->execute() or die(print_r($requete->errorInfo()));
    echo"<table id='table'><tr> "

    ."<th class='titre'>Nom</th> "
    ."<th class='titre'>Editeur</th> "
    ."<th class='titre'>Pays</th> "
    ."<th class='titre'>Region</th>"
    ."<th class='titre'>Serial Code</th>"
    ."<th class='titre'>Année</th></tr>";
    while ($version = $requete->fetch()) {
// <a href=afficheMaster.php?master=". $ligne['id_master']."> " . $ligne['id_master'] . "</a>" .
      echo"<tr> <td>" . "<a href=afficheVersion.php?version=". $version['id_version']."> " . $version['v_nom']." (".$version['support_diminutif']. " ".$version['v_tags'].")" . "</a> </td>"
      ." <td>" . $version['editeur_nom'] . "</td>"
      ." <td>" . $version['pays_nom_fr'] . "</td>"
      . "<td>" . $version['region_nom'] . "</td>"
      . "<td>" . $version['v_serialcode'] . "</td>"
      . "<td>" . $version['v_annee'] . "</td>";
    }
    echo "</tr></table>";

    $requete->closeCursor();
  }
