<?php

include './../configuration/database-connexion.php';

$Userid = $_POST['id'];
$pass = $_POST['pass'];

$DB_REQUEST = "SELECT * FROM `panel_manage_access` WHERE `username` = 'tf$Userid'";

$DB_QUERY = Connection()->query($DB_REQUEST);

while ($AUTH = $DB_QUERY->fetch()) {

    if ($AUTH['username'] == "tf$Userid" && $AUTH['password'] == $pass) {

        $DB_REQUEST_UPDATE_ACCOUNT = "UPDATE `panel_manage_access` SET `derniereConnection` = (SELECT NOW()) WHERE `username` = 'tf$Userid'";
        $DB_QUERY = $DB_QUERY->query($DB_REQUEST_UPDATE_ACCOUNT);
        $DB_QUERY->closeCursor();

        echo "true";
    } else {
        echo "false";
    }
}

$DB_QUERY->closeCursor();

