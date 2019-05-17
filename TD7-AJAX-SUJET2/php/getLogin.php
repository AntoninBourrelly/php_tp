<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$login = $_POST['login'];
require_once '../inc/fonctions.inc.php';
verifierLogin($login);
?>