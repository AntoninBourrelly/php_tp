<?php

require_once 'config.inc.php';

function obtenirValeur() {
    $bdd = connexionBD();
    $requete = $bdd->prepare("SELECT * FROM `prixEssence`;");
    $requete->execute() or die(print_r($requete->errorInfo()));
    // prepare -> prépare une requete (si ya des parametres à faire passer)
    // query -> executer directement le requete
    $valeurs = array();
    $prix = array();
    while ($ligne = $requete->fetch()) {
        $prix["gazoil"] = floatval($ligne['gazoil']);
        $prix["super95"] = floatval($ligne['super95']);
        $prix["super98"] = floatval($ligne['super98']);
        $prix["brent"] = floatval($ligne['brent']);
        $valeurs[$ligne['annee']] = $prix;
    }echo json_encode($valeurs, JSON_FORCE_OBJECT);
}

function obtenirValeurCSV() {
    $bdd = connexionBD();
    $requete = $bdd->query("SELECT * from `prixEssence`;");
    $csv = "";
    $csv = "année,gazoil,super95,super98,brent\n";
    while ($ligne = $requete->fetch()) {
        $csv .= $ligne['annee'] . ',';
        $csv .= $ligne['gazoil'] . ',';
        $csv .= $ligne['super95'] . ',';
        $csv .= $ligne['super98'] . ',';
        $csv .= $ligne['brent'] . "\n";
    }
    return $csv;
}

/////////////////////////////////////////////
header("Access-Control-Allow-Origin: *");

if(isset($_GET["type"])){
   $type = $_GET["type"];
switch ($type) {
    case "csv":
    case "CSV":
        echo obtenirValeurCSV();
        $nom_fichier = "prix_essence.csv";
        header('Content-Type: application/csv-tab-delimited-table');
        header('Content-Disposition: attachment; filename=' . $nom_fichier);
        break;
    case 'json':
    case 'JSON':
        obtenirValeur();
        header('Content-type: application/json');
        break;
    default:
        obtenirValeur();
        header('Content-type: application/json');
        break;
} 
}
else {
    echo "ERROR";
}

?>