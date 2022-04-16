<?php

include '../functions.php';

$TARGET = $_POST['target'];
$TYPE = $_POST['type'];

switch ($TYPE) {
    case 'logs':
        $fx = true;
        break;
    case 'access':
        if (Access_OBJECT_($TARGET, 'username')->getStatus()) {
            echo true;
        } else {
            echo false;
        }
        break;
    default:
        break;
}