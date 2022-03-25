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

$TARGET = $_POST['target'];
$TYPE = $_POST['type'];
$ASSET =  strtoupper(explode('.', gethostbyaddr($_SERVER['REMOTE_ADDR']))[0]);

switch ($TYPE) {
    case 'logs':
        try {
            $pdo_connect->query(UPDATE_LOGS_TABLE($TARGET, $ASSET));
        } catch (Exception $e) {
            echo $e;
        }
        break;
    case 'access':
        $DB_QUERY = $pdo_connect->query(VIEW_ACCESS_EMPLOYEE($TARGET));
        while ($AUTH = $DB_QUERY->fetch()) {

            if ($AUTH['status'] == 0) {
                echo 'false';
            } elseif ($AUTH['status'] == 1) {
                echo 'true';
            }

        }
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
