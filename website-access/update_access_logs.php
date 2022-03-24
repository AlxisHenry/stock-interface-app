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

#$USER_COMPUTER =  strtoupper(explode('.', gethostbyaddr($_SERVER['REMOTE_ADDR']))[0]);
$TEMP_USER_COMPUTER = "COLWD6003l";

$DB_REQUEST_UPDATE_LOGS_TABLE = "UPDATE `panel_manage_access` SET `derniereConnection` = (SELECT NOW()) WHERE `username` = 'employee';
INSERT INTO `panel_logs_access` (`userID` , `date`, `asset`) VALUES ((SELECT `ID` FROM `panel_manage_access` WHERE `username` = 'employee'), (SELECT NOW()), '$TEMP_USER_COMPUTER');";

try {
    $DB_QUERY = $pdo_connect->query($DB_REQUEST_UPDATE_LOGS_TABLE);
    echo 'true';
} catch (Exception $e) {
    echo 'false';
}

$DB_QUERY->closeCursor();