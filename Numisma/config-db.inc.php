<?php

/*
 * Fichier à inserer sur chaque début de page
 */

define("SERVEURBD", "172.18.58.14");
define("LOGIN", "snir");
define("MOTDEPASSE", "snir");
define("NOMDELABASE", "mcoeurjoly");

function connexionBD(){
    try {
         $bdd = new PDO('mysql:host=' . SERVEURBD . ';dbname=' . NOMDELABASE, LOGIN, MOTDEPASSE);
         // $bdd = new PDO('mysql:host=127.0.0.1; dbname=numisma_jv;',"root","");
    } catch (Exception $ex) {
        die('<br/>Pb connexion serveur BD: ' . $ex->getMessage());
    }
    return $bdd;
}
