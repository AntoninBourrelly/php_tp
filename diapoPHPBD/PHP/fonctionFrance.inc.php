<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


define("SERVEURRDB","172.18.58.14");
define("LOGIN","snir");
define("MOTDEPASSE","snir");
define("NOMDELABASE","france2015plus");

function connexionBD(){
    try{
        $bdd= new PDO('mysql:host' . SERVEURBD . ';dbname=' . NOMDELABASE , LOGIN , MOTDEPASSE );
    } catch (Exception $ex) {
        die('<br/> Pb connexion serveur BD : ' .$ex->getMessage());
    }
    return $bdd;
    
}

/* * ********************* fonctions ********************** * */

function getNomDepartmentFromVille($ville) {
    
    // connexion à la base et selection de la BD
    $bdd = connexionBD();
    
    // preparation de la requete SQL
    $requete=$bdd -> prepare("select departement_nom FROM villes, departements "
            ."WHERE departements.departement_id=villes.ville_departement_id "
            ."AND ville_nom like :laville;");
    
    //remplacement des variables de la requete apr les valeurs effectives
    $requete->bindParam(":laville", $ville);
    
    // execution de la requete
    $requete->execute() or die(print_r($requete->errorInfo()));
    
    //recuperation du nombre de ligne retourné par la requete
    $nbLigne = $requete->rowCount();
    
  
}