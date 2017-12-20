<?php

try
{
    // On se connecte à MySQL
    $bd = new PDO('mysql:host=localhost;dbname=fcsochaux;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}