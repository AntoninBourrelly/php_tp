<?php

require_once 'config.inc';
/**
 * Retoune un objet PDO permettant l'acces aux tables de la base de données
 * @return \PDO
 */
function connexionBD() {
    try {

        $bdd = new PDO('mysql:host=' . SERVEURBD . ';dbname=' . NOMDELABASE, LOGIN, MOTDEPASSE);
    } catch (Exception $ex) {
        die('<br />Pb connexion serveur BD : ' . $ex->getMessage());
    }
    return $bdd;
}

/**
 * Retourne, au format json, l'adresse de la personne dont l'id est passée en parametre
 * @param type $id
 */
function getAdresse($id) {
    // connexion BD
    $bdd = connexionBD();


    $requete = $bdd->prepare("select adresse from user where id = :idU ;");
    $requete->bindParam(":idU", $id);
    $requete->execute() or die(print_r($requete->errorInfo()));
    $adresse = utf8_encode($requete->fetchColumn());
    $requete->closeCursor();
    //on previent qu'on repond en json
    header('Content-Type: application/json;charset=utf-8');
    // envoyer les données au format json
    echo json_encode($adresse);
}

/**
 * Retourne, sous forme de tableau json, la liste des personnes (id,nom,prenom) de la table user
 */
function getListeUsers() {
    // connexion BD
    $bdd = connexionBD();
// utilisation de prepare plutot que query pour avoir le gestion des erreurs
    $requete = $bdd->prepare("select id,nom from user order by nom;");

    $requete->execute() or die(print_r($requete->errorInfo()));

    // creation du tableau
    $tabUsers = array();

    while ($tab = $requete->fetch()) {
        // ajout d'une case dans le tableau
        // la case est elle-même un tableau contenant 2 champs : id, nom
        array_push($tabUsers, array('id' => $tab['id'], 'nom' => utf8_encode($tab['nom'])));
    }
    $requete->closeCursor();
    //on previent qu'on repond en json
    header('Content-Type: application/json;charset=utf-8');
    // envoyer les données au format json
    echo json_encode($tabUsers);
}




function getPrenom($id) {
    // connexion BD
    $bdd = connexionBD();


    $requete = $bdd->prepare("select prenom from user where id = :idU ;");
    $requete->bindParam(":idU", $id);
    $requete->execute() or die(print_r($requete->errorInfo()));
    $prenom = utf8_encode($requete->fetchColumn());
    $requete->closeCursor();
    //on previent qu'on repond en json
    header('Content-Type: application/json;charset=utf-8');
    // envoyer les données au format json
    echo json_encode($prenom);
}