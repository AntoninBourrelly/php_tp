<!DOCTYPE html>
<html>
    <head>
        <title>Numisma</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/numisma.main.css">
    </head>
    <body><h5><i>
	<?php
	require_once 'debug_fonctions.inc.php';
	numisma_core_version();
	?></h5></i>
<h1> Numisma </h1>
<h2> Debug Zone </h2>
        <h3> fonctions.inc.php </h3>
		<div>
		<h3> Trouver un jeu en fonction de son nom: </h3>


            <form action="fonctions/TrouverJeuEnFonctionDeSonNom.php" method="get">
                <label for="master">Donnez un nom de jeu</label>
                <input type="text" name="master" id="master"/> <br/>
                <input type="submit"/>

            </form>
        </div>
		<br/>

		<div>
		<h3> afficheMaster(): </h3>


            <form action="fonctions/afficheMaster.php" method="get">
                <label for="master">id_master</label>
                <input type="text" name="master" id="master"/> <br/>
                <input type="submit"/>

            </form>
        </div>

		<br/>

		<div>
		<h3> afficheVersions(): </h3>


            <form action="fonctions/afficheVersions.php" method="get">
                <label for="master">id_master</label>
                <input type="text" name="master" id="master"/> <br/>
                <input type="submit"/>

            </form>
        </div>
		<br/>
    <div>
		<h3> afficheVersion(): </h3>


            <form action="fonctions/afficheVersion.php" method="get">
                <label for="master">id_version</label>
                <input type="text" name="version" id="version"/> <br/>
                <input type="submit"/>

            </form>
        </div>
        <br/>
		<div>
		<h3> <a href="../pages/create_master.php">create_master.php</a> </h3>
    <h3> <a href="../pages/create_version.php">create_version.php</a> </h3>
		<h3> <a href="../pages/create_developpeur.php">create_developpeur.php</a> </h3>
    	<h3> <a href="../pages/create_editeur.php">create_editeur.php</a> </h3>
		<h3> <a href="../pages/create_genre.php">create_genre.php</a> </h3>
    	<h3> <a href="../pages/create_serie.php">create_serie.php</a> </h3>
    <br/>
    	<h3> <a href="fonctions/listerMasterGlobal.php">listerMasterGlobal.php</a> </h3>
		</div>
    </body>

</html>
