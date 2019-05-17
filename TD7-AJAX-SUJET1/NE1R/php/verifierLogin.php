<?php
require_once '../inc/fonctions.inc.php';

$log=$_POST['login'];
$mdp=$_POST['mdp'];

verifierLogin($log, $mdp);