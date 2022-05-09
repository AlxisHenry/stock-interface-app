<?php

include '../functions.php';

$__Famille__ = new Familles();

$FAMILY= $_POST['FAMILLE_DATA'];
$id = intval($FAMILY['id']);
$name = $FAMILY['nom'];
$comment = $FAMILY['comment'];
$TYPE = $FAMILY['type'];

if ($TYPE === 'insert') {
    $__Famille__->Insert($name, $comment);
    echo json_encode(['insert', $name]);
} elseif ($TYPE === 'update') {
    $__Famille__->Update($name, $comment, $id);
    echo json_encode(['update', $name]);
} elseif ($TYPE === 'delete') {
    $__Famille__->Delete($id);
}