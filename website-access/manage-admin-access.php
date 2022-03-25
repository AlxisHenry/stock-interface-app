<?php

$Userid = $_GET['id'];
$pass = $_GET['pass'];

const HOST = 'localhost';
const DATABASE = 'timken_test';
const USERNAME = 'timken';
const PASSWORD = 'root';

try {
    $pdo_connect = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8', USERNAME, PASSWORD);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$DB_REQUEST = "SELECT * FROM `panel_manage_access` WHERE `username` = 'tf$Userid'";

$DB_QUERY = $pdo_connect->query($DB_REQUEST);

while ($AUTH = $DB_QUERY->fetch()) {

    if ($AUTH['username'] == "tf$Userid" && $AUTH['password'] == $pass) {

        $DB_REQUEST_UPDATE_ACCOUNT = "UPDATE `panel_manage_access` SET `derniereConnection` = (SELECT NOW()) WHERE `username` = 'tf$Userid'";
        $DB_QUERY = $pdo_connect->query($DB_REQUEST_UPDATE_ACCOUNT);
        $DB_QUERY->closeCursor();

        echo "true";
    } else {
        echo "false";
    }
}

$DB_QUERY->closeCursor();

