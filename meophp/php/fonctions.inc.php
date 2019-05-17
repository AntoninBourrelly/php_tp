<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function afficherFormulaire($nom, $prenom, $ddn) {
echo "<h3>Affiche les éléments du formualire</h3>";
echo "Nom : $nom <br/> <br/> "
. "Prénom : $prenom <br/> <br/> "
. "Date de naissance : $ddn";


}

function afficherCookie(){
echo '<br/><br/><br/>';
echo "<h3> Avec les cookies</h3>";
echo "Nom :". $_COOKIE["nomCookie"]." <br/> <br/> "
. "Prénom :". $_COOKIE["prenomCookie"]." <br/> <br/> "
. "Date de naissance :". $_COOKIE["ddnCookie"] ;
}