<!DOCTYPE html>
<html>
    <head>
        <title>Numisma</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../../css/numisma.main.css">
    <link href="../../css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
	<header>
	  <nav>
	  <ul>
	  <li> <h1> Numisma</h1> </li>
	  </ul>
			</nav>
	</header>


        <div>

          <?php
          require_once '../../includes/config-db.inc.php';
          require_once '../../includes/fonctions.inc.php';


          $version= $_GET["version"];

          afficheVersion($version);
?>

        </div>
    </body>
</html>
