<?php

include "../functions.php";

$Userid = $_POST['id'];
$pass = $_POST['pass'];

$DB_REQUEST = "SELECT * FROM `panel_manage_access` WHERE `username` = '$Userid'";

$DB_QUERY = Connection()->query($DB_REQUEST);

while ($AUTH = $DB_QUERY->fetch()) {

    if ($AUTH['username'] == "$Userid" && $AUTH['password'] == $pass) {

        $DB_REQUEST_UPDATE_ACCOUNT = "UPDATE `panel_manage_access` SET `derniereConnection` = (SELECT NOW()) WHERE `username` = '$Userid'";
        $DB_QUERY = Connection()->query($DB_REQUEST_UPDATE_ACCOUNT);
        $DB_QUERY->closeCursor();

        echo "true";
    } else {
        echo "false";
    }
}

$DB_QUERY->closeCursor();

