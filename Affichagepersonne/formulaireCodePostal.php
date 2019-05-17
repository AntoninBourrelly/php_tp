<!DOCTYPE html>
<html>
    <head>
        <title>Formulaire Code Postal</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <form action="affichageCP.php" method="post">
                <label for="cp">Code postal</label>
                <input type="number" name="cp" id="cp" maxlength="5"/> <br/>
                <input type="submit" value="Envoyer"/>
            </form>

            <br/> <br/>
            <form action="affichageCP.php" method="post">
                <label for="cp">Departement</label>
                <input type="number" name="dep" id="dep"/> <br/>
                <input type="submit" value="Envoyer"/>
            </form>

            <form> 
                <br/><br/>
                <a href='index.html'> <input type='button'value='Retour'> </a> 
            </form>


        </div>
    </body>
</html>

