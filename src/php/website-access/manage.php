<?php

include './../configuration/database-connexion.php';

$TARGET = $_POST['target'];
$TYPE = $_POST['type'];
$ASSET =  strtoupper(explode('.', gethostbyaddr($_SERVER['REMOTE_ADDR']))[0]);

switch ($TYPE) {
    case 'logs':
            $DB_QUERY = Connection()->query(UPDATE_LOGS_TABLE($TARGET, $ASSET));
            $DB_QUERY->closeCursor();
        break;
    case 'access':
        $DB_QUERY = Connection()->query(VIEW_ACCESS_EMPLOYEE($TARGET));
        while ($AUTH = $DB_QUERY->fetch()) {

            if ($AUTH['status'] == 0) {
                echo 'false';
            } elseif ($AUTH['status'] == 1) {
                echo 'true';
            }

        }
        $DB_QUERY->closeCursor();
        break;
    default:
        break;
}

function UPDATE_LOGS_TABLE($TARGET, $TEMP_ASSET): string
{
    return "UPDATE `panel_manage_access` SET `derniereConnection` = (SELECT NOW()) WHERE `username` = '$TARGET';
            INSERT INTO `panel_logs_access` (`userID` , `date`, `asset`) VALUES ((SELECT `ID` FROM `panel_manage_access` WHERE `username` = '$TARGET'), (SELECT NOW()), '$TEMP_ASSET');";
}

function VIEW_ACCESS_EMPLOYEE($TARGET): string
{
    return "SELECT * FROM `panel_manage_access` WHERE `username` = '$TARGET'";
}