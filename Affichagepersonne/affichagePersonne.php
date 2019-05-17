<!DOCTYPE html>

<html>
    <head>
        <title>Personnes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            th,td {
                border: 1px;
            }
            table {
                border-collapse: collapse;
            }
        </style>
        <link href="style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>

        <form action="datePicker.html" method="post">
            <label>Choisissez une personne : </label>
            <select name="listePersonne" id="listePersonne">
                <option> </option>



                <?php
                require_once './fonctions.inc';
                genererListePersonne();
                ?>
            </select>
            <input type="submit" value="Envoyer"/>
            <br/><br/>
        </form>

        <?php
        require_once './fonctions.inc';
        afficherPersonne();
        afficherNomDate();
        ?>

        <form> 
            <a href='index.html'> <input type='button'value='Retour'> </a> 
        </form>

    </body>
</html>