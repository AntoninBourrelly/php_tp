<!DOCTYPE html>
<html>
    <head>
        <title>Personnes appartennant à la BD</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            table,th,td {
                border: 1px black ridge;
            }
            table {
                border-collapse: collapse;
            }
        </style>
    </head>
    <body>

        <?php
        require_once './fonctions.inc';
        afficherVillesFromCp($_POST['cp']);
        compterVillesCP($_POST['cp']);
        grouperVilleDep($_POST['dep']);
        ?>
        
      
        <form> 
            <br/>
            <br/>
            <a href='formulaireCodePostal.php'> <input type='button'value='Retour'> </a> 
        </form>

    </body>
</html>