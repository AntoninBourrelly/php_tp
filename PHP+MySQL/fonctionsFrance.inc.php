<?php

/*
 * To change this license header, choose License Haeders in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


define("SERVEURBD", "172.18.58.14");
define("LOGIN", "snir");
define("MOTDEPASSE", "snir");
define("NOMDELABASE", "france2015plus");

function connexionBD() {
    try {
        $bdd = new PDO('mysql:host=' . SERVEURBD . ';dbname=' . NOMDELABASE, LOGIN, MOTDEPASSE);
        //  $bdd = new PDO('mysql:host=172.18.58.14; dbname=france2015plus;',"snir","snir");
    } catch (Exception $ex) {
        die('<br/>Pb connexion serveur BD: ' . $ex->getMessage());
    }
    return $bdd;
}

function getNomDepartementFromVille($ville) {
    // connexion à la base et selection de la BDD
    $bdd = connexionBD();

    // preparation de la requete SQL
    $requete = $bdd->prepare("select departement_nom from villes,departements "
            . "where departements.departement_id=villes.ville_departement_id "
            . "and ville_nom like :laville ;");


    // remplacement des variables de la requete par les valeurs effectives
    $requete->bindParam(":laville", $ville);

    // execution de la requete
    $requete->execute() or die(print_r($requete->errorInfo()));

    // recuperation du nombre de ligne retourné par la requete

    $nbLigne = $requete->rowCount();

    // si pas de correspondance
    if ($nbLigne == 0) {
        $nomDep = "pas de departement correspondant";
    }
    // si une seule correspondance
    if ($nbLigne == 1) {
        $nomDep = $requete->fetchColumn(0);
    }
    // si plus d'une seule correspondance
    if ($nbLigne > 1) {
        $nomDep = "";
        while ($ligne = $requete->fetch()) {
            $nomDep = $nomDep . "<br/>" . $ligne['departement_nom'];
        }
    }
    // liberation des ressources de la requete
    $requete->closeCursor();

    // retourne la chaine correspondante au departement
    return $nomDep;
}

function afficheRegions() {

    $bdd = connexionBD();
    $requete = $bdd->prepare("SELECT region_nom from regions; ");

    $requete->execute() or die(print_r($requete->errorInfo()));

    while ($ligne = $requete->fetch()) {
        echo $ligne['region_nom'] . "<br/>";
    }
    $requete->closeCursor();
}

function afficheDepartementsRegions(){
      $bdd = connexionBD();
    $requete = $bdd->prepare("SELECT departement_nom, region_nom from regions,departements "
            . "WHERE departements.departement_region_id like regions.regions_id ORDER BY `regions`.`region_nom` asc;");
$requete->execute() or die(print_r($requete->errorInfo()));
echo"<table id='table'><tr>"
         . "<th class='titre'>Nom Région</th> <th class='titre'>Nom département</th></tr>";
    
while ($ligne = $requete->fetch()) {     
           echo"<tr> <td>".$ligne['region_nom']."</td>"
                 . "<td>".$ligne['departement_nom']."</td>";
    }
    echo "</tr></table>";
    $requete->closeCursor();
}

function afficheNomDepartementFromNumero($numDept) {
    $bdd = connexionBD();

/*    $requete = $bdd->prepare("SELECT departement_nom, region_nom from regions,departements "
            . "where departements.departement_region_id = regions.regions_id "
            . "and departement_code like ".$numDept." ;");
*/
    
$requete = $bdd->prepare("SELECT departement_nom, region_nom from regions,departements "
            . "where departements.departement_region_id = regions.regions_id "
            . "and departement_code like :dept ;");
    $requete->bindParam(":dept",$numDept);

    $requete->execute() or die(print_r($requete->errorInfo()));

     while ($ligne = $requete->fetch()) {
         echo"<table id='table'><tr><th class='titre'>Numéro département</th>"
         . "<th class='titre'>Nom Région</th> <th class='titre'>Nom département</th></tr>"
            . "<tr> <td>".$numDept. "</td><td>".$ligne['region_nom']."</td>"
                 . "<td>".$ligne['departement_nom']."</td></tr></table>";
         
     }
}

function afficheNomDepartementFromRegion($numReg) {
    $bdd = connexionBD();
    $requete = $bdd->prepare("SELECT departement_nom, departement_code FROM "
            . "regions,departements WHERE departement_region_id = regions_id and regions.region_nom like  :leNomRegion ;");

    //remplacement des variables de la requete par les valeurs effectives
    $requete->bindParam(":leNomRegion", $numReg);

    $requete->execute() or die(print_r($requete->errorInfo()));
    while ($ligne = $requete->fetch()) {
        echo"<table><tr><th>Nom Département</th>"
        . "<th>Numéro De Département</th></tr>"
        . "<tr><td>" . $ligne['departement_nom'] . "</td> "
        . "<td>" . $ligne['departement_code'] . "</td></tr>"
        . "</table> ";
    }
    
    echo "<form> <a href='formulaireVille.html'> <input type='button' value='Retour'> </a> </form>";
}

