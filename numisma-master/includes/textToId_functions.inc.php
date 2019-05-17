<?php

/*
* Fonctions qui permet de passer de la saisie de l'utilsateur à l'id du champ qu'on recherche
*/


function trouverMasterAvecNomJeu($nomJeu){
  $bdd = connexionBD();
  $requete = $bdd->prepare("SELECT * FROM jv_master WHERE m_nom_eu = \"$nomJeu\" OR m_nom_us= \"$nomJeu\" OR m_nom_jap = \"$nomJeu\";");
  $requete->bindParam(":nomJeu", $nomJeu);
  $requete->execute() or die(print_r($requete->errorInfo()));

  $nbLigne = $requete->rowCount();
  // si pas de correspondance
  if ($nbLigne == 0) {
    $id_master = $requete->fetch();
  }
  // si une seule correspondance
  if ($nbLigne == 1) {
    $master = $requete->fetch();
    $id_master = $master['id_master'];
  }
  $requete->closeCursor();
  return $id_master;

}

function trouverIdDeveloppeurAvecNomDev($nomDev){
  $bdd = connexionBD();
  $requete = $bdd->prepare("SELECT id_developpeur FROM `jv_developpeurs` where developpeur_nom = :nomDev;");
  $requete->bindParam(":nomDev", $nomDev);
  $requete->execute() or die(print_r($requete->errorInfo()));

  $nbLigne = $requete->rowCount();

  // si pas de correspondance
  if ($nbLigne == 0) {
    $id_developpeur = 0;

  }
  // si une seule correspondance
  if ($nbLigne == 1) {
    $developpeur = $requete->fetch();
    $id_developpeur = $developpeur['id_developpeur'];

  }
  $requete->closeCursor();
  return $id_developpeur;

}
function trouverIdSerieAvecNomSerie($nomSerie){
  $bdd = connexionBD();
  $requete = $bdd->prepare("SELECT id_serie FROM `jv_series` where s_nom_eu = :nomSerie OR s_nom_us = :nomSerie OR s_nom_jap = :nomSerie;");
  $requete->bindParam(":nomSerie", $nomSerie);
  $requete->execute() or die(print_r($requete->errorInfo()));

  $nbLigne = $requete->rowCount();
  // si pas de correspondance
  if ($nbLigne == 0) {
    $id_serie = 0;
  }
  // si une seule correspondance
  if ($nbLigne == 1) {
    $serie = $requete->fetch();
    $id_serie = $serie['id_serie'];
  }
  $requete->closeCursor();
  return $id_serie;
}

function trouverIdEditeurAvecNomEditeur($nomEditeur){
  $bdd = connexionBD();
  $requete = $bdd->prepare("SELECT id_editeur FROM `jv_editeurs` where editeur_nom = :nomEditeur;");
  $requete->bindParam(":nomEditeur", $nomEditeur);
  $requete->execute() or die(print_r($requete->errorInfo()));

  $nbLigne = $requete->rowCount();
  // si pas de correspondance
  if ($nbLigne == 0) {
    $id_editeur = 0;
  }
  // si une seule correspondance
  if ($nbLigne == 1) {
    $editeur = $requete->fetch();
    $id_editeur = $editeur['id_editeur'];
  }
  $requete->closeCursor();
  return $id_editeur;
}

function trouverIdVersionAvecTout($v_id_master,$v_nom,$v_support,$v_annee,$v_date,$v_region,$v_pays,$v_serialcode,$v_codebarre,$v_langues,$v_tags,$v_notes,$v_editeur){
  $bdd = connexionBD();
/*  $requete = $bdd->prepare("SELECT id_version FROM `jv_version` where v_id_master = :v_id_master AND v_nom = :v_nom AND v_support = :v_support AND v_annee = :v_annee
    AND v_date = :v_date AND v_region = :v_region AND v_pays = :v_pays AND v_serialcode = :v_serialcode AND v_codebarre = :v_codebarre AND v_langues = :v_langues
    AND v_tags = :v_tags AND v_notes = :v_notes AND v_editeur = :v_editeur;");
  $requete->bindParam(":v_id_master", $v_id_master);
$requete->bindParam(":v_nom", $v_nom);
$requete->bindParam(":v_support", $v_support);
$requete->bindParam(":v_annee", $v_annee);
$requete->bindParam(":v_date", $v_date);
$requete->bindParam(":v_region", $v_region);
$requete->bindParam(":v_pays", $v_pays);
$requete->bindParam(":v_serialcode", $v_serialcode);
$requete->bindParam(":v_codebarre", $v_codebarre);
$requete->bindParam(":v_langues", $v_langues);
$requete->bindParam(":v_tags", $v_tags);
$requete->bindParam(":v_notes", $v_notes);
$requete->bindParam(":v_editeur", $v_editeur);
*/
$requete = $bdd->prepare("SELECT id_version FROM `jv_version` where v_id_master = $v_id_master AND v_nom = '$v_nom' AND v_support = $v_support AND v_annee = $v_annee
    AND v_date = '$v_date' AND v_region = $v_region AND v_pays = $v_pays AND v_serialcode = '$v_serialcode' AND v_codebarre = '$v_codebarre' AND v_langues = '$v_langues' AND v_tags = '$v_tags' AND v_notes = '$v_notes' AND v_editeur = $v_editeur;");

  $requete->execute() or die(print_r($requete->errorInfo()));

  $nbLigne = $requete->rowCount();
  // si pas de correspondance
  if ($nbLigne == 0) {
    $id_version = 0;
  }
  // si une seule correspondance
  if ($nbLigne == 1) {
    $version = $requete->fetch();
    $id_version = $version['id_version'];
  }
  $requete->closeCursor();
  return $id_version;
}
