<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

-
// Une liste d'utilisateurs, juste pour l'exemple.
// En pratique on chercherait dans une base de données.
$utilisateurs=array(
   'joe'   =>array('nom'=>'Joe C.','score'=>34,'age'=>22),
   'martin'=>array('nom'=>'Martin','score'=>3 ,'age'=>7 ),
   'karim' =>array('nom'=>'Karim' ,'score'=>45,'age'=>19),
   'leila' =>array('nom'=>'Leïla' ,'score'=>49,'age'=>23),
);
header('Content-Type: application/json');
echo json_encode($user);