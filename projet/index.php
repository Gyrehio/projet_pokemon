<?php
date_default_timezone_set('Europe/Paris'); // Modifie le php.ini pour mettre le fuseau horaire de Paris

require 'controller/Routeur.php';

$routeur = new Routeur();
$routeur->routerRequete();

?>