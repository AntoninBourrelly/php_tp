<?php
$source=$_GET['typeDemande'];
require_once '../inc/fonctions.inc.php';

switch ($source){
    case 'o':getListeOs(); break;
    case 'v':getListeVersionsFromIdOs($_GET['os']);break;
    
}

