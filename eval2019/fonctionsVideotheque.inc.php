
<link href="style.css" rel="stylesheet" type="text/css"/>
<?php
/* * *************** Conexxion BDD ************** * */

define("SERVEURBD", "172.18.58.14");
define("LOGIN", "snir");
define("MOTDEPASSE", "snir");
define("NOMDELABASE", "BourrellyEval2019");

function connexionBd() {
    try {
        $bdd = new PDO('mysql:host=' . SERVEURBD . ';dbname=' .
                NOMDELABASE, LOGIN, MOTDEPASSE);
    } catch (Exception $ex) {
        die('<br/>Pb connexion serveur BD : ' . $ex->getMessage());
    }
    return $bdd;
}

/* * *************** afficherFilms -> duree desc  *************** * */

function AfficherFilms() {
    $bdd = connexionBd();
    $requete = $bdd->query("SELECT titre,duree FROM film ORDER BY duree DESC;")
            or die(print_r($requete->errorInfo()));

    echo "<br/> <br/>";
    echo "<h4>Affichage des films et la durée</h4>";
    echo "<table>";
    echo "<tr> <th> Titre du film </th> <th> Durée </th> </tr>";
    while ($ligne = $requete->fetch()) {
        $titre = $ligne['titre'];
        $duree = $ligne["duree"];
        echo "<tr> <td>" . $titre . "</td> <td>" . $duree . "</td>";
    }
    echo "</table>";
    $requete->closeCursor();
}

/* * **************** afficherFilm -> Acteur *************** * */

function ListeFilmFromActeur($nomAct) {
    $bdd = connexionBd();
    $requete = $bdd->prepare("SELECT genreFilm , titre , duree from film,genre,acteur where film.idActeur = acteur.idActeur and acteur.nomActeur like :nomAct and film.idGenre = genre.idGenre;");
    $requete->bindParam(':nomAct', $nomAct);
    $requete->execute() or die(print_r($requete->errorInfo()));

    echo "<br/> <br/>";
    echo "<h4>Affichage des films de l'acteur $nomAct</h4>";
    echo "<table>";
    echo "<tr> <th> Genre </th> <th> Titre du film </th> <th> Durée </th> </tr>";
    while ($ligne = $requete->fetch()) {
        $titre = $ligne['titre'];
        $duree = $ligne["duree"];
        $genre = $ligne['genreFilm'];
        echo "<tr> <td>" . $titre . "</td> <td>" . $genre . "</td> <td>" . $duree . "</td>";
    }
    echo "</table>";
    $requete->closeCursor();
}

/* * ********* générer lite genre *********** * */

function getListGenre() {
    $template = '<option value="%value%">%value%</option>';

    $bdd = connexionBd();
    $requete = $bdd->prepare("SELECT genreFilm FROM genre ;");
    
    
    $requete->execute() or die(print_r($requete->errorInfo()));

    while ($data = $requete->fetch()) {
        $genre = $data['genreFilm'];
        $liste = str_replace('%value%', $genre, $template);
        echo $liste;
    }

    $requete->closeCursor();
    
    
}
/* * ********* générer lite acteur *********** * */

function getListActeur() {
    $template = '<option value="%value%">%value%</option>';

    $bdd = connexionBd();
    $requete = $bdd->prepare("SELECT nomActeur FROM acteur ;");
    
    
    $requete->execute() or die(print_r($requete->errorInfo()));

    while ($data = $requete->fetch()) {
        $nomAct = $data['nomActeur'];
        $liste = str_replace('%value%', $nomAct, $template);
        echo $liste;
    }

    $requete->closeCursor();
}




/* * ************* afficheNomFilmsDuree ************** * */

function afficheNomFilmsDuree($genre) {
        $bdd = connexionBd();
    $requete = $bdd->prepare("select titre,duree, CONCAT(nomActeur,prenomActeur) "
            . "from film, acteur, genre where film.idGenre = genre.idGenre "
            . "and genre.genreFilm = :genre and film.idActeur = acteur.idActeur;");
    $requete->bindParam(':genre', $genre);
    $requete->execute() or die(print_r($requete->errorInfo()));

    echo "<br/> <br/>";
    echo "<h4>Affichage des films du genre $genre</h4>";
    echo "<table>";
    echo "<tr> <th> titre du Film </th> <th> Durée </th> <th> Acteur </th> </tr>";
    while ($ligne = $requete->fetch()) {
        $titre = $ligne['titre'];
        $duree = $ligne["duree"];
        $acteur = $ligne['CONCAT(nomActeur,prenomActeur)'];
        echo "<tr> <td>" . $titre . "</td> <td>" . $duree . "</td> <td>" . $acteur . "</td>";
    }
    echo "</table>";
    $requete->closeCursor();
}


/* * ********** extractIdGenre ***** * */

function extractIdGenre($genre){
    $bdd = connexionBd();
    $requete = $bdd->prepare(" select idGenre from genre where genreFilm = :genre ;");
    $requete->bindParam(":genre", $genre);
    $requete->execute() or die(print_r($requete->errorInfo()));
    while ($ligne = $requete->fetch()) {
        $idGenre = $ligne['idGenre'];
    }
    $requete->closeCursor();
    return $idGenre;
}


/* * ********** extractIdActeur ***** * */

function extractIdActeur($nomAct){
    $bdd = connexionBd();
    $requete = $bdd->prepare(" select idActeur from acteur where nomActeur = :nomAct ;");
    $requete->bindParam(":nomAct", $nomAct);
    $requete->execute() or die(print_r($requete->errorInfo()));
    while ($ligne = $requete->fetch()) {
        $idAct = $ligne['idActeur'];
    }
    $requete->closeCursor();
    return $idAct;
}

/* * ********* Ajou Film ************ * */

function ajoutFilm($titre,$nomAct ,$duree,$genre) {
    $bdd = connexionBd();
    $requete = $bdd->prepare("insert into film(titre,duree,idGenre,idActeur) values (':titre',':duree',':genre',':nomAct');");
    $requete->bindParam(":titre", $titre);
    $requete->bindParam(":nomAct", $nomAct);
    $requete->bindParam(":duree", $duree);
    $requete->bindParam(":genre", $genre);
    $requete->execute() or die(print_r($requete->errorInfo()));

    $requete->closeCursor();
}
