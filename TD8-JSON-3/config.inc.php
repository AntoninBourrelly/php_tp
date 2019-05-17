<?php

/*
 * To change this license header, choose License Haeders in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


define("SERVEURBD", "172.18.58.5");
define("LOGIN", "snir");
define("MOTDEPASSE", "snir");
define("NOMDELABASE", "tarifEssence");

function connexionBD(){
    try {
         $bdd = new PDO('mysql:host=' . SERVEURBD . ';dbname=' . NOMDELABASE, LOGIN, MOTDEPASSE);
  
    } catch (Exception $ex) {
        die('<br/>Pb connexion serveur BD: ' . $ex->getMessage());
    }
    return $bdd;
}


