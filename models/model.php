<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=MxCar;charset=utf8', 'root', '');
} catch (Exception $e) {
    echo "Erreur de connexion à la base de données : ";
}