<?php

define("SERVEURBD", "172.18.58.14");
define("LOGIN", "snir");
define("MOTDEPASSE", "snir");
define("NOMDELABASE", "exempleAjax");

function connexionBD() {
    try {
        $bdd = new PDO('mysql:host=' . SERVEURBD . ';dbname=' . NOMDELABASE, LOGIN, MOTDEPASSE);
  
        
    } catch (Exception $ex) {
        die('<br/>PB de connexion serveur BD : ' . $ex->getMessage());
    }
    return $bdd;
}
