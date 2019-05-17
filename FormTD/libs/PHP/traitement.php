<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/* * ****************** Créer une ligne de Cookie ********************** * */

$tabCookie=array(
    "Nom" => $_POST['nom'],
    "Prenom" => $_POST['prenom'],
    "Email" => $_POST['email'],
    "OS" => $_POST['SE'],
    "Version" => $_POST['version']);

$tabCookieSerialized = serialize($tabCookie);

setcookie("monCookie",$tabCookieSerialized,0,"/");

/* * ***************** Obtenir les informations ************************ * */

echo"<h3>Affichage de l'ensemble des informations sans fonctions</h3>";
echo"<h4>Identité:</h4>";
echo "Nom: ". $_POST['nom']. "<br/>";
echo "Prénom: ". $_POST['prenom']. "<br/>";
echo "Ville: ". $_POST['ville']. "<br/>";
echo "Em@il: ". $_POST['email']. "<br/>";
echo "Site: ". $_POST['site']. "<br/>";
echo "sexe: ". $_POST['sexe']. "<br/>";
echo "photo: ". $_POST['photo']. "<br/>";
echo"<h4>Identifiant:</h4>";
echo "Login: ". $_POST['login']. "<br/>";
echo "mdp: ". $_POST['mdp']. "<br/>";
echo "Confirmation mot de passe: ". $_POST['confmdp']. "<br/>";
echo"<h4>Connaissance:</h4>";
echo "Login: ". $_POST['login']. "<br/>";
echo "JAVA: ". $_POST['java']. "<br/>";
echo "C: ". $_POST['c']. "<br/>";
echo "PHP: ". $_POST['php']. "<br/>";
echo "Autres: ". $_POST['autre']. "<br/>";

require_once './fonctions.inc.php';
afficherDonnees($_POST); //Affichage version 1
afficherDonneesV2($_POST); //Affichage version 2
afficherDonneesV3($_POST); //Affichage version 2


/* * ******************* vérificatiojn mot de passe ******************** * */
echo"<h3>Verification mot de passe : </h3></br>";
VerifierDoubleMotPasse($_POST["mdp"], $_POST["confmdp"]);


echo"<h3>Verification mot de passe V2 : </h3></br>";
$ReponseVerif = VerifierDoubleMotPasseV2($_POST['mdp'], $_POST['confmdp']);

if($ReponseVerif){
    echo"ko";
} else {
    echo 'ok';
}


/* * ************************* Afficher cookie ********************* * */
afficherCookie();