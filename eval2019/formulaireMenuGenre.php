 <html>
     
     <head>
        <title>Personnes appartennant à la BD</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
    </head>
    <body>

        <form action="traitementGenre.php" method="POST">
            <label for="listGenre">Choisir un genre</label>
            <select name="listGenre" id="listGenre">
                <option> </option>

                <?php
                require_once 'fonctionsVideotheque.inc.php';
                getListGenre();
                ?>
            </select>
            <input type="submit" name="submit" />
        </form>
    </body>
 </html>