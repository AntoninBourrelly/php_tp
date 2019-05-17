<?php

$source=$_GET['typeDemande'];
require_once '../inc/fonctions.inc.php';

switch ($source){
    case 'r':getListeRegions(); break;
    case 'd':getListeDepartementsFromIdRegion($_GET['idRegion']);break;
    case 'v':getListeVillesFromIdDepartement($_GET['idDepartement']);break;
}