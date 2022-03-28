<?php

include "../functions.php";

$Userid = $_POST['id'];
$pass = $_POST['pass'];

try {
    $DB_REQUEST = "SELECT * FROM `panel_manage_access` WHERE `username` = '$Userid'";
    $DB_QUERY = Connection()->query($DB_REQUEST);

    while ($AUTH = $DB_QUERY->fetch()) {

        if ($AUTH['username'] == "$Userid" && $AUTH['password'] == $pass) {

            if ($AUTH['username'] == "employee") {
                echo "employee-access";
            } else {
                echo "true";
            }
        } else {
            echo "false";
        }
    }

    $DB_QUERY->closeCursor();
} catch (Exception $e) {
    echo "false";
}



