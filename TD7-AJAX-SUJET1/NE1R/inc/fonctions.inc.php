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

function verifierLogin($log, $mdp) {
    $bdd = connexionBD();
// recherche du couple login/mdp dans la table user
    //$requete = $bdd->prepare("select id from user where login = :log and mdp = :mdp ;");
    $requete = $bdd->prepare("select mdp from user where login = :log;");
    $requete->bindParam(":log", $log);
    //$requete->bindParam(":mdp", $mdp);
    $requete->execute() or die(print_r($requete->errorInfo()));
// comptage du nombre de resultats
    $nbLigne = $requete->rowCount();
    
        
    if ($nbLigne == 0) {// le login n'est pas présent dans la table user
        // il faudra retourner 'r'
        $retour = 'r';
    } else {   // le login est présent dans la table user
        if ($nbLigne == 1) {    // il n'y a qu'un login correspondant
            
            if ($mdp == $requete->fetchColumn()) {  // le mdp est correct
                $retour = 'v';
            } else {    // login ok, mais mdp pas ok
                $retour = 'o';
            }
        } else {   // plusieurs login correspondant 
            $retour = 'o';
            while ($ligne = $requete->fetch()) {
                if ($ligne['mdp'] == $mdp) {
                    $retour = 'v';
                }
            }
        }
    }
 $requete->closeCursor();
    
//on previent qu'on repond en json
    header('Content-Type: application/json;charset=utf-8');
    // envoyer les données au format json
    echo json_encode($retour);
}