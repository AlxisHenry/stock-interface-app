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
                echo 'true';
            }

        }
        $DB_QUERY->closeCursor();
        break;
    case 'edit-access':
        $VALUE = $_POST['value'];
        if ($VALUE === 'on') {
            $VALUE = 1;
        } else {
            $VALUE = 0;
        }
        $DB_QUERY = Connection()->query(CHANGE_ACCESS_BOOLEAN($VALUE, $TARGET));
        $DB_QUERY->closeCursor();
        echo 'Requête terminée';
        break;
    default:
        break;
}

