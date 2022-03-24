<?php

const HOST = 'localhost';
const DATABASE = 'timken_test';
const USERNAME = 'timken';
const PASSWORD = 'root';

try {
    $pdo_connect = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8', USERNAME, PASSWORD);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$VIEW_ACCESS = $_GET['condition'];

// Les administrateurs pourront switch l'accès au dashboard pour les employés sur le panel.

$DB_REQUEST_CONFIRM_USER_VIEW_PERMISSION = 'SELECT * FROM `panel_manage_access` WHERE `username` = "employee";';
$DB_QUERY = $pdo_connect->query($DB_REQUEST_CONFIRM_USER_VIEW_PERMISSION);

while ($AUTH = $DB_QUERY->fetch()) {

    if ($AUTH['status'] == 0) {
        echo 'false';
    } elseif ($AUTH['status'] == 1) {
        echo 'true';
    }

}

$DB_QUERY->closeCursor();