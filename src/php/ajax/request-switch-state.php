<?php

include '../functions.php';

$ELEMENT = $_POST['element'];
$STATE = $_POST['turn'];

$settings = Front_OBJECT_($ELEMENT, 'nom');

$currentState = $settings->getState();
$setNewState = '';

if ($currentState === 1) {
    $settings->setState(0);
} elseif ($currentState === 0) {
    $settings->setState(1);
} else {
    echo 'Une erreur est survenue.';
}

var_dump($settings);

/*
 *
 * if ($STATE === 'up') {
    $CHANGE_STATE_ELEMENT = Connection()->query("UPDATE `front` SET `state` = 1 WHERE `nom` LIKE '$ELEMENT';");
} elseif ($STATE === 'down') {
    $CHANGE_STATE_ELEMENT = Connection()->query("UPDATE `front` SET `state` = 0 WHERE `nom` LIKE '$ELEMENT';");
}

$CHANGE_MODIFICATION_DATE = Connection()->query("UPDATE `front` SET `modification` = (SELECT NOW()) WHERE `nom` LIKE '$ELEMENT';");
$UPDATE_COUNT = Connection()->query("UPDATE `front` SET `count` = `count` + 1  WHERE `nom` LIKE '$ELEMENT';");

*/