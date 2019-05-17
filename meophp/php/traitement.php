<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* * *********************** Sans Cookies ********************** * */

/* * *********** Version 1 : Methode GET ***************** * */

//echo "<h1>Page traitement formulaire</h1>";
//echo'<br/>';
//$nom = $_GET["nom"];
//$prenom = $_GET["prenom"];
//$ddn = $_GET["ddn"];

/* * *********************************************************** * */

/* * *********** Version 2 : Methode POST ***************** * */


$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$ddn = $_POST["ddn"];

/* * *********************************************************** * */

/* * ****************** Version sans fonction ***************** * */

//echo "<h3>Affiche les éléments du formualire</h3>";
//echo "Nom : $nom <br/> <br/> Prénom : $prenom <br/> <br/> Date de naissance : $ddn";

/* * ****************** Avec fonctions ************************ * */ 

require_once 'fonctions.inc.php';
afficherFormulaire($nom,$prenom,$ddn);
afficherCookie();

/* * *********** Avec cookie *********** * */

setcookie("nomCookie", $nom,0,"/");
setcookie("prenomCookie", $prenom,0,"/");
setcookie("ddnCookie", $ddn,0,"/");

/* * *********************************** * */