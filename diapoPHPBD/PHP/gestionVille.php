<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'fonctionFrance.inc.php';

/* * *************** departement selon la vile ************* * */

$nomVille= $_POST["ville"];

$nomDepartement = getNomDepartementFromVille($nomVille);

echo '<div>';
echo "ville de <b> $nomVille </b> se trouve dans le departement : <br/>";
echo "<b>$nomDepartement</b>";
echo"</div>";

