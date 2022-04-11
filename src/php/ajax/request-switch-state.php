<?php

include '../functions.php';

$ELEMENT = $_POST['element'];
$STATE = $_POST['turn'];

if ($STATE === 'up') {
    $CHANGE_STATE_ELEMENT = Connection()->query("UPDATE `front` SET `state` = 1 WHERE `nom` LIKE '$ELEMENT';");
} elseif ($STATE === 'down') {
    $CHANGE_STATE_ELEMENT = Connection()->query("UPDATE `front` SET `state` = 0 WHERE `nom` LIKE '$ELEMENT';");
}

$CHANGE_MODIFICATION_DATE = Connection()->query("UPDATE `front` SET `modification` = (SELECT NOW()) WHERE `nom` LIKE '$ELEMENT';");
$UPDATE_COUNT = Connection()->query("UPDATE `front` SET `count` = `count` + 1  WHERE `nom` LIKE '$ELEMENT';");
