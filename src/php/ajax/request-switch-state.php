<?php

include '../functions.php';

$ELEMENT = $_POST['element'];
$STATE = $_POST['turn'];

$currentState = Front_OBJECT_($ELEMENT, 'id')->getState();
$currentCount = Front_OBJECT_($ELEMENT, 'id')->getCount();

$newState = $currentState === 1 ? 0 : 1;
$newCount = $currentCount + 1;

$QUERY_STATE_ = "UPDATE `front` SET `state`=:newState WHERE `id`=:element;";
$QUERY_DATE_ = "UPDATE `front` SET `modification` = (SELECT NOW()) WHERE `id`=:element;";
$QUERY_COUNT_ = "UPDATE `front` SET `count`=:newCount WHERE `id`=:element;";

$cSTATE = Connection()->prepare($QUERY_STATE_);
$cSTATE->bindValue(':newState', $newState);
$cSTATE->bindValue(':element', $ELEMENT);

$cDATE = Connection()->prepare($QUERY_DATE_);
$cDATE->bindValue(':element', $ELEMENT);

$cCOUNT = Connection()->prepare($QUERY_COUNT_);
$cCOUNT->bindValue(':newCount', $newCount);
$cCOUNT->bindValue(':element', $ELEMENT);

$cSTATE->execute();
$cDATE->execute();
$cCOUNT->execute();

$cSTATE->closeCursor();
$cDATE->closeCursor();
$cCOUNT->closeCursor();

