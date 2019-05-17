<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function afficherDonnees($tab) {
    echo"<h3>Affichage de l'ensemble des informations avec fonctions</h3>";
    echo"<h4>Identité:</h4>";
    echo "Nom: " . $tab['nom'] . "<br/>";
    echo "Prénom: " . $tab['prenom'] . "<br/>";
    echo "Ville: " . $tab['ville'] . "<br/>";
    echo "Em@il: " . $tab['email'] . "<br/>";
    echo "Site: " . $tab['site'] . "<br/>";
    echo "sexe: " . $tab['sexe'] . "<br/>";
    echo "photo: " . $tab['photo'] . "<br/>";
    echo"<h4>Connaissance:</h4>";
    echo "Login: " . $tab['login'] . "<br/>";
    echo "JAVA: " . $tab['java'] . "<br/>";
    echo "C: " . $tab['c'] . "<br/>";
    echo "PHP: " . $tab['php'] . "<br/>";
    echo "Autres: " . $tab['autre'] . "<br/>";
    echo"<h4>Identifiant:</h4>";
    echo "Login: " . $tab['login'] . "<br/>";
    echo "mdp: " . $tab['mdp'] . "<br/>";
    echo "Confirmation mot de passe: " . $tab['confmdp'] . "<br/>";
}

function afficherDonneesV2($tab) {
    echo"<h3>Affichage de l'ensemble des informations avec fonctions V2</h3>";
    foreach ($tab as $champ => $valeur) {
        echo "$champ : $valeur </br>";
    }
}

function afficherDonneesV3($tab) {
    echo"<h3>Affichage de l'ensemble des informations avec fonctions V3</h3>";
    echo"<pre>";
    print_r($tab);
    echo '</pre>';
}


function VerifierDoubleMotPasse($mdp1, $mdp2){
    
    if($mdp1 != $mdp2){
        echo"KO";
    } else{
        echo 'OK';
    }
    
}

function VerifierDoubleMotPasseV2($mdp1, $mdp2){
    
    $Verifmdp = false;
    
    if($mdp1 != $mdp2){
        $Verifmdp = true;
    } 
    
    return $Verifmdp;
    
}

function afficherCookie(){
    echo '<h3>Affichage du contenu du cookie</h3>';
    
    if (!isset($_COOKIE['monCookie'])) {
        echo 'Le cookie appelé mon Cookie est vide';
    } else {
        $tabCookie = unserialize($_COOKIE['monCookie']);
        
        foreach ($tabCookie as $champs => $valeur){
            echo "$champs : $valeur </br>";
        }
    }
}