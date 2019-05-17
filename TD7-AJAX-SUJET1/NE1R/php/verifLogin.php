<?php
require_once '../inc/fonctions.inc';

$log=$_POST['login'];
$mdp=$_POST['mdp'];

verifierLogin($log, $mdp);