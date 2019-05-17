<!DOCTYPE html>
<html>
    <head>
        <title>Formulaire</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/libs/jquery/jquery.js" type="text/javascript"></script>
        <script src="formddn.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
        if (isset($_COOKIE['nomCookie']) && isset($_COOKIE['prenomCookie']) && isset($_COOKIE['ddnCookie'])) {
            echo '<br/><br/><br/>';
            echo "<h3> Avec les cookies</h3>";
            echo "Nom :" . $_COOKIE["nomCookie"] . " <br/> <br/> "
            . "Prénom :" . $_COOKIE["prenomCookie"] . " <br/> <br/> "
            . "Date de naissance :" . $_COOKIE["ddnCookie"];
        } else {
            echo '<div>
            <form id = "formulaireNaissance" action = "php/traitement.php" method = "post">
            <label for = "nom" > Nom</label>
            <input type = "text" name = "nom" id = "nom" /><br/>
            <label for = "nom" > Prénom</label>
            <input type = "text" name = "prenom" id = "prenom" /><br/>
            <label for = "nom" > Date de naissance (JJ/MM/AAAA)</label>
            <input type = "text" name = "ddn" id = "ddn" required = "required"/><br/>
            <input type = "submit" />
            </form>
        </div>';
        }
        ?>
    </body>
</html>
