
<link href="style.css" rel="stylesheet" type="text/css"/>

<?php
define("SERVEURBD", "172.18.58.14");
define("LOGIN", "snir");
define("MOTDEPASSE", "snir");
define("NOMDELABASE", "france2015plus");

/* * ************************************************************* * */

function connexionBd() {
    try {
        $bdd = new PDO('mysql:host=' . SERVEURBD . ';dbname=' .
                NOMDELABASE, LOGIN, MOTDEPASSE);
    } catch (Exception $ex) {
        die('<br/>Pb connexion serveur BD : ' . $ex->getMessage());
    }
    return $bdd;
}

/* * ************************************************************* * */

function afficherPersonne() {
    $bdd = connexionBd();
    $requete = $bdd->query("SELECT nom, prenom, dateNaissance, "
            . "ville_nom, ville_code_postal, "
            . "departement_nom, region_nom FROM utilisateurs, villes, "
            . "departements, regions "
            . "WHERE utilisateurs.ville_id = villes.ville_id "
            . "AND villes.ville_departement_id = departements.departement_id  "
            . "AND departements.departement_region_id = regions.regions_id;")
            or die(print_r($requete->errorInfo()));

    echo "<table>";
    echo "<tr> <th> Nom  </th> <th> Prenom </th> <th> Date de Naissance </th> "
    . "<th> Ville </th> <th> Code Postal </th> <th> Nom Departement </th> <th> "
    . "Nom Region </th> </tr>";
    while ($ligne = $requete->fetch()) {
        $prenom = $ligne['prenom'];
        $nom = $ligne['nom'];
        $dateNaissance = $ligne["dateNaissance"];
        $villeNom = $ligne["ville_nom"];
        $villeCP = $ligne["ville_code_postal"];
        $DepNom = $ligne["departement_nom"];
        $RegNom = $ligne["region_nom"];
        echo "<tr> <td>" . $nom . "</td> <td>" . $prenom . "</td> <td>" .
        $dateNaissance . "</td> <td>" . $villeNom . "</td> "
        . "<td class='CP'>" . $villeCP . "</td> <td>" . $DepNom . "</td> "
        . "<td>" . $RegNom . "</td> </tr>";
    }
    echo "</table>";
    $requete->closeCursor();
    
}

/* * ************************************************************* * */

function afficherVillesFromCp($codePostal) {
    $bdd = connexionBd();
    $requete = $bdd->prepare('SELECT ville_nom FROM villes WHERE '
            . 'villes.ville_code_postal = :cp ;');
    $requete->bindParam(':cp', $codePostal);
    $requete->execute() or die(print_r($requete->errorInfo()));

    $nbLigne = $requete->rowCount();

    if ($nbLigne == 0) {

        echo "Pas de code postal correspondant au numero : " . $codePostal .
        "<br/>";
    } else {     // il y au moins un code postal
        echo "<table>";
        echo "<tr> <th> Code Postal </th> <th> Nom Ville </th> </tr>";
        while ($ligne = $requete->fetch()) {
            $nomVille = $ligne["ville_nom"];
            echo "<tr> <td>" . $codePostal . "</td> <td>" . $nomVille . "</td> "
            . "</tr>";
        }
        echo "</table>";
    }
    $requete->closeCursor();
}

/* * ************************************************************* * */

function compterVillesCP($codePostal) {
    $bdd = connexionBd();
    $requete = $bdd->prepare('SELECT count(ville_id) AS nbVilles FROM villes '
            . 'WHERE villes.ville_code_postal = :cp ;');
    $requete->bindParam(':cp', $codePostal);
    $requete->execute() or die(print_r($requete->errorInfo()));
    echo "<br/> <br/>";
    while ($ligne = $requete->fetch()) {
        $compte = $ligne['nbVilles'];
    }
    echo "Il y a <b>" . $compte . "</b> villes correspondantes à ce code postal";
    $requete->closeCursor();
}

/* * ************************************************************* * */

function grouperVilleDep($dep) {
    $bdd = connexionBd();
    $requete = $bdd->prepare('SELECT count(ville_id) AS nbVilles '
            . 'FROM villes WHERE ville_departement = :dep GROUP '
            . 'BY ville_departement_id ;');
    $requete->bindParam(':dep', $dep);
    $requete->execute() or die(print_r($requete->errorInfo()));
    while ($ligne = $requete->fetch()) {
        $compte = $ligne['nbVilles'];
    }
    echo "<br/><br/>Il y a <b>" . $compte . "</b> villes dans ce département";
    $requete->closeCursor();
}

/* * ************************************************************* * */

function afficherNomDate() {
    $bdd = connexionBd();
    $requete = $bdd->query("SELECT nom, dateNaissance FROM utilisateurs;")
            or die(print_r($requete->errorInfo()));

    echo "<br/> <br/>";
    echo "<table>";
    echo "<tr> <th> Nom  </th> <th> Date de Naissance </th> </tr>";
    while ($ligne = $requete->fetch()) {
        $nom = $ligne['nom'];
        $dateNaissance = convertirDateNaissance($ligne["dateNaissance"]);
        echo "<tr> <td>" . $nom . "</td> <td>" . $dateNaissance . "</td>";
    }
    echo "</table>";
    $requete->closeCursor();
}

/* * ************************************************************* * */

function convertirDateNaissance($date) {
    $bdd = connexionBd();
    $bdd->query("set lc_time_names = 'fr_FR'");
    $requete = $bdd->prepare("SELECT dayname(:date) AS jour, DAY(:date) "
            . "AS num, monthname(:date) AS mois, year(:date) AS annee ;");
    $requete->bindParam(":date", $date);
    $requete->execute() or die(print_r($requete->errorInfo()));
    while ($ligne = $requete->fetch()) {
        $jour = $ligne["jour"];
        $num = $ligne["num"];
        $mois = $ligne["mois"];
        $annee = $ligne["annee"];
    }
    $date = $jour . " " . $num . " " . $mois . " " . $annee;
    $requete->closeCursor();
    return $date;
}

/* * *************************************************************** * */

function genererListePersonne() {
    $template = '<option value="%value%">%value%</option>';

    $bdd = connexionBd();
    $requete = $bdd->prepare("SELECT nom, prenom, dateNaissance FROM  "
            . "utilisateurs;");
    
    
    $requete->execute() or die(print_r($requete->errorInfo()));

    while ($data = $requete->fetch()) {
        $nom = $data['nom'];
        $prenom = $data['prenom'];
        $dateNaissance = convertirDateNaissance($data['dateNaissance']);
        $chaine = $nom . " " . $prenom . " " . $dateNaissance;
        $listeUtilisateurs = str_replace('%value%', $chaine, $template);
        echo $listeUtilisateurs;
    }

    $requete->closeCursor();
}
?>

