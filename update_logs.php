<?php


$VIEW_ACCESS = $_GET['condition'];

$dbhost = 'localhost';
$db = 'timken_test';
$dbuser = 'timken';
$dbpass = 'root';

try {
    $pdo_connect = new PDO('mysql:host=' . $dbhost . ';dbname=' . $db . ';charset=utf8', $dbuser, $dbpass);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

