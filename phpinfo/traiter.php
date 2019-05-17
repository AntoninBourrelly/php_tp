<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo "Votre login est : ". $_POST["login"]. " <br/>";
        echo "Votre mot de passe est : ". $_POST["motDePasse"]. "<br/>";
        
        $login = $_POST["login"];
        $mdPasse = $_POST("motDePasse");
        
        require_once './fonction.inc.php';
        
        if(VerifierLogin($login, $mdPasse))
        {
            echo "Utilisateur identifié";
        } else {
            echo "Mauvais login ou mauvais mot de passe";
        }
        ?>
    </body>
</html>
