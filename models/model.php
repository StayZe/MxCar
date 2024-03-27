<?php

  $host_name = 'db5015596541.hosting-data.io';
  $database = 'dbs12738824';
  $user_name = 'dbu333386';
  $password = '0nMZt5fG3PfvvWfZHIUR#';
  $dbh = null;

  try {
    $db = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
    echo 'connecté';
  } catch (PDOException $e) {
    echo "Erreur!:" . $e->getMessage() . "<br/>";
    die();
  }
