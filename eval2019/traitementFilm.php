<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'fonctionsVideotheque.inc.php';
ajoutFilm( $_POST['nomFilm'] ,extractIdGenre($_POST['listGenre']), $_POST['dureeFilm'] ,extractIdActeur($_POST['listActeur']) );