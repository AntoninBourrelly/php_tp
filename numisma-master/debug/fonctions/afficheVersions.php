<link href="../../css/style.css" rel="stylesheet" type="text/css"/>
<link href="../../css/numisma.main.css" rel="stylesheet" type="text/css"/>
<?php
require_once '../../includes/config-db.inc.php';
require_once '../../includes/fonctions.inc.php';


$master= $_GET["master"];

afficheVersions($master);
