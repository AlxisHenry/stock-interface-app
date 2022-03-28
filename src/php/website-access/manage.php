<?php

include '../functions.php';

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
                session_start();
                $_SESSION['user'] = [
                    "id" => $AUTH['username'],
                    "password" => $AUTH['password'],
                    "lastConnection" => $AUTH['derniereConnection'],
                    "thisConnectionDate" => date("Y-m-d H:i:s"),
                    "state" => $AUTH['status'],
                    "type" => $AUTH['type']
                ];
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
    return "INSERT INTO `panel_logs_access` (`userID` , `date`, `asset`) VALUES ((SELECT `ID` FROM `panel_manage_access` WHERE `username` = '$TARGET'), (SELECT NOW()), '$TEMP_ASSET');";
}

function VIEW_ACCESS_EMPLOYEE($TARGET): string
{
    return "SELECT * FROM `panel_manage_access` WHERE `username` = '$TARGET'";
}
