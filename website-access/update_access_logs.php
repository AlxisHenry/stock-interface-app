<?php

include "./configs/class/dbConnection.class.php";

$dbhost = HOST;
$db = DATABASE;
$dbuser = USERNAME;
$dbpass = PASSWORD;

$pdo_connect =  new PDO('mysql:host='.$host.';dbname='.$dbname.'', $user, $pass);

$VIEW_ACCESS = $_GET['condition'];

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