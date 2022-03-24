<?php

$Userid = $_GET['id'];
$pass = $_GET['pass'];

include "./configs/class/dbConnection.class.php";

$dbhost = HOST;
$db = DATABASE;
$dbuser = USERNAME;
$dbpass = PASSWORD;

$DB_REQUEST = "SELECT * FROM `panel_manage_access` WHERE `username` = 'tf$Userid'";

$DB_QUERY = $pdo_connect->query($DB_REQUEST);
$DB_QUERY->closeCursor();

#$USER_COMPUTER =  strtoupper(explode('.', gethostbyaddr($_SERVER['REMOTE_ADDR']))[0]);
$TEMP_USER_COMPUTER = "COLWD6011l";

while ($AUTH = $DB_QUERY->fetch()) {

	if ($AUTH['username'] == "tf$Userid" && $AUTH['password'] == $pass) {

        $DB_REQUEST_UPDATE_ACCOUNT = "UPDATE `panel_manage_access` SET `derniereConnection` = (SELECT NOW()) WHERE `username` = 'tf$Userid'";
        $DB_REQUEST_UPDATE_LOGS = "INSERT INTO `panel_logs_access` (`userID`, `date`, `asset`) VALUES ((SELECT `ID` FROM `panel_manage_access` WHERE `username` = 'tf$Userid'), (SELECT NOW()) ,'$TEMP_USER_COMPUTER')";

        $DB_QUERY = $pdo_connect->query($DB_REQUEST_UPDATE_ACCOUNT);
        $DB_QUERY->closeCursor();
        $DB_QUERY = $pdo_connect->query($DB_REQUEST_UPDATE_LOGS);
        $DB_QUERY->closeCursor();

		echo true;
	} else {
		echo false;
	}
}


