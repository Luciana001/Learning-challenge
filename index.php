<?php

try {
    $db = new PDO("mysql:host=mysql;dbname=classicmodels;port=3306", "root", "root");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

// ex 1
try {
    $results = $db->prepare("SELECT COUNT(*) FROM customers");
    $results->execute();
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

$results = $results->fetch();
echo '<strong><hr>' . 'Question n° 1: ' . '</strong><br><br>'. $results['COUNT(*)'] . '<br>'; 
?>