<!DOCTYPE html>

<html>
    <head>
        <title>Ajout Film</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>
    <body>

        <form action="traitementFilm.php" method="post">
            <label for="nomFilm">Titre du film : </label>
            <input type="text" name="nomFilm" />
            <label for="listGenre">Choisir un Acteur : </label>
            <select name="listActeur" id="listActeur">
                <option> </option>
                
                <?php
                require_once 'fonctionsVideotheque.inc.php';
                getListActeur();
                ?>
            </select>
            
            
            <br/><br/>
            
            
            <label for="nomFilm">Duree du film : </label>
            <input type="text" name="dureeFilm" />
            <label for="listGenre">Choisir un Genre : </label>
            <select name="listGenre" id="listGenre">
                <option> </option>
                <?php
                require_once 'fonctionsVideotheque.inc.php';
                getListGenre();
                ?>
            </select>
            
            <br/><br/>
            
            <input type="submit" value="Envoyer"/>
            <br/><br/>
        </form>
    </body>
</html>